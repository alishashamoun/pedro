<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\InspectionChecklist;
use App\Models\Job;
use App\Models\Location;
use Illuminate\Http\Request;
use Log;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        if ($user->hasRole('Admin')) {
            // Fetch all records if the user is an admin
            $locations = Job::get();
            $show = Job::with('inspectionChecklists')->get();
            $checklists = InspectionChecklist::get();


        } else {
            // Fetch records created by the user
            $locations = Job::whereHas('workOrder', function ($query) {
                $query->where('vendor_id', auth()->user()->id)
                    ->where('status', 'accepted');
                    })->get();
                    
            $show = Job::whereHas('workOrder', function ($query) {
                $query->where('vendor_id', auth()->user()->id)
                    ->where('status', 'accepted');
                    })->with('inspectionChecklists')->get();

            $checklists = InspectionChecklist::where('createdBy', $user->id)->orderBy('id', 'desc')->get();


        }

        $inspections = Location::get();
        // dd($show);
        return view('manager.location.index', compact('locations', 'checklists', 'show', 'inspections'));
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
            foreach ($request->input('assignments') as $locationId => $checklistIds) {
                // Find the location based on its ID
                $location = Job::findOrFail($locationId);

                // Attach the selected checklists to the location
                $location->inspectionChecklists()->sync($checklistIds);
            }

            // Redirect back with a success message or to a different page
            return redirect()->route('location.index')->with('success', 'Checklists assigned successfully to the locations.');
        } catch (\Exception $e) {
            // Log the error
            Log::error($e->getMessage());

            // Return an error message
            return redirect()->back()->with('error', 'An error occurred while assigning checklists to the locations.');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
