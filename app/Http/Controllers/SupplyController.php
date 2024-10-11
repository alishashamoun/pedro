<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\SupplyItem;
use App\Models\User;
use App\Notifications\UserNotification;
use App\Models\SupplyRequest;
use DB;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SupplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $user = auth()->user();
            if ($user->hasRole('Admin')) {
                $supply = SupplyRequest::orderBy('id', 'desc')->get();

                return view('supply.index', compact('supply'));

            } else {
                $supply = SupplyRequest::where('createdBy', $user->id)->get();

                return view('supply.index', compact('supply'));
            }

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
            // view('invoice.index',  ['message' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->hasRole('Admin')) {
            $jobs = Job::get();

        } else {
            $jobs = Job::whereHas('workOrder', function ($query) {
                $query->where('vendor_id', auth()->user()->id)->where('status', 'accepted');
            })->get();

        }
        return view('supply.create', compact('jobs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        // dd($request->all());
        $rules = [
            'order_progress' => 'required|string|max:255',
            'order_date' => 'required|date',
            'manager_email' => 'required|email|max:255',
            'sent_date' => 'required|date',
            'receipt_status' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'apt' => 'required|string|max:255',
            'tampa' => 'required|string|max:255',
            'fl' => 'required|string|max:255',
            'num' => 'required|string|max:255',
        ];

        $rule = [
            'jobs_id' => 'required|array',
            'jobs_id.*' => 'numeric|exists:jobs,id',
            'qty' => 'required|array',
            'qty.*' => 'numeric',
            'item_name' => 'required|array',
        ];
        $validate = $request->validate($rule);

        $validatedData = $request->validate($rules);
        try {
            DB::beginTransaction();

            $validatedData['order_ref'] = Str::uuid()->toString();
            $validatedData['createdBy'] = auth()->user()->id;
            $validatedData['po_num'] = 'PO-' . date('Ymd') . '-' . Str::padLeft(SupplyRequest::count() + 1, 4, '0');


            $supply = SupplyRequest::create($validatedData);

            foreach ($validate['item_name'] as $index => $itemName) {
                SupplyItem::create([
                    'supply_request_id' => $supply->id,
                    'item_name' => $itemName,
                    'qty' => $validate['qty'][$index],
                    'jobs_id' => $validate['jobs_id'][$index],
                ]);
            }

            $admin = User::find(1);
            $user = auth()->user();
            $message = "created an supply request# {$supply->id}";
            $admin->notify(new UserNotification($user, $message));

            DB::commit();
            return redirect()->route('supply.index')->with('success', 'Supply Request Sent Successfully');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->back()->with('error', 'An error occurred while processing the supply request: ' . $e->getMessage());
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
        $supplyRequest = SupplyRequest::find($id);
        return view('supply.show', compact('supplyRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplyRequest = SupplyRequest::find($id);
        if (auth()->user()->hasRole('Admin')) {
            $jobs = Job::get();

        } else {
            $jobs = Job::whereHas('workOrder', function ($query) {
                $query->where('vendor_id', auth()->user()->id)->where('status', 'accepted');
            })->get();

        }
        return view('supply.edit', compact('supplyRequest', 'jobs'));
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
        // return $request;
        $validatedData = $request->validate([
            'item_name' => 'required|array',
            'item_name.*' => 'required|string',
            'qty' => 'required|array',
            'qty.*' => 'required|integer',
            'jobs_id' => 'required|array',
            'jobs_id.*' => 'required|integer',
        ]);
        $rules = [
            'order_progress' => 'required|string|max:255',
            'order_date' => 'required|date',
            'manager_email' => 'required|email|max:255',
            'sent_date' => 'required|date',
            'receipt_status' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'apt' => 'required|string|max:255',
            'tampa' => 'required|string|max:255',
            'fl' => 'required|string|max:255',
            'num' => 'required|string|max:255',
        ];
        $validate = $request->validate($rules);
        try {
            DB::beginTransaction();

            $supply = SupplyRequest::find($id);

            if ($supply) {
                $validate['order_ref'] = $supply->order_ref;
                $validate['createdBy'] = $supply->createdBy;
                $supply->update($validate);

                $supply->supply_item()->delete();

                foreach ($validatedData['item_name'] as $index => $itemName) {
                    SupplyItem::create([
                        'supply_request_id' => $id,
                        'item_name' => $itemName,
                        'qty' => $validatedData['qty'][$index],
                        'jobs_id' => $validatedData['jobs_id'][$index],
                    ]);
                }

                if (auth()->user()->hasRole('Admin') || auth()->user()->hasRole('account manager')) {

                    $admin = User::find($supply->createdBy);
                    $user = auth()->user();
                    $message = "updated a supply request# {$id}";
                    $admin->notify(new UserNotification($user, $message));
                } else {

                    $admin = User::find(1);
                    $user = auth()->user();
                    $message = "updated a supply request# {$id}";
                    $admin->notify(new UserNotification($user, $message));
                }
            } else {
                DB::rollback();
                return redirect()->back()->with('error', 'An error occurred while finding the supply request: ');
            }
            DB::commit();
            return redirect()->route('supply.index')->with('success', 'Request Updated Successfully');
        } catch (QueryException $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'An error occurred while processing the supply request: ' . $e->getMessage());
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
        try {

            $supply = SupplyRequest::find($id);
            $supply->delete();
            return redirect()->back()->with('error', 'Supply Request Deleted Successfully');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'An error occurred while processing the supply request: ' . $e->getMessage());
        }

    }
}
