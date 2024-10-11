<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobSubCategory;
use App\Models\job_Category;
use Illuminate\Http\Request;

class JobSubCategoryController extends Controller
{
    
    public function index()
    {
        $job_sub_category = JobSubCategory::with('job_category')->get();
        return view('admin.job_sub_category.index', compact('job_sub_category'));
    }

    public function create()
    {
        $job_category = job_Category::get();
        return view('admin.job_sub_category.create',compact('job_category'));
    }

    public function store(Request $request)
    {
        JobSubCategory::create($request->all());
        return redirect()->route('job-sub-category.index');
    }

    public function show($id)
    {
        $job_sub_category = JobSubCategory::findOrFail($id);
        return view('admin.job_sub_category.show', compact('job_sub_category'));
    }

    public function edit($id)
    {
        $job_category = job_Category::get();
        $job_sub_category = JobSubCategory::findOrFail($id);
        return view('admin.job_sub_category.edit', compact('job_sub_category','job_category'));
    }

    public function update(Request $request, $id)
    {
        $job_sub_category = JobSubCategory::findOrFail($id);
        $job_sub_category->update($request->all());
        return redirect()->route('job-sub-category.index');
    }

    public function destroy($id)
    {
        $job_sub_category = JobSubCategory::findOrFail($id);
        $job_sub_category->delete();
        return redirect()->route('job-sub-category.index');
    }
}
