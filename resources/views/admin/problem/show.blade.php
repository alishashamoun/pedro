@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' : 'manager.layouts.app')



@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <!-- Custom CSS -->
            <style>
                .table {
                    margin-bottom: 20px;
                }

                .submit-button {
                    margin-top: 20px;
                    background-color: #007bff;
                    color: white;
                }
            </style>




            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    {{ __('admin/problem/show.problem_report_title') }}{{ $problemReport->id }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>{{ __('admin/problem/show.job_label') }}</th>
                                            <td>{{ $problemReport->job }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('admin/problem/show.created_by_label') }}</th>
                                            <td>{{ $problemReport->usname->name ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('admin/problem/show.location_label') }}</th>
                                            <td>{{ $problemReport->location }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('admin/problem/show.type_label') }}</th>
                                            <td>
                                                @if ($problemReport->type_of_problem === 'critical')
                                                    <span class="badge bg-danger">Critical</span>
                                                @elseif ($problemReport->type_of_problem === 'high')
                                                    <span class="badge bg-warning">High</span>
                                                @elseif ($problemReport->type_of_problem === 'medium')
                                                    <span class="badge bg-info">Medium</span>
                                                @elseif ($problemReport->type_of_problem === 'low')
                                                    <span class="badge bg-success">Low</span>
                                                @endif
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>{{ __('admin/problem/show.problem_date_label') }}</th>
                                            <td>{{ $problemReport->problem_date }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('admin/problem/show.investigator_label') }}</th>
                                            <td>{{ $problemReport->investigator_of_problem }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('admin/problem/show.result_of_investigation_label') }}</th>
                                            <td>{{ $problemReport->result_of_investigation }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('admin/problem/show.suggestions_label') }}</th>
                                            <td>{{ $problemReport->suggestions }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a href="{{ route('problem.index') }}"
                                    class="btn btn-primary">{{ __('admin/problem/show.back_to_list') }}</a>
                                <a href="{{ route('problem.edit', $problemReport->id) }}"
                                    class="btn btn-info">{{ __('admin/problem/show.edit') }}</a>
                                <form action="{{ route('problem.destroy', $problemReport->id) }}" method="post"
                                    style="display:inline">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('{{ __('admin/problem/show.delete_confirm') }}')">Delete</button>
                                </form>
                            </div>
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
