@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' : 'anager.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Estimate Information</h1>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h2>Customer Details</h2>
                    <p><strong>Customer ID:</strong> {{ $estimate->customer->name ?? 'N/A'}}</p>
                    <p><strong>First Name:</strong> {{ $estimate->first_name }}</p>
                    <p><strong>Last Name:</strong> {{ $estimate->last_name }}</p>
                    <p><strong>Phone:</strong> {{ $estimate->phone }}</p>
                    <p><strong>Ext:</strong> {{ $estimate->ext }}</p>
                    <p><strong>Email:</strong> {{ $estimate->email }}</p>
                    <p><strong>Customer Homeowner:</strong> {{ $estimate->customer_homeowner }}</p>
                    <p><strong>Customer Unit Coordination:</strong> {{ $estimate->customer_unit_cordination }}</p>
                </div>
                <div class="col-md-6">
                    <h2>Location Details</h2>
                    <p><strong>Location Name:</strong> {{ $estimate->location_name }}</p>
                    <p><strong>Location Address:</strong> {{ $estimate->location_address }}</p>
                    <p><strong>Location Unit:</strong> {{ $estimate->location_unit }}</p>
                    <p><strong>Location City:</strong> {{ $estimate->location_city }}</p>
                    <p><strong>Location State:</strong> {{ $estimate->location_state }}</p>
                    <p><strong>Location Zipcode:</strong> {{ $estimate->location_zipcode }}</p>
                    <p><strong>Location Gated Property:</strong> {{ $estimate->location_gated_property }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h2>Job Details</h2>
                    <p><strong>Job Category ID:</strong> {{ $estimate->job_category->name ?? 'N/A'}}</p>
                    <p><strong>Job Sub Category ID:</strong> {{ $estimate->job_sub_category->name ?? ''}}</p>
                    <p><strong>Job Sub Description:</strong> {{ $estimate->job_sub_description }}</p>
                    <p><strong>Job Description:</strong> {{ $estimate->job_description }}</p>
                    <p><strong>Mark Description:</strong> {{ $estimate->mark_description }}</p>
                    <p><strong>PO No:</strong> {{ $estimate->po_no }}</p>
                    <p><strong>Job Source:</strong> {{ $estimate->job_source->name ?? 'N/A'}}</p>
                    <p><strong>Agent:</strong> {{ $estimate->agentname->name ?? 'N/A'}}</p>
                </div>
                <div class="col-md-6">
                    <h2>Scheduling Details</h2>
                    <p><strong>Requested On:</strong> {{ $estimate->requested_on }}</p>
                    <p><strong>Referral Source:</strong> {{ $estimate->referral_source }}</p>
                    <p><strong>Tags:</strong> {{ $estimate->tags }}</p>
                    <p><strong>Opportunity Owner:</strong> {{ $estimate->opportunity_owner }}</p>
                    <p><strong>Start Date:</strong> {{ $estimate->start_date }}</p>
                    <p><strong>End Date:</strong> {{ $estimate->end_date }}</p>
                    <p><strong>Multijob:</strong> {{ $estimate->multe_job }}</p>
                </div>
            </div>
                <div class="col-md-12">
                    <h2>Additional Details</h2>
                    <p><strong>Arrival Start:</strong> {{ $estimate->arrival_start }}</p>
                    <p><strong>Arrival End:</strong> {{ $estimate->arrival_end }}</p>
                    <p><strong>Start Duration:</strong> {{ $estimate->start_duration }}</p>
                    <p><strong>End Duration:</strong> {{ $estimate->end_duration }}</p>
                    <p><strong>Assigned Tech:</strong> {{ $estimate->assigned_tech }}</p>
                    <p><strong>Notify Tech Assign:</strong> {{ $estimate->notify_tech_assign }}</p>
                    <p><strong>Notes for Tech:</strong> {{ $estimate->notes_for_tech }}</p>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h2>Signature and Status</h2>
                        <p><strong>Signature:</strong> {{ $estimate->signature }}</p>
                        {{-- <p><strong>Client Status:</strong> {{ $estimate->client_status }}</p>
                        <p><strong>Current Status:</strong> {{ $estimate->current_status }}</p> --}}
                        <p><strong>Signature Time:</strong> {{ $estimate->signature_time }}</p>
                    </div>
                    <div class="col-md-6">
                        <h2>Image and Document</h2>
                        <p><strong>Image:</strong> {{ $estimate->image }}</p>
                        <p><strong>Document:</strong> {{ $estimate->document }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h2>Multijob and Referral</h2>
                        <p><strong>Multijob:</strong> {{ $estimate->multe_job }}</p>
                        <p><strong>Referral Source:</strong> {{ $estimate->referral_source }}</p>
                    </div>
                    <div class="col-md-6">
                        <h2>Opportunity Rating and Owner</h2>
                        <p><strong>Opportunity Rating:</strong> {{ $estimate->opportunity_rating }}</p>
                        <p><strong>Opportunity Owner:</strong> {{ $estimate->opportunity_owner }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h2>Notes and Completion</h2>
                        <p><strong>Notes for Tech:</strong> {{ $estimate->notes_for_tech }}</p>
                        <p><strong>Completion Notes:</strong> {{ $estimate->completion_notes }}</p>
                    </div>
                    <div class="col-md-6">
                        <h2>Scheduled At</h2>
                        <p><strong>Scheduled At:</strong> {{ $estimate->scheduled_at }}</p>
                    </div>
                </div>
        </div>
    </div>
@endsection
