@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' : 'manager.layouts.app')



@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('admin/customer/edit.edit_customer') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ __('admin/customer/edit.edit_customer') }}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
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
                                <form action="{{ route('customer.update', $user->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="inner-section py-3">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="div-a">

                                                    </div>
                                                </div>
                                                <div class="col-sm-6 float-1">
                                                    <button type="submit" class="add-new">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="inner-section-2">
                                        <div class="container">
                                            <div class="form-div">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="mb-3">
                                                            <label for="exampleInputcustomer"
                                                                class="form-label">{{ __('admin/customer/edit.customer_name') }}</label>
                                                            <input type="text" class="form-control" name="customer_name"
                                                                id="exampleInputcustomer"
                                                                value="{{ old('customer_name', $user->name ?? '') }}"
                                                                placeholder="Customer Name">
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-3">
                                                        <div class="mb-3">
                                                            <label for="flexRadioDefault3"
                                                                class="form-label">{{ __('admin/customer/edit.service_agreement') }}
                                                                ?</label>
                                                            <select class="form-select form-control"
                                                                name="service_agreement" aria-label="Default select example"
                                                                id="email-div">
                                                                <option value="yes"
                                                                    {{ old('service_agreement', $user->customer->service_agreement ?? '') == 'yes' ? 'selected' : '' }}>
                                                                    Yes</option>
                                                                <option value="no"
                                                                    {{ old('service_agreement', $user->customer->service_agreement ?? '') == 'no' ? 'selected' : '' }}>
                                                                    No</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="mb-3">
                                                            <label for="exampleInputacount"
                                                                class="form-label">{{ __('admin/customer/edit.account_number') }}</label>
                                                            <input type="text" name="acnum" class="form-control"
                                                                value="{{ old('acnum', $user->customer->acnum ?? '') }}"
                                                                id="exampleInputaccount" placeholder="Account number">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="mb-3">
                                                            <label for="flexRadioDefault5"
                                                                class="form-label">{{ __('admin/customer/edit.active') }}
                                                                ?</label>
                                                            <select class="form-select form-control" name="activeCustomer"
                                                                aria-label="Default select example" id="email-div">
                                                                <option value="yes"
                                                                    {{ old('activeCustomer', $user->customer->activeCustomer ?? '') == 'yes' ? 'selected' : '' }}>
                                                                    Yes</option>
                                                                <option value="no"
                                                                    {{ old('activeCustomer', $user->customer->activeCustomer ?? '') == 'no' ? 'selected' : '' }}>
                                                                    No</option>
                                                                <option value="no">No</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="inner-header bg-light pt-2 pb-2">
                                                            <h3 class="primary">
                                                                {{ __('admin/customer/edit.primary_contact') }}</h3>
                                                            <button class="add-more-btn" id="add-pri"
                                                                type="button">&#43;Add
                                                                {{ __('admin/customer/edit.primary_contact') }}</button>
                                                        </div>
                                                    </div>

                                                    <div class="pri_append" id="pri_div">

                                                        <div class="row">

                                                            <div class="col-sm-6">
                                                                <div class="name-main-div">

                                                                    <div class="mb-3">
                                                                        <label for="exampleInputfirst"
                                                                            class="form-label">{{ __('admin/customer/edit.first_name') }}</label>
                                                                        <input type="text" name="fname[]"
                                                                            value="{{ old('fname', $user->pricontact[0]->fname ?? '') }}"
                                                                            class="form-control" id="exampleInputfirst"
                                                                            placeholder="First Name">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputlast"
                                                                            class="form-label">{{ __('admin/customer/edit.last_name') }}</label>
                                                                        <input type="text" name="lname[]"
                                                                            value="{{ old('lname', $user->pricontact[0]->lname ?? '') }}"
                                                                            class="form-control" id="exampleInputlast"
                                                                            placeholder="Last Name">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="phone-main-div">
                                                                    <div class="col-md-4">
                                                                        <label for="number-div"
                                                                            class="form-label">{{ __('admin/customer/edit.phone') }}</label>
                                                                        <select class="form-select form-control"
                                                                            name="phone_type[]"
                                                                            aria-label="Default select example"
                                                                            id="number-div">
                                                                            <option value="0" disabled selected
                                                                                hidden>Select Menu</option>
                                                                            <option value="mobile"
                                                                                {{ old('phone_type', isset($user->pricontact[0]) ? $user->pricontact[0]->phone_type : '') == 'phone' ? 'selected' : '' }}>
                                                                                Mobile</option>
                                                                            <option value="telephone"
                                                                                {{ old('phone_type', isset($user->pricontact[0]) ? $user->pricontact[0]->phone_type : '') == 'telephone' ? 'selected' : '' }}>

                                                                                Telephone
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="text" name="number[]"
                                                                            value="{{ old('number', $user->pricontact[0]->number ?? '') }}"
                                                                            class="form-control" id="number-div"
                                                                            placeholder="433202232323">
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <input type="text" name="ext[]"
                                                                            value="{{ old('ext', $user->pricontact[0]->ext ?? '') }}"
                                                                            class="form-control" id="number-div"
                                                                            placeholder="Ext">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">

                                                            <div class="col-sm-3">
                                                                <div class="mb-3">
                                                                    <label for="exampleInputdepartment"
                                                                        class="form-label">{{ __('admin/customer/edit.department') }}</label>
                                                                    <input type="text" name="department[]"
                                                                        value="{{ old('department', $user->pricontact[0]->department ?? '') }}"
                                                                        class="form-control" id="exampleInputdepartment"
                                                                        placeholder="Department">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="mb-3">
                                                                    <label for="exampleInputjob"
                                                                        class="form-label">{{ __('admin/customer/edit.job_title') }}</label>
                                                                    <input type="text" name="job_title[]"
                                                                        value="{{ old('job_title', $user->pricontact[0]->job_title ?? '') }}"
                                                                        class="form-control" id="exampleInputjob"
                                                                        placeholder="Job title">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="email-address-div">
                                                                    <div class="col-md-4">
                                                                        <label for="email-div"
                                                                            class="form-label">{{ __('admin/customer/edit.email') }}</label>
                                                                        <select class="form-select form-control"
                                                                            name="email_type[]"
                                                                            aria-label="Default select example"
                                                                            id="email-div">
                                                                            <option value="0" disabled hidden>select
                                                                            </option>
                                                                            <option value="personal"
                                                                                {{ old('email_type', isset($user->pricontact[0]) ? $user->pricontact[0]->email_type : '') == 'personal' ? 'selected' : '' }}>
                                                                                {{ __('admin/customer/edit.personal_email') }}
                                                                            </option>
                                                                            <option
                                                                                value="company"{{ old('email_type', isset($user->pricontact[0]) ? $user->pricontact[0]->email_type : '') == 'company' ? 'selected' : '' }}>
                                                                                Company</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="text" class="form-control"
                                                                            name="email[]" id="number-div"
                                                                            value="{{ old('email', $user->pricontact[0]->email ?? '') }}"
                                                                            placeholder="abc@gmail.com">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if (count($user->pricontact) > 0)
                                                        @foreach ($user->pricontact as $primary)
                                                            @if (!$loop->first)
                                                                <div class="pri_append" id="pri_div">

                                                                    <div class="row">

                                                                        <div class="col-sm-6">
                                                                            <div class="name-main-div">

                                                                                <div class="mb-3">
                                                                                    <label for="exampleInputfirst"
                                                                                        class="form-label">{{ __('admin/customer/edit.first_name') }}</label>
                                                                                    <input type="text" name="fname[]"
                                                                                        value="{{ old('fname', $primary->fname) }}"
                                                                                        class="form-control"
                                                                                        id="exampleInputfirst"
                                                                                        placeholder="First Name">
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="exampleInputlast"
                                                                                        class="form-label">{{ __('admin/customer/edit.last_name') }}</label>
                                                                                    <input type="text" name="lname[]"
                                                                                        value="{{ old('lname', $primary->lname) }}"
                                                                                        class="form-control"
                                                                                        id="exampleInputlast"
                                                                                        placeholder="Last Name">
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="phone-main-div">
                                                                                <div class="col-md-4">
                                                                                    <label for="number-div"
                                                                                        class="form-label">{{ __('admin/customer/edit.phone') }}</label>
                                                                                    <select
                                                                                        class="form-select form-control"
                                                                                        name="phone_type[]"
                                                                                        aria-label="Default select example"
                                                                                        id="number-div">
                                                                                        <option value="0" disabled
                                                                                            selected hidden>Select Menu
                                                                                        </option>
                                                                                        <option value="mobile"
                                                                                            {{ old('phone_type', $primary->phone_type) == 'mobile' ? 'selected' : '' }}>
                                                                                            Mobile</option>
                                                                                        <option
                                                                                            value="telephone"{{ old('phone_type', $primary->phone_type) == 'telephone' ? 'selected' : '' }}>
                                                                                            Telephone
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <input type="text" name="number[]"
                                                                                        value="{{ old('number', $primary->number) }}"
                                                                                        class="form-control"
                                                                                        id="number-div"
                                                                                        placeholder="433202232323">
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <input type="text" name="ext[]"
                                                                                        value="{{ old('ext', $primary->ext) }}"
                                                                                        class="form-control"
                                                                                        id="number-div" placeholder="Ext">
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">

                                                                        <div class="col-sm-3">
                                                                            <div class="mb-3">
                                                                                <label for="exampleInputdepartment"
                                                                                    class="form-label">{{ __('admin/customer/edit.department') }}</label>
                                                                                <input type="text" name="department[]"
                                                                                    value="{{ old('department', $primary->department) }}"
                                                                                    class="form-control"
                                                                                    id="exampleInputdepartment"
                                                                                    placeholder="Department">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <div class="mb-3">
                                                                                <label for="exampleInputjob"
                                                                                    class="form-label">{{ __('admin/customer/edit.job_title') }}</label>
                                                                                <input type="text" name="job_title[]"
                                                                                    value="{{ old('job_title', $primary->job_title) }}"
                                                                                    class="form-control"
                                                                                    id="exampleInputjob"
                                                                                    placeholder="Job title">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="email-address-div">
                                                                                <div class="col-md-4">
                                                                                    <label for="email-div"
                                                                                        class="form-label">{{ __('admin/customer/edit.email') }}</label>
                                                                                    <select
                                                                                        class="form-select form-control"
                                                                                        name="email_type[]"
                                                                                        aria-label="Default select example"
                                                                                        id="email-div">
                                                                                        <option
                                                                                            value="personal"{{ old('email_type', $primary->email_type) == 'personal' ? 'selected' : '' }}>
                                                                                            {{ __('admin/customer/edit.personal_email') }}
                                                                                        </option>
                                                                                        <option
                                                                                            value="company"{{ old('email_type', $primary->email_type) == 'company' ? 'selected' : '' }}>
                                                                                            Company</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        name="email[]" id="number-div"
                                                                                        value="{{ old('email', $primary->email) }}"
                                                                                        placeholder="abc@gmail.com">
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <a href="{{ route('pri.destroy', $primary->id) }}"
                                                                        class="btn btn-danger mb-4">Delete </a>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    @endif

                                                    <div id="some">
                                                    </div>
                                                    <div class="col-sm-6 align-items-end">
                                                        <label for="email-div"
                                                            class="form-label">{{ __('admin/customer/edit.contact_type') }}</label>
                                                        <select class="form-select form-control" name="contact"
                                                            aria-label="Default select example" id="email-div">
                                                            <option value="billing"
                                                                {{ old('contact', $user->customer->contact ?? '') == 'billing' ? 'selected' : '' }}>
                                                                Billing Contact</option>
                                                            <option value="booking"
                                                                {{ old('contact', $user->customer->contact ?? '') == 'booking' ? 'selected' : '' }}>
                                                                Booking Contact</option>
                                                        </select>

                                                    </div>
                                                    <div class="col-sm-6 align-items-end">
                                                        <label for="email-div"
                                                            class="form-label">{{ __('admin/customer/edit.personal_email') }}</label>
                                                        <input type="email" name="personal_email"
                                                            value="{{ old('email', $user->email)  }}"
                                                            class="form-control" placeholder="personal@gmail.com">

                                                    </div>

                                                    <div class="col-sm-6"></div>
                                                    <div class="col-sm-12">
                                                        <div class="inner-header bg-light pt-2 pb-2">
                                                            <h3 class="primary">
                                                                {{ __('admin/customer/edit.stored_service') }}</h3>
                                                            <button class="add-more-btn" id="add-ser"
                                                                type="button">&#43;Add Another Service</button>
                                                        </div>
                                                    </div>
                                                    @forelse ($user->service as $service)
                                                        <p>

                                                            <br>
                                                        <div class="col-sm-2">
                                                            <div class="mb-3">
                                                                <label for="exampleInputlocation"
                                                                    class="form-label">{{ __('admin/customer/edit.nickname') }}</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ old('nick_name', $service->nick_name) }}"
                                                                    name="nick_name[]" id="exampleInputlocation"
                                                                    placeholder="David Smith">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="mb-3">
                                                                <label for="flexRadioDefaulta"
                                                                    class="form-label">{{ __('admin/customer/edit.primary') }}</label>
                                                                <select class="form-select form-control" name="primary[]"
                                                                    aria-label="Default select example">
                                                                    <option value="yes"
                                                                        {{ old('primary', $service->primary) == 'yes' ? 'selected' : '' }}>
                                                                        Yes</option>
                                                                    <option value="no"
                                                                        {{ old('primary', $service->primary) == 'no' ? 'selected' : '' }}>
                                                                        No</option>
                                                                    <option value="no">No</option>
                                                                </select>

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="mb-3">
                                                                <label for="flexRadioDefaultd"
                                                                    cldss="form-label">{{ __('admin/customer/edit.billing_address') }}</label>
                                                                <select class="form-select form-control"
                                                                    name="billing_address[]"
                                                                    aria-label="Default select example">
                                                                    <option value="yes"
                                                                        {{ old('billing_address', $service->billing_address) == 'yes' ? 'selected' : '' }}>
                                                                        Yes</option>
                                                                    <option value="no"
                                                                        {{ old('billing_address', $service->billing_address) == 'no' ? 'selected' : '' }}>
                                                                        No</option>
                                                                    <option value="no">No</option>
                                                                </select>

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="mb-3">
                                                                <label for="email-div"
                                                                    class="form-label">{{ __('admin/customer/edit.contact') }}</label>
                                                                <select class="form-select form-control"
                                                                    name="contact_type[]"
                                                                    aria-label="Default select example">
                                                                    <option value="0" disabled>Select Contact</option>
                                                                    <option value="contact 1"
                                                                        {{ old('contact_type', $service->contact_type) == 'contact 1' ? 'selected' : '' }}>
                                                                        contact 1</option>
                                                                    <option value="contact 2"
                                                                        {{ old('contact_type', $service->contact_type) == 'contact 2' ? 'selected' : '' }}>
                                                                        contact 2</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="mb-3">
                                                                <label for="flexRadioDefaulte"
                                                                    cldss="form-label">{{ __('admin/customer/edit.active_service') }}</label>
                                                                <select class="form-select form-control"
                                                                    name="active_service[]"
                                                                    aria-label="Default select example">
                                                                    <option value="yes"
                                                                        {{ old('active', $service->active) == 'yes' ? 'selected' : '' }}>
                                                                        Yes</option>
                                                                    <option value="no"
                                                                        {{ old('active', $service->active) == 'no' ? 'selected' : '' }}>
                                                                        No</option>
                                                                    <option value="no">No</option>
                                                                </select>

                                                            </div>
                                                        </div>
                                                        @if (!$loop->first)
                                                            <div class="col-sm-2">
                                                                <a href="{{ route('service.destroy', $service->id) }}"
                                                                    type="button" id="remove-ser"
                                                                    class="add-more-btn mt-4"><i
                                                                        class="fas fa-trash text-danger"></i></a>
                                                            </div>
                                                        @endif
                                                        <div class="col-sm-12">
                                                            <div class="location-div">
                                                                <div class="row">

                                                                    <div class="col-sm-4">
                                                                        <div class="mb-3">
                                                                            <label for="exampleInputstreet"
                                                                                class="form-label">{{ __('admin/customer/edit.street_address') }}</label>
                                                                            <input type="text" name="address[]"
                                                                                value="{{ old('address', $service->address) }}"
                                                                                class="form-control"
                                                                                id="exampleInputstreet"
                                                                                placeholder="Street Address or Latitude, Longitude">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-2">
                                                                        <div class="mb-3">
                                                                            <label for="exampleInputapt"
                                                                                class="form-label">{{ __('admin/customer/edit.apt_suite') }}</label>
                                                                            <input type="text" name="aptNo[]"
                                                                                value="{{ old('aptNo', $service->aptNo) }}"
                                                                                class="form-control" id="exampleInputapt"
                                                                                placeholder="Apt Suite Unit #">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-2">
                                                                        <div class="mb-3">
                                                                            <label for="exampleInputcity"
                                                                                class="form-label">{{ __('admin/customer/edit.city') }}</label>
                                                                            <input type="text" name="city[]"
                                                                                class="form-control"
                                                                                value="{{ old('city', $service->city) }}"
                                                                                id="exampleInputcity"
                                                                                placeholder="City Name">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-2">
                                                                        <div class="mb-3">
                                                                            <label for="exampleInputstate"
                                                                                class="form-label">{{ __('admin/customer/edit.state') }}</label>
                                                                            <input type="text" name="state[]"
                                                                                class="form-control"
                                                                                value="{{ old('state', $service->state) }}"
                                                                                id="exampleInputstate"
                                                                                placeholder="State Province">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-2">
                                                                        <div class="mb-3">
                                                                            <label for="exampleInputzip"
                                                                                class="form-label">{{ __('admin/customer/edit.zip') }}</label>
                                                                            <input type="text" name="zip[]"
                                                                                class="form-control"
                                                                                value="{{ old('zip', $service->zip) }}"
                                                                                id="exampleInputzip"
                                                                                placeholder="Zip Postal Code">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </p>
                                                    @empty
                                                        <p id="">
                                                        <div class="col-sm-2">
                                                            <div class="mb-3">
                                                                <label for="exampleInputlocation"
                                                                    class="form-label">Nickname</label>
                                                                <input type="text" class="form-control"
                                                                    name="nick_name[]" id="exampleInputlocation"
                                                                    placeholder="David Smith">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="mb-3">
                                                                <label for="flexRadioDefaulta"
                                                                    class="form-label">Primary?</label>
                                                                <select class="form-select form-control" name="primary[]"
                                                                    aria-label="Default select example">
                                                                    <option value="yes">Yes</option>
                                                                    <option value="no">No</option>
                                                                </select>

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="mb-3">
                                                                <label for="flexRadioDefaultd" cldss="form-label">Billing
                                                                    Address?</label>
                                                                <select class="form-select form-control"
                                                                    name="billing_address[]"
                                                                    aria-label="Default select example">
                                                                    <option value="yes">Yes</option>
                                                                    <option value="no">No</option>
                                                                </select>

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="mb-3">
                                                                <label for="email-div" class="form-label">Contact</label>
                                                                <select class="form-select form-control"
                                                                    name="contact_type[]"
                                                                    aria-label="Default select example">
                                                                    <option value="0" disabled>Select Contact</option>
                                                                    <option value="contact 1">contact 1</option>
                                                                    <option value="contact 2">contact 2</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="mb-3">
                                                                <label for="flexRadioDefaulte"
                                                                    cldss="form-label">Active?</label>
                                                                <select class="form-select form-control"
                                                                    name="active_service[]"
                                                                    aria-label="Default select example">
                                                                    <option value="yes">Yes</option>
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
                                                                                class="form-label">Street Address or
                                                                                Latitude, Longitude</label>
                                                                            <input type="text" name="address[]"
                                                                                class="form-control"
                                                                                id="exampleInputstreet"
                                                                                placeholder="Street Address or Latitude, Longitude">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-2">
                                                                        <div class="mb-3">
                                                                            <label for="exampleInputapt"
                                                                                class="form-label">Apt/Suite/Unit #</label>
                                                                            <input type="text" name="aptNo[]"
                                                                                class="form-control" id="exampleInputapt"
                                                                                placeholder="Apt Suite Unit #">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-2">
                                                                        <div class="mb-3">
                                                                            <label for="exampleInputcity"
                                                                                class="form-label">City</label>
                                                                            <input type="text" name="city[]"
                                                                                class="form-control" id="exampleInputcity"
                                                                                placeholder="City Name">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-2">
                                                                        <div class="mb-3">
                                                                            <label for="exampleInputstate"
                                                                                class="form-label">State/Province</label>
                                                                            <input type="text" name="state[]"
                                                                                class="form-control"
                                                                                id="exampleInputstate"
                                                                                placeholder="State Province">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-2">
                                                                        <div class="mb-3">
                                                                            <label for="exampleInputzip"
                                                                                class="form-label">Zip/Postal Code</label>
                                                                            <input type="text" name="zip[]"
                                                                                class="form-control" id="exampleInputzip"
                                                                                placeholder="Zip Postal Code">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </p>
                                                    @endforelse

                                                    <p id="ser_append">

                                                    </p>
                                                    <div class="col-sm-12">
                                                        <div class="inner-header bg-light pt-2 pb-2">
                                                            <h3 class="primary">
                                                                {{ __('admin/customer/edit.default_document_templates') }}
                                                            </h3>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label for="estimate-div"
                                                                class="form-label">{{ __('admin/customer/edit.estimate_template') }}</label>
                                                            <select class="form-select form-control"
                                                                name="estimate_template"
                                                                aria-label="Default select example" id="estimate-div">
                                                                <option value="1"
                                                                    {{ old('estimate_template', $user->customer->estimate_template ?? '') == '1' ? 'selected' : '' }}>
                                                                    Default</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label for="job-div"
                                                                class="form-label">{{ __('admin/customer/edit.job_template') }}</label>
                                                            <select class="form-select form-control" name="job_template"
                                                                aria-label="Default select example" id="job-div">
                                                                <option
                                                                    value="1"{{ old('job_template', $user->customer->job_template ?? '') == '1' ? 'selected' : '' }}>
                                                                    Default</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label for="invoice-div"
                                                                class="form-label">{{ __('admin/customer/edit.invoice_template') }}</label>
                                                            <select class="form-select form-control"
                                                                name="invoice_template"
                                                                aria-label="Default select example" id="invoice-div">
                                                                <option value="1"
                                                                    {{ old('invoice_template', $user->customer->invoice_template ?? '') == '1' ? 'selected' : '' }}>
                                                                    Default</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="inner-header bg-light pt-2 pb-2">
                                                            <h3 class="primary">
                                                                {{ __('admin/customer/edit.additional_information') }}</h3>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label for="notes-div"
                                                            class="form-label ">{{ __('admin/customer/edit.internal_notes') }}
                                                            Notes</label>
                                                        <textarea name="notes" class="text-area w-100 form-control" rows="8" id="notes-div"
                                                            placeholder="Internal/Private Notes">{{ old('notes', $user->customer->notes ?? '') }}</textarea>

                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label for="exampleInputcustomertag"
                                                                class="form-label">{{ __('admin/customer/edit.customer_tags') }}</label>
                                                            <input type="text" class="form-control"
                                                                name="customer_tag"
                                                                value="{{ old('customer_tag', $user->customer->customer_tag ?? '') }}"
                                                                id="exampleInputcustomertag" placeholder="Customer Tags">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="referral-div form-control"
                                                                class="form-label">{{ __('admin/customer/edit.referral_source') }}</label>
                                                            <select class="form-select form-control" name="referral"
                                                                aria-label="Default select example" id="referral-div">
                                                                <option
                                                                    value="1"{{ old('referral', $user->customer->referral ?? '') == '1' ? 'selected' : '' }}>
                                                                    Referral 1</option>
                                                                <option
                                                                    value="2"{{ old('referral', $user->customer->referral ?? '') == '2' ? 'selected' : '' }}>
                                                                    Referral 2</option>
                                                            </select>
                                                        </div>


                                                        <div class="mb-3">
                                                            <label for="exampleInputamount"
                                                                class="form-label">{{ __('admin/customer/edit.amount') }}</label>
                                                            <input type="text" name="amount" class="form-control"
                                                                value="{{ old('amount', $user->customer->amount ?? '') }}"
                                                                id="exampleInputamount" placeholder="Amount">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label for="referral-div"
                                                                class="form-label">{{ __('admin/customer/edit.assigned_contract') }}</label>
                                                            <select class="form-select form-control"
                                                                name="assigned_contract"
                                                                aria-label="Default select example" id="referral-div">
                                                                <option
                                                                    value="1"{{ old('assigned_contract', $user->customer->assigned_contract ?? '') == '1' ? 'selected' : '' }}>
                                                                    Contract 1</option>
                                                                <option
                                                                    value="2"{{ old('assigned_contract', $user->customer->assigned_contract ?? '') == '2' ? 'selected' : '' }}>
                                                                    Contract 2</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="flexRadioDefaulttax"
                                                                class="form-label">{{ __('admin/customer/edit.taxable') }}</label>
                                                            <select class="form-select form-control" name="taxable"
                                                                aria-label="Default select example" id="email-div">
                                                                <option value="yes"
                                                                    {{ old('taxable', $user->customer->taxable ?? '') == 'yes' ? 'selected' : '' }}>
                                                                    Yes</option>
                                                                <option value="no"
                                                                    {{ old('taxable', $user->customer->taxable ?? '') == 'no' ? 'selected' : '' }}>
                                                                    No</option>
                                                            </select>

                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="item-div"
                                                                class="form-label">{{ __('admin/customer/edit.tax_item') }}</label>
                                                            <select class="form-select form-control" name="tax_item"
                                                                aria-label="Default select example" id="item-div">
                                                                <option
                                                                    value="1"{{ old('tax_item', $user->customer->tax_item ?? '') == '1' ? 'selected' : '' }}>
                                                                    Tax 1</option>
                                                                <option
                                                                    value="2"{{ old('tax_item', $user->customer->tax_item ?? '') == '2' ? 'selected' : '' }}>
                                                                    Tax 2</option>
                                                            </select>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="exampleInputnumber"
                                                                class="form-label">{{ __('admin/customer/edit.business_tax_id') }}</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $user->customer->bussiness_id ?? '0.00' }}" name="bussiness_id"
                                                                id="exampleInputnumber" placeholder="Business # & Tax ID">
                                                        </div>
                                                        <div class="" id="com_append">

                                                            <div class="agent-inner-div">
                                                                <div class="commission-div">
                                                                    <label for="agent-div"
                                                                        class="form-label">{{ __('admin/customer/edit.assigned_rep') }}</label>
                                                                    <select class="form-select form-control"
                                                                        name="assigned_rep"
                                                                        aria-label="Default select example"
                                                                        id="agent-div">
                                                                        <option
                                                                            value="1"{{ old('assigned_rep', $user->customer->assigned_rep ?? '') == '1' ? 'selected' : '' }}>
                                                                            Do Not Assign Agent/Rep
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div class="commission1-div">
                                                                    <label for="commission-div"
                                                                        class="form-label">{{ __('admin/customer/edit.commission') }}</label>
                                                                    <select class="form-select form-control"
                                                                        name="commission_sign"
                                                                        aria-label="Default select example"
                                                                        id="commission-div">
                                                                        <option value="1"
                                                                            {{ old('commission_sign', $user->customer->commission_sign ?? '') == '1' ? 'selected' : '' }}>
                                                                            %</option>
                                                                    </select>
                                                                </div>
                                                                <div class="commission2-div">
                                                                    <input type="text" class="form-control"
                                                                        value="{{ old('commission', $user->customer->commission ?? '') }}"
                                                                        name="commission" id="exampleInputcommtag">
                                                                </div>
                                                                <div class="commission3-div">
                                                                    {{-- <button class="add-sign" type="button"
                                                                        id="add-com">+</button> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
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
