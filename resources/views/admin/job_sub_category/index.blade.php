@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' :  'manager.layouts.app' )


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Sub Category</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Sub Category</li>
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
              <a class="btn btn-success" href="{{ route('job-sub-category.create') }}"> New Sub Category </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Job Sub Category</th>
                  <th>Job Category</th>
                  <th>Description/th>
                  <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                  @if($job_sub_category)
                  @foreach($job_sub_category as $jobcat)
                  <tr>
                  <td>{{ $jobcat->name }}</td>
                  <td>{{ isset($jobcat->job_category) ? $jobcat->job_category->name : '' }}</td>
                  <td>{{ $jobcat->description }}</td>
                  <td>
                      <a class="btn btn-info" href="{{ route('job-sub-category.show',$jobcat->id) }}">Show</a>
                      <a class="btn btn-primary" href="{{ route('job-sub-category.edit',$jobcat->id) }}">Edit</a>
                      {!! Form::open(['method' => 'DELETE','route' => ['job-sub-category.destroy', $jobcat->id],'style'=>'display:inline']) !!}
                          {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                      {!! Form::close() !!}
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


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


@endsection




