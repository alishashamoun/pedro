<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Models\Bid;
use App\Models\EstimateRequest;
use App\Models\User;
use App\Notifications\UserNotification;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Notification;

class BidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $id = Auth::id();
            $estimate = EstimateRequest::select('id', 'first_name', 'last_name', 'phone_number', 'email', 'created_at')
                ->whereHas('bids', function ($query) use ($id) {
                    $query->where('user_id', $id)->where(function ($query) {
                        $query->where('selected', '!=', true)
                            ->orWhereNull('selected');
                    });
                })->get();

            return view('vendor.estimate_req.index', compact('estimate'));

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estimate = EstimateRequest::find($id);
        $userBid = $estimate->bids()->where('user_id', auth()->id())->first();

        return view('vendor.estimate_req.show', compact('estimate', 'userBid'));
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
        // dd($request->all(),$id);

        $user = auth()->user();
        $selectedBid = Bid::where('user_id', $user->id)->where('estimate_request_id', $id)->firstOrFail();


        if ($selectedBid->due_date && Carbon::parse($selectedBid->due_date)->isPast()) {
            return redirect()->back()->with('error', 'The due date has passed.');
        }

        if ($selectedBid->bid != null) {

            return redirect()->back()->with('warning', 'You already placed the Bid!');
        }
        try {
            // Select the chosen bid
            $selectedBid->bid = $request->bid;
            $selectedBid->save();

            DB::beginTransaction();

            $admin = User::role(['Admin', 'account manager'])->get();

            // Send the notification to eligible users
            $message = "has placed a bid on request number #{$id}.";

            Notification::send($admin, new UserNotification($user, $message));

            DB::commit();

            return redirect()->back()->with('success', 'Bids saved successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
            return redirect()->back()->with('error', 'Error saving bids. Please try again later' . $e->getMessage());
        }
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
