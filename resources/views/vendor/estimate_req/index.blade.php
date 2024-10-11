@extends('vendor.layouts.app')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1">{{ __('vendor/estimatereq/index.estimate_request') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">{{ __('vendor/estimatereq/index.home') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('vendor/estimatereq/index.estimate_request') }}</li>
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
                                            <th>{{ __('vendor/estimatereq/index.s_n') }}</th>
                                            <th>{{ __('vendor/estimatereq/index.request') }}</th>
                                            <th>{{ __('vendor/estimatereq/index.name') }}</th>
                                            <th>{{ __('vendor/estimatereq/index.phone') }}</th>
                                            <th>{{ __('vendor/estimatereq/index.email') }}</th>
                                            <th class="text-sm">{{ __('vendor/estimatereq/index.created_at') }}</th>
                                            <th>{{ __('vendor/estimatereq/index.action') }}</th>
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

                                                    <td>{{ $supplies->email ?? '' }}</td>
                                                    <td class="text-muted text-sm">
                                                        {{ $supplies->created_at->diffforhumans() ?? '' }}</td>
                                                    <td class="d-flex">
                                                        <a href="{{ route('vendor_estimate_requests.show', $supplies->id) }}"
                                                            class="btn btn-info btn-sm ">Show</a>



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
@section('scripts')
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endsection
