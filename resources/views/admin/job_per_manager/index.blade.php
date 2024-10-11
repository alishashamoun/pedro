@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' : 'manager.layouts.app')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Jobs Per Manager</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Jobs Per Manager</li>
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
                            <!-- <div class="card-header">
                              <h3 class="card-title">User Managment</h3>
                            </div> -->
                            <!-- /.card-header -->
                            <div class="card-header">
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @foreach ($jobByManager as $managerName => $job)
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Manager Name: <span class="text-danger">{{ $managerName }}</span></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                            <tr>
                                                <th>Customer Name</th>
                                                <th>Jobs</th>
                                                <th>Primary Contact</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php
                                                $phones = isset($jobs->phone) ? $jobs->phone : [];
                                                $ext_ids = isset($jobs->ext_id) ? $jobs->ext_id : [];

                                            @endphp

                                            @foreach ($job as $jobs)
                                                <tr>
                                                    <td>{{ isset($jobs->customer->name) ? $jobs->customer->name : '' }}
                                                    </td>
                                                    <td>{{ isset($jobs->job_category->name) ? $jobs->job_category->name : '' }}
                                                    </td>
                                                    <td>Primary Contact:
                                                        {{ $jobs->first_name . '-' . $jobs->last_name }}
                                                        </br>
                                                        </br>
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


                                        </tbody>
                                    </table>
                                @endforeach

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
