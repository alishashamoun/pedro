@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' : 'manager.layouts.app')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>UnScheduled Job</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">UnScheduled Job</li>
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
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Jobs</th>
                                            <th>Primary Contact</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if ($jobs_needing_scheduling)
                                            @foreach ($jobs_needing_scheduling as $jobs)
                                                @php
                                                    $phones = isset($jobs->phone) ? $jobs->phone : [];
                                                    $ext_ids = isset($jobs->ext_id) ? $jobs->ext_id : [];
                                                    $exts = isset($jobs->ext) ? $jobs->ext : [];
                                                    $emailAddresses = isset($jobs->email) ? $jobs->email : [];
                                                    $phone = implode(',', $phones);
                                                    $ext_id = implode(',', $ext_ids);
                                                    $ext = implode(',', $exts);
                                                    $emailList = implode(',', $emailAddresses);
                                                @endphp
                                                <tr>
                                                    <td>{{ isset($jobs->customer->name) ? $jobs->customer->name : '' }}</td>
                                                    <td>{{ isset($jobs->job_category->name) ? $jobs->job_category->name : '' }}
                                                    </td>
                                                    <td>Primary Contact: <span
                                                            style="font-weight: bold;">{{ $jobs->first_name . '-' . $jobs->last_name }}</span>
                                                        </br>Email: <strong>{{ $emailList }}</strong>
                                                        </br> Start Date: <strong>{{ $jobs->start_date }} End Date
                                                            {{ $jobs->end_date }}</strong>
                                                        </br> Start Time: <strong>{{ $jobs->start_time }} End Time:
                                                            {{ $jobs->end_time }}</strong>
                                                        </br> Estimated Duration: <strong>Start
                                                            Duration:{{ $jobs->start_duration }} End Duration:
                                                            {{ $jobs->end_duration }} </strong>
                                                    </td>
                                                    @if ($jobs->current_status == 1)
                                                        <td class="text-primary">
                                                            <strong>{{ isset($jobs) ? $jobs->parsedStatus : '' }}</strong>
                                                        </td>
                                                    @elseif($jobs->current_status == 2)
                                                        <td class="text-secondary">
                                                            <strong>{{ isset($jobs) ? $jobs->parsedStatus : '' }}</strong>
                                                        </td>
                                                    @elseif($jobs->current_status == 3)
                                                        <td class="text-warning">
                                                            <strong>{{ isset($jobs) ? $jobs->parsedStatus : '' }}</strong>
                                                        </td>
                                                    @elseif($jobs->current_status == 4)
                                                        <td class="text-info">
                                                            <strong>{{ isset($jobs) ? $jobs->parsedStatus : '' }}</strong>
                                                        </td>
                                                    @elseif($jobs->current_status == 5)
                                                        <td class="text-light bg-dark">
                                                            <strong>{{ isset($jobs) ? $jobs->parsedStatus : '' }}</strong>
                                                        </td>
                                                    @elseif($jobs->current_status == 6)
                                                        <td class="text-dark">
                                                            <strong>{{ isset($jobs) ? $jobs->parsedStatus : '' }}</strong>
                                                        </td>
                                                    @elseif($jobs->current_status == 7)
                                                        <td class="text-danger">
                                                            <strong>{{ isset($jobs) ? $jobs->parsedStatus : '' }}</strong>
                                                        </td>
                                                    @elseif($jobs->current_status == 8)
                                                        <td class="text-muted">
                                                            <strong>{{ isset($jobs) ? $jobs->parsedStatus : '' }}</strong>
                                                        </td>
                                                    @elseif($jobs->current_status == 9)
                                                        <td class="text-success">
                                                            <strong>{{ isset($jobs) ? $jobs->parsedStatus : '' }}</strong>
                                                        </td>
                                                    @else
                                                        <td class="text-success"><strong>---</strong></td>
                                                    @endif
                                                    <td class="d-flex"><a class="btn btn-primary"
                                                            href="{{ route('job.edit', $jobs->id) }}">Edit</a>
                                                        <a class=" btn btn-secondary mx-1"
                                                            href="{{ route('job.show', $jobs->id) }}">Show</a>
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
        <!-- /.content -->
    </div>




@endsection
