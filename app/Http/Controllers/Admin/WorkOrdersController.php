<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\User;
use App\Notifications\UserNotification;
use App\Services\TwilioService;
use Exception;
use Illuminate\Http\Request;
use Validator;
use App\Models\WorkOrders;
use App\Models\Technicians;
use Carbon\Carbon;

class WorkOrdersController extends Controller
{
    protected $twilioService;

    public function __construct(TwilioService $twilioService)
    {
        $this->twilioService = $twilioService;
    }
    public function index()
    {
        $WorkOrders = WorkOrders::get();

        return view('admin.work_orders.index', compact('WorkOrders'));
    }

    public function create()
    {
        $jobs = Job::all();
        $vendors = User::withRole('vendor')->get();
        return view('admin.work_orders.create', compact('jobs', 'vendors'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'job_id' => 'required',
            'vendor_id' => 'required',
            'deadline' => 'required',
        ]);
        try {

            $validatedData['status'] = 'pending';
            $work = WorkOrders::create($validatedData);

            $user = User::find($request->input('vendor_id'));
            $admin = auth()->user();
            $message = "Assigned a work order# {$work->id}";
            $user->notify(new UserNotification($admin, $message));

            $message1 = "{$admin->name} Assigned your job's work order# {$work->id} to vendor {$user->name}";

            // Send SMS to the vendor about new work order
            $job = Job::select('customer_id')->where('id',$request->job_id)->with('customer')->first();
            // dd($job->customer->phone);
            if($job->customer->phone != null){

                //$this->twilioService->sendSMS($job->customer->phone, $message1);
            }

            return redirect()->route('work_orders.index')->with('success', 'Work order created successfully!');

        } catch (Exception $e) {
            throw $e;
        }
    }

    public function show($id)
    {
        $workOrders = WorkOrders::findOrFail($id);
        return view('admin.work_orders.show', compact('workOrders'));
    }
    public function details($id)
    {
        $workOrder = WorkOrders::findOrFail($id);
        return view('admin.work_orders.details', compact('workOrder'));
    }

    public function edit(WorkOrders $workOrder)
    {
        $jobs = Job::all();
        $vendors = User::withRole('vendor')->get();
        return view('admin.work_orders.edit', compact('workOrder', 'jobs', 'vendors'));
    }


    public function update(Request $request, $id)
    {
        try {
            $workOrder = WorkOrders::findOrFail($id);

            // Check if vendor_id is being changed
            if ($workOrder->vendor_id != $request->input('vendor_id') || $workOrder->job_id != $request->input('job_id')) {
                $request->merge(['status' => 'pending', 'payment_info' => '---']);

                $user = User::find($request->input('vendor_id'));
                $admin = auth()->user();
                $message = "Assigned a work order# {$id}";
                $user->notify(new UserNotification($admin, $message));
            }

            $workOrder->update($request->all());

            return redirect()->route('work_orders.index')->with('success', 'Work order updated successfully!');
        } catch (Exception $e) {
            throw $e;
        }
    }
    public function destroy($id)
    {
        $workOrder = WorkOrders::findOrFail($id);
        $workOrder->delete();
        return redirect()->route('work_orders.index')->with('success', 'Work order deleted successfully!');
    }

}
