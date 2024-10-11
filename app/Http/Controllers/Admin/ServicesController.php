<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AreaOfWork;
use Exception;
use Illuminate\Http\Request;
use App\Models\Services;


class ServicesController extends Controller
{

    public function index()
    {

        $data['services'] = Services::get();
        // dd($data);
        return view('admin.services.index', $data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        try {
            // Validate the input

            // Create a new service
            $service = new Services();
            $service->name = $validatedData['name'];
            $service->save();

            // Return a success response
            return redirect()->back()->with('success', 'Service created successfully.');
        } catch (Exception $e) {
            // Return an error response
            return redirect()->back()->with('error', 'Error creating service.');
        }
    }


    public function update(Request $request, $id)
    {
        try {
            // Validate the input
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
            ]);

            // Find the service to update
            $service = Services::findOrFail($id);

            // Update the service
            $service->name = $validatedData['name'];
            $service->save();

            // Return a success response
            return redirect()->back()->with('success', 'Service updated successfully.');
        } catch (Exception $e) {
            // Return an error response
            return redirect()->back()->with('error', 'Error creating service.');
        }
    }

    public function destroy($id)
    {
        try {

            $service = Services::findOrFail($id);
            $service->delete();
            return redirect()->back()
                ->with('success', 'Service deleted successfully');

        } catch (Exception $e) {
            // Return an error response
            return redirect()->back()->with('error', 'Error creating service.');
        }
    }
    public function areaindex()
    {

        $data['areas'] = AreaOfWork::get();
        // dd($data);
        return view('admin.services.area', $data);
    }

    public function areastore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'zip' => 'required|string|max:255',
        ]);
        try {
            // Validate the input

            // Create a new service
            $service = new AreaOfWork();
            $service->name = $validatedData['name'];
            $service->zip = $validatedData['zip'];
            $service->save();

            // Return a success response
            return redirect()->back()->with('success', 'Area created successfully.');
        } catch (Exception $e) {
            // Return an error response
            return redirect()->back()->with('error', 'Error creating area.');
        }
    }


    public function areaupdate(Request $request, $id)
    {
        try {
            // Validate the input
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'zip' => 'required|string|max:255',
            ]);

            // Find the service to update
            $service = AreaOfWork::findOrFail($id);

            // Update the service
            $service->name = $validatedData['name'];
            $service->zip = $validatedData['zip'];
            $service->save();

            // Return a success response
            return redirect()->back()->with('success', 'Area updated successfully.');
        } catch (Exception $e) {
            // Return an error response
            return redirect()->back()->with('error', 'Error creating area.');
        }
    }

    public function areadestroy($id)
    {
        try {

            $service = AreaOfWork::findOrFail($id);
            $service->delete();
            return redirect()->back()
                ->with('success', 'Area deleted successfully');

        } catch (Exception $e) {
            // Return an error response
            return redirect()->back()->with('error', 'Error creating area.');
        }
    }
}
