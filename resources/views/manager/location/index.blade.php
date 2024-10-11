@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' : (Auth::user()->hasRole('vendor') ? 'vendor.layouts.app' : (Auth::user()->hasRole('account manager') ? 'manager.layouts.app' : 'default.layout')))

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Location</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Location</li>
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
                                <a href="{{ route('checklists.create') }}" class="btn btn-info ">
                                    Create/ Delete Sheet
                                </a>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Assign/ Update Checklist
                                </button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Assign Checklist
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">

                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('location.store') }}" method="post">
                                                    @csrf
                                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                                        <div class="form-group">

                                                            @foreach ($locations as $location)
                                                                <div class="col-12">

                                                                    <label
                                                                        for="location_{{ $location->id }}" class="fs-2">{{ $location->name }}</label>
                                                                    @foreach ($checklists as $checklist)
                                                                        <div class="d-flex">
                                                                            @php
                                                                                // Check if there is a matching inspection record for the current location and checklist
                                                                                $matchingInspection = $inspections->first(
                                                                                    function ($inspection) use (
                                                                                        $location,
                                                                                        $checklist,
                                                                                    ) {
                                                                                        return $inspection->job_id ===
                                                                                            $location->id &&
                                                                                            $inspection->inspection_checklist_id ===
                                                                                                $checklist->id;
                                                                                    },
                                                                                );
                                                                            @endphp
                                                                            <input type="checkbox" class="form-check-input"
                                                                                name="assignments[{{ $location->id }}][]"
                                                                                value="{{ $checklist->id }}"
                                                                                {{ $matchingInspection ? 'checked' : '' }}
                                                                                id="location_{{ $location->id }}_checklist_{{ $checklist->id }}">
                                                                            <label
                                                                                for="location_{{ $location->id }}_checklist_{{ $checklist->id }}"
                                                                                class="form-label">
                                                                                &nbsp;{{ $checklist->name }}</label>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">

                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save
                                                    changes</button>

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
                                            <th>Location Name</th>
                                            <th>Assigned Checklists</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if ($show)
                                            @foreach ($show as $shows)
                                                <tr>
                                                    <td>{{ $shows->name }}</td>
                                                    <td>
                                                        @foreach ($shows->inspectionChecklists as $checklist)
                                                            <li>{{ $checklist->name }}</li>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#checklistModal_{{ $shows->id }}">View
                                                            Checklist Items</button>
                                                        {{-- <a class="btn btn-info"
                                                            href="{{ route('location.show', $shows->id) }}">Show</a>

                                                        {!! Form::open([
                                                            'method' => 'DELETE',
                                                            'route' => ['location.destroy', $shows->id],
                                                            'style' => 'display:inline',
                                                        ]) !!}
                                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                        {!! Form::close() !!} --}}
                                                    </td>
                                                    <!-- Modal for Checklist Items -->
                                                    <div class="modal fade" id="checklistModal_{{ $shows->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="checklistModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="checklistModalLabel">
                                                                        Checklist Items for {{ $shows->name }}</h5>
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
