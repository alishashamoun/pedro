<!-- resources/views/jobs/show.blade.php -->
@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' : 'manager.layouts.app')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-12 d-flex justify-content-between align-items-center">
                    <h1>Job Details</h1>
                    <!-- Back Button -->
                    <a data-bs-toggle="tooltip" data-placement="top" title="Go back to previous page"
                    href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col-md-6">
                    <h2>Customer Information</h2>
                    <p><strong>Name:</strong> {{ $job->name }}</p>
                    <p><strong>Customer ID:</strong> {{ $job->customer_id }}</p>
                    <p><strong>Location:</strong> {{ $job->location_name }} ({{ $job->location_unit }})</p>
                    <p><strong>Address:</strong> {{ $job->location_address }}, {{ $job->location_city }},
                        {{ $job->location_state }} {{ $job->location_zipcode }}</p>
                </div>

                <div class="col-md-6">
                    <h2>Job Information</h2>
                    <p><strong>Job Category:</strong> {{ $job->job_category->name ?? ''}}</p>
                    <p><strong>Job Subcategory:</strong> {{ $job->job_sub_cat_id ? 'Yes' : 'No' }}</p>
                    <p><strong>Job Description:</strong> {{ $job->job_description }}</p>
                    <p><strong>Job Subdescription:</strong> {{ $job->job_sub_description }}</p>
                </div>
            </div>
            <!-- New section for primary contacts -->
            <div class="row ">
                <div class="border border-dark col-md-12 my-3">
                    <h2>Primary Contacts</h2>
                    @foreach ($job->customer->pricontact as $contact)
                        <div class="row">
                            <div class="col-md-4">
                                <p><strong>Phone:</strong> {{ $contact->number }}</p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Ext:</strong> {{ $contact->ext }}</p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Email:</strong> {{ $contact->email }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <h2>Scheduling Information</h2>
                    <p><strong>Start Date:</strong> {{ \Carbon\Carbon::parse($job->start_date)->format('F j, Y') }} at
                        {{ \Carbon\Carbon::parse($job->start_date)->format('g:i A') }}</p>
                    <p><strong>End Date:</strong> {{ \Carbon\Carbon::parse($job->end_date)->format('F j, Y') }} at
                        {{ \Carbon\Carbon::parse($job->end_date)->format('g:i A') }}</p>
                </div>

                <div class="col-md-6">
                    <h2>Assignment and Status</h2>
                    <p><strong>Assigned Tech:</strong> {{ $job->assigned_tech }}</p>
                    <p><strong>Job Priority:</strong> {{ $job->job_prioirty->name ?? ''}}</p>
                    <p><strong>Status:</strong> <span class="badge bg-success">{{ $job->parsedStatus }}</span>
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h2>Additional Notes</h2>
                    <p>{{ $job->notes_for_tech }}</p>
                    <p>{{ $job->completion_notes }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
