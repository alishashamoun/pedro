@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' : (Auth::user()->hasRole('vendor') ? 'vendor.layouts.app' : (Auth::user()->hasRole('account manager') ? 'manager.layouts.app' : 'default.layout'))) {{-- Include your base layout if you have one --}}

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>{{ __('vendor/invoice/index.invoice_detail') }}</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Your content goes here -->

            <div class="col-md-12 bg-primary rounded-lg text-center ">
                <h3 class="">{{ __('vendor/invoice/index.invoice_information') }}</h3>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">

                        <div class="card-body">
                            @foreach ($invoice->service as $invoices )
                            <ul class="list-group">

                                <li class="list-group-item">
                                    <strong>{{ __('vendor/invoice/index.description') }}:</strong>
                                    <span>{{ $invoices->description }}</span>
                                </li>
                                <li class="list-group-item">
                                    <strong>{{ __('vendor/invoice/index.ware_house') }}:</strong>
                                    <span>{{ $invoices->warehouse }}</span>
                                </li>
                                <li class="list-group-item">
                                    <strong>{{ __('vendor/invoice/index.quantity/hours') }}:</strong>
                                    <span>{{ $invoices->qty_hrs }}</span>
                                </li>
                                <li class="list-group-item">
                                    <strong>{{ __('vendor/invoice/index.rate') }}:</strong>
                                    <span>{{ $invoices->rate }}</span>
                                </li>
                                <li class="list-group-item">
                                    <strong>{{ __('vendor/invoice/index.total') }}:</strong>
                                    <span>{{ $invoices->total }}</span>
                                </li>
                                <li class="list-group-item">
                                    <strong>{{ __('vendor/invoice/index.cost') }}:</strong>
                                    <span>{{ $invoices->cost }}</span>
                                </li>
                                <li class="list-group-item">
                                    <strong>{{ __('vendor/invoice/index.margin_tax') }}:</strong>
                                    <span>{{ $invoices->margin_tax }}</span>
                                </li>
                                <br>

                            </ul>
                                @endforeach

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-primary">

                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <strong>{{ __('vendor/invoice/index.job_id') }}:</strong>
                                    <span>{{ $invoice->job_id }}</span>
                                </li>
                                <li class="list-group-item">
                                    <strong>{{ __('vendor/invoice/index.status') }}:</strong>
                                    <span class="badge bg-{{ $invoice->status === 'unpaid' ? 'danger' : ($invoice->status === 'paid' ? 'success' : 'warning') }}">{{ Str::ucfirst($invoice->status) }}</span>
                                </li>
                                <li class="list-group-item">
                                    <strong>{{ __('vendor/invoice/index.drive_time') }}:</strong>
                                    <span>{{ $invoice->drive_time }}</span>
                                </li>
                                <li class="list-group-item">
                                    <strong>{{ __('vendor/invoice/index.labor_time') }}:</strong>
                                    <span>{{ $invoice->labor_time }}</span>
                                </li>
                                <li class="list-group-item">
                                    <strong>{{ __('vendor/invoice/index.payments_and_deposits_input') }}:</strong>
                                    <span>{{ $invoice->payments_and_deposits_input }}</span>
                                </li>
                                <li class="list-group-item">
                                    <strong>{{ __('vendor/invoice/index.amount_description') }}:</strong>
                                    <span>{{ $invoice->amount_description }}</span>
                                </li>
                                <li class="list-group-item">
                                    <strong>{{ __('vendor/invoice/index.amount') }}:</strong>
                                    <span>{{ $invoice->amount }}</span>
                                </li>
                                <li class="list-group-item">
                                    <strong>{{ __('vendor/invoice/index.note_to_customer') }}:</strong>
                                    <span>{{ $invoice->note_to_cust }}</span>
                                </li>
                                <li class="list-group-item">
                                    <strong> {{ __('vendor/invoice/index.created_by') }}:</strong>
                                    <span>{{ $invoice->users->name ?? 'N/A' }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="m-4">
                    <button class="btn btn-primary" onclick="goBack()">Go Back</button>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<script>
    function goBack() {
        window.history.back();
    }
</script>
<!-- /.content-wrapper -->
@endsection
