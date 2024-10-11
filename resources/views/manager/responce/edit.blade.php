@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' : (Auth::user()->hasRole('vendor') ? 'vendor.layouts.app' : (Auth::user()->hasRole('account manager') ? 'manager.layouts.app' : (Auth::user()->hasRole('User') ? 'users.layouts.app' : 'default.app'))))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('vendor/responce/index.edit_checklist_item_for_job') }} {{ $shows->name }}</div>

                    <div class="card-body">
                        <!-- Edit Response Form -->
                        <form action="{{ route('responce.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <input type="hidden" name="location_id" value="{{ $shows->id }}">
                            @foreach ($shows->inspectionResponse as $item)
                                <input type="hidden" name="checklist_id[]" value="{{ $item->checklist_id }}"
                                    id="">
                                <input type="hidden" name="checklist_item_id[]" value="{{ $item->checklist_item_id }}">
                                <div class="mb-3">
                                    <label for="rating_{{ $item->id }}" class="form-label">
                                        {{ $item->checklistItem->description ?? '' }}
                                    </label>
                                    <select name="rating[]" id="rating_{{ $item->id }}" class="form-select">
                                        <option
                                            {{ old('rating', isset($item->rating) ? $item->rating : '') == 'green' ? 'selected' : '' }}
                                            value="green">Green</option>
                                        <option
                                            {{ old('rating', isset($item->rating) ? $item->rating : '') == 'yellow' ? 'selected' : '' }}
                                            value="yellow">Yellow</option>
                                        <option
                                            {{ old('rating', isset($item->rating) ? $item->rating : '') == 'red' ? 'selected' : '' }}
                                            value="red">Red</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="remarks_{{ $item->id }}" class="form-label">{{ __('vendor/responce/index.remarks') }}:</label>
                                    <textarea class="form-control" name="remarks[]" id="remarks_{{ $item->id }}">{{ isset($item->remarks) ? old('remarks', $item->remarks) : '' }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group">
                                        <input type="file" class="form-control"
                                            accept=".jpeg, .jpg, .png, .gif, .bmp, .svg, .tiff, .webp, .ico"
                                            id="exampleInputFile" name="files[]">
                                        @if (isset($item->file_path))
                                            <div class="input-group-append">
                                                <a href="{{ asset('storage/' . $item->file_path) }}" target="blank">

                                                    <img src="{{ asset('storage/' . $item->file_path) }}" alt=""
                                                        srcset="" class="img-thumbnail" style="max-width: 100px">
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach

                            <div class="mb-3">
                                <label for="notes" class="form-label">{{ __('vendor/responce/index.notes') }}:</label>
                                <textarea class="form-control" name="notes" id="notes">{{ isset($item->notess->notes) ? old('notes', $item->notess->notes) : '' }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="file">{{ __('vendor/responce/index.file') }}</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file"
                                            accept=".jpeg, .jpg, .png, .gif, .bmp, .svg, .tiff, .webp, .ico"
                                            class="custom-file-input" id="file" name="notesFile">
                                        <label class="custom-file-label" id="selectedFileName" for="file">Choose
                                            file</label>
                                    </div>
                                </div>
                            </div>

                            @if (isset($item->notess->file))
                                <img src="{{ asset('storage/' . $item->notess->file) }}" alt="" srcset=""
                                    class="img-fluid" style="max-width: 200px">
                            @endif
                            <br>
                            <div class="mt-4">

                                <button type="submit" class="btn btn-success">Update Inspection</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
