<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Estimate;
use App\Models\EstimatePrimaryContact;
use App\Models\Job;
use App\Models\JobPrimaryContact;
use App\Models\User;
use App\Models\job_Category;
use App\Models\JobSubCategory;
use App\Models\job_priority_category;
use App\Models\job_source_category;
use App\Notifications\UserNotification;
use App\Services\TwilioService;
use DB;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEstimate;


class EstimateController extends Controller
{
    protected $twilioService;
    public function __construct(TwilioService $twilioService)
    {
        $this->twilioService = $twilioService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $now = now();
        // $next72Hours = now()->addHours(72);
        // $estimates = Estimate::with('customer', 'job_category', 'job_prioirty', 'job_source')->whereNull('scheduled_at') // Change 'scheduled_at' to your actual column name
        //     ->orWhere(function ($query) use ($now, $next72Hours) {
        //         $query->where('scheduled_at', '>', $next72Hours);
        //         //   ->orWhere('due_at', '<', $now);
        //     })->get();
        // $jobs = Job::get();
        $estimates = Estimate::select('id', 'email', 'first_name', 'last_name', 'signature', 'signature_time', 'customer_id', 'location_address', 'location_city')->with('jobs', 'customer')->get();
        return view('admin.estimates.index', compact('estimates'));
    }

    public function show($id)
    {
        $estimate = Estimate::findOrFail($id);
        // dd($estimate);
        return view('admin.estimates.show', compact('estimate'));
    }
    public function create()
    {
        $customer = User::withRole('User')->get();
        $agent = User::withRole('agent')->get();
        $jobCategories = job_Category::get();
        $job_prioirty = job_priority_category::get();
        $job_source = job_source_category::get();

        return view('admin.estimates.create', compact('customer', 'jobCategories', 'job_prioirty', 'job_source', 'agent'));
    }

    public function store(Request $request)
    {
        // return $request;
        // $request->validate([
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif', // Adjust the validation rules as needed
        //     'document' => 'required|mimes:pdf,doc,docx', // Adjust the validation rules as needed
        // ]);
        // dd($request->all());
        $validatedData = $request->validate([
            'customer_id' => 'required|integer',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|array',
            'phone.*' => 'required|string|max:255', // Ensure each phone entry is a string
            'ext' => 'required|array',
            'ext.*' => 'required|string|max:255', // Ensure each ext entry is a string
            'email' => 'required|array',
            'email.*' => 'required|email|max:255', // Ensure each email entry is a valid email
            'location_name' => 'required|string|max:255',
            'location_gated_property' => 'nullable|string', // Assuming 'on' is a valid value
            'location_address' => 'required|string|max:255',
            'location_unit' => 'required|string|max:255',
            'location_city' => 'required|string|max:255',
            'location_state' => 'required|string|max:255',
            'location_zipcode' => 'required|string|max:10',
            'job_cat_id' => 'nullable|integer',
            'job_sub_description' => 'nullable|string',
            'job_description' => 'required|string|max:255',
            'po_no' => 'required|string|max:255',
            'job_source' => 'required|string|nullable',
            'agent' => 'nullable|string',
            'requested_on' => 'required|date',
            'referral_source' => 'required|integer',
            'tags' => 'required|string|max:255',
            'opportunity_owner' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'arrival_start' => 'required|string|max:255',
            'arrival_end' => 'required|string|max:255',
            'start_duration' => 'required|integer',
            'end_duration' => 'required|integer|gte:start_duration',
            'assigned_tech' => 'required|string|max:255',
            'notify_tech_assign' => 'nullable|string', // Assuming 'on' is a valid value
            'notes_for_tech' => 'nullable|string|max:255',
            'completion_notes' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'qty_hrs' => 'required|integer',
            'rate' => 'required|numeric',
            'total' => 'required|numeric',
            'cost' => 'required|numeric',
            'margin_tax' => 'required|numeric',
            'note_to_cust' => 'required|string|max:255',
        ]);
        try {
            DB::beginTransaction();

            $job = new Estimate();
            $job->customer_id = $request->customer_id;
            $job->first_name = $request->first_name;
            $job->last_name = $request->last_name;
            $job->location_name = $request->location_name;
            $job->location_gated_property = $request->location_gated_property;
            $job->location_address = $request->location_address;
            $job->location_unit = $request->location_unit;
            $job->location_city = $request->location_city;
            $job->location_state = $request->location_state;
            $job->location_zipcode = $request->location_zipcode;
            $job->job_cat_id = $request->job_cat_id;
            $job->job_sub_cat_id = $request->job_sub_cat_id;
            $job->job_sub_description = $request->job_sub_description;
            $job->job_description = $request->job_description;
            $job->po_no = $request->po_no;
            $job->job_source = $request->job_source;
            $job->agent = $request->agent;
            // Job customer Fields
            $job->customer_homeowner = $request->customer_homeowner;
            $job->customer_unit_cordination = $request->customer_unit_cordination;
            //Job Picture



            if ($request->hasFile('image')) {
                $file = request()->file('image');
                $fileName = md5($file->getClientOriginalName() . time()) . "img." . $file->getClientOriginalExtension();
                $file->move('uploads/image/', $fileName);
                $image = asset('uploads/image/' . $fileName);
                $job->image = $image;

            }


            //Job document
            if ($request->hasFile('document')) {
                $file = request()->file('document');
                $fileName = md5($file->getClientOriginalName() . time()) . "doc." . $file->getClientOriginalExtension();
                $file->move('uploads/document/', $fileName);
                $document = asset('uploads/document/' . $fileName);
                $job->document = $document;

            }
            // Job Information
            //Job image
            //Job document
            $job->requested_on = $request->requested_on;
            $job->current_status = $request->current_status;
            $job->opportunity_rating = $request->opportunity_rating;
            $job->opportunity_owner = $request->opportunity_owner;
            $job->referral_source = $request->referral_source;
            $job->start_date = $request->start_date;
            $job->end_date = $request->end_date;
            $job->arrival_start = $request->arrival_start;
            $job->arrival_end = $request->arrival_end;
            $job->time_duration = $request->time_duration;
            $job->start_duration = $request->start_duration;
            $job->end_duration = $request->end_duration;
            $job->end_duration = $request->end_duration;
            $job->assigned_tech = $request->assigned_tech;
            $job->notify_tech_assign = $request->notify_tech_assign;
            $job->notes_for_tech = $request->notes_for_tech;
            $job->completion_notes = $request->completion_notes;
            $job->save();


            foreach ($request['phone'] as $key => $value) {
                EstimatePrimaryContact::create([
                    'estimate_id' => $job->id,
                    'phone' => $value,
                    'ext' => $request['ext'][$key],
                    'email' => $request['email'][$key],

                ]);
            }
            $user = User::find($job->customer_id);
            $admin = auth()->user();
            $message = "created your Estimate# {$job->id}";
            $user->notify(new UserNotification($admin, $message));

            if ($user->phone != null) {
                //$this->twilioService->sendSMS($user->phone, $message);
            }

            DB::commit();
            return redirect()->route('estimates.index')->with('success', 'Estimate Created Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            // throw $e;
            return redirect()->back()->with('error', __('admin/estimates/index.flash_error_convert'));
        }
    }
    // public function store(Request $request)
    // {
    //     $data = $request->validate([
    //         'client_name'           => 'required',
    //         'total_amount'          => 'required|numeric',
    //         'valid_until'           => 'required|date',
    //     ]);

    //     $estimate = Estimate::create($data);

    //     Mail::to($request->input('client_email'))->send(new SendEstimate($estimate));
    //     return redirect()->route('estimates.index')->with('success', 'Estimate created successfully');
    // }

    public function edit(Estimate $estimate)
    {
        // dd($estimate->prim_cont);
        $customer = User::withRole('User')->get();
        $agent = User::withRole('agent')->get();
        $jobCategories = job_Category::get();
        $job_prioirty = job_priority_category::get();
        $job_source = job_source_category::get();
        $job_img = Estimate::where('id', $estimate->id)->count('image');
        $job_doc = Estimate::where('id', $estimate->id)->count('document');
        return view('admin.estimates.edit', compact('estimate', 'customer', 'jobCategories', 'job_prioirty', 'job_img', 'job_doc', 'job_source', 'agent'));
    }

    public function update(Request $request, Estimate $estimate)
    {
        // return $request;
        $job = Estimate::findOrFail($estimate->id);
        $job->customer_id = $request->customer_id;
        $job->first_name = $request->first_name;
        $job->last_name = $request->last_name;
        $job->location_name = $request->location_name;
        $job->location_gated_property = $request->location_gated_property;
        $job->location_address = $request->location_address;
        $job->location_unit = $request->location_unit;
        $job->location_city = $request->location_city;
        $job->location_state = $request->location_state;
        $job->location_zipcode = $request->location_zipcode;
        $job->job_cat_id = $request->job_cat_id;
        $job->job_sub_cat_id = $request->job_sub_cat_id;
        $job->job_sub_description = $request->job_sub_description;
        $job->job_description = $request->job_description;
        $job->po_no = $request->po_no;
        $job->job_source = $request->job_source;
        $job->agent = $request->agent;
        // Job customer Fields
        $job->customer_homeowner = $request->customer_homeowner;
        $job->customer_unit_cordination = $request->customer_unit_cordination;
        //Job Picture
        //Job image
        if ($request->image != null) {
            // Delete the old image if it exists
            if (File::exists(public_path($job->image))) {
                File::delete(public_path($job->image));
            }
            // dd('hasfile');
            // Upload and store the new image
            $file = $request->file('image');
            $fileName = md5($file->getClientOriginalName() . time()) . "img." . $file->getClientOriginalExtension();
            $file->move('uploads/image/', $fileName);
            $job->image = asset('uploads/image/' . $fileName);
        } else {
            // dd('not hasfile');
            $job->image = $job['image'];
        }
        if ($request->document != null) {

            if ($request->hasFile('document')) {
                $file = request()->file('document');
                $fileName = md5($file->getClientOriginalName() . time()) . "doc." . $file->getClientOriginalExtension();
                $file->move('uploads/document/', $fileName);
                $job->document = asset('uploads/document/' . $fileName);
            }
        } else {
            $job->document = $job['document'];

        }

        $job->requested_on = $request->requested_on;
        $job->current_status = $request->current_status;
        $job->opportunity_rating = $request->opportunity_rating;
        $job->opportunity_owner = $request->opportunity_owner;
        $job->referral_source = $request->referral_source;
        $job->start_date = $request->start_date;
        $job->end_date = $request->end_date;
        $job->arrival_start = $request->arrival_start;
        $job->arrival_end = $request->arrival_end;
        $job->time_duration = $request->time_duration;
        $job->start_duration = $request->start_duration;
        $job->end_duration = $request->end_duration;
        $job->end_duration = $request->end_duration;
        $job->assigned_tech = $request->assigned_tech;
        $job->notify_tech_assign = $request->notify_tech_assign;
        $job->notes_for_tech = $request->notes_for_tech;
        $job->completion_notes = $request->completion_notes;
        $job->save();

        $ProductandService = EstimatePrimaryContact::where('estimate_id', $estimate->id)->get();

        if ($ProductandService->count() > 0) {
            // Delete all the primary contacts found
            foreach ($ProductandService as $ProductandServices) {
                $ProductandServices->delete();
            }
        }

        foreach ($request['phone'] as $key => $value) {
            EstimatePrimaryContact::create([
                'estimate_id' => $job->id,
                'phone' => $value,
                'ext' => $request['ext'][$key],
                'email' => $request['email'][$key],

            ]);
        }
        $user = User::find($job->customer_id);
        $admin = auth()->user();
        $message = "updated your Estimate# {$job->id}";
        $user->notify(new UserNotification($admin, $message));
        if ($user->phone != null) {
            //$this->twilioService->sendSMS($user->phone, $message);
        }

        return redirect()->route('estimates.index')->with('success', 'Estimate updated successfully');
    }

    public function destroy($id)
    {
        // return $estimate;
        $estimate = Estimate::findOrFail($id);
        $estimate->delete();
        return redirect()->route('estimates.index')->with('success', __('admin/estimates/index.flash_success_delete'));
    }
    public function est_pri($id)
    {
        $job = EstimatePrimaryContact::findOrFail($id);
        $job->delete();
        return redirect()->back()->with('success', 'Primary Contact deleted successfully');
    }

    public function updateSelectedJobs(Request $request)
    {
        // return $request;
        try {
            DB::beginTransaction();
            $selectedEstimates = $request->input('selected_estimates', []);

            // dd($selectedEstimates);

            foreach ($selectedEstimates as $estimateId) {
                $estimate = Estimate::find($estimateId);
                // dd($estimate->customer->phone);

                $job = new Job();
                $job->name = $estimate->name;
                $job->estimate_id = $estimate->id;
                $job->customer_id = $estimate->customer_id;
                $job->account_manager_id = $estimate->account_manager_id;
                $job->user_id = $estimate->user_id;
                $job->location_name = $estimate->location_name;
                $job->location_gated_property = $estimate->location_gated_property;
                $job->location_address = $estimate->location_address;
                $job->location_unit = $estimate->location_unit;
                $job->location_city = $estimate->location_city;
                $job->location_state = $estimate->location_state;
                $job->location_zipcode = $estimate->location_zipcode;
                $job->job_cat_id = $estimate->job_cat_id;
                $job->job_sub_cat_id = $estimate->job_sub_cat_id;
                $job->job_sub_description = $estimate->job_sub_description;
                $job->job_description = $estimate->job_description;
                $job->po_no = $estimate->po_no;
                $job->job_source = $estimate->job_source;
                $job->agent = $estimate->agent;
                $job->first_name = $estimate->first_name;
                $job->last_name = $estimate->last_name;
                $job->customer_homeowner = $estimate->customer_homeowner;
                $job->customer_unit_cordination = $estimate->customer_unit_cordination;
                $job->current_status = $estimate->current_status;
                $job->image = $estimate->image;
                $job->document = $estimate->document;
                $job->start_date = $estimate->start_date;
                $job->end_date = $estimate->end_date;
                $job->start_duration = $estimate->start_duration;
                $job->end_duration = $estimate->end_duration;
                $job->assigned_tech = $estimate->assigned_tech;
                $job->notify_tech_assign = $estimate->notify_tech_assign;
                $job->notes_for_tech = $estimate->notes_for_tech;
                $job->completion_notes = $estimate->completion_notes;
                $job->scheduled_at = $estimate->scheduled_at;

                $job->save();

                $estimatePrimaryContacts = EstimatePrimaryContact::where('estimate_id', $estimateId)->get();

                foreach ($estimatePrimaryContacts as $estimatePrimaryContact) {
                    $jobPrimaryContact = new JobPrimaryContact();
                    $jobPrimaryContact->job_id = $job->id;
                    $jobPrimaryContact->phone = $estimatePrimaryContact->phone;
                    $jobPrimaryContact->ext = $estimatePrimaryContact->ext;
                    $jobPrimaryContact->email = $estimatePrimaryContact->email;
                    $jobPrimaryContact->save();
                }
                $user = User::find($estimate->customer_id);
                $admin = auth()->user();
                $message = "created your Job# {$job->id}";
                $user->notify(new UserNotification($admin, $message));

                // SMS
                $jobInfoSMS = "New Job Alert!\n";
                $jobInfoSMS .= "Customer: {$job->customer->name}\n";
                $jobInfoSMS .= "Location: {$job->location_name}\n";
                $jobInfoSMS .= "Address: {$job->location_address}, {$job->location_unit}, {$job->location_city}, {$job->location_state}, {$job->location_zipcode}\n";
                $jobInfoSMS .= "Description: {$job->job_description}\n";
                $jobInfoSMS .= "Start Date: {$job->start_date}\n";
                $jobInfoSMS .= "Start Time: {$job->start_time}\n";
                $jobInfoSMS .= "Gated Property: " . ($job->location_gated_property ? 'Yes' : 'No') . "\n";
                $jobInfoSMS .= "Notes: {$job->notes_for_tech}\n";
                $jobInfoSMS .= "Billable: " . ($job->billable ? 'Yes' : 'No') . "\n";

                if ($estimate->customer->phone != null) {

                    //$this->twilioService->sendSMS($estimate->customer->phone, $jobInfoSMS);
                }
            }
            DB::commit();
            return redirect()->back()->with('success', __('admin/estimates/index.flash_success_convert'));
        } catch (\Exception $e) {
            DB::rollBack();
            // throw $e;
            return redirect()->back()->with('error', __('admin/estimates/index.flash_error_convert'));
        }

    }
}
