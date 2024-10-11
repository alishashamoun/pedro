@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' :  'manager.layouts.app' )


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('admin/checklist/index.title') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ __('admin/checklist/index.title') }}</li>
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

                            <div class="card-header">
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>{{ __('admin/checklist/index.job_name') }}</th>
                                            <th>{{ __('admin/checklist/index.assigned_manager_name') }}</th>
                                            <th>{{ __('admin/checklist/index.assigned_checklists') }}</th>
                                            <th>{{ __('admin/checklist/index.actions') }}</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if ($show)
                                            @foreach ($show as $shows)
                                                <tr>
                                                    <td>{{ $shows->name }}</td>
                                                    <td>{{ $shows->manager->name ?? 'null' }}</td>
                                                    <td>
                                                        @foreach ($shows->inspectionChecklists as $checklist)
                                                            <li>{{ $checklist->name }}</li>
                                                        @endforeach
                                                    </td>
                                                    <td>

                                                            @if ($shows->inspectionResponse->count() > 0)
                                                            <a class="btn btn-info"
                                                                href="{{ route('adminresponse', $shows->id) }}">{{ __('admin/checklist/index.show_response') }}</a>
                                                                <button class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#checklistModal_{{ $shows->id }}">{{ __('admin/checklist/index.view_checklist_items') }}</button>
                                                            @else
                                                            <button class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#checklistModal_{{ $shows->id }}">{{ __('admin/checklist/index.view_checklist_items') }}</button>
                                                                @endif
                                                    </td>
                                                    <!-- Modal for Checklist Items -->
                                                    <div class="modal fade" id="checklistModal_{{ $shows->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="checklistModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="checklistModalLabel">
                                                                        {{ __('admin/checklist/index.checklist_items_for') }} {{ $shows->name }}</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close">

                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <ul>
                                                                        @foreach ($shows->inspectionChecklists as $checklist)
                                                                            <li
                                                                                class="text-uppercase font-weight-bold my-2">
                                                                                {{ $checklist->name }}</li>
                                                                            <ul>
                                                                                @foreach ($checklist->checklistItems as $item)
                                                                                    <li>{{ $item->description }}</li>
                                                                                @endforeach
                                                                            </ul>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">{{ __('admin/checklist/index.close') }}</button>
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
