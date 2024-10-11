@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' :  'manager.layouts.app' )


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Today Schedule Job</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Today Schedule Job</li>
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
                  <th>Customer Name</th>
                  <th>Jobs</th>
                  <th>Primary Contact</th>
                  <th>Stauts</th>
                  <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                  @if($completed_jobs)
                @foreach($completed_jobs as $jobs)
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
                        <td>{{ isset($jobs->job_category->name) ? $jobs->job_category->name : '' }}</td>
                        <td>Primary Contact: <span style="font-weight: bold;">{{ $jobs->first_name . '-' . $jobs->last_name }}</span>
                          </br>Email: <strong>{{ $emailList }}</strong>
                          </br>  Start Date: <strong>{{ $jobs->start_date }} End Date {{ $jobs->end_date }}</strong>
                          </br> Start Time: <strong>{{ $jobs->start_time }} End Time: {{ $jobs->end_time }}</strong>
                          </br> Estimated Duration: <strong>Start Duration:{{ $jobs->start_duration }} End Duration: {{ $jobs->end_duration }} </strong>
                        </td>
                        <td class="text-success"><strong>Completed</strong></td>
                        <td class="d-flex">
                            @if (optional($jobs->feedback)->count() > 0)
                             <button type="button" class="btn btn-success mx-2 btn-sm" data-toggle="modal"
                                 data-target="#exampleModal{{ $jobs->id }}">
                                 Feedback
                             </button>
                             @endif
                             <a class="btn btn btn-secondary mx-1"
                             href="{{ route('job.show', $jobs->id) }}">Show</a>
                            <a class="btn btn-primary"
                            href="{{ route('job.edit', $jobs->id) }}">Edit</a></td>
                      </tr>
                      @if (optional($jobs->feedback)->count() > 0)
                      <div class="modal fade" id="exampleModal{{ $jobs->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Submitted Feedback</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Display the submitted data here -->
                                    <p>Rating: {{ $jobs->feedback->rating }}/5</p>
                                    <p>Comments: {{ $jobs->feedback->comment }}</p>
                                    <a href="{{asset('storage/' . $jobs->feedback->file)}}">File: {{ basename($jobs->feedback->file) }}</a>
                                    <!-- Add more fields as needed -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


@endsection
