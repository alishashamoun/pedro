<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\job_priority_category;
use Illuminate\Http\Request;

class JobPriorityCategoryController extends Controller
{
    public function index()
    {
        
        $job_prority = job_priority_category::all();
        return view('admin.job_prority.index', compact('job_prority'));
    }

    public function create()
    {
        return view('admin.job_prority.create');
    }

    public function store(Request $request)
    {
        job_priority_category::create($request->all());
        return redirect()->route('job-priority.index');
    }

    public function show($id)
    {
        $job_priority = job_priority_category::findOrFail($id);
        return view('admin.job_prority.show', compact('job_priority'));
    }

    public function edit($id)
    {
        $job_priority = job_priority_category::findOrFail($id);
        return view('admin.job_prority.edit', compact('job_priority'));
    }

    public function update(Request $request, $id)
    {
        $job_priority = job_priority_category::findOrFail($id);
        $job_priority->update($request->all());
        return redirect()->route('job-priority.index');
    }

    public function destroy($id)
    {
        $job_priority = job_priority_category::findOrFail($id);
        $job_priority->delete();
        return redirect()->route('job-priority.index');
    }
}
