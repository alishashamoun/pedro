<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\Estimate;
use App\Models\Job;
use App\Models\User;
use App\Notifications\UserNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class userEstimateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $job = Estimate::where('customer_id', $user->id)->get();
        // dd($job);
        return view('users.job.estimate', compact('job'));

    }
    public function accept($id)
    {
        // Find the work order by ID
        $estimate = Estimate::find($id);
        // dd($estimate);
        // Check if the work order exists and is in 'Pending' status
        if ($estimate && $estimate->client_status === 'pending') {
            // Update the status to 'Accepted'
            // dd('d');
            $estimate->client_status = 'accepted';
            $estimate->save();
        }

        return redirect()->back()->with('success', 'Estimate Accepted Successfully');
    }

    public function decline($id)
    {
        $estimate = Estimate::find($id);

        if ($estimate && $estimate->client_status === 'pending') {
            // Update the status to 'Accepted'
            $estimate->client_status = 'declined';
            $estimate->save();
        }

        return redirect()->back()->with('warning', 'Estimate Declined Successfully');
    }
    public function esignature(Request $request, $id)
    {
        $request->validate([
            'signature' => 'required',
        ]);
        // dd($request->all());
        $estimate = Estimate::find($id);
        DB::beginTransaction();

        try {
            // Handle file uploads
            if ($request->signature) {

                // $fileName = Str::random(15) . '.' . $request->file('signature')->getClientOriginalExtension();
                // $path = $request->file('signature')->storeAs('signature', $fileName, 'public');

                // dd($request->signature);

                $estimate->signature = $request->signature;
                $estimate->signature_time = Carbon::now();
                $estimate->save();
                $user = auth()->user();
                $admin = User::find(1);
                $message = 'Uploaded E-Signature';
                $admin->notify(new UserNotification($user, $message));


            }



            // Commit the transaction
            DB::commit();

            return response()->json(['message' => 'Signature uploaded successfully', 'status' => 200], 200);
        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollBack();

            return response()->json(['error' => 'An error occurred while uploading signature' . $e->getMessage(), 'status' => 500], 500);
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
        $job = Estimate::findOrFail($id);
        return view('users.job.show', compact('job'));
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
