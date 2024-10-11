@extends('vendor.layouts.app')


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> {{ __('vendor/problem/index.problem_reporting') }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{ __('vendor/problem/index.create_new_report') }}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">


        <div class="container mt-5">
            <form action="{{ route('userproblem.store') }}" method="post">
                @csrf

                <div class="form-group">
                     <label for="job"> {{ __('vendor/problem/index.job') }} :</label>
                    <select name="job" id="job" class="form-control">
                        <option value="">Select Job</option>
                        @foreach ($job as $cust)
                            <option value="{{ $cust->id }}" >
                                {{ $cust->name }}
                            </option>
                        @endforeach
                    </select>
                </div>



                <div class="form-group">
                    <label for="location"> {{ __('vendor/problem/index.location') }} :</label>
                    <input type="text" name="location" id="location" class="form-control">
                </div>



                <div class="form-group">
                    <label for="location_supervisor"> {{ __('vendor/problem/index.location_supervisor') }} :</label>
                    <input type="text" name="location_supervisor" id="location_supervisor" class="form-control">
                </div>

               

                <div class="form-group">
                    <label for="problem_date">{{ __('vendor/problem/index.problem_date') }}:</label>
                    <input type="date" name="problem_date" id="problem_date" class="form-control">
                </div>

                <div class="form-group">
                    <label for="type_of_problem">{{ __('vendor/problem/index.type_of_problem') }}:</label>
                    <select name="type_of_problem" id="type_of_problem" class="form-control">
                        <option value="critical">Critical</option>
                        <option value="high">High</option>
                        <option value="medium">Medium</option>
                        <option value="low">Low</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="description_of_problem">{{ __('vendor/problem/index.description_of_problem') }}:</label>
                    <textarea name="description_of_problem" id="description_of_problem" class="form-control" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label for="investigator_of_problem">{{ __('vendor/problem/index.investigator_of_problem') }}:</label>
                    <input type="text" name="investigator_of_problem" id="investigator_of_problem" class="form-control">
                </div>

                <div class="form-group">
                    <label for="result_of_investigation">{{ __('vendor/problem/index.result_of_investigation') }} :</label>
                    <textarea name="result_of_investigation" id="result_of_investigation" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="suggestions">{{ __('vendor/problem/index.suggestions') }}:</label>
                    <textarea name="suggestions" id="suggestions" class="form-control"></textarea>
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

</section>

</div>
@endsection
