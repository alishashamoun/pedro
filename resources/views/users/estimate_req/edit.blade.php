@extends('users.layouts.app')

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
                        <h1>{{ __('user/inspecrequest/index.estimate_request') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ __('user/inspecrequest/index.estimate_request') }}</li>
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
                                <form method="POST" action="{{ route('estimate_request.update',$estimate->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="first_name">{{ __('user/inspecrequest/index.first_name') }}</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" required value="{{ old('first_name', $estimate->first_name) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name">{{ __('user/inspecrequest/index.last_name') }}</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" required value="{{ old('last_name', $estimate->last_name) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_number">{{ __('user/inspecrequest/index.phone_number') }}</label>
                                        <input type="tel" class="form-control" id="phone_number" name="phone_number" required value="{{ old('phone_number', $estimate->phone_number) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">{{ __('user/inspecrequest/index.email') }}</label>
                                        <input type="email" class="form-control" id="email" name="email" required value="{{ old('email', $estimate->email) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="street_address">{{ __('user/inspecrequest/index.street_address') }}</label>
                                        <input type="text" class="form-control" id="street_address" name="street_address" required value="{{ old('street_address', $estimate->street_address) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="city">{{ __('user/inspecrequest/index.city') }}</label>
                                        <input type="text" class="form-control" id="city" name="city" required value="{{ old('city', $estimate->city) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="state">{{ __('user/inspecrequest/index.state') }}</label>
                                        <input type="text" class="form-control" id="state" name="state" required value="{{ old('state', $estimate->state) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="zip_code">{{ __('user/inspecrequest/index.zip_code') }}</label>
                                        <input type="text" class="form-control" id="zip_code" name="zip_code" required value="{{ old('zip_code', $estimate->zip_code) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="details">Please Enter Details of Requested Work and/or Description of Problem</label>
                                        <textarea class="form-control" id="details" name="details" rows="3">{{ old('details', $estimate->details) }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="picture">Picture(if any)</label>
                                        <input type="file" class="form-control-file" id="picture" name="picture">
                                    </div>
                                    @if (isset($estimate->picture))
                                    <div class="col-md-4">
                                        <div class="card mb-4">
                                            <img src="{{ asset('storage/' .$estimate->picture) }}" class="card-img-top"
                                                >
                                            <div class="card-body">
                                                <a href="{{ asset('storage/' .$estimate->picture) }}" target="blank">{{ basename($estimate->picture) }}</a>

                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    <button type="submit" class="btn btn-success">Update Request</button>
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
