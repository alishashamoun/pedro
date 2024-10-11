@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' : 'manager.layouts.app')


<style>
    label {
        display: inline-block;
        margin-bottom: 0.5rem;
        margin-top: 18px;
    }
</style>
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('admin/estimatereq/index.edit_estimate_request') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ __('admin/estimatereq/index.edit_estimate_request') }}</li>
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
                                <form method="POST" action="{{ route('estimate_requests.update', $estimate->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="first_name">{{ __('admin/estimatereq/index.first_name') }}</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name"
                                            required value="{{ old('first_name', $estimate->first_name) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name">{{ __('admin/estimatereq/index.last_name') }}</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" required
                                            value="{{ old('last_name', $estimate->last_name) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_number">{{ __('admin/estimatereq/index.phone_number') }}</label>
                                        <input type="tel" class="form-control" id="phone_number" name="phone_number"
                                            required value="{{ old('phone_number', $estimate->phone_number) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">{{ __('admin/estimatereq/index.email') }}</label>
                                        <input type="email" class="form-control" id="email" name="email" required
                                            value="{{ old('email', $estimate->email) }}">
                                    </div>
                                    <div class="form-group">
                                        <label
                                            for="street_address">{{ __('admin/estimatereq/index.street_address') }}</label>
                                        <input type="text" class="form-control" id="street_address" name="street_address"
                                            required value="{{ old('street_address', $estimate->street_address) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="city">{{ __('admin/estimatereq/index.city') }}</label>
                                        <input type="text" class="form-control" id="city" name="city" required
                                            value="{{ old('city', $estimate->city) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="state">{{ __('admin/estimatereq/index.state') }}</label>
                                        <input type="text" class="form-control" id="state" name="state" required
                                            value="{{ old('state', $estimate->state) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="zip_code">{{ __('admin/estimatereq/index.zip_code') }}</label>
                                        <input type="text" class="form-control" id="zip_code" name="zip_code" required
                                            value="{{ old('zip_code', $estimate->zip_code) }}">
                                    </div>
                                    <div class="form-group">
                                        <label
                                            for="details">{{ __('admin/estimatereq/index.please_enter_details_of_requested_work_and/or_description_of_problem') }}</label>
                                        <textarea class="form-control" id="details" name="details" rows="3">{{ old('details', $estimate->details) }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="picture">{{ __('admin/estimatereq/index.picture(if_any)') }}</label>
                                        <input type="file" class="form-control-file" id="picture" name="picture">
                                    </div>
                                    @if (isset($estimate->picture))
                                        <div class="col-md-4">
                                            <div class="card mb-4">
                                                <img src="{{ asset('storage/' . $estimate->picture) }}"
                                                    class="card-img-top">
                                                <div class="card-body">
                                                    <a href="{{ asset('storage/' . $estimate->picture) }}"
                                                        target="blank">{{ basename($estimate->picture) }}</a>

                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label for="frequency">Frequency</label>
                                        <select class="form-control" id="frequency" name="frequency" required>
                                            <option selected hidden>Select Frequency</option>
                                            <option value="One Time"
                                                {{ old('frequency', $estimate->frequency) == 'One Time' ? 'selected' : '' }}>
                                                One Time</option>
                                            <option value="Daily"
                                                {{ old('frequency', $estimate->frequency) == 'Daily' ? 'selected' : '' }}>
                                                Daily</option>
                                            <option value="Weekly"
                                                {{ old('frequency', $estimate->frequency) == 'Weekly' ? 'selected' : '' }}>
                                                Weekly</option>
                                            <option value="Bi-Weekly"
                                                {{ old('frequency', $estimate->frequency) == 'Bi-Weekly' ? 'selected' : '' }}>
                                                Bi-Weekly</option>
                                            <option value="Monthly"
                                                {{ old('frequency', $estimate->frequency) == 'Monthly' ? 'selected' : '' }}>
                                                Monthly</option>
                                        </select>
                                    </div>
                                    <button type="submit"
                                        class="btn btn-success">{{ __('admin/estimatereq/index.update_request') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>

    </div>
@endsection
