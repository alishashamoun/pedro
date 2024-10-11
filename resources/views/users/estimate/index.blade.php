@extends('users.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Job List</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Job List</li>
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
                                <a class="btn btn-success" href="{{ route('job.create') }}"> Create Job </a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Jobs</th>
                                            <th>Assigned Manager</th>
                                            <th>Status</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if ($job)
                                            @foreach ($job as $jobs)
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
                                                    <td>
                                                        {{ isset($jobs->account_manager_id) ? $jobs->manager->name : 'null' }}
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
                                                    <td>
                                                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal{{ $jobs->id }}">
                                                            Change Status
                                                        </button>

                                                        <a class="btn btn-primary"
                                                        href="{{ route('joblist.show', $jobs->id) }}">show</a>
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="exampleModal{{ $jobs->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Change Status
                                                                </h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close">

                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('joblist.update', $jobs->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('put')
                                                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                                                        <div class="form-group">
                                                                            <strong>Change Status:</strong>
                                                                            <select id="fruits" name="current_status" class="form-control" >
                                                                                <option value="" selected hidden disabled>Select status</option>
                                                                                <option {{ old('current_status', isset($jobs) ? $jobs->current_status : '') == '1' ? 'selected' : '' }} value="1">Unscheduled</option>
                                                                                <option {{ old('current_status', isset($jobs) ? $jobs->current_status : '') == '2' ? 'selected' : '' }} value="2">Scheduled</option>
                                                                                <option {{ old('current_status', isset($jobs) ? $jobs->current_status : '') == '3' ? 'selected' : '' }} value="3">Dispatch</option>
                                                                                <option {{ old('current_status', isset($jobs) ? $jobs->current_status : '') == '4' ? 'selected' : '' }} value="4">Canceled</option>
                                                                                <option {{ old('current_status', isset($jobs) ? $jobs->current_status : '') == '5' ? 'selected' : '' }} value="5">Rescheduled</option>
                                                                                <option {{ old('current_status', isset($jobs) ? $jobs->current_status : '') == '6' ? 'selected' : '' }} value="6">On Site</option>
                                                                                <option {{ old('current_status', isset($jobs) ? $jobs->current_status : '') == '7' ? 'selected' : '' }} value="7">In Process</option>
                                                                                <option {{ old('current_status', isset($jobs) ? $jobs->current_status : '') == '8' ? 'selected' : '' }} value="8">Partially</option>
                                                                                <option {{ old('current_status', isset($jobs) ? $jobs->current_status : '') == '9' ? 'selected' : '' }} value="9">Completed</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                                <a href="">

                                                                </a>
                                                            </div>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                            </div>
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
