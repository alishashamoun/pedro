<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\job_source_category;
use Illuminate\Http\Request;

class JobSourceCategoryController extends Controller
{
    public function index()
    {
        $job_source = job_source_category::all();
        return view('admin.job_source.index', compact('job_source'));
    }

    public function create()
    {
        return view('admin.job_source.create');
    }

    public function store(Request $request)
    {
        job_source_category::create($request->all());
        return redirect()->route('job-source.index');
    }

    public function show($id)
    {
        $job_source = job_source_category::findOrFail($id);
        return view('admin.job_source.show', compact('job_source'));
    }

    public function edit($id)
    {
        $job_source = job_source_category::findOrFail($id);
        return view('admin.job_source.edit', compact('job_source'));
    }

    public function update(Request $request, $id)
    {
        $job_source = job_source_category::findOrFail($id);
        $job_source->update($request->all());
        return redirect()->route('job-source.index');
    }

    public function destroy($id)
    {
        $job_source = job_source_category::findOrFail($id);
        $job_source->delete();
        return redirect()->route('job-source.index');
    }
}
