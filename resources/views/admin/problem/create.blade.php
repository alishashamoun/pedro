@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' : 'manager.layouts.app')



@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('admin/problem/show.problem_report_title') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Create New Report</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">


            <div class="container mt-5">
                <form action="{{ route('problem.store') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="job">{{ __('admin/problem/show.job') }}:</label>
                        <select name="job" id="job" class="form-control">
                            <option value="">Select {{ __('admin/problem/show.job') }}</option>
                            @foreach ($job as $cust)
                                <option value="{{ $cust->id }}">
                                    {{ $cust->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>



                    <div class="form-group">
                        <label for="location">{{ __('admin/problem/show.location') }}</label>
                        <input type="text" name="location" id="location" class="form-control"
                            value="{{ old('location') }}">
                    </div>



                    <div class="form-group">
                        <label for="location_supervisor">{{ __('admin/problem/show.location_supervisor') }}</label>
                        <input type="text" name="location_supervisor" id="location_supervisor" class="form-control"
                            value="{{ old('location_supervisor') }}">
                    </div>


                    <div class="form-group">
                        <label for="problem_date">{{ __('admin/problem/show.problem_date') }}</label>
                        <input type="date" name="problem_date" id="problem_date" class="form-control"
                            value="{{ old('problem_date') }}">
                    </div>

                    <div class="form-group">
                        <label for="type_of_problem">{{ __('admin/problem/show.type_of_problem') }}</label>
                        <select name="type_of_problem" id="type_of_problem" class="form-control">
                            <option value="critical" {{ old('type_of_problem') == 'critical' ? 'selected' : '' }}>
                                {{ __('admin/problem/show.critical') }}</option>
                            <option value="high" {{ old('type_of_problem') == 'high' ? 'selected' : '' }}>
                                {{ __('admin/problem/show.high') }}</option>
                            <option value="medium" {{ old('type_of_problem') == 'medium' ? 'selected' : '' }}>
                                {{ __('admin/problem/show.medium') }}</option>
                            <option value="low" {{ old('type_of_problem') == 'low' ? 'selected' : '' }}>
                                {{ __('admin/problem/show.low') }}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="description_of_problem">{{ __('admin/problem/show.description_of_problem') }}</label>
                        <textarea name="description_of_problem" id="description_of_problem" class="form-control" rows="4">{{ old('description_of_problem') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="investigator_of_problem">{{ __('admin/problem/show.investigator_of_problem') }}</label>
                        <input type="text" name="investigator_of_problem" id="investigator_of_problem"
                            class="form-control" value="{{ old('investigator_of_problem') }}">
                    </div>

                    <div class="form-group">
                        <label for="result_of_investigation">{{ __('admin/problem/show.result_of_investigation') }}</label>
                        <textarea name="result_of_investigation" id="result_of_investigation" class="form-control">{{ old('result_of_investigation') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="suggestions">{{ __('admin/problem/show.suggestions') }}</label>
                        <textarea name="suggestions" id="suggestions" class="form-control">{{ old('suggestions') }}</textarea>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </section>

    </div>
@endsection
