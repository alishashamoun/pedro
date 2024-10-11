@extends('vendor.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('vendor/manage_work_order/index.work_order') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ __('vendor/manage_work_order/index.work_order') }}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">

                            <div class="card-body table-responsive-xl">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>{{ __('vendor/manage_work_order/index.queue') }}</th>
                                            <th>{{ __('vendor/manage_work_order/index.work_order') }}</th>
                                            <th>{{ __('vendor/manage_work_order/index.job_name') }}</th>
                                            <th>{{ __('admin/job/index.AssignedManager') }}</th>
                                            <th>{{ __('vendor/manage_work_order/index.status') }}</th>
                                            <th>{{ __('vendor/manage_work_order/index.deadline') }}</th>
                                            <th>{{ __('vendor/manage_work_order/index.payment') }}</th>
                                            <th>{{ __('vendor/manage_work_order/index.action') }}</th>
                                        </tr>
                                    </thead>

                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <tbody>

                                        @if ($WorkOrders)
                                            @foreach ($WorkOrders as $key => $workOrder)
                                                <tr data-id="{{ $workOrder->id }}">
                                                    <td><a href="#"><i
                                                                class="fas fa-arrows-alt cursor-pointer"></i></a>&nbsp;{{ $key + 1 }}
                                                    </td>
                                                    <td> {{ $workOrder->id ?? '' }}</td>
                                                    <td>{{ $workOrder->jobname->name ?? '' }}</td>
                                                    <td>
                                                        @if ($workOrder->jobname?->manager?->name)
                                                            {{ $workOrder->jobname->manager->name }}
                                                        @else
                                                            <span class="font-italic text-muted">not assigned</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @switch($workOrder->status)
                                                            @case('pending')
                                                                <span class="badge bg-warning">Pending</span>
                                                            @break

                                                            @case('accepted')
                                                                <span class="badge bg-success">Accepted</span>
                                                            @break

                                                            @case('declined')
                                                                <span class="badge bg-danger">Declined</span>
                                                            @break

                                                            @default
                                                                {{ $workOrder->status }}
                                                        @endswitch
                                                    </td>

                                                    <td>{{ $workOrder->deadline ?? '' }}</td>
                                                    <td> @switch($workOrder->payment_info)
                                                            @case('quick_pay')
                                                                <span class="badge bg-success">Quick Pay</span>
                                                            @break

                                                            @default
                                                                ----
                                                        @endswitch
                                                    </td>
                                                    <td>
                                                        @if ($workOrder->status == 'pending')
                                                            <!-- Show Accept Button -->
                                                            <a href="{{ route('vendor.accept', ['id' => $workOrder->id]) }}"
                                                                class="btn btn-sm btn-success mr-2"
                                                                onclick="return confirm('Are you sure you want to Accept this Work Order?')">
                                                                <i class="fa fa-check"></i> Accept
                                                            </a>
                                                            <!-- Show Decline Button -->
                                                            <a href="{{ route('vendor.decline', ['id' => $workOrder->id]) }}"
                                                                class="btn btn-sm btn-danger mr-2"
                                                                onclick="return confirm('Are you sure you want to Decline this Work Order?')">
                                                                <i class="fa fa-times"></i> Decline
                                                            </a>
                                                        @else
                                                            <div class="btn-group btn-group-sm" role="group">
                                                                <a data-bs-toggle="tooltip" title="ask for quick pay"
                                                                    href="{{ route('vendor.quick_pay', ['id' => $workOrder->id]) }}"
                                                                    class="btn btn-primary mr-2"
                                                                    onclick="return confirm('Are you sure you want to Apply For Quick Pay?')">
                                                                    <i class="fa fa-hand-holding-usd"></i>
                                                                </a>
                                                                <a data-bs-toggle="tooltip" title="add images and notes"
                                                                    href="{{ route('vendor.doc', ['id' => $workOrder->id]) }}"
                                                                    class="btn btn-warning mr-2">
                                                                    <i class="fa fa-plus"></i>
                                                                </a>
                                                                <a data-bs-toggle="tooltip" title="Create Invoice"
                                                                    href="{{ route('invoice.create', $workOrder->id) }}"
                                                                    class="btn btn-secondary mr-2">
                                                                    Create Invoice
                                                                </a>
                                                                <a data-bs-toggle="tooltip" title="Notify the customer that the vendor is en route for the job"
                                                                    href="{{ route('vendor.alert', ['id' => $workOrder->job_id]) }}"
                                                                    class="btn btn-Indigo"
                                                                    style="background-color: #6610f2!important; color: white">
                                                                    <i class="fas fa-bell"></i> En-route
                                                                </a>
                                                            </div>
                                                            @if (!$workOrder->JobLocation)
                                                                <span class="badge bg-danger">No Job Location Set
                                                                    Yet!</span>
                                                            @else
                                                                @if ($workOrder->attendance->contains('attendance', 'checkOut'))
                                                                    <!-- Assuming you have a relationship set up -->
                                                                    <span class="badge bg-success"
                                                                        style="background-color: #39cccc!important; color: black">Checked
                                                                        Out</span>
                                                                @else
                                                                    <a data-bs-toggle="tooltip" title="attendance"
                                                                        href="{{ route('vendor.attendance', ['id' => $workOrder->id]) }}"
                                                                        class="btn btn-sm btn-maroon"
                                                                        style="background-color: #d81b60!important; color: white">
                                                                        <i class="fas fa-user-clock"></i> Attendance
                                                                    </a>
                                                                @endif
                                                            @endif
                                                        @endif
                                                        <a data-bs-toggle="tooltip" title="view details"
                                                            href="{{ route('manage_work_orders.show', $workOrder->job_id) }}"
                                                            class="btn btn-sm btn-info">{{ __('vendor/manage_work_order/index.view') }}</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>


@endsection
@section('scripts')
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}}

    <script>

        $(document).ready(function() {
            $(function() {
                var token = $('meta[name="csrf-token"]').attr('content');
                $("#example1 tbody").sortable({
                    update: function(event, ui) {
                        var newOrder = $(this).sortable('toArray', {
                            attribute: 'data-id'
                        });
                        updatePriorities(newOrder, token);
                    }
                });
                $("#example1").disableSelection();
            });

            function updatePriorities(newOrder, token) {
                $.ajax({
                    url: '{{ route('sort') }}',
                    type: 'POST',
                    data: {
                        _token: token,
                        order: newOrder
                    },
                    success: function(response) {
                        console.log('done');
                        if (response.error) {

                            toastr.error(response.error, 'Error', {
                                closeButton: false
                            });
                        } else {
                            toastr.success(response.message, 'Success', {
                                closeButton: true
                            });

                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }
        });
    </script>
@endsection
