<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Technicians;
use Carbon\Carbon;

class TechniciansController extends Controller
{
    public function index()
    {
        $technicians = Technicians::orderby("created_at", "desc")->get();
        return view('admin.technicians.index', compact('technicians'));
    }

    public function create()
    {
        return view('admin.technicians.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'phone_type' => 'required|string',
            'number' => 'required|string|max:255',
            'ext' => 'nullable|string|max:255',
            'department' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'email_type' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'billing_address' => 'required|string|max:255',
            'active' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'aptNo' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zip' => 'required|string|max:10',
        ]);
        Technicians::create($validatedData);
        return redirect()->route('technicians.index')->with('success', __('admin/technicians/index.success.created'));
    }

    public function show($id)
    {
        $technicians = Technicians::findOrFail($id);
        return view('admin.technicians.show', compact('technicians'));
    }

    public function edit($id)
    {
        $technicians = Technicians::findOrFail($id);
        return view('admin.technicians.edit', compact('technicians'));
    }

    public function update(Request $request, $id)
    {
        $technician = Technicians::findOrFail($id);
        $technician->update($request->all());
        return redirect()->route('technicians.index')->with('success', __('admin/technicians/index.success.updated'));
    }

    public function destroy($id)
    {
        $technician = Technicians::findOrFail($id);
        $technician->delete();
        return redirect()->route('technicians.index')->with('error', __('admin/technicians/index.success.deleted'));
    }

}
