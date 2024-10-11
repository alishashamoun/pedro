@extends('users.layouts.app') <!-- Use your layout file if you have one -->

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content">
            <div class="container">
                <h1>Show Job Details</h1>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Customer</th>
                            <td>{{ $job->customer->name }}</td>
                        </tr>
                        <tr>
                            <th>Account Manager</th>
                            <td>{{ $job->manager->name }}</td>
                        </tr>
                        <tr>
                            <th>Location Name</th>
                            <td>{{ $job->location_name }}</td>
                        </tr>
                        <tr>
                            <th>Location Gated Property</th>
                            <td>
                                @if ($job->location_gated_property == 'on')
                                    Yes
                                @else
                                    No
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Location Address</th>
                            <td>{{ $job->location_address }}</td>
                        </tr>
                        <tr>
                            <th>Location City</th>
                            <td>{{ $job->location_city }}</td>
                        </tr>
                        <tr>
                            <th>Location State</th>
                            <td>{{ $job->location_state }}</td>
                        </tr>
                        <tr>
                            <th>Location Zipcode</th>
                            <td>{{ $job->location_zipcode }}</td>
                        </tr>
                        <tr>
                            <th>Job Category</th>
                            <td>{{ $job->job_category->name }}</td>
                        </tr>
                        <tr>
                            <th>Job Description</th>
                            <td>{{ $job->job_description }}</td>
                        </tr>
                        <tr>
                            <th>Purchase Order Number</th>
                            <td>{{ $job->po_no }}</td>
                        </tr>
                        <tr>
                            <th>Job Source</th>
                            <td>{{ $job->job_source_name->name }}</td>
                        </tr>
                        <tr>
                            <th>Agent</th>
                            <td>{{ $job->agentname->name }}</td>
                        </tr>
                        <tr>
                            <th>First Name (Primary Contact)</th>
                            <td>{{ $job->first_name }}</td>
                        </tr>
                        <tr>
                            <th>Last Name (Primary Contact)</th>
                            <td>{{ $job->last_name }}</td>
                        </tr>

                        <tr>
                            <th>Customer Homeowner</th>
                            <td>{{ $job->customer_homeowner }}</td>
                        </tr>
                        <tr>
                            <th>Customer Unit Coordination</th>
                            <td>{{ $job->customer_unit_cordination }}</td>
                        </tr>

                        <tr>
                            <th>Start Date</th>
                            <td>{{ $job->start_date }}</td>
                        </tr>
                        <tr>
                            <th>End Date</th>
                            <td>{{ $job->end_date }}</td>
                        </tr>

                        <tr>
                            <th>Start Time</th>
                            <td>{{ $job->start_time }}</td>
                        </tr>
                        <tr>
                            <th>End Time</th>
                            <td>{{ $job->end_time }}</td>
                        </tr>

                        <tr>
                            <th>Job Priority</th>
                            <td>{{ $job->job_prioirty->name }}</td>
                        </tr>
                        <tr>
                            <th>Assigned Technician</th>
                            <td>{{ $job->assigned_tech }}</td>
                        </tr>

                        <tr>
                            <th>Notes for Technician</th>
                            <td>{{ $job->notes_for_tech }}</td>
                        </tr>
                        <tr>
                            <th>Completion Notes</th>
                            <td>{{ $job->completion_notes }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-center my-3">
                    <a href="{{ route('joblist.index') }}" class="btn btn-info btn-lg">Back</a>
                </div>
            </div>
        </section>
    </div>
@endsection
