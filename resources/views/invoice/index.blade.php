@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' : (Auth::user()->hasRole('vendor') ? 'vendor.layouts.app' : (Auth::user()->hasRole('account manager') ? 'manager.layouts.app' : 'default.layout')))

@section('content')
    <style>
        a {
            color: #5c5555;
            text-decoration: none;
            background-color: transparent;
        }
    </style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('vendor/invoice/index.invoice_dashboard') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">{{ __('vendor/invoice/index.home') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('vendor/invoice/index.invoice_dashboard') }}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-10 border-2 border">
                        <!-- tabs A -->
                        <ul class="nav nav-tabs justify-content-end" id="jobDetTabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="sum-tab" data-bs-toggle="tab" href="#sum" role="tab"
                                    aria-controls="sum" aria-selected="true"><i class="fas fa-exclamation-circle text-danger"></i>

                                    {{ __('vendor/invoice/index.unpaid_invoices') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="cut-tab" data-bs-toggle="tab" href="#cut" role="tab"
                                    aria-controls="cut" aria-selected="false"><i class="fas fa-check-circle text-success"></i>
                                    {{ __('vendor/invoice/index.paid_invoices') }}</a></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pic-tab" data-bs-toggle="tab" href="#pic" role="tab"
                                    aria-controls="pic" aria-selected="false"><i class="fas fa-recycle  text-warning"></i>

                                    {{ __('vendor/invoice/index.recurring') }}</a>&nbsp;</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="doc-tab" data-bs-toggle="tab" href="#doc" role="tab"
                                    aria-controls="doc" aria-selected="false"><i class="fas fa-list text-info"></i>

                                    {{ __('vendor/invoice/index.all_invoices') }}</a>&nbsp;</a>
                            </li>
                        </ul>
                        <div class="card">
                            <div class="card-header">
                                <div class="tab-content" id="jobTabsContent">
                                    <div class="tab-pane fade show active" id="sum" role="tabpanel"
                                        aria-labelledby="sum-tab">
                                        @include('invoice.partials.unpaid')
                                    </div>
                                    <div class="tab-pane fade" id="cut" role="tabpanel" aria-labelledby="cut-tab">
                                        @include('invoice.partials.paid')
                                    </div>
                                    <div class="tab-pane fade show" id="pic" role="tabpanel"
                                        aria-labelledby="pic-tab">
                                        @include('invoice.partials.recurring')
                                    </div>
                                    <div class="tab-pane fade" id="doc" role="tabpanel" aria-labelledby="doc-tab">
                                        @include('invoice.partials.all')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <iframe src="https://docs.google.com/document/d/1234567890/embed" width="500" height="500"></iframe> --}}

                    @if (isset($add))
                    <div class="col-2">
                        <div class="card mb-3">
                            <div class="card-body text-center">
                                <h5 class="card-title">Past Due</h5>
                                <div class="mt-4">
                                    <i class="fas fa-clock text-danger display-4"></i>
                                </div>
                                <p class="mt-3">{{ isset($add) ? $add : 'N/A' }}</p>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title text-center">Total Bill</h5>
                                <div class="mt-4">
                                    <i class="fas fa-dollar-sign text-warning text-xl"></i>
                                </div>
                                <p class="mt-3">{{ isset($add) ? $add : 'N/A' }}</p>
                            </div>
                        </div>

                    </div>


                    @endif

                </div>

                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
@endsection
