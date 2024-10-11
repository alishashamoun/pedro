@extends('vendor.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('vendor/problem/index.problem_report') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#"> {{ __('vendor/problem/index.home') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('vendor/problem/index.problem_report') }}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Content Header (Page header) -->


        <section class="content">
            <div class="container">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a class="btn btn-success" href="{{ route('userproblem.create') }}">
                                    {{ __('vendor/problem/index.new_report') }} </a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>{{ __('vendor/problem/index.report') }}</th>
                                            <th>{{ __('vendor/problem/index.job_name') }}</th>
                                            <th>{{ __('vendor/problem/index.location') }}</th>
                                            <th>{{ __('vendor/problem/index.type') }}</th>
                                            <th>{{ __('vendor/problem/index.action') }} </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($problemReports))
                                            @foreach ($problemReports as $report)
                                                <tr>
                                                    <td>{{ $report->id }}</td>
                                                    <td>{{ $report->jobname->name ?? '' }}</td>
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
                                                        <a href="{{ route('userproblem.show', $report->id) }}"
                                                            class="btn btn-info">{{ __('Show') }}</a>
                                                        <a href="{{ route('userproblem.edit', $report->id) }}"
                                                            class="btn btn-primary">{{ __('vendor/problem/index.edit') }}</a>
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
            <!-- /.container -->
        </section>
    </div>
@endsection
