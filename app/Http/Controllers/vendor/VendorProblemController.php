<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\ProblemReporting;
use App\Models\User;
use App\Notifications\UserNotification;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class VendorProblemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $problemReports = ProblemReporting::where('createdBy', auth()->user()->id)->get();
        $job = Job::get();
        // return $problem;
        return view('vendor.problem.index', compact('problemReports', 'job'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $job = Job::whereHas('workOrder', function ($query) {
            $query->where('vendor_id', auth()->user()->id)->where('status', 'accepted');
        })->get();
        return view('vendor.problem.create', compact('job'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'job' => 'required|integer',
            'location' => 'required|string|max:255',
            'location_supervisor' => 'required|string|max:255',
            'problem_date' => 'required|date',
            'type_of_problem' => 'required|string|max:255',
            'description_of_problem' => 'required|string',
            'investigator_of_problem' => 'required|string|max:255',
            'result_of_investigation' => 'required|string',
            'suggestions' => 'required|string',
        ];

        // Custom error messages (optional)
        $messages = [
            'required' => 'The :attribute field is required.',
            'integer' => 'The :attribute field must be an integer.',
            'date' => 'The :attribute field must be a valid date.',
            'string' => 'The :attribute field must be a string.',
            'max' => 'The :attribute field must not exceed :max characters.',
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // If validation passes, proceed with storing the data
        $validatedData = $validator->validated();
        try {
            $validatedData['createdBy'] = auth()->user()->id;
            $problemReport = ProblemReporting::create($validatedData);

            // Admin Notification
            $admin = User::find(1);
            $user = auth()->user();
            $message = "created a problem report# {$problemReport->id}";
            $admin->notify(new UserNotification($user, $message));

            // Customer Notification
            $cust = User::find($problemReport->createdBy);
            $messages = "created your job's problem report# {$problemReport->id}";
            $cust->notify(new UserNotification($user, $messages));

            return redirect()->route('userproblem.index')->with('success', 'New Report Created Successfully');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'An error occurred while creating the report: ' . $e->getMessage());
        }
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
        return view('vendor.problem.show', compact('problemReport'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        try {


            $problemReport = ProblemReporting::findOrFail($id);

            $job = Job::whereHas('workOrder', function ($query) {
                $query->where('vendor_id', auth()->user()->id)->where('status', 'accepted');
            })->get();
            ;


            return view('vendor.problem.edit', compact('problemReport', 'job'));
        } catch (\Exception $e) {


            return back()->with('error', 'An error occurred while retrieving the data: ' . $e->getMessage());
        }

    }



    public function update(Request $request, $id)
    {
        try {
            $problemReport = ProblemReporting::findOrFail($id);
            $problemReport->update($request->all());

            // Admin Notification
            $admin = User::find(1);
            $user = auth()->user();
            $message = "updated a problem report# {$id}";
            $admin->notify(new UserNotification($user, $message));

            // Customer Notification
            $cust = User::find($problemReport->createdBy);
            $messages = "updated your job's problem report# {$id}";
            $cust->notify(new UserNotification($user, $messages));

            return redirect()->route('userproblem.index')->with('success', 'Report Updated Successfully');
        } catch (QueryException $e) {
            return redirect()->route('userproblem.index')->with('error', 'An error occurred while updating the report: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $problemReport = ProblemReporting::findOrFail($id);
            $problemReport->delete();

            DB::commit();

            return redirect()->route('userproblem.index')->with('success', 'Report Deleted Successfully');
        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->route('userproblem.index')->with('error', 'An error occurred while deleting the report: ' . $e->getMessage());
        }
    }

}
