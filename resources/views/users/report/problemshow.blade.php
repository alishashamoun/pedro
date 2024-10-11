@extends('users.layouts.app')


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
                    <h3 class="card-title">{{ __('user/problem/index.report_problem') }} #{{ $problemReport->id }}</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered">
                      <tbody>
                        <tr>
                          <th>{{ __('user/problem/index.job') }}</th>
                          <td>{{ $problemReport->jobname->name }}</td>
                        </tr>
                        <tr>
                          <th>{{ __('user/problem/index.location') }}</th>
                          <td>{{ $problemReport->location }}</td>
                        </tr>
                        <tr>
                          <th>{{ __('user/problem/index.type') }}</th>
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
                          <th>{{ __('user/problem/index.problem_date') }}</th>
                          <td>{{ $problemReport->problem_date }}</td>
                        </tr>
                        <tr>
                          <th>{{ __('user/problem/index.investigator') }}</th>
                          <td>{{ $problemReport->investigator_of_problem }}</td>
                        </tr>
                        <tr>
                          <th>{{ __('user/problem/index.problem_date') }}</th>
                          <td>{{ $problemReport->result_of_investigation }}</td>
                        </tr>
                        <tr>
                          <th>{{ __('user/problem/index.suggestions') }}</th>
                          <td>{{ $problemReport->suggestions }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <a href="{{ route('users.problem') }}" class="btn btn-primary">Back to List</a>

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
