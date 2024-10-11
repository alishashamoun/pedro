@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' : 'manager.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('admin/work_order/show.add_images_and_notes') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">{{ __('admin/work_order/show.home') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('admin/work_order/show.add_images_and_notes') }}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>{{ __('admin/work_order/show.whoops') }}!</strong>
                        {{ __('admin/work_order/show.there_were_some_problems_with_your_input') }}.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="container">
                    <h1 class="mt-5">{{ __('admin/work_order/show.upload_files') }}</h1>

                    <form action="{{ route('vendor.upload', $workOrders->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mt-4">
                            <label for="files">{{ __('admin/work_order/show.select_files') }}</label>
                            <input type="file" name="files[]" id="files" multiple accept=".jpg,.png,.jpeg"
                                class="form-control-file">
                        </div>

                        <div class="form-group mt-4">
                            <label for="note">{{ __('admin/work_order/show.notes') }}</label>
                            <textarea name="notes" id="note" class="form-control" rows="4">{{ $workOrders->notes }}</textarea>
                        </div>

                        <button type="submit"
                            class="btn btn-primary mt-4">{{ __('admin/work_order/show.upload') }}</button>
                    </form>

                    <!-- Display uploaded images and provide delete buttons -->
                    @if (isset($workOrders->files) && count($workOrders->files) > 0)
                        <div class="mt-5">
                            <h2>{{ __('admin/work_order/show.uploaded_images') }}</h2>
                            <div class="row">
                                @foreach ($workOrders->files as $file)
                                    <div class="col-md-4">
                                        <div class="card mb-4">
                                            <img src="{{ $file->filename }}" class="card-img-top"
                                                alt="{{ $file->original_name }}">
                                            <div class="card-body">
                                                {{-- <p class="card-text">{{ $file->filename }}</p> --}}
                                                <form action="{{ route('vendor.delete', $file->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('{{ __('admin/work_order/show.are_you_sure') }}')">{{ __('admin/work_order/show.delete_image') }}</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

            </div>

        </section>
    </div>
@endsection
