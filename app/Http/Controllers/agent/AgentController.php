<?php

namespace App\Http\Controllers\agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkOrders;
use File;

class AgentController extends Controller
{
    public function manageWorkOrders()
    {
        // Retrieve and display assigned work orders for the vendor
        $WorkOrders = WorkOrders::where('vendor_id', auth()->user()->id)->get();
        return view('agent.work_orders.index', compact('WorkOrders'));
    }
    

    public function deliverOrder(Request $request)
    {
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
      
    }  
}
