@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' :  'manager.layouts.app' )


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Inspection Category</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Inspection Category</li>
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
                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
               New Inspection Category
            </button>
            <div class="modal fade" id="exampleModal" tabindex="-1"
                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close">

                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('ins_category.store') }}"
                                method="post">
                                @csrf
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>New Category Name:</strong>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save
                                changes</button>
                            <a href="">

                            </a>
                        </div>
                        </form>
                    </div>

                </div>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Total Rows</th>
                  <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                  @if($ins_category)
                  @foreach($ins_category as $jobcat)
                  <tr>
                  <td>{{ $jobcat->name }}</td>
                  <td>{{ isset($jobcat->job_sub_category) ? $jobcat->job_sub_category->name : '0' }}</td>
                  <td>
                      <a class="btn btn-info" href="{{ route('ins_category.show',$jobcat->id) }}">Show</a>
                      <a class="btn btn-primary" href="{{ route('ins_category.edit',$jobcat->id) }}">Edit</a>
                      {!! Form::open(['method' => 'DELETE','route' => ['ins_category.destroy', $jobcat->id],'style'=>'display:inline']) !!}
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





@endsection




