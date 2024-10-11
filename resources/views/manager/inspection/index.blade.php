@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' : (Auth::user()->hasRole('vendor') ? 'vendor.layouts.app' : (Auth::user()->hasRole('account manager') ? 'manager.layouts.app' : 'default.layout')))

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('admin/inspection/index.inspection_category') }}</h1>
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
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    {{ __('admin/inspection/index.new_inspection_sheet') }}
                                </button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ __('admin/inspection/index.new_inspection_sheet') }}
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
                                                            <strong>{{ __('admin/inspection/index.sheet_name') }}</strong>
                                                            <input type="text" class="form-control" name="name">
                                                            <div id="checklist-items">
                                                                <!-- Dynamic checklist items will be added here -->
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success" id="add-checklist-item">{{ __('admin/inspection/index.add_checklist_item') }}</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">{{ __('admin/inspection/index.save_changes') }}</button>

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
                                            <th>{{ __('admin/inspection/index.s_n') }}</th>
                                            <th>{{ __('admin/inspection/index.name') }}</th>
                                            <th>Total Items</th>
                                            @if (auth()->user()->hasRole('Admin'))
                                                <th>{{ __('admin/inspection/index.created_by') }}</th>
                                            @endif
                                            <th>{{ __('admin/inspection/index.action') }}</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if ($checklist)
                                        <?php $i = 0; ?>
                                            @foreach ($checklist as $jobcat)
                                            <?php $i++; ?>
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $jobcat->name }}</td>

                                                    <td>{{ $jobcat->checklistItems->count() ?? '0' }}</td>
                                                    @if (auth()->user()->hasRole('Admin'))
                                                        <td>{{ $jobcat->users->name ?? '' }}</td>
                                                    @endif
                                                    <td>
                                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#checklistModal_{{ $jobcat->id }}">{{ __('admin/inspection/index.view_checklist_items') }}</button>
                                                        <form action="{{ route('checklists.destroy', $jobcat->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"
                                                                onclick="return confirm('{{ __('admin/inspection/index.are_you_sure') }}')">{{ __('admin/inspection/index.delete_sheet') }}</button>
                                                        </form>

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
                                                                        data-bs-dismiss="modal">Close</button>
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
