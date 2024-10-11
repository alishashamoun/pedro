<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Models\Files;
use App\Models\Job;
use App\Models\User;
use App\Notifications\UserNotification;
use App\Services\TwilioService;
use Exception;
use Illuminate\Http\Request;
use App\Models\WorkOrders;
use File;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class VendorController extends Controller
{
    protected $twilioService;

    public function __construct(TwilioService $twilioService)
    {
        $this->twilioService = $twilioService;
    }
    public function schedule()
    {
        // $jobs = Job::all();
        $jobs = Job::whereHas('workOrder', function ($query) {
            $query->where('vendor_id', auth()->user()->id)->where('status', 'accepted');
        })->get();

        return view('vendor.schedule.schedule', compact('jobs'));
    }
    public function Updateschedule(Request $request, $id)
    {
        // dd($id);
        $schedule = Job::find($id);
        $schedule->update($request->all());
        return response()->json(['message' => 'Job scheduled successfully']);
    }
    public function index()
    {
        // Retrieve and display assigned work orders for the vendor
        $WorkOrders = WorkOrders::where('vendor_id', auth()->user()->id)
            ->whereNotIn('status', ['declined'])
            ->orderby('priority', 'asc')->get();
        // return $WorkOrders;
        return view('vendor.work_orders.index', compact('WorkOrders'));
    }

    public function show($id)
    {
        $job = Job::findOrFail($id);
        return view('vendor.work_orders.show', compact('job'));
    }
    public function doc($id)
    {
        // Artisan::call('storage:link');
        $workOrders = WorkOrders::findOrFail($id);
        return view('vendor.work_orders.doc', compact('workOrders'));
    }

    public function upload(Request $request, $id)
    {
        $workOrders = WorkOrders::findOrFail($id);

        $request->validate([
            'files.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            // Adjust validation rules as needed
        ]);

        // Start a database transaction to ensure data consistency
        DB::beginTransaction();

        try {
            // Handle file uploads
            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    $fileName = Str::random(15) . '.' . $file->getClientOriginalExtension();
                    $path = $file->storeAs('uploads/image', $fileName, 'public');

                    Files::create([
                        'job_id' => $workOrders->job_id,
                        'filename' => asset('storage/' . $path),
                    ]);
                }

            }

            // Save notes in the 'workorders' table
            $workOrders->notes = $request->input('notes');
            $workOrders->save();

            // Commit the transaction
            DB::commit();

            return redirect()->back()->with('success', 'Files uploaded and notes saved successfully.');
        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollBack();

            return redirect()->back()->with('error', 'An error occurred while uploading files and saving notes.');
        }
    }
    public function alert($id)
    {
        try {

        // Send SMS to the vendor about new work order
        $job = Job::select('customer_id', 'location_name')->where('id', $id)->with('customer')->first();
        if ($job != null) {
            $message1 = "On-the-way Jobsite Alert:
            Vendor is on the way for the job, location:{$job->location_name}. Please prepare for the service.
            ";
            // dd($job->customer->phone);
            if ($job->customer->phone != null) {

                //$this->twilioService->sendSMS($job->customer->phone, $message1);
            }
            // Notification
            $user = auth()->user();
            $admin = User::find(1);
            $message = "is on-the-way jobsite alert for the job, location: '{$job->location_name}'.";
            $admin->notify(new UserNotification($user, $message));

            return redirect()->back()->with('success', 'Alert Sent successfully.');
        } else {
            return redirect()->back()->with('error', 'Job Not Found.');

        }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error sending alert'.$e);
        }
    }
    public function delete($id)
    {
        $file = Files::findOrFail($id);
        $file->delete();
        return redirect()->back()->with('error', 'File Deleted successfully.');
    }

    public function acceptWorkOrder($id)
    {
        // Find the work order by ID
        $workOrder = WorkOrders::find($id);

        // Check if the work order exists and is in 'Pending' status
        if ($workOrder && $workOrder->status === 'pending') {
            // Update the status to 'Accepted'
            $workOrder->status = 'accepted';
            $workOrder->save();
            // Notification
            $user = auth()->user();
            $admin = User::find(1);
            $message = "accepted the Work Order# {$id}";
            $admin->notify(new UserNotification($user, $message));
        }

        return redirect()->back()->with('success', 'Work Order Accepted Successfully');
    }

    public function declineWorkOrder($id)
    {
        $workOrder = WorkOrders::find($id);

        if ($workOrder && $workOrder->status === 'pending') {
            $workOrder->status = 'declined';
            $workOrder->save();
            // Notification
            $user = auth()->user();
            $admin = User::find(1);
            $message = "declined the Work Order# {$id}";
            $admin->notify(new UserNotification($user, $message));
        }

        return redirect()->back()->with('warning', 'Work Order Declined Successfully');
    }
    public function quick_pay($id)
    {
        $workOrder = WorkOrders::find($id);
        // dd(!$workOrder->payment_info != 'quick_pay');
        if ($workOrder && $workOrder->payment_info != 'quick_pay') {
            // Update the status to 'Accepted'
            $workOrder->payment_info = 'quick_pay';
            $workOrder->save();

            $user = auth()->user();
            $admin = User::find(1);
            $message = "applied for Quick Pay for Work Order# {$id}";
            $admin->notify(new UserNotification($user, $message));

            return redirect()->back()->with('info', 'Successfully Applied For Quick Pay');
        } else {

            return redirect()->back()->with('warning', 'You Already Applied For Quick Pay');
        }

    }




    public function deliverOrder(Request $request)
    {
        // dd($request->all());
        $orderCode = $request->input('work_order_code');
        $status = $request->input('status');

        $order = WorkOrders::where('code', $orderCode)->first();

        if ($order) {
            $order->deliver_status = $status;
            $order->save();
            return redirect()->back()->with('success', 'Order delivered successfully.');
        } else {
            return redirect()->back()->with('error', 'Order not found.');
        }

        // return redirect('/vendor/manage/work/orders')->with('success', 'Work order status updated successfully!');

    }
}
