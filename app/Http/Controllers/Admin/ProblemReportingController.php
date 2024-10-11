<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\ProblemReporting;
use App\Models\User;
use App\Notifications\UserNotification;
use Exception;
use Illuminate\Http\Request;

class ProblemReportingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $problemReports = ProblemReporting::all();
        $job = Job::get();
        // return $problem;
        return view('admin.problem.index', compact('problemReports', 'job'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $job = Job::get();
        return view('admin.problem.create', compact('job'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['createdBy'] = auth()->user()->id;
        $problemReport = ProblemReporting::create($request->all());

        $user = auth()->user();
        $cust = User::find($problemReport->jobname->customer->id);
        $message = "creats your job's problem report# {$problemReport->id}";
        $cust->notify(new UserNotification($user, $message));

        return redirect()->route('problem.index')->with('success', 'New Report Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $problemReport = ProblemReporting::findOrFail($id);
        return view('admin.problem.show', compact('problemReport'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $problemReport = ProblemReporting::findOrFail($id);
        $job = Job::get();
        return view('admin.problem.edit', compact('problemReport', 'job'));
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
        try {

            $problemReport = ProblemReporting::findOrFail($id);
            // dd($problemReport->jobname->customer->id);
            $problemReport->update($request->all());

            if ($problemReport->createdBy != auth()->user()->id) {

                $admin = User::find($problemReport->createdBy);
                $user = auth()->user();
                $cust = User::find($problemReport->jobname->customer->id);
                $message = "updated your problem report# {$id}";
                $messages = "updated your job's problem report# {$id}";
                $admin->notify(new UserNotification($user, $message));
                $cust->notify(new UserNotification($user, $messages));

            }
            return redirect()->route('problem.index')->with('success', 'Report Updated Successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while retrieving the data: ' . $e->getMessage());
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
        $problemReport = ProblemReporting::findOrFail($id);
        $problemReport->delete();
        return redirect()->route('problem.index')->with('error', 'Report Deleted Successfully');
    }
}
