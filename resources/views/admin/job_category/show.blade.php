@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' :  'manager.layouts.app' )

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">Job Category Details</h2>
                    <a href="{{ route('job-category.index') }}" class="btn btn-primary">Back to List</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Job Category Info -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Job Category Information</h3>
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-3">Name:</dt>
                            <dd class="col-sm-9">{{ $job_category->name }}</dd>
                            <dt class="col-sm-3">Description:</dt>
                            <dd class="col-sm-9">{{ $job_category->description }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
