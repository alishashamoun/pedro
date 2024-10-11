@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' :  'manager.layouts.app' )



@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Job Prority</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Job Prority</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
    <div class="container-fluid">

        <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-header">
                  <form action="{{ route('job-priority.store') }}" method="POST">
                    @csrf
                        <div>
                            <label for="title">Name:</label>
                            <input type="text" name="name" class="form-control" id="title" required>
                        </div>
                        </br>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                                <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                  </div>
              </div>
          </div>
        </div>
    </div>
</section>

</div>
@endsection
