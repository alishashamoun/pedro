@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' : 'manager.layouts.app')



@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('admin/technicians/edit.edit_technician') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ __('admin/technicians/edit.edit_technician') }}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>{{ __('admin/technicians/edit.whoops') }}</strong>
                        {{ __('admin/technicians/edit.there_were_some_problems_with_your_input') }}<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <form action="{{ route('technicians.update', $technicians->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="pri_append" id="pri_div">

                                        <div class="row">

                                            <div class="col-sm-6">
                                                <div class="name-main-div">

                                                    <div class="mb-3">
                                                        <label for="exampleInputfirst"
                                                            class="form-label">{{ __('admin/technicians/edit.first_name') }}</label>
                                                        <input type="text" name="fname"
                                                            value="{{ old('fname', $technicians->fname ?? '') }}"
                                                            class="form-control" id="exampleInputfirst"
                                                            placeholder="First Name">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputlast"
                                                            class="form-label">{{ __('admin/technicians/edit.last_name') }}</label>
                                                        <input type="text" name="lname"
                                                            value="{{ old('lname', $technicians->lname ?? '') }}"
                                                            class="form-control" id="exampleInputlast"
                                                            placeholder="Last Name">
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="phone-main-div">
                                                    <div class="col-md-4">
                                                        <label for="number-div"
                                                            class="form-label">{{ __('admin/technicians/edit.phone') }}</label>
                                                        <select class="form-select form-control" name="phone_type"
                                                            aria-label="Default select example" id="number-div">
                                                            <option value="0" disabled selected hidden>
                                                                {{ __('admin/technicians/edit.select_menu') }}
                                                            </option>
                                                            <option value="mobile"
                                                                {{ old('phone_type', isset($technicians) ? $technicians->phone_type : '') == 'phone' ? 'selected' : '' }}>
                                                                {{ __('admin/technicians/edit.mobile') }}</option>
                                                            <option value="telephone"
                                                                {{ old('phone_type', isset($technicians) ? $technicians->phone_type : '') == 'telephone' ? 'selected' : '' }}>

                                                                {{ __('admin/technicians/edit.telephone') }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" name="number"
                                                            value="{{ old('number', $technicians->number ?? '') }}"
                                                            class="form-control" id="number-div" placeholder="433202232323">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="text" name="ext"
                                                            value="{{ old('ext', $technicians->ext ?? '') }}"
                                                            class="form-control" id="number-div" placeholder="Ext">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label for="exampleInputdepartment"
                                                        class="form-label">{{ __('admin/technicians/edit.department') }}</label>
                                                    <input type="text" name="department"
                                                        value="{{ old('department', $technicians->department ?? '') }}"
                                                        class="form-control" id="exampleInputdepartment"
                                                        placeholder="Department">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label for="exampleInputjob"
                                                        class="form-label">{{ __('admin/technicians/edit.job_title') }}</label>
                                                    <input type="text" name="job_title"
                                                        value="{{ old('job_title', $technicians->job_title ?? '') }}"
                                                        class="form-control" id="exampleInputjob" placeholder="Job title">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="email-address-div">
                                                    <div class="col-md-4">
                                                        <label for="email-div"
                                                            class="form-label">{{ __('admin/technicians/edit.email') }}</label>
                                                        <select class="form-select form-control" name="email_type"
                                                            aria-label="Default select example" id="email-div">
                                                            <option value="0" disabled hidden>
                                                                {{ __('admin/technicians/edit.select') }}
                                                            </option>
                                                            <option value="personal"
                                                                {{ old('email_type', isset($technicians) ? $technicians->email_type : '') == 'personal' ? 'selected' : '' }}>
                                                                {{ __('admin/technicians/edit.personal') }}</option>
                                                            <option
                                                                value="company"{{ old('email_type', isset($technicians) ? $technicians->email_type : '') == 'company' ? 'selected' : '' }}>
                                                                {{ __('admin/technicians/edit.company') }}</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="email"
                                                            id="number-div"
                                                            value="{{ old('email', $technicians->email ?? '') }}"
                                                            placeholder="abc@gmail.com">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-sm-2">
                                                <div class="mb-3">
                                                    <label for="flexRadioDefaultd"
                                                        cldss="form-label">{{ __('admin/technicians/edit.billing_address') }}</label>
                                                    <select class="form-select form-control" name="billing_address"
                                                        aria-label="Default select example">
                                                        <option value="yes"
                                                            {{ old('billing_address', $technicians->billing_address) == 'yes' ? 'selected' : '' }}>
                                                            {{ __('admin/technicians/edit.yes') }}</option>
                                                        <option value="no"
                                                            {{ old('billing_address', $technicians->billing_address) == 'no' ? 'selected' : '' }}>
                                                            No</option>
                                                        <option value="no">{{ __('admin/technicians/edit.no') }}
                                                        </option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="mb-3">
                                                    <label for="email-div"
                                                        class="form-label">{{ __('admin/technicians/edit.contact') }}</label>
                                                    <select class="form-select form-control" name="contact_type"
                                                        aria-label="Default select example">
                                                        <option value="0" disabled>
                                                            {{ __('admin/technicians/edit.select_contact') }}</option>
                                                        <option value="contact 1"
                                                            {{ old('contact_type', $technicians->contact_type) == 'contact 1' ? 'selected' : '' }}>
                                                            contact 1</option>
                                                        <option value="contact 2"
                                                            {{ old('contact_type', $technicians->contact_type) == 'contact 2' ? 'selected' : '' }}>
                                                            contact 2</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="mb-3">
                                                    <label for="flexRadioDefaulte"
                                                        cldss="form-label">{{ __('admin/technicians/edit.active') }}</label>
                                                    <select class="form-select form-control" name="active"
                                                        aria-label="Default select example">
                                                        <option value="yes"
                                                            {{ old('active', $technicians->active) == 'yes' ? 'selected' : '' }}>
                                                            Yes</option>
                                                        <option value="no"
                                                            {{ old('active', $technicians->active) == 'no' ? 'selected' : '' }}>
                                                            No</option>
                                                        <option value="no">No</option>
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="location-div">
                                                    <div class="row">

                                                        <div class="col-sm-4">
                                                            <div class="mb-3">
                                                                <label for="exampleInputstreet"
                                                                    class="form-label">{{ __('admin/technicians/edit.street_address') }}</label>
                                                                <input type="text" name="address"
                                                                    value="{{ old('address', $technicians->address) }}"
                                                                    class="form-control" id="exampleInputstreet"
                                                                    placeholder="Street Address or Latitude, Longitude">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="mb-3">
                                                                <label for="exampleInputapt"
                                                                    class="form-label">{{ __('admin/technicians/edit.apt_suite_unit') }}</label>
                                                                <input type="text" name="aptNo"
                                                                    value="{{ old('aptNo', $technicians->aptNo) }}"
                                                                    class="form-control" id="exampleInputapt"
                                                                    placeholder="Apt Suite Unit #">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="mb-3">
                                                                <label for="exampleInputcity"
                                                                    class="form-label">{{ __('admin/technicians/edit.city') }}</label>
                                                                <input type="text" name="city" class="form-control"
                                                                    value="{{ old('city', $technicians->city) }}"
                                                                    id="exampleInputcity" placeholder="City Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="mb-3">
                                                                <label for="exampleInputstate"
                                                                    class="form-label">{{ __('admin/technicians/edit.state_province') }}</label>
                                                                <input type="text" name="state" class="form-control"
                                                                    value="{{ old('state', $technicians->state) }}"
                                                                    id="exampleInputstate" placeholder="State Province">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="mb-3">
                                                                <label for="exampleInputzip"
                                                                    class="form-label">{{ __('admin/technicians/edit.zip_postal_code') }}</label>
                                                                <input type="text" name="zip" class="form-control"
                                                                    value="{{ old('zip', $technicians->zip) }}"
                                                                    id="exampleInputzip" placeholder="Zip Postal Code">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <button type="submit"
                                            class="btn btn-primary">{{ __('admin/technicians/edit.submit') }}</button>
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
