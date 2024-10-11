<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\job_Category;
use App\Models\JobSubCategory;
use Illuminate\Http\Request;

class JobCategoryController extends Controller
{
    public function index()
    {
        $job_category = job_Category::with('job_sub_category')->get();
        return view('admin.job_category.index', compact('job_category'));
    }

    public function create()
    {
        $job_sub_cat = JobSubCategory::get();
        return view('admin.job_category.create',compact('job_sub_cat'));
    }

    public function store(Request $request)
    {
        job_Category::create($request->all());
        return redirect()->route('job-category.index');
    }

    public function show($id)
    {
        $job_category = job_Category::findOrFail($id);
        return view('admin.job_category.show', compact('job_category'));
    }

    public function edit($id)
    {
        $job_category = job_Category::findOrFail($id);
        $job_sub_cat = JobSubCategory::get();
        return view('admin.job_category.edit', compact('job_category','job_sub_cat'));
    }

    public function update(Request $request, $id)
    {
        $job_category = job_Category::findOrFail($id);
        $job_category->update($request->all());
        return redirect()->route('job-category.index');
    }

    public function destroy($id)
    {
        $job_category = job_Category::findOrFail($id);
        $job_category->delete();
        return redirect()->route('job-category.index');
    }
}
