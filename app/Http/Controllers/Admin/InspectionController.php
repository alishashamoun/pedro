<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChecklistItem;
use App\Models\Inspection;
use App\Models\InspectionChecklist;
use App\Models\InspectionResponse;
use App\Models\Location;
use Auth;
use DB;
use Illuminate\Http\Request;

class InspectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checklist = InspectionChecklist::get();
        return view('admin.inspection.inspection', compact('checklist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        if ($user->hasRole('Admin')) {
            // Fetch all records if the user is an admin
            $checklist = InspectionChecklist::orderBy('id', 'desc')->get();
        } else {
            // Fetch records created by the user
            $checklist = InspectionChecklist::where('createdBy', $user->id)->orderBy('id', 'desc')->get();
        }
        return view('manager.inspection.index', compact('checklist'));
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
            DB::beginTransaction();

            $request->validate([
                'name' => 'required|string|max:255',
                'checklist_items' => 'array',
            ]);

            $user = auth()->user()->id;
            // dd($user);
            $inspectionChecklist = InspectionChecklist::create([
                'name' => $request->input('name'),
                'createdBy' => $user,
            ]);

            $checklistItems = $request->input('checklist_items');
            foreach ($checklistItems as $itemText) {
                if (!empty($itemText)) { // Ensure the item is not empty
                    $checklistItem = new ChecklistItem([
                        'description' => $itemText,
                    ]);
                    $inspectionChecklist->checklistItems()->save($checklistItem);
                }
            }

            DB::commit(); // If everything is successful, commit the transaction

            return redirect()->route('checklists.create')->with('success', 'Checklist created successfully.');

        } catch (\Exception $e) {
            DB::rollback(); // If an exception occurs, rollback the transaction
            throw $e;
            return redirect()->back()->with('error', 'An error occurred while creating the checklist. Please try again or contact support for assistance.');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inspection  $inspection
     * @return \Illuminate\Http\Response
     */
    public function show(Inspection $inspection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inspection  $inspection
     * @return \Illuminate\Http\Response
     */
    public function edit(Inspection $inspection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inspection  $inspection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inspection $inspection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inspection  $inspection
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = InspectionChecklist::findOrFail($id);
        $job->delete();
        $ProductandService = ChecklistItem::where('inspection_checklist_id', $id)->get();

        if ($ProductandService->count() > 0) {
            // Delete all the primary contacts found
            foreach ($ProductandService as $ProductandServices) {
                $ProductandServices->delete();
            }
        }
        return redirect()->back()->with('error', 'Sheet deleted Successfully');
    }



    public function reassign_checklist($id)
    {
        try {
            DB::beginTransaction();

            $insresp = InspectionResponse::where("rating", "red")->where("location_id", $id)->get();

            $inc = InspectionChecklist::create([
                "name" => "Re-assign",
                "createdBy" => Auth::id(),
            ]);

            foreach ($insresp as $k => $v) {
                $inc->checklistItems()->create([
                    "description" => $v->checklistItem->description,
                ]);
            }

            Location::create([
                "job_id" => $id,
                "inspection_checklist_id" => $inc->id,
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Re-assigned Red points');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred during the re-assignment.');
        }
    }

}
