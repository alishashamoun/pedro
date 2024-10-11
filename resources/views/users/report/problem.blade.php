@extends('users.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('user/problem/index.report_problem') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ __('user/problem/index.report_problem') }}</li>
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
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <tr>


                                            <th>{{ __('user/problem/index.report') }}</th>
                                            <th>{{ __('user/problem/index.job_name') }}</th>
                                            <th>{{ __('user/problem/index.location') }}</th>
                                            <th>{{ __('user/problem/index.type') }}</th>
                                            <th>{{ __('user/problem/index.actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($problemReports))

                                        @foreach ($problemReports as $report)
                                        <tr>
                                            <td>{{ $report->id }}</td>
                                            <td>{{ $report->jobname->name }}</td>
                                            <td>{{ $report->location }}</td>
                                            <td>
                                                @if ($report->type_of_problem === 'critical')
                                                    <span class="badge bg-danger">Critical</span>
                                                @elseif ($report->type_of_problem === 'high')
                                                    <span class="badge bg-warning">High</span>
                                                @elseif ($report->type_of_problem === 'medium')
                                                    <span class="badge bg-info">Medium</span>
                                                @elseif ($report->type_of_problem === 'low')
                                                    <span class="badge bg-success">Low</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('users.problem.show', $report->id) }}" class="btn btn-info">View</a>
                                                {{-- <a href="{{ route('problem.edit', $report->id) }}" class="btn btn-primary">Edit</a> --}}
                                                {{-- Add delete button or other actions here --}}
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
