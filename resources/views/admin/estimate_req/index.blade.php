@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' : 'manager.layouts.app')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('admin/estimatereq/index.estimate_request') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ __('admin/estimatereq/index.estimate_request') }}</li>
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
                            <div class="card-header">
                                <a class="btn btn-success" href="{{ route('estimate_requests.create') }}"
                                    class="btn btn-primary">{{ __('admin/estimatereq/index.create_estimate_request') }}</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>{{ __('admin/estimatereq/index.s_n') }}</th>
                                            <th>{{ __('admin/estimatereq/index.request') }}#</th>
                                            <th>{{ __('admin/estimatereq/index.name') }}</th>
                                            <th>{{ __('admin/estimatereq/index.phone') }} #</th>
                                            @if (auth()->user()->hasRole('Admin'))
                                                <th>{{ __('admin/estimatereq/index.created_by') }}</th>
                                            @endif
                                            <th>{{ __('admin/estimatereq/index.email') }}</th>
                                            <th class="text-sm">{{ __('admin/estimatereq/index.created_at') }}</th>
                                            <th>{{ __('admin/estimatereq/index.action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($estimate))
                                            @foreach ($estimate as $key => $supplies)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $supplies->id ?? '' }}</td>
                                                    <td>{{ $supplies->first_name . ' ' . $supplies->last_name ?? '' }}</td>
                                                    <td>
                                                        {{ $supplies->phone_number ?? '' }}
                                                    </td>

                                                    @if (auth()->user()->hasRole('Admin'))
                                                        <td>{{ $supplies->user->name ?? '' }}</td>
                                                    @endif
                                                    <td>{{ $supplies->email ?? '' }}</td>
                                                    <td class="text-muted text-sm">
                                                        {{ $supplies->created_at->diffforhumans() ?? '' }}</td>
                                                    <td class="d-flex">
                                                        <a href="{{ route('estimate_requests.show', $supplies->id) }}"
                                                            class="btn btn-info btn-sm ">{{ __('admin/estimatereq/index.show') }}</a>
                                                        <a href="{{ route('estimate_requests.vendors', $supplies->id) }}"
                                                            class="btn btn-indigo btn-sm mx-1" data-bs-toggle="tooltip"
                                                            data-placement="top" title="Send to suppliers"><i
                                                                class="fas fa-arrow-circle-right"></i></a>

                                                        <a href="{{ route('estimate_requests.edit', $supplies->id) }}"
                                                            class="btn btn-primary btn-sm mx-1">{{ __('admin/estimatereq/index.edit') }}</a>
                                                        <form
                                                            action="{{ route('estimate_requests.destroy', $supplies->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm "
                                                                onclick="return confirm('Are you sure you want to delete this Request?')">{{ __('admin/estimatereq/index.delete') }}</button>
                                                        </form>
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
