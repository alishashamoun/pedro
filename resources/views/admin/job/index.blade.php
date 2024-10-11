@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' : 'manager.layouts.app')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('admin/job/index.Title') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ __('admin/job/index.Title') }}</li>
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
                                <a class="btn btn-success" href="{{ route('job.create') }}">
                                    {{ __('admin/job/index.CreateJob') }} </a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive-xl">
                                <table id="example1" class="table  table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>{{ __('admin/job/index.SNo') }}</th>
                                            <th>{{ __('admin/job/index.JobID') }}</th>
                                            <th>{{ __('admin/job/index.CustomerName') }}</th>
                                            <th>{{ __('admin/job/index.LocationName') }}</th>
                                            <th>{{ __('admin/job/index.AssignedManager') }}</th>
                                            <th>{{ __('admin/job/index.Status') }}</th>
                                            <th>{{ __('admin/job/index.CreatedAt') }}</th>
                                            <th>{{ __('admin/job/index.Actions') }}</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if ($job)
                                            @foreach ($job as $key => $jobs)
                                                {{-- @php
                                                    $phones = isset($jobs->phone) ? $jobs->phone : [];
                                                    $ext_ids = isset($jobs->ext_id) ? $jobs->ext_id : [];
                                                    $exts = isset($jobs->ext) ? $jobs->ext : [];
                                                    $emailAddresses = isset($jobs->email) ? $jobs->email : [];
                                                    $phone = implode(',', $phones);
                                                    $ext_id = implode(',', $ext_ids);
                                                    $ext = implode(',', $exts);
                                                    $emailList = implode(',', $emailAddresses);
                                                @endphp --}}
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $jobs->id }}</td>
                                                    <td>{{ isset($jobs->customer->name) ? $jobs->customer->name : '' }}
                                                    </td>
                                                    <td>{{ isset($jobs->location_name) ? $jobs->location_name : '' }}
                                                    </td>
                                                    <td>
                                                        {{ isset($jobs->account_manager_id) ? $jobs->manager->name : 'null' }}
                                                    </td>
                                                    @php
                                                        $statusClasses = [
                                                            1 => 'text-primary',
                                                            2 => 'text-secondary',
                                                            3 => 'text-warning',
                                                            4 => 'text-info',
                                                            5 => 'text-light bg-dark',
                                                            6 => 'text-dark',
                                                            7 => 'text-danger',
                                                            8 => 'text-muted',
                                                            9 => 'text-success',
                                                        ];
                                                        $parsedStatus = isset($jobs) ? $jobs->parsedStatus : '---';
                                                        $currentStatus = isset($jobs) ? $jobs->current_status : null;
                                                    @endphp

                                                    <td class="{{ $statusClasses[$currentStatus] ?? 'text-success' }}">
                                                        <strong>{{ $parsedStatus }}</strong>
                                                    </td>
                                                    <td>
                                                        {{ $jobs->created_at->diffforhumans() }}
                                                    </td>
                                                    <td class="d-flex">
                                                        <button type="button" class="btn-sm btn btn-success"
                                                            data-toggle="modal"
                                                            data-target="#managerModal{{ $jobs->id }}">
                                                            {{ __('admin/job/index.Assign') }}
                                                        </button>
                                                        <a class="btn-sm btn btn-primary ml-1"
                                                            href="{{ route('job.edit', $jobs->id) }}">{{ __('admin/job/index.Edit') }}</a>
                                                        <a class="btn-sm btn btn-secondary mx-1"
                                                            href="{{ route('job.show', $jobs->id) }}">Show</a>

                                                        @if ($jobs->ratings->count() > 0)
                                                            <button type="button" class="btn-sm btn btn-warning mx-1"
                                                                data-toggle="modal"
                                                                data-target="#ratingsModal{{ $jobs->id }}">
                                                                {{ __('admin/job/index.Feedback') }}
                                                            </button>
                                                            <div class="modal fade" id="ratingsModal{{ $jobs->id }}"
                                                                tabindex="-1" role="dialog"
                                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog " role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                                Feedback
                                                                            </h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>

                                                                        <div class="modal-body">
                                                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                                                @forelse ($jobs->ratings as $key => $que)
                                                                                    <h3>
                                                                                        <span>Q
                                                                                            {{ $key + 1 }}:</span>
                                                                                        <span>{{ $que->question->question }}</span>
                                                                                    </h3>
                                                                                    <p>{{ __('admin/job/index.customer_rating') }}:
                                                                                    <div class="input-group mb-3 w-25">
                                                                                        {{ $que->rating }} / 10
                                                                                    </div>
                                                                                    </p>
                                                                                @empty
                                                                                    <p>
                                                                                        {{ __('user/job/index.no_questions') }}:
                                                                                    </p>
                                                                                @endforelse
                                                                                <p class="h4 my-2">Average Rating:</p>
                                                                                <span>{{ $jobs->feedback->rating }} /
                                                                                    10</span>
                                                                                <p class="h4 my-2">Comments:</p>
                                                                                <span>{{ $jobs->feedback->comment }}</span>
                                                                                <p class="h4 my-2">File:</p>
                                                                                @if ($jobs->feedback->file)
                                                                                    <a href="{{ asset('storage/' . $jobs->feedback->file) }}"
                                                                                        target="_blank">{{ basename($jobs->feedback->file) }}</a>
                                                                                    <span></span>
                                                                                @else
                                                                                    <span
                                                                                        class="font-italic text-muted">File
                                                                                        not provided</span>
                                                                                @endif

                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">Close</button>
                                                                            <button type="button" data-dismiss="modal"
                                                                                class="btn btn-primary">{{ __('admin/job/index.SaveChanges') }}</button>

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        @endif

                                                        <form action="{{ route('job.destroy', $jobs->id) }}" method="POST"
                                                            class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn-sm btn btn-danger"
                                                                onclick="return confirm('Are you sure you want to delete this job?')">{{ __('admin/job/index.Delete') }}</button>
                                                        </form>

                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="managerModal{{ $jobs->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Assign The
                                                                    Manager
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('jobassign.update', $jobs->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('put')
                                                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                                                        <div class="form-group">
                                                                            <strong>{{ __('admin/job/index.AccountManager') }}</strong>
                                                                            <select name="account_manager_id"
                                                                                class="form-control select-form ">
                                                                                <option value="">
                                                                                    {{ __('admin/job/index.ChooseOption') }}
                                                                                </option>
                                                                                @foreach ($manager as $data)
                                                                                    <option
                                                                                        {{ isset($jobs->account_manager_id) && $data->id == old('account_manager_id', $jobs->account_manager_id) ? 'selected' : '' }}
                                                                                        value="{{ $data->id }}">
                                                                                        {{ ucfirst($data->name) }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">{{ __('admin/job/index.SaveChanges') }}</button>
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
