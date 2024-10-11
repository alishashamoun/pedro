@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' :  'manager.layouts.app' )


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('admin/inspection/index.inspection_sheet') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ __('admin/inspection/index.inspection_sheet') }}</li>
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
                                {{-- <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    New Inspection Sheet
                                </button> --}}
                                {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <form action="{{ route('checklists.store') }}" method="post">
                                                    @csrf
                                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                                        <div class="form-group">
                                                            <strong>New Sheet Name:</strong>
                                                            <input type="text" class="form-control" name="name">
                                                            <div id="checklist-items">
                                                                <!-- Dynamic checklist items will be added here -->
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success" id="add-checklist-item">Add
                                                    Checklist Item</button>
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
                                </div> --}}
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>{{ __('admin/inspection/index.name') }}</th>
                                            <th>Total Items</th>
                                            <th>{{ __('admin/inspection/index.created_by') }}</th>
                                            <th>{{ __('admin/inspection/index.action') }}</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if ($checklist)
                                            @foreach ($checklist as $jobcat)
                                                <tr>
                                                    <td>{{ $jobcat->name }}</td>

                                                    <td>{{ $jobcat->checklistItems->count() ?? '0' }}</td>
                                                    <td>{{ $jobcat->users->name ?? 'Null' }}</td>
                                                    <td>
                                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#checklistModal_{{ $jobcat->id }}">{{ __('admin/inspection/index.view_checklist_items') }}</button>


                                                    </td>
                                                    <!-- Modal for Checklist Items -->
                                                    <div class="modal fade" id="checklistModal_{{ $jobcat->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="checklistModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="checklistModalLabel">
                                                                        {{ __('admin/inspection/index.checklist_items_for') }} {{ $jobcat->name }}</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close">

                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <ul>

                                                                            <ul>
                                                                                @foreach ($jobcat->checklistItems as $item)
                                                                                    <li>{{ $item->description }}</li>
                                                                                @endforeach
                                                                            </ul>

                                                                    </ul>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">{{ __('admin/inspection/index.close') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
