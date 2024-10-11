@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' :  'manager.layouts.app' )



@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Show Job Prority</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('job-priority.index') }}"> Back</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $job_priority->name }}
                </div>
            </div>

        </div>
    </section>
</div>
@endsection
