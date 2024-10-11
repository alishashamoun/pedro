@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' : (Auth::user()->hasRole('vendor') ? 'vendor.layouts.app' : (Auth::user()->hasRole('account manager') ? 'manager.layouts.app' : (Auth::user()->hasRole('User') ? 'users.layouts.app' : 'default.app'))))


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('vendor/responce/index.responce') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ __('vendor/responce/index.responce') }}</li>
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
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>{{ __('vendor/responce/index.location_name') }}</th>
                                            <th>{{ __('vendor/responce/index.assigned_checklists') }}</th>
                                            <th>{{ __('vendor/responce/index.action') }}</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if ($show)
                                            @foreach ($show as $shows)
                                                <tr>
                                                    <td>{{ $shows->name }}</td>
                                                    <td>
                                                        @forelse ($shows->inspectionChecklists as $checklist)
                                                            <li>{{ $checklist->name }}</li>
                                                            @empty
                                                            <span class="font-italic text-muted">No checklist assigned yet</span>
                                                        @endforelse
                                                    </td>
                                                    <td class="d-flex">
                                                        @if ($shows->inspectionResponse->count() > 0)
                                                            @php
                                                                $reAssignItems = $shows->inspectionChecklists->load('checklistItems')->filter(function ($item) {
                                                                    return str_contains($item->name, 'reasign');
                                                                });
                                                            @endphp
                                                            {{-- @dd($reAssignItems) --}}
                                                            @if ($reAssignItems->count() > 0)
                                                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                                    data-bs-target="#rchecklistModal_">Re assigned</button>
                                                                <!-- Modal for Checklist Items -->
                                                                <div class="modal fade" id="rchecklistModal_" tabindex="-1"
                                                                    role="dialog" aria-labelledby="checklistModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="checklistModalLabel">
                                                                                    Re-assigned Checklist for
                                                                                    {{ $shows->name }}
                                                                                </h5>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal" aria-label="Close">

                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <!-- Inspection Response Form -->
                                                                                <form action="{{ route('responce.store') }}"
                                                                                    enctype="multipart/form-data"
                                                                                    method="POST">
                                                                                    @csrf
                                                                                    <input type="hidden" name="location_id"
                                                                                        value="{{ $shows->id }}"
                                                                                        id="">
                                                                                    @foreach ($reAssignItems as $checklist)
                                                                                        <li
                                                                                            class="text-uppercase font-weight-bold my-2">
                                                                                            {{ $checklist->name }}</li>
                                                                                        <ul>
                                                                                            @foreach ($checklist->checklistItems as $item)
                                                                                                <li class="my-2">
                                                                                                    {{ $item->description }}
                                                                                                    <input type="hidden"
                                                                                                        name="checklist_item_id[]"
                                                                                                        value="{{ $item->id }}"
                                                                                                        id="">
                                                                                                    <input type="hidden"
                                                                                                        name="checklist_id[]"
                                                                                                        value="{{ $checklist->id }}"
                                                                                                        id="">
                                                                                                    <br>
                                                                                                    <label
                                                                                                        for="rating_{{ $item->id }}">Rating:</label>
                                                                                                    <select name="rating[]"
                                                                                                        id="rating_{{ $item->id }}"
                                                                                                        class="form-select">
                                                                                                        <option
                                                                                                            value="green">
                                                                                                            Green</option>
                                                                                                        <option
                                                                                                            value="yellow">
                                                                                                            Yellow</option>
                                                                                                        <option
                                                                                                            value="red">
                                                                                                            Red</option>
                                                                                                    </select>
                                                                                                    <br>
                                                                                                    <label
                                                                                                        for="remarks_{{ $item->id }}">Remarks:</label>
                                                                                                    <textarea class="form-control" name="remarks[]" id="remarks_{{ $item->id }}"></textarea>
                                                                                                </li>
                                                                                            @endforeach

                                                                                        </ul>
                                                                                    @endforeach

                                                                                    <div class="mb-3">
                                                                                        <label for="remarks"
                                                                                            class="form-label">Notes:</label>
                                                                                        <textarea class="form-control" name="notes" id="remarks"></textarea>
                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                for="exampleInputFile">File
                                                                                            </label>
                                                                                            <div class="input-group">
                                                                                                <div class="custom-file">
                                                                                                    <input type="file"
                                                                                                        class="custom-file-input"
                                                                                                        accept=".jpeg, .jpg, .png, .gif, .bmp, .svg, .tiff, .webp, .ico"
                                                                                                        id="exampleInputFile"
                                                                                                        name="file">
                                                                                                    <p class="custom-file-label"
                                                                                                        id="selectedFileName"
                                                                                                        for="exampleInputFile">
                                                                                                        Choose
                                                                                                        file</p>
                                                                                                </div>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <button type="submit"
                                                                                        class="btn btn-success">Submit
                                                                                        Inspection</button>
                                                                                </form>

                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-bs-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            <a class="btn btn-sm  btn-info"
                                                                href="{{ route('responce.show', $shows->id) }}">{{ __('vendor/responce/index.show') }}</a>
                                                            <a class="btn btn-sm mx-2 btn-warning"
                                                                href="{{ route('responce.edit', $shows->id) }}">{{ __('vendor/responce/index.edit') }}</a>

                                                                @elseif ($shows->inspectionChecklists->count() > 0)
                                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                                data-bs-target="#achecklistModal_{{ $shows->id }}">Submit Responce</button>
                                                            <!-- Modal for Checklist Items -->
                                                            <div class="modal fade"
                                                                id="achecklistModal_{{ $shows->id }}" tabindex="-1"
                                                                role="dialog" aria-labelledby="checklistModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="checklistModalLabel">
                                                                                Checklist Items for {{ $shows->name }}
                                                                            </h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal" aria-label="Close">

                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <!-- Inspection Response Form -->
                                                                            <form action="{{ route('responce.store') }}"
                                                                                enctype="multipart/form-data"
                                                                                method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="location_id"
                                                                                    value="{{ $shows->id }}"
                                                                                    id="">
                                                                                @foreach ($shows->inspectionChecklists as $checklist)
                                                                                    <li
                                                                                        class="text-uppercase font-weight-bold my-2">
                                                                                        {{ $checklist->name }}</li>
                                                                                    <ul>
                                                                                        @foreach ($checklist->checklistItems as $item)
                                                                                            <li class="my-2">
                                                                                                {{ $item->description }}
                                                                                                <input type="hidden"
                                                                                                    name="checklist_item_id[]"
                                                                                                    value="{{ $item->id }}"
                                                                                                    id="">
                                                                                                <input type="hidden"
                                                                                                    name="checklist_id[]"
                                                                                                    value="{{ $checklist->id }}"
                                                                                                    id="">
                                                                                                <br>
                                                                                                <label
                                                                                                    for="rating_{{ $item->id }}">Rating:</label>
                                                                                                <select name="rating[]"
                                                                                                    id="rating_{{ $item->id }}"
                                                                                                    class="form-select">
                                                                                                    <option value="green">
                                                                                                        Green</option>
                                                                                                    <option value="yellow">
                                                                                                        Yellow</option>
                                                                                                    <option value="red">
                                                                                                        Red</option>
                                                                                                </select>
                                                                                                <br>
                                                                                                <label
                                                                                                    for="remarks_{{ $item->id }}">Remarks:</label>
                                                                                                <textarea class="form-control" name="remarks[]" id="remarks_{{ $item->id }}"></textarea>
                                                                                                <br>
                                                                                                <div>

                                                                                                    <input type="file"
                                                                                                        class="form-control"
                                                                                                        accept=".jpeg, .jpg, .png, .gif, .bmp, .svg, .tiff, .webp, .ico"
                                                                                                        id="exampleInputFile"
                                                                                                        name="files[]">



                                                                                                </div>
                                                                                            </li>
                                                                                        @endforeach

                                                                                    </ul>
                                                                                @endforeach

                                                                                <div class="mb-3">
                                                                                    <label for="remarks"
                                                                                        class="form-label">Notes:</label>
                                                                                    <textarea class="form-control" name="notes" id="remarks"></textarea>
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputFile">File
                                                                                        </label>
                                                                                        <div class="input-group">
                                                                                            <div class="custom-file">
                                                                                                <input type="file"
                                                                                                    class="custom-file-input"
                                                                                                    accept=".jpeg, .jpg, .png, .gif, .bmp, .svg, .tiff, .webp, .ico"
                                                                                                    id="exampleInputFile"
                                                                                                    name="notesFile">
                                                                                                <p class="custom-file-label"
                                                                                                    id="selectedFileName"
                                                                                                    for="exampleInputFile">
                                                                                                    Choose
                                                                                                    file</p>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <button type="submit"
                                                                                    class="btn btn-success">Submit
                                                                                    Inspection</button>
                                                                            </form>

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        @endif
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


    <script>
        const fileInput = document.getElementById('exampleInputFile');

        const selectedFileName = document.getElementById('selectedFileName');

        fileInput.addEventListener('change', function() {
            if (fileInput.files && fileInput.files[0]) {
                selectedFileName.textContent = fileInput.files[0].name;
            } else {
                selectedFileName.textContent = 'No file selected';
            }
        });
    </script>
@endsection
