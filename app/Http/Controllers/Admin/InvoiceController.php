<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Job;
use App\Models\ProductandService;
use App\Models\User;
use App\Notifications\UserNotification;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InvoiceController extends Controller
{
    public function index()
    {
        try {

            $user = auth()->user();
            if ($user->hasRole('Admin')) {

                $invoice = Invoice::where('status', 'unpaid')->with('service', 'unpaid')->orderby('created_at', 'desc')->get();
                $paid = Invoice::where('status', 'paid')->with('service', 'unpaid')->orderby('created_at', 'desc')->get();
                $recur = Invoice::where('status', 'recurring')->with('service', 'unpaid')->orderby('created_at', 'desc')->get();
                $all = Invoice::with('service', 'unpaid')->orderby('created_at', 'desc')->get();
                $add = ProductandService::sum('total');
                return view('invoice.index', compact('invoice', 'paid', 'recur', 'all', 'add'));

            } else {
                $invoice = Invoice::where('createdBy', $user->id)->where('status', 'unpaid')->with('service', 'unpaid')->orderby('created_at', 'desc')->get();
                $paid = Invoice::where('createdBy', $user->id)->where('status', 'paid')->with('service', 'unpaid')->orderby('created_at', 'desc')->get();
                $recur = Invoice::where('createdBy', $user->id)->where('status', 'recurring')->with('service', 'unpaid')->orderby('created_at', 'desc')->get();
                $all = Invoice::where('createdBy', $user->id)->with('service', 'unpaid')->orderby('created_at', 'desc')->get();
                $invoices = Invoice::where('createdBy', $user->id)->orderby('created_at', 'desc')->get();
                // $add = 0;
                // foreach ($invoices as $invoicess) {
                //     foreach ($invoicess->service as $some) {
                //         $add += $some->total;
                //     }
                // }
                return view('invoice.index', compact('invoice', 'paid', 'recur', 'all'));
            }


            // dd($add);


        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
            // view('invoice.index',  ['message' => $e->getMessage()]);
        }
    }

    public function create($id)
    {
        $user = auth()->user();
        if ($user->hasRole('Admin')) {

            $job = Job::get();
        } else {

            $job = Job::whereHas('workOrder', function ($query) use ($id) {
                $query->where('vendor_id', auth()->user()->id)
                    ->where('id', $id);
            })->pluck('id');

            // dd($job[0]);
        }
        return view('invoice.create', compact('job'));
    }

    public function store(Request $request)
    {
        // return $request;
        // dd($request->all());

        try {
            // Validate the request data
            $validator = Validator::make($request->all(), [
                'job_id' => 'required|exists:jobs,id',
                'drive_time' => 'required_without:no_bill_amount_description',
                'labor_time' => 'required_without:no_bill_amount_description',
                'payments_and_deposits_input' => 'required_without:no_bill_amount_description',
                'amount_description' => 'required_without:no_bill_amount_description',
                'amount' => 'required_without:no_bill_amount_description',
                'note_to_cust' => 'required_without:no_bill_amount_description',
                // Validation for the "ProductandService" fields
                'description' => 'required_without:no_bill_amount_description',
                'warehouse' => 'required_without:no_bill_amount_description',
                'qty_hrs' => 'required_without:no_bill_amount_description',
                'rate' => 'required_without:no_bill_amount_description',
                'total' => 'required_without:no_bill_amount_description',
                'cost' => 'required_without:no_bill_amount_description',
                'margin_tax' => 'required_without:no_bill_amount_description',
                // Validation for the "no_bill" fields
                'no_bill_amount_description' => 'required_without:amount',
                'no_bill_amount' => 'required_without:amount',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput()
                    ->with('error', 'Validation failed');
            }


            // Begin a database transaction
            DB::beginTransaction();

            // Create the invoice
            $invoice = Invoice::create([
                'createdBy' => auth()->user()->id,
                'job_id' => $request['job_id'],
                'drive_time' => $request['drive_time'],
                'labor_time' => $request['labor_time'],
                'payments_and_deposits_input' => $request['payments_and_deposits_input'],
                'amount_description' => $request['amount_description'],
                'amount' => $request['amount'],
                'no_bill_amount_description' => $request['no_bill_amount_description'],
                'no_bill_amount' => $request['no_bill_amount'],
                'note_to_cust' => $request['note_to_cust'],
            ]);

            foreach ($request['description'] as $key => $value) {
                // Create ProductandService records
                ProductandService::create([
                    'invoice_id' => $invoice->id,
                    'description' => $value,
                    'warehouse' => $request['warehouse'][$key],
                    'qty_hrs' => $request['qty_hrs'][$key],
                    'rate' => $request['rate'][$key],
                    'total' => $request['total'][$key],
                    'cost' => $request['cost'][$key],
                    'margin_tax' => $request['margin_tax'][$key],
                ]);
            }

            // Commit the transaction
            DB::commit();
            $user = auth()->user();
            $admin = User::find(1);
            $message = "Created an Invoice #$invoice->id";
            $admin->notify(new UserNotification($user, $message));

            return redirect()->route('invoice.index')
                ->with('success', 'Invoice created successfully');
        } catch (\Exception $e) {
            // Rollback the transaction in case of an exception
            DB::rollBack();
            // throw $e;
            // Handle the exception, you can log it or display an error message
            return redirect()->back()->with('error', 'An error occurred. Please try again later.');
        }

    }

    public function show($id)
    {
        $invoice = Invoice::with('service', 'job')->find($id);
        // dd($invoice);
        return view('invoice.show', compact('invoice'));
    }

    public function edit(Invoice $invoice)
    {
        return view('invoice.edit', compact('invoice'));
    }

    public function update(Request $request, Invoice $Invoice)
    {
        // dd($request->id);
        $validator = Validator::make($request->all(), [
            'job_id' => 'required|exists:jobs,id',
            'drive_time' => 'required_without_all:no_bill_amount_description',
            'labor_time' => 'required_without_all:no_bill_amount_description',
            'payments_and_deposits_input' => 'required_without_all:no_bill_amount_description',
            'amount_description' => 'required_without_all:no_bill_amount_description',
            'amount' => 'required_without_all:no_bill_amount_description',
            'note_to_cust' => 'required_without_all:no_bill_amount_description',
            // Validation for the "ProductandService" fields
            'description' => 'required_without_all:no_bill_amount_description',
            'warehouse' => 'required_without_all:no_bill_amount_description',
            'qty_hrs' => 'required_without_all:no_bill_amount_description',
            'rate' => 'required_without_all:no_bill_amount_description',
            'total' => 'required_without_all:no_bill_amount_description',
            'cost' => 'required_without_all:no_bill_amount_description',
            'margin_tax' => 'required_without_all:no_bill_amount_description',
            // Validation for the "no_bill" fields
            'no_bill_amount_description' => 'required_without_all:amount',
            'no_bill_amount' => 'required_without_all:amount',
        ]);


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Validation failed');
        }
        $ProductandService = ProductandService::where('invoice_id', $Invoice->id)->get();

        if ($ProductandService->count() > 0) {
            // Delete all the primary contacts found
            foreach ($ProductandService as $ProductandServices) {
                $ProductandServices->delete();
            }
        }
        foreach ($request['description'] as $key => $value) {
            ProductandService::create([
                'invoice_id' => $Invoice->id,
                'description' => $value,
                'warehouse' => $request['warehouse'][$key],
                'qty_hrs' => $request['qty_hrs'][$key],
                'rate' => $request['rate'][$key],
                'total' => $request['total'][$key],
                'cost' => $request['cost'][$key],
                'margin_tax' => $request['margin_tax'][$key],
            ]);
        }
        $Invoice->createdBy = auth()->user()->id;
        $Invoice->status = $request['status'];
        $Invoice->drive_time = $request['drive_time'];
        $Invoice->labor_time = $request['labor_time'];
        $Invoice->payments_and_deposits_input = $request['payments_and_deposits_input'];
        $Invoice->amount_description = $request['amount_description'];
        $Invoice->amount = $request['amount'];
        $Invoice->note_to_cust = $request['note_to_cust'];
        $Invoice->save();

        $user = auth()->user();
        $admin = User::find(1);
        $message = 'Updated an Invoice';
        $admin->notify(new UserNotification($user, $message));

        return redirect()->route('invoice.index')
            ->with('success', 'Invoice updated successfully');
    }

    public function destroy(Invoice $Invoice)
    {
        // dd($Invoice->id);
        $Invoice->delete();
        return redirect()->route('invoice.index')
            ->with('error', 'Invoice deleted successfully');
    }
}
