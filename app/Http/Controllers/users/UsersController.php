<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\WorkOrders;
use App\Models\User;
use App\Models\Technicians;
use Carbon\Carbon;
use Auth;

class UsersController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;
        $WorkOrders = WorkOrders::whereHas('jobname', function ($query) use ($userId) {
            $query->where('customer_id', $userId);
        })->get();
        $vendors = User::withRole('vendor')->get();

        return view('users.work_orders.index', compact('WorkOrders','vendors'));
    }

    public function create()
    {
        $technicians = Technicians::get();
        return view('users.work_orders.create',compact('technicians'));
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'technician_id' => 'nullable',
            'user_id' => 'nullable',
        ]);

        $order =new WorkOrders();
        $order->title = $request->title;
        $order->description = $request->description;
        $order->user_id = $request->user_id;
        $order->technician_id = $request->technician_id;
        $order->save();

        $orderCode = $order->code;

        return redirect()->route('users.work-orders.index')->with('success', 'Work order created successfully!');
    }

    public function show($id)
    {
        $workOrders = WorkOrders::findOrFail($id);
        return view('users.work_orders.show', compact('workOrders'));
    }

    public function edit(WorkOrders $workOrder)
    {
        return view('users.work_orders.edit', compact('workOrder'));
    }


    public function update(Request $request, $id)
    {
        $workOrder = WorkOrders::findOrFail($id);
        $workOrder->update($request->all());
        return redirect()->route('users.work-orders.index')->with('success', 'Work order updated successfully!');
    }
    public function destroy($id)
    {
        $workOrder = WorkOrders::findOrFail($id);
        $workOrder->delete();
        return redirect()->route('users.work-orders.index')->with('success', 'Work order deleted successfully!');
    }

    //Assign to vendor
    public function storeWorkOrder(Request $request)
    {
        $workOrder = WorkOrders::findOrFail($request->work_order_id);
        $workOrder->vendor_id = $request->vendor_id;
        $workOrder->save();
        return redirect()->route('users.work-orders.index')->with('success', 'Work order Assign to Vendor submitted successfully!');
    }


    public function completeOrder(Request $request)
{


    $orderCode = $request->input('work_order_code');
    $feedback = $request->input('feedback');

    $order = WorkOrders::where('code', $orderCode)->first();

    // if($order->deliver_status == 1){
        if ($order) {
            $order->status = $request->status;
            $order->feedback = $feedback;
            $order->save();
            return redirect()->back()->with('success', 'Order completed successfully. Thank you for your feedback!');
        } else {
            return redirect()->back()->with('error', 'Order not found.');
        }
    // }else{
    //     return redirect()->back()->with('error', 'Your order is being processed. Please wait for the vendor to complete the delivery.');
    // }


}
}
