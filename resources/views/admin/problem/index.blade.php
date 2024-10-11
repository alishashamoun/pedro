@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' :  'manager.layouts.app' )


@section('content')
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{ __('admin/problem/index.problem_report') }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">{{ __('admin/problem/index.home') }}</a></li>
            <li class="breadcrumb-item active">{{ __('admin/problem/index.problem_report') }}</li>
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
                            <a class="btn btn-success" href="{{ route('problem.create') }}"> {{ __('admin/problem/index.new_report') }} </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>{{ __('admin/problem/index.id') }}</th>
                                        <th>{{ __('admin/problem/index.job_name') }}</th>
                                        <th>{{ __('admin/problem/index.location') }}</th>
                                        <th>{{ __('admin/problem/index.created_by') }}</th>
                                        <th>{{ __('admin/problem/index.type') }}</th>
                                        <th>{{ __('admin/problem/index.created_at') }}</th>
                                        <th>{{ __('admin/problem/index.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($problemReports))

                                    @foreach ($problemReports as $report)
                                    <tr>
                                        <td>{{ $report->id ?? ''}}</td>
                                        <td>{{ $report->jobname->name ?? ''}}</td>
                                        <td>{{ $report->location ?? ''}}</td>
                                        <td>{{ $report->usname->name ?? '' }}</td>
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
                                        <td class="text-muted">
                                            {{$report->created_at->diffforhumans()}}
                                        </td>
                                        <td>
                                            <a href="{{ route('problem.show', $report->id) }}" class="btn btn-info">View</a>
                                            <a href="{{ route('problem.edit', $report->id) }}" class="btn btn-primary">Edit</a>
                                            {{-- <a href="{{ route('problem.destroy', $report->id) }}" class="btn btn-danger">Delete</a> --}}
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
        <!-- /.container -->
    </section>
</div>
@endsection
