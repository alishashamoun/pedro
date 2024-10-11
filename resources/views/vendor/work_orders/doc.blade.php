@extends('vendor.layouts.app')


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add images and notes</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add images and notesr</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="container">
                    <h1 class="mt-5">Upload Files</h1>

                    <form action="{{ route('vendor.upload', $workOrders->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mt-4">
                            <label for="files">Select Files</label>
                            <input type="file" name="files[]" id="files" multiple accept=".jpg, .png, .jpeg"
                                class="form-control-file">
                        </div>

                        <div class="form-group mt-4">
                            <label for="note">Notes</label>
                            <textarea name="notes" id="note" class="form-control" rows="4">{{ $workOrders->notes }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary mt-4">Upload</button>
                    </form>

                    <!-- Display uploaded images and provide delete buttons -->
                    @if (isset($workOrders->files) && count($workOrders->files) > 0)
                        <div class="mt-5">
                            <h2>Uploaded Images</h2>
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
                                                        onclick="return confirm('Are you sure you want to Delete this Image?')">Delete</button>
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
         </div>
    </section>

    </div>
@endsection
