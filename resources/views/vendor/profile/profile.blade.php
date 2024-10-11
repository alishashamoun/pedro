@extends('vendor.layouts.app')

<style>
    /* General Select2 styles */
    .select2-container--default .select2-selection--multiple {
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 5px;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #007bff !important;
        border: 1px solid #006fe6 !important;
        border-radius: 4px !important;
        color: white !important;
        padding: 3px 10px !important;
        margin: 2px 5px 2px 0 !important;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        color: white !important;
        cursor: pointer !important;
        margin-right: 5px !important;
    }

    /* Hover and focus styles */
    .select2-container--default .select2-selection--multiple .select2-selection__choice:hover,
    .select2-container--default .select2-selection--multiple .select2-selection__choice:focus {
        background-color: #0056b3;
        border-color: #0047a1;
    }

    /* Dropdown styles */
    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background-color: #007bff;
        color: white;
    }

    .select2-container--default .select2-results__option[aria-selected=true] {
        background-color: #cce5ff;
        color: #004085;
    }

    .select2-dropdown {
        border-radius: 4px;
    }

    /* Placeholder styles */
    .select2-container--default .select2-selection--multiple .select2-selection__placeholder {
        color: #6c757d;
        font-style: italic;
    }
</style>
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        {{-- <h1>{{ __('vendor/company/index.complete_vendor_profile') }}</h1> --}}
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ __('vendor/company/index.complete_vendor_profile') }}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="container">
            <h1 class="mb-4">{{ __('vendor/company/index.complete_vendor_profile') }}</h1>

            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Vendor Information</h5><br>
                            <dl class="row">
                                <dt class="col-sm-4">{{ __('vendor/company/index.vendor_name') }}:</dt>
                                <dd class="col-sm-8">{{ isset($vendor) ? $vendor->name : '' }}</dd>
                            </dl>
                        </div>
                    </div>
                    {{-- @dd($vendor->services->pluck('name')) --}}
                    <!-- Areas of Work and Services Performed -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">{{ __('vendor/company/index.areas_of_work') }}</h5>
                            <p class="card-text">
                                {{ $vendor->areasOfWork->pluck('name')->join(', ') ?? __('No areas of work listed.') }}
                            </p>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">{{ __('vendor/company/index.services_performed') }}</h5>
                            <p class="card-text">
                                {{ $vendor->services->pluck('name')->join(', ') ?? __('No services performed listed.') }}
                            </p>
                        </div>
                    </div>

                </div>

                <div class="col-md-6">
                    <!-- Upload Documents -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('vendor/company/index.uploaded_documents') }}</h5><br>
                            <form method="POST" action="{{ route('company_profile.update', $vendor->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="areas_of_work">{{ __('vendor/company/index.areas_of_work') }}</label>
                                    @if ($areas->isEmpty())
                                        <p>No areas of work available</p>
                                    @else
                                        <select class="form-control js-example-basic-multiple text-black"
                                            name="areas_of_work[]" id="areas_of_work" multiple="multiple">
                                            @foreach ($areas as $area)
                                                <option value="{{ $area->id }}"
                                                    {{ in_array($area->id, old('areas_of_work', $vendor->areasOfWork->pluck('id')->toArray() ?? [])) ? 'selected' : '' }}>
                                                    {{ $area->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @endif
                                    @error('areas_of_work')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label
                                        for="services_performed">{{ __('vendor/company/index.services_you_perform') }}</label>
                                    @if ($services->isEmpty())
                                        <p>No services available</p>
                                    @else
                                        <select class="form-control js-example-basic-multiple text-black"
                                            name="services_performed[]" id="services_performed" multiple="multiple">
                                            @foreach ($services as $service)
                                                <option value="{{ $service->id }}"
                                                    {{ in_array($service->id, old('services_performed', $vendor->services->pluck('id')->toArray() ?? [])) ? 'selected' : '' }}>
                                                    {{ $service->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @endif
                                    @error('services_performed')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="document">{{ __('vendor/company/index.document') }}</label>
                                    <input type="file" id="document" name="document[]" multiple
                                        class="form-control-file">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Uploaded Documents</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Display Uploaded Documents -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('vendor/company/index.uploaded_documents') }}</h5>
                            <ul>
                                @if (isset($vendor->files) && count($vendor->files) > 0)
                                    <div class="mt-5">

                                        <div class="row">
                                            @foreach ($vendor->files as $file)
                                                <div class="col-md-4">
                                                    <div class="card mb-4">
                                                        {{-- <img src="{{ asset('storage/' .$file->filename) }}" class="card-img-top"
                                                        > --}}
                                                        <div class="card-body">
                                                            <a href="{{ asset('storage/' . $file->filename) }}"
                                                                target="_blank">{{ basename($file->filename) }}</a>
                                                            {{-- <p class="card-text">{{ $file->filename }}</p> --}}
                                                            <form
                                                                action="{{ route('company_profile.destroy', $file->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm"
                                                                    onclick="return confirm('Are you sure you want to Delete this?')">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                placeholder: "Select an option",
                allowClear: true
            });
        });
    </script>
@endsection
