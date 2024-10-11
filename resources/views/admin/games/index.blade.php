@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' :  'manager.layouts.app' )



@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Roles</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Games Type</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Game Type List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-header">
              <!-- @can('role-create') -->
                <a class="btn btn-success" href="{{ route('games.create') }}"> Create New Games</a>
                <!-- @endcan -->
                <!-- <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a> -->
                </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Game</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @if($roles)
                  @php
                  $id =1;
                  @endphp
                  @foreach($roles as $key =>  $role)
                  <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $role->name }}</td>
                      <td>
                      <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                          <a class="btn btn-primary" href="{{ route('games.edit',$role->id) }}">Edit</a>
                        </div>
                      </div>
                    </td>
                      <td>

                      </td>
                  </tr>
                  @endforeach
                  @endif
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>S.No</th>
                    <th>Games</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
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
