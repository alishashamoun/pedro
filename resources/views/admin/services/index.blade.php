@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' : 'manager.layouts.app')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Services</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Services</li>
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
                            <!-- Button trigger modal -->

                            <div class="card-header">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal">
                                    Create New Service
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Create New Service</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="post" action="{{ route('services.store') }}">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="name" class="col-form-label">Service Name:</label>
                                                        <input type="text" class="form-control" id="name"
                                                            name="name" placeholder="Enter service name">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
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
                                            <th>S.N</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($services as $key => $service)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $service->name }}</td>
                                                <td class="d-flex">
                                                    <a href="#" class="btn btn-success edit-btn"
                                                        data-id="{{ $service->id }}">Edit</a>
                                                    <form action="{{ route('services.destroy', $service->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="return confirm('Are you sure you want to delete this service?')" type="submit" class="btn btn-danger mx-1">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Edit Service</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form id="editForm" method="post">
                                                <div class="modal-body">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="name" class="col-form-label">Service Name:</label>
                                                        <input type="text" class="form-control" id="name"
                                                            name="name" value="{{ $service->name ?? ''}}">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" form="editForm">Save
                                                        changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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
@section('scripts')
    <script>
        // Edit button click event
        $(document).on('click', '.edit-btn', function() {
            var serviceId = $(this).data('id');
            $('#editModal').modal('show');
            $('#editForm').attr('action', '{{ route('services.update', '') }}/' + serviceId);
        });
    </script>
@endsection
