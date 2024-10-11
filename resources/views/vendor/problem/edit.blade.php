@extends('vendor.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('vendor/problem/index.edit_problem_report') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ __('vendor/problem/index.edit_report') }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container mt-5">
            <form action="{{ route('userproblem.update', $problemReport->id) }}" method="post">
                @csrf
                @method('PUT') <!-- Use the PUT method for updating -->

                <div class="form-group">
                    <label for="job">{{ __('vendor/problem/index.job') }}:</label>
                    <select name="job" id="job" class="form-control">
                        <option value="">Select Job</option>
                        @foreach ($job as $cust)
                            <option value="{{ $cust->id }}" {{ isset($problemReport) && old('job', $problemReport->job) == $cust->id ? 'selected' : '' }}>
                                {{ $cust->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="location">{{ __('vendor/problem/index.location') }}:</label>
                    <input type="text" name="location" id="location" class="form-control" value="{{ old('location', isset($problemReport) ? $problemReport->location : '') }}">
                </div>



                <div class="form-group">
                    <label for="location_supervisor">{{ __('vendor/problem/index.location_supervisor') }}:</label>
                    <input type="text" name="location_supervisor" id="location_supervisor" class="form-control" value="{{ old('location_supervisor', isset($problemReport) ? $problemReport->location_supervisor : '') }}">
                </div>

               

                <div class="form-group">
                    <label for="problem_date">{{ __('vendor/problem/index.problem_date') }}:</label>
                    <input type="date" name="problem_date" id="problem_date" class="form-control" value="{{ old('problem_date', isset($problemReport) ? $problemReport->problem_date : '') }}">
                </div>

                <div class="form-group">
                    <label for="type_of_problem">{{ __('vendor/problem/index.type_of_problem') }}:</label>
                    <select name="type_of_problem" id="type_of_problem" class="form-control">
                        <option value="critical" {{ old('type_of_problem', isset($problemReport) ? $problemReport->type_of_problem : '') == 'critical' ? 'selected' : '' }}>Critical</option>
                        <option value="high" {{ old('type_of_problem', isset($problemReport) ? $problemReport->type_of_problem : '') == 'high' ? 'selected' : '' }}>High</option>
                        <option value="medium" {{ old('type_of_problem', isset($problemReport) ? $problemReport->type_of_problem : '') == 'medium' ? 'selected' : '' }}>Medium</option>
                        <option value="low" {{ old('type_of_problem', isset($problemReport) ? $problemReport->type_of_problem : '') == 'low' ? 'selected' : '' }}>Low</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="description_of_problem">{{ __('vendor/problem/index.description_of_problem') }}:</label>
                    <textarea name="description_of_problem" id="description_of_problem" class="form-control" rows="4">{{ old('description_of_problem', isset($problemReport) ? $problemReport->description_of_problem : '') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="investigator_of_problem">{{ __('vendor/problem/index.investigator_of_problem') }}:</label>
                    <input type="text" name="investigator_of_problem" id="investigator_of_problem" class="form-control" value="{{ old('investigator_of_problem', isset($problemReport) ? $problemReport->investigator_of_problem : '') }}">
                </div>

                <div class="form-group">
                    <label for="result_of_investigation">{{ __('vendor/problem/index.result_of_investigation') }}:</label>
                    <textarea name="result_of_investigation" id="result_of_investigation" class="form-control">{{ old('result_of_investigation', isset($problemReport) ? $problemReport->result_of_investigation : '') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="suggestions">{{ __('vendor/problem/index.suggestions') }}:</label>
                    <textarea name="suggestions" id="suggestions" class="form-control">{{ old('suggestions', isset($problemReport) ? $problemReport->suggestions : '') }}</textarea>
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success">{{ __('vendor/problem/index.update') }}</button>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
