@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' : 'manager.layouts.app')



@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <div class="div-a">
                            <h2 class="a1" style="font-size: 24px;">Add New Customer</h2>
                            <p class="a2">create a new customer account</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add New Customer</li>
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
                                <form action="{{ route('customer.store') }}" method="POST">
                                    @csrf
                                    <div class="inner-section py-3">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="div-a">
                                                        <!-- Additional content if needed -->
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
                                                                class="form-label">Customer</label>
                                                            <input type="text" class="form-control" name="customer_name"
                                                                id="exampleInputcustomer" placeholder="Customer Name"
                                                                value="{{ old('customer_name') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="mb-3">
                                                            <label for="flexRadioDefault3" class="form-label">Service
                                                                Agreement ?</label>
                                                            <select class="form-select form-control"
                                                                name="service_agreement" aria-label="Default select example"
                                                                id="email-div">
                                                                <option value="yes"
                                                                    {{ old('service_agreement') == 'yes' ? 'selected' : '' }}>
                                                                    Yes</option>
                                                                <option value="no"
                                                                    {{ old('service_agreement') == 'no' ? 'selected' : '' }}>
                                                                    No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="mb-3">
                                                            <label for="exampleInputacount" class="form-label">Account
                                                                #</label>
                                                            <input type="text" name="acnum" class="form-control"
                                                                id="exampleInputaccount" placeholder="Account number"
                                                                value="{{ old('acnum') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="mb-3">
                                                            <label for="flexRadioDefault5" class="form-label">Active
                                                                ?</label>
                                                            <select class="form-select form-control" name="activeCustomer"
                                                                aria-label="Default select example" id="email-div">
                                                                <option value="yes"
                                                                    {{ old('activeCustomer') == 'yes' ? 'selected' : '' }}>
                                                                    Yes</option>
                                                                <option value="no"
                                                                    {{ old('activeCustomer') == 'no' ? 'selected' : '' }}>No
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="inner-header bg-light pt-2 pb-2">
                                                            <h3 class="primary">Primary Contact</h3>
                                                            <button class="add-more-btn" id="add-pri"
                                                                type="button">&#43;Add Primary Contact</button>
                                                        </div>
                                                    </div>
                                                    <div class="pri_append" id="pri_div">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="name-main-div">
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputfirst"
                                                                            class="form-label">First Name</label>
                                                                        <input type="text" name="fname[]"
                                                                            class="form-control" id="exampleInputfirst"
                                                                            placeholder="First Name"
                                                                            value="{{ old('fname.0') }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputlast"
                                                                            class="form-label">Last Name</label>
                                                                        <input type="text" name="lname[]"
                                                                            class="form-control" id="exampleInputlast"
                                                                            placeholder="Last Name"
                                                                            value="{{ old('lname.0') }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="phone-main-div">
                                                                    <div class="col-md-4">
                                                                        <label for="number-div"
                                                                            class="form-label">Phone</label>
                                                                        <select class="form-select form-control"
                                                                            name="phone_type[]"
                                                                            aria-label="Default select example"
                                                                            id="number-div">
                                                                            <option value="">Select Menu</option>
                                                                            <option value="mobile"
                                                                                {{ old('phone_type.0') == 'mobile' ? 'selected' : '' }}>
                                                                                Mobile</option>
                                                                            <option value="telephone"
                                                                                {{ old('phone_type.0') == 'telephone' ? 'selected' : '' }}>
                                                                                Telephone</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="text" name="number[]"
                                                                            class="form-control" id="number-div"
                                                                            placeholder="433202232323"
                                                                            value="{{ old('number.0') }}">
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <input type="text" name="ext[]"
                                                                            class="form-control" id="number-div"
                                                                            placeholder="Ext"
                                                                            value="{{ old('ext.0') }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <div class="mb-3">
                                                                    <label for="exampleInputdepartment"
                                                                        class="form-label">Department</label>
                                                                    <input type="text" name="department[]"
                                                                        class="form-control" id="exampleInputdepartment"
                                                                        placeholder="Department"
                                                                        value="{{ old('department.0') }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="mb-3">
                                                                    <label for="exampleInputjob" class="form-label">Job
                                                                        Title</label>
                                                                    <input type="text" name="job_title[]"
                                                                        class="form-control" id="exampleInputjob"
                                                                        placeholder="Job title"
                                                                        value="{{ old('job_title.0') }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="email-address-div">
                                                                    <div class="col-md-4">
                                                                        <label for="email-div"
                                                                            class="form-label">Email</label>
                                                                        <select class="form-select form-control"
                                                                            name="email_type[]"
                                                                            aria-label="Default select example"
                                                                            id="email-div">
                                                                            <option value="personal"
                                                                                {{ old('email_type.0') == 'personal' ? 'selected' : '' }}>
                                                                                Personal</option>
                                                                            <option value="company"
                                                                                {{ old('email_type.0') == 'company' ? 'selected' : '' }}>
                                                                                Company</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="text" class="form-control"
                                                                            name="email[]" id="number-div"
                                                                            placeholder="abc@gmail.com"
                                                                            value="{{ old('email.0') }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="some">
                                                        <!-- Additional content if needed -->
                                                    </div>
                                                    <div class=" col-sm-6 align-items-end">
                                                        <label for="email-div" class="form-label">Contact Type</label>
                                                        <select class="form-select form-control" name="contact"
                                                            aria-label="Default select example" id="email-div">
                                                            <option value="billing"
                                                                {{ old('contact') == 'billing' ? 'selected' : '' }}>Billing
                                                                Contact</option>
                                                            <option value="booking"
                                                                {{ old('contact') == 'booking' ? 'selected' : '' }}>Booking
                                                                Contact</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6 align-items-end">
                                                        <label for="email-div" class="form-label">Personal Email</label>
                                                        <input type="email" name="personal_email" class="form-control"
                                                            placeholder="personal@gmail.com" id=""
                                                            value="{{ old('personal_email') }}">
                                                    </div>
                                                    <div class="col-sm-6"></div>
                                                    <div class="col-sm-12">
                                                        <div class="inner-header bg-light pt-2 pb-2">
                                                            <h3 class="primary">Stored Service</h3>
                                                            <button class="add-more-btn" id="add-ser"
                                                                type="button">&#43;Add Another Service</button>
                                                        </div>
                                                    </div>
                                                    <p id="">
                                                    <div class="col-sm-2">
                                                        <div class="mb-3">
                                                            <label for="exampleInputlocation"
                                                                class="form-label">Nickname</label>
                                                            <input type="text" class="form-control" name="nick_name[]"
                                                                id="exampleInputlocation" placeholder="David Smith"
                                                                value="{{ old('nick_name.0') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="mb-3">
                                                            <label for="flexRadioDefaulta"
                                                                class="form-label">Primary?</label>
                                                            <select class="form-select form-control" name="primary[]"
                                                                aria-label="Default select example">
                                                                <option value="yes"
                                                                    {{ old('primary.0') == 'yes' ? 'selected' : '' }}>Yes
                                                                </option>
                                                                <option value="no"
                                                                    {{ old('primary.0') == 'no' ? 'selected' : '' }}>No
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="mb-3">
                                                            <label for="flexRadioDefaultd" class="form-label">Billing
                                                                Address?</label>
                                                            <select class="form-select form-control"
                                                                name="billing_address[]"
                                                                aria-label="Default select example">
                                                                <option value="yes"
                                                                    {{ old('billing_address.0') == 'yes' ? 'selected' : '' }}>
                                                                    Yes</option>
                                                                <option value="no"
                                                                    {{ old('billing_address.0') == 'no' ? 'selected' : '' }}>
                                                                    No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="mb-3">
                                                            <label for="email-div" class="form-label">Contact</label>
                                                            <select class="form-select form-control" name="contact_type[]"
                                                                aria-label="Default select example">
                                                                <option value="0" disabled>Select Contact</option>
                                                                <option value="contact 1"
                                                                    {{ old('contact_type.0') == 'contact 1' ? 'selected' : '' }}>
                                                                    contact 1</option>
                                                                <option value="contact 2"
                                                                    {{ old('contact_type.0') == 'contact 2' ? 'selected' : '' }}>
                                                                    contact 2</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="mb-3">
                                                            <label for="flexRadioDefaulte"
                                                                class="form-label">Active?</label>
                                                            <select class="form-select form-control"
                                                                name="active_service[]"
                                                                aria-label="Default select example">
                                                                <option value="yes"
                                                                    {{ old('active_service.0') == 'yes' ? 'selected' : '' }}>
                                                                    Yes</option>
                                                                <option value="no"
                                                                    {{ old('active_service.0') == 'no' ? 'selected' : '' }}>
                                                                    No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="location-div">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputstreet"
                                                                            class="form-label">Street Address or Latitude,
                                                                            Longitude</label>
                                                                        <input type="text" name="address[]"
                                                                            class="form-control" id="exampleInputstreet"
                                                                            placeholder="Street Address or Latitude, Longitude"
                                                                            value="{{ old('address.0') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputapt"
                                                                            class="form-label">Apt/Suite/Unit #</label>
                                                                        <input type="text" name="aptNo[]"
                                                                            class="form-control" id="exampleInputapt"
                                                                            placeholder="Apt Suite Unit #"
                                                                            value="{{ old('aptNo.0') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputcity"
                                                                            class="form-label">City</label>
                                                                        <input type="text" name="city[]"
                                                                            class="form-control" id="exampleInputcity"
                                                                            placeholder="City Name"
                                                                            value="{{ old('city.0') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputstate"
                                                                            class="form-label">State/Province</label>
                                                                        <input type="text" name="state[]"
                                                                            class="form-control" id="exampleInputstate"
                                                                            placeholder="State Province"
                                                                            value="{{ old('state.0') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputzip"
                                                                            class="form-label">Zip/Postal Code</label>
                                                                        <input type="text" name="zip[]"
                                                                            class="form-control" id="exampleInputzip"
                                                                            placeholder="Zip Postal Code"
                                                                            value="{{ old('zip.0') }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </p>
                                                    <p id="ser_append">
                                                        <!-- Additional service rows will be appended here -->
                                                    </p>
                                                    <div class="col-sm-12">
                                                        <div class="inner-header bg-light pt-2 pb-2">
                                                            <h3 class="primary">Default Document Templates</h3>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label for="estimate-div" class="form-label">Estimate
                                                                Template</label>
                                                            <select class="form-select form-control"
                                                                name="estimate_template"
                                                                aria-label="Default select example" id="estimate-div">
                                                                <option value="1"
                                                                    {{ old('estimate_template') == '1' ? 'selected' : '' }}>
                                                                    Default</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label for="job-div" class="form-label">Job/Work Order
                                                                Template</label>
                                                            <select class="form-select form-control" name="job_template"
                                                                aria-label="Default select example" id="job-div">
                                                                <option value="1"
                                                                    {{ old('job_template') == '1' ? 'selected' : '' }}>
                                                                    Default</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label for="invoice-div" class="form-label">Invoice
                                                                Template</label>
                                                            <select class="form-select form-control"
                                                                name="invoice_template"
                                                                aria-label="Default select example" id="invoice-div">
                                                                <option value="1"
                                                                    {{ old('invoice_template') == '1' ? 'selected' : '' }}>
                                                                    Default</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="inner-header bg-light pt-2 pb-2">
                                                            <h3 class="primary">Additional Information</h3>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label for="notes-div" class="form-label">Internal/Private
                                                            Notes</label>
                                                        <textarea name="notes" class="text-area w-100 form-control" rows="8" id="notes-div"
                                                            placeholder="Internal/Private Notes">{{ old('notes') }}</textarea>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label for="exampleInputcustomertag"
                                                                class="form-label">Customer Tags</label>
                                                            <input type="text" class="form-control"
                                                                name="customer_tag" id="exampleInputcustomertag"
                                                                placeholder="Customer Tags"
                                                                value="{{ old('customer_tag') }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="referral-div" class="form-label">Referral
                                                                Source</label>
                                                            <select class="form-select form-control" name="referral"
                                                                aria-label="Default select example" id="referral-div">
                                                                <option value="1"
                                                                    {{ old('referral') == '1' ? 'selected' : '' }}>Referral
                                                                    1</option>
                                                                <option value="2"
                                                                    {{ old('referral') == '2' ? 'selected' : '' }}>Referral
                                                                    2</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputamount"
                                                                class="form-label">Amount</label>
                                                            <input type="text" name="amount" class="form-control"
                                                                id="exampleInputamount" placeholder="Amount"
                                                                value="{{ old('amount') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="mb-3">
                                                            <label for="referral-div" class="form-label">Assigned
                                                                Contract</label>
                                                            <select class="form-select form-control"
                                                                name="assigned_contract"
                                                                aria-label="Default select example" id="referral-div">
                                                                <option value="1"
                                                                    {{ old('assigned_contract') == '1' ? 'selected' : '' }}>
                                                                    Contract 1</option>
                                                                <option value="2"
                                                                    {{ old('assigned_contract') == '2' ? 'selected' : '' }}>
                                                                    Contract 2</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="flexRadioDefaulttax"
                                                                class="form-label">Taxable?</label>
                                                            <select class="form-select form-control" name="taxable"
                                                                aria-label="Default select example" id="email-div">
                                                                <option value="yes"
                                                                    {{ old('taxable') == 'yes' ? 'selected' : '' }}>Yes
                                                                </option>
                                                                <option value="no"
                                                                    {{ old('taxable') == 'no' ? 'selected' : '' }}>No
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="item-div" class="form-label">Tax Item</label>
                                                            <select class="form-select form-control" name="tax_item"
                                                                aria-label="Default select example" id="item-div">
                                                                <option value="1"
                                                                    {{ old('tax_item') == '1' ? 'selected' : '' }}>Tax 1
                                                                </option>
                                                                <option value="2"
                                                                    {{ old('tax_item') == '2' ? 'selected' : '' }}>Tax 2
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleInputnumber" class="form-label">Business #
                                                                & Tax ID</label>
                                                            <input type="text" class="form-control"
                                                                name="bussiness_id" id="exampleInputnumber"
                                                                placeholder="Business # & Tax ID"
                                                                value="{{ old('bussiness_id') }}">
                                                        </div>
                                                        <div class="" id="com_append">
                                                            <div class="agent-inner-div">
                                                                <div class="commission-div">
                                                                    <label for="agent-div" class="form-label">Assigned
                                                                        Rep</label>
                                                                    <select class="form-select form-control"
                                                                        name="assigned_rep"
                                                                        aria-label="Default select example"
                                                                        id="agent-div">
                                                                        <option value="1"
                                                                            {{ old('assigned_rep') == '1' ? 'selected' : '' }}>
                                                                            Do Not Assign Agent/Rep</option>
                                                                    </select>
                                                                </div>
                                                                <div class="commission1-div">
                                                                    <label for="commission-div"
                                                                        class="form-label">Commission</label>
                                                                    <select class="form-select form-control"
                                                                        name="commission_sign"
                                                                        aria-label="Default select example"
                                                                        id="commission-div">
                                                                        <option value="1"
                                                                            {{ old('commission_sign') == '1' ? 'selected' : '' }}>
                                                                            %</option>
                                                                    </select>
                                                                </div>
                                                                <div class="commission2-div">
                                                                    <input type="text" class="form-control"
                                                                        name="commission" id="exampleInputcommtag"
                                                                        value="{{ old('commission') }}">
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
