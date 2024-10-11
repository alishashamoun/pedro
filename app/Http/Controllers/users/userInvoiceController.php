<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\ProductandService;
use App\Models\User;
use App\Notifications\UserNotification;
use Barryvdh\DomPDF\Facade\Pdf;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;

class userInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->id;
        $invoices = Invoice::whereHas('job', function ($query) use ($user) {
            $query->where('customer_id', $user);
        })->get();
        // dd($invoices);
        return view('users.invoice.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        // Step 1: Validate the request
        $request->validate([
            'invoice_id' => 'required|integer|exists:productand_services,invoice_id',
            'stripeToken' => 'required'
        ]);

        // Step 2: Calculate the sum of the total
        $invoiceId = $request->input('invoice_id');
        $totalAmount = ProductandService::where('invoice_id', $invoiceId)
            ->sum('total');

        if ($totalAmount <= 0) {
            return redirect()->back()->with('error', 'Invalid total amount.');
        }

        // Step 3: Charge the amount using Stripe
        try {
            DB::beginTransaction();

            Stripe::setApiKey(env('STRIPE_SECRET'));

            $charge = Charge::create([
                "amount" => $totalAmount * 100, // amount in cents
                "currency" => "usd",
                "source" => $request->input('stripeToken'),
                "description" => "Payment for invoice #$invoiceId"
            ]);

            $invoice = Invoice::find($invoiceId);
            $invoice->status = 'paid';
            $invoice->save();

            $user = auth()->user();

            // Get the users except the authenticated user and those with the excluded roles
            $admin = User::role(['Admin'])->get();

            // Send the notification to eligible users
            $message = "Payment for invoice #$invoiceId has been successfully processed.";

            Notification::send($admin, new UserNotification($user, $message));

            DB::commit();

            return redirect()->back()->with('success', 'Payment successful.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = Invoice::with('service', 'job')->find($id);
        // dd($invoice);
        return view('users.invoice.show', compact('invoice'));
    }
    public function generatePDF($id)
    {
        $invoice = Invoice::with('service', 'job')->find($id);
        $pdf = Pdf::loadView('users.invoice.pdf', ['invoice' => $invoice]);

        return $pdf->stream('invoice.pdf');
        // return view('users.invoice.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
