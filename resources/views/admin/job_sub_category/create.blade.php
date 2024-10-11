@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' :  'manager.layouts.app' )



@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Sub Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Sub Category</li>
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
                  <form action="{{ route('job-sub-category.store') }}" method="POST">
                    @csrf
                        <div>
                            <label for="title">Name:</label>
                            <input type="text" name="name" class="form-control" id="title" required>
                        </div>
                       </br>
                       <select name="job_cat_id" class="form-control">
                          <option value="">select Category</option>
                          @foreach($job_category as $cat)
                          <option value="{{$cat->id}}">{{$cat->name}}</option>
                          @endforeach
                      </select>
                      </br>
                      <div>
                            <label for="title">Description:</label>
                            <textarea type="text" name="description" class="form-control" id="title"></textarea>
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
