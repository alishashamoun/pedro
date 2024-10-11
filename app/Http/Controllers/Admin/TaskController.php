<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Task;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $task = Task::with('jobs')->orderby('created_at','desc')->get();
        $user = User::withRole('User')->get();
        $manager = User::withRole('account manager')->get();
        $jobs = Job::all();

        // dd($task);
        return view('admin.task.index', compact('task', 'user', 'manager', 'jobs'));
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

        try {
            // Validate the request data
            $validator = Validator::make($request->all(), [
                'job_id' => 'required|exists:jobs,id',
                'user_id' => 'required',
                'due_date' => 'required',
                'assignment' => 'required',
                'description' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput()
                    ->with('error', 'Validation failed');
            }

            DB::beginTransaction();

            $job = Job::find($request->job_id);
            $job->user_id = $request->user_id;
            $job->save();

            Task::create([
                'job_id' => $request->job_id,
                'manager_id' => $job->account_manager_id,
                'user_id' => $request->user_id,
                'due_date' => $request->due_date,
                'assignment' => $request->assignment,
                'description' => $request->description,
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Task Created successfully');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'An error occurred. Please try again later.');
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
        //
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
        $task = Task::find($id);
        $task->update($request->all());
        $job = Job::find($task->job_id);
        // dd($job);
        $job->user_id = $request->user_id;
        $job->save();
        return redirect()->back()->with('success', 'Task updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->back()->with('success', 'Task deleted successfully');
    }
}
