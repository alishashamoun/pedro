@extends('vendor.layouts.app')


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content">
            <div class="container">
                <div class="my-3">
                    <a href="{{ route('manage_work_orders.index') ?? '' }}"
                        class="btn btn-info ">{{ __('vendor/manage_work_order/index.back') }}</a>
                        <button class="btn btn-success my-3" id="download-pdf">Download PDF</button>
                </div>
                <h1>{{ __('vendor/manage_work_order/index.show_job_details') }}</h1>
                <div class="container">
                    <div class="p-3" id="pdf-content">
                        <table class="table table-striped table-bordered" >
                            <tbody>
                                <tr>
                                    <th>{{ __('vendor/manage_work_order/index.customer') }}</th>
                                    <td>{{ $job->customer->name ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('vendor/manage_work_order/index.account_manager') }}</th>
                                    <td>
                                        @if ($job->manager?->name)
                                            {{ $job->manager?->name }}
                                        @else
                                            <span class="font-italic text-muted">not assigned yet</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>{{ __('vendor/manage_work_order/index.location_name') }}</th>
                                    <td>{{ $job->location_name ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('vendor/manage_work_order/index.location_gated_property') }}</th>
                                    <td>
                                        @if ($job->location_gated_property == 'on')
                                            <span class="badge badge-success">Yes</span>
                                        @else
                                            <span class="badge badge-danger">No</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>{{ __('vendor/manage_work_order/index.location_address') }}</th>
                                    <td>{{ $job->location_address ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('vendor/manage_work_order/index.location_city') }}</th>
                                    <td>{{ $job->location_city ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('vendor/manage_work_order/index.location_state') }}</th>
                                    <td>{{ $job->location_state ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('vendor/manage_work_order/index.location_zipcode') }}</th>
                                    <td>{{ $job->location_zipcode ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('vendor/manage_work_order/index.job_category') }}</th>
                                    <td>{{ $job->job_category->name ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('vendor/manage_work_order/index.job_description') }}</th>
                                    <td>{{ $job->job_description ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('vendor/manage_work_order/index.purchase_order_name') }}</th>
                                    <td>{{ $job->po_no ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('vendor/manage_work_order/index.job_source') }}</th>
                                    <td>{{ $job->job_source_name->name ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('vendor/manage_work_order/index.agent') }}</th>
                                    <td>{{ $job->agentname->name ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('vendor/manage_work_order/index.first_name_(primary_contact)') }}</th>
                                    <td>{{ $job->first_name ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('vendor/manage_work_order/index.last_name_(primary_contact)') }}</th>
                                    <td>{{ $job->last_name ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('vendor/manage_work_order/index.customer_homeowner') }}</th>
                                    <td>{{ $job->customer_homeowner ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('vendor/manage_work_order/index.customer_unit_coordination') }}</th>
                                    <td>{{ $job->customer_unit_cordination ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('vendor/manage_work_order/index.start_date') }}</th>
                                    <td>{{ $job->start_date ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('vendor/manage_work_order/index.end_date') }}</th>
                                    <td>{{ $job->end_date ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('vendor/manage_work_order/index.start_time') }}</th>
                                    <td>{{ $job->start_time ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('vendor/manage_work_order/index.end_time') }}</th>
                                    <td>{{ $job->end_time ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('vendor/manage_work_order/index.job_prioirty') }}</th>
                                    <td>{{ $job->job_prioirty->name ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('vendor/manage_work_order/index.assigned_technician') }}</th>
                                    <td>{{ $job->assigned_tech ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('vendor/manage_work_order/index.notes_of_technician') }}</th>
                                    <td>{{ $job->notes_for_tech ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('vendor/manage_work_order/index.completion_notes') }}</th>
                                    <td>{{ $job->completion_notes ?? '' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="text-center my-3">
                    <a href="{{ route('manage_work_orders.index') ?? '' }}"
                        class="btn btn-info btn-lg">{{ __('vendor/manage_work_order/index.back') }}</a>
                </div>
            </div>
        </section>
    </div>
@endsection
