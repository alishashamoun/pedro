<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\EstimateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EstimateRequestController extends Controller
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
                return view('supply.index', compact('supply'));

            } else {
                $estimate = EstimateRequest::where('createdBy', $user->id)->get();
                return view('users.estimate_req.index', compact('estimate'));
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
        return view('users.estimate_req.create');
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
            $supply->createdBy = auth()->user()->id;

            if ($request->hasFile('picture')) {
                $fileName = Str::random(15) . '.' . $request->file('picture')->getClientOriginalExtension();
                $picturePath = $request->file('picture')->storeAs('supply_pic', $fileName, 'public');
                $supply->picture = $picturePath;
            }


            $supply->save();
            return redirect()->route('estimate_request.index')->with('success', 'Request created successfully');

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
        return view('users.estimate_req.show', compact('estimate'));
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
        return view('users.estimate_req.edit', compact('estimate'));
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
                'details' => 'nullable|string',
                'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ];

            $validatedData = $request->validate($rules);

            $supply = EstimateRequest::find($id);

            if (!$supply) {
                return redirect()->route('estimate_request.index')->with('error', 'Record not found');
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
            return redirect()->route('estimate_request.index')->with('info', 'Request updated successfully');
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
        try{

            $supply = EstimateRequest::find($id);
            $supply->delete();
            return redirect()->back()->with('error','Estimate Request Deleted Successfully');
        }
     catch (\Exception $e) {

        return redirect()->back()->with('error', 'An error occurred while processing the supply request: ' . $e->getMessage());
    }
    }
}
