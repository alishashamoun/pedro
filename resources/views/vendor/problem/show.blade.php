@extends('vendor.layouts.app')


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
                                    {{ __('vendor/problem/index.problem_report') }}#{{ $problemReport->id }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" id="pdf-content">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>{{ __('vendor/problem/index.job') }}</th>
                                            <td>{{ $problemReport->job }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('vendor/problem/index.location') }}</th>
                                            <td>{{ $problemReport->location }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('vendor/problem/index.type') }}</th>
                                            <td>
                                                @if ($problemReport->type_of_problem === 'critical')
                                                    <span class="badge badge-danger">Critical</span>
                                                @elseif ($problemReport->type_of_problem === 'high')
                                                    <span class="badge badge-warning">High</span>
                                                @elseif ($problemReport->type_of_problem === 'medium')
                                                    <span class="badge badge-info">Medium</span>
                                                @elseif ($problemReport->type_of_problem === 'low')
                                                    <span class="badge badge-success">Low</span>
                                                @endif
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>{{ __('vendor/problem/index.problem_report') }}</th>
                                            <td>{{ $problemReport->problem_date }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('vendor/problem/index.investigator') }}</th>
                                            <td>{{ $problemReport->investigator_of_problem }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('vendor/problem/index.result_of_investigation') }}</th>
                                            <td>{{ $problemReport->result_of_investigation }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('vendor/problem/index.suggestions') }}</th>
                                            <td>{{ $problemReport->suggestions }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button class="btn btn-success my-3" id="download-pdf">Download PDF</button>
                                <a href="{{ route('userproblem.index') }}"
                                    class="btn btn-primary">{{ __('vendor/problem/index.back_to_list') }}</a>
                                <a href="{{ route('userproblem.edit', $problemReport->id) }}"
                                    class="btn btn-info">{{ __('vendor/problem/index.edit') }}</a>
                                <form action="{{ route('userproblem.destroy', $problemReport->id) }}" method="post"
                                    style="display:inline">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this Report?')">{{ __('vendor/problem/index.delete') }}</button>
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
