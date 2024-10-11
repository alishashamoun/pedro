@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' : (Auth::user()->hasRole('vendor') ? 'vendor.layouts.app' : (Auth::user()->hasRole('account manager') ? 'manager.layouts.app' : 'default.layout')))


@section('content')
<style>
    a {
        color: #5c5555;
        text-decoration: none;
        background-color: transparent;
    }
</style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('vendor/invoice/index.edit_invoice') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ __('vendor/invoice/index.edit_invoice') }}</li>
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
                                <form action="{{ route('invoice.update', $invoice->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="container mt-5">
                                                <div class="row">
                                                    <div class="col-md-6">&nbsp;</div>
                                                    <div class="col-md-6 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-primary">Save Invoice</button>
                                                    </div>
                                                </div>
                                                <ul class="nav nav-tabs">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab"
                                                            href="#single-invoice">Single Invoice</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="tab" href="#no-change">Not Billable</a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content mt-3">
                                                    <div id="single-invoice" class="tab-pane fade show active">
                                                        <ul class="nav nav-tabs mt-4">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" data-toggle="tab"
                                                                    href="#products-services">Products & Services</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab"
                                                                    href="#drive-and-labor-times">Drive & Labor Times</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab"
                                                                    href="#expenses">Expenses</a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content mt-3">

                                                            <div id="products-services" class="tab-pane fade show active">
                                                                @include('admin.job.partials.invoice')
                                                            </div>
                                                            <!--drive-and-labor-times  -->
                                                            <div id="drive-and-labor-times" class="tab-pane fade show">
                                                                @include('admin.job.partials.drive_and_labor_time')
                                                            </div>
                                                            <!-- expenses -->
                                                            <div id="expenses" class="tab-pane fade show">
                                                                @include('admin.job.partials.expense')
                                                            </div>
                                                        </div>
                                                        <br />
                                                        <div class="row w-25 d-flex flex-column">
                                                            @if (isset($invoice))

                                                            <input type="hidden" name="job_id" value="{{$invoice->job_id}}">
                                                            @else

                                                            <input type="hidden" name="job_id" value="{{$job[0]}}">
                                                            @endif
                                                            <div class="col-md-12">
                                                                <strong>{{ __('vendor/invoice/index.status') }}</strong>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">

                                                                    <select name="status" id="customer_id"
                                                                        class="form-control">
                                                                        <option value=""  selected hidden>Select Job
                                                                        </option>
                                                                        <option value="unpaid"  {{ old('status', isset($invoice) ? $invoice->status : '') == 'unpaid' ? 'selected' : '' }}>UnPaid
                                                                        </option>
                                                                        <option value="paid"  {{ old('status', isset($invoice) ? $invoice->status : '') == 'paid' ? 'selected' : '' }}>paid
                                                                        </option>
                                                                        <option value="recurring"  {{ old('status', isset($invoice) ? $invoice->status : '') == 'recurring' ? 'selected' : '' }}>Recurring
                                                                        </option>

                                                                    </select>
                                                                    <span class="error-message error-messages"
                                                                        id="customer_id_error"></span><br>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <button class="form-control"><i class="fas fa-link"></i> Link to parent</button>
                                                                        </div>
                                                                    </div> -->
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="note-to-customer">{{ __('vendor/invoice/index.note_to_customer') }}</label>
                                                                <textarea id="note-to-customer" name="note_to_cust" class="form-control" rows="4">{{ old('note_to_cust', $invoice->note_to_cust) }}</textarea>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="row invoice">
                                                                    <div class="col">
                                                                        <p>Products, Services, Taxes & Fees</p>
                                                                        <p>Total Drive & Labor Time</p>
                                                                        <p>Total Billable Expenses</p>
                                                                        <p>Job Total</p>
                                                                        <p style="color:#09af2f">Payments/Deposits</p>
                                                                    </div>
                                                                    <div class="col">
                                                                        <!-- Add the following line with a unique ID -->
                                                                        <p><span
                                                                                id="job-product-and-service-taxes-and-fees">$0.00</span>
                                                                        </p>
                                                                        <p><span
                                                                                id="job-total-drive-and-labor-time">$0.00</span>
                                                                        </p>
                                                                        <p><span id="job-total-billing-expense">$0.00</span>
                                                                        </p>
                                                                        <p><span id="job-total-job-amount">$0.00</span></p>
                                                                        <p style="color:#09af2f"><span
                                                                                id="job_payments_and_deposits">$0.00</span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-3 invoice">
                                                                    <div class="col">
                                                                        <p>Total Due</p>
                                                                        <p>Job Cost</p>
                                                                        <p>Gross Profit <span
                                                                                id="job-gross-profit-percentage">(0.00%)</span>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col">
                                                                        <p><span id="job_total_due">$0.00</span></p>
                                                                        <p><span id="job_total_cost">$0.00</span></p>
                                                                        <p style="color:#09af2f"><span
                                                                                id="job-gross-profit">$0.00</span></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- No Change -->
                                                    <div id="no-change" class="tab-pane fade show">
                                                        @include('admin.job.partials.not_billable')
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- @include('admin.job.partials.invoice') -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
