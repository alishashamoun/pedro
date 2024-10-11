@extends('users.layouts.app') <!-- Use your layout file if you have one -->

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content">
            <div class="container">
                <h1>{{ __('user/job/show.show_job_details') }}</h1>
                <div class="container mt-5">
                    <table class="table table-striped table-bordered">
                        <tbody>
                            <tr>
                                <th>{{ __('user/job/show.customer') }}</th>
                                <td>{{ $job->customer->name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('user/job/show.account_manager') }}</th>
                                <td>{{ $job->manager->name?? '' }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('user/job/show.location_name') }}</th>
                                <td>{{ $job->location_name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('user/job/show.location_gated_property') }}</th>
                                <td>
                                    @if ($job->location_gated_property == 'on')
                                    <span class="badge bg-success">{{ __('user/job/show.yes') }}</span>
                                    @else
                                    <span class="badge bg-danger">{{ __('user/job/show.no') }}</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>{{ __('user/job/show.location_address') }}</th>
                                <td>{{ $job->location_address }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('user/job/show.location_city') }}</th>
                                <td>{{ $job->location_city }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('user/job/show.location_state') }}</th>
                                <td>{{ $job->location_state }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('user/job/show.location_zipcode') }}</th>
                                <td>{{ $job->location_zipcode }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('user/job/show.job_category') }}</th>
                                <td>{{ $job->job_category->name ?? 'N/A'}}</td>
                            </tr>
                            <tr>
                                <th>{{ __('user/job/show.job_description') }}</th>
                                <td>{{ $job->job_description }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('user/job/show.purchase_order_number') }}</th>
                                <td>{{ $job->po_no }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('user/job/show.job_source') }}</th>
                                <td>{{ $job->job_source->name ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('user/job/show.agent') }}</th>
                                <td>{{ $job->agentname->name ?? ''}}</td>
                            </tr>
                            <tr>
                                <th>{{ __('user/job/show.first_name_primary_contact') }}</th>
                                <td>{{ $job->first_name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('user/job/show.last_name_primary_contact') }}</th>
                                <td>{{ $job->last_name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('user/job/show.customer_homeowner') }}</th>
                                <td>{{ $job->customer_homeowner }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('user/job/show.customer_unit_cordination') }}</th>
                                <td>{{ $job->customer_unit_cordination }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('user/job/show.start_date') }}</th>
                                <td>{{ $job->start_date }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('user/job/show.end_date') }}</th>
                                <td>{{ $job->end_date }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('user/job/show.start_time') }}</th>
                                <td>{{ $job->start_duration }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('user/job/show.end_time') }}</th>
                                <td>{{ $job->end_duration }}</td>
                            </tr>
                            {{-- <tr>
                                <th>{{ __('user/job/show.job_priority') }}</th>
                                <td>{{ $job->job_prioirty->name?? ''}}</td>
                            </tr> --}}
                            <tr>
                                <th>{{ __('user/job/show.assigned_technician') }}</th>
                                <td>{{ $job->assigned_tech }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('user/job/show.notes_for_technician') }}</th>
                                <td>{{ $job->notes_for_tech }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('user/job/show.completion_notes') }}</th>
                                <td>{{ $job->completion_notes }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="text-center my-3">
                    <a href="{{ route('joblist.index') }}" class="btn btn-info btn-lg">{{ __('user/job/show.back') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @section('script')
    <script>
        $(document).ready(function() {
            $('.print').click(function() {
                window.print();
            });
        });
    </script>
@endsection --}}
