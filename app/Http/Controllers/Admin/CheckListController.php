<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CheckList;
use App\Models\InspectionChecklist;
use App\Models\InspectionResponse;
use App\Models\Job;
use Illuminate\Http\Request;

class CheckListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.checklist.checklist');
    }
    public function finalized()
    {
        // dd('s');
        $checklist = InspectionChecklist::get();
        // dd($checklist);
        return view('admin.checklist.finalized', compact('checklist'));
    }
    public function location()
    {
        $locations = Job::get();
        $checklists = InspectionChecklist::get();
        $show = Job::with('inspectionChecklists')->get();
        return view('admin.checklist.location', compact('locations', 'checklists', 'show'));
    }
    public function response($id)
    {
        $response = InspectionResponse::selectRaw('MAX(id) as id, checklist_id, MAX(rating) as rating, MAX(remarks) as remarks')->with('checklistItem', 'checklistItem.inspectionChecklist')
            ->where('location_id', $id)
            ->groupBy('checklist_id')
            ->get();
        $new = InspectionResponse::where('location_id', $id)->first();
        return view('manager.responce.show', compact('response', 'new', 'id'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CheckList  $checkList
     * @return \Illuminate\Http\Response
     */
    public function show(CheckList $checkList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CheckList  $checkList
     * @return \Illuminate\Http\Response
     */
    public function edit(CheckList $checkList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CheckList  $checkList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CheckList $checkList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CheckList  $checkList
     * @return \Illuminate\Http\Response
     */
    public function destroy(CheckList $checkList)
    {
        //
    }
}
