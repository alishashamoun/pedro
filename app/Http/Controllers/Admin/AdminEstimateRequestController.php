<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bid;
use App\Models\User;
use App\Notifications\UserNotification;
use DB;
use Illuminate\Http\Request;
use App\Models\EstimateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Session;

class AdminEstimateRequestController extends Controller
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
                $estimate = EstimateRequest::orderBy('id', 'desc')->get();
                return view('admin.estimate_req.index', compact('estimate'));

            } else {
                $estimate = EstimateRequest::where('createdBy', $user->id)->get();
                return view('admin.estimate_req.index', compact('estimate'));
            }




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
        return view('admin.estimate_req.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function vendors_save(Request $request)
    {
        $request->validate([
            'request_id' => 'required|exists:estimate_requests,id',
            'vendors.*' => 'required|exists:users,id',
            'due_date' => 'required|date|after:today',
        ]);
        // dd($request->all());
        try {

            DB::beginTransaction();

            foreach ($request->vendors as $vendorId) {
                $bid = Bid::firstOrCreate(
                    [
                        'estimate_request_id' => $request->request_id,
                        'user_id' => $vendorId,
                        'due_date' => $request->due_date,
                    ]
                );
                if ($bid->wasRecentlyCreated) {
                    $vendor = User::find($vendorId);
                    $user = auth()->user();
                    $message = "invited you to bid on estimate request #{$bid->estimate_request_id}. Please review the details and submit your bid.";
                    $vendor->notify(new UserNotification($user, $message));
                } else {
                    Session::flash('error', 'The vendor you selected is already assigned to this estimate request. Please select a different vendor.');
                }
            }

            DB::commit();

            return redirect()->back()->with('success', 'Bids saved successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            // throw $e;
            return redirect()->back()->with('error', 'Error saving bids. Please try again later');
        }
    }
    public function bid(Request $request)
    {
        // dd($request->all());
        try {
            $selectedBid = Bid::findOrFail($request->bid);

            $check = Bid::where('estimate_request_id', $selectedBid->estimate_request_id)
                ->where('selected', true)
                ->first();

            if (!$check) {
                DB::beginTransaction();
                Bid::where('estimate_request_id', $selectedBid->estimate_request_id)
                    ->update(['selected' => false]);

                // Select the chosen bid
                $selectedBid->selected = true;
                $selectedBid->save();

                $vendor = User::find($selectedBid->user_id);
                $user = auth()->user();
                $message = "has approved your bid on estimate request #{$selectedBid->estimate_request_id}.";
                $vendor->notify(new UserNotification($user, $message));

                DB::commit();
                return redirect()->back()->with('success', 'Bids saved successfully!');
            } else {
                return redirect()->back()->with('error', 'Bid already selected!');

            }


        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->back()->with('error', 'Error saving bids. Please try again later');
        }
    }
    public function store(Request $request)
    {
        try {

            $rules = [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'phone_number' => 'required|string|max:20',
                'email' => 'required|email|unique:users|max:255',
                'street_address' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'state' => 'required|string|max:255',
                'zip_code' => 'required|string|max:10',
                'details' => 'nullable|string',
                'frequency' => 'required',
                'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ];

            $validatedData = $request->validate($rules);

            $supply = new EstimateRequest();
            $supply->first_name = $validatedData['first_name'];
            $supply->last_name = $validatedData['last_name'];
            $supply->phone_number = $validatedData['phone_number'];
            $supply->email = $validatedData['email'];
            $supply->street_address = $validatedData['street_address'];
            $supply->city = $validatedData['city'];
            $supply->state = $validatedData['state'];
            $supply->zip_code = $validatedData['zip_code'];
            $supply->details = $validatedData['details'];
            $supply->frequency = $validatedData['frequency'];
            $supply->createdBy = auth()->user()->id;

            if ($request->hasFile('picture')) {
                $fileName = Str::random(15) . '.' . $request->file('picture')->getClientOriginalExtension();
                $picturePath = $request->file('picture')->storeAs('supply_pic', $fileName, 'public');
                $supply->picture = $picturePath;
            }
            $supply->save();

            $admin = User::find(1);
            $user = auth()->user();
            $message = "created an estimate request# {$supply->id}";
            $admin->notify(new UserNotification($user, $message));

            return redirect()->route('estimate_requests.index')->with('success', 'Request created successfully');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
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
        $estimate = EstimateRequest::find($id);
        return view('admin.estimate_req.show', compact('estimate'));
    }
    public function vendors($id)
    {
        $vendors = User::role('vendor')->select('id', 'name')->get();
        $bids = Bid::where('estimate_request_id', $id)->get();
        return view('admin.estimate_req.vendors', compact('vendors', 'bids', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estimate = EstimateRequest::find($id);
        return view('admin.estimate_req.edit', compact('estimate'));
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
            $rules = [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'phone_number' => 'required|string|max:20',
                'email' => 'required|email|max:255',
                'street_address' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'state' => 'required|string|max:255',
                'zip_code' => 'required|string|max:10',
                'frequency' => 'required',
                'details' => 'nullable|string',
                'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ];

            $validatedData = $request->validate($rules);

            $supply = EstimateRequest::find($id);

            if (!$supply) {
                return redirect()->route('estimate_requests.index')->with('error', 'Record not found');
            }

            $supply->first_name = $validatedData['first_name'];
            $supply->last_name = $validatedData['last_name'];
            $supply->phone_number = $validatedData['phone_number'];
            $supply->email = $validatedData['email'];
            $supply->street_address = $validatedData['street_address'];
            $supply->city = $validatedData['city'];
            $supply->state = $validatedData['state'];
            $supply->zip_code = $validatedData['zip_code'];
            $supply->details = $validatedData['details'];
            $supply->frequency = $validatedData['frequency'];

            if ($request->hasFile('picture')) {
                // Delete the old picture if it exists
                if ($supply->picture && Storage::disk('public')->exists($supply->picture)) {
                    Storage::disk('public')->delete($supply->picture);
                }

                $fileName = Str::random(15) . '.' . $request->file('picture')->getClientOriginalExtension();
                $picturePath = $request->file('picture')->storeAs('supply_pic', $fileName, 'public');
                $supply->picture = $picturePath;
            }

            $supply->save();

            if (auth()->user()->hasRole('Admin') || auth()->user()->hasRole('account manager')) {

                $admin = User::find($supply->createdBy);
                $user = auth()->user();
                $message = "updated an estimate request# {$id}";
                $admin->notify(new UserNotification($user, $message));
            } else {
                $admin = User::find(1);
                $user = auth()->user();
                $message = "updated an estimate request# {$id}";
                $admin->notify(new UserNotification($user, $message));

            }

            return redirect()->route('estimate_requests.index')->with('info', 'Request updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
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

            $supply = EstimateRequest::find($id);
            $supply->delete();
            return redirect()->back()->with('error', 'Estimate Request Deleted Successfully');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'An error occurred while processing the supply request: ' . $e->getMessage());
        }
    }
}
