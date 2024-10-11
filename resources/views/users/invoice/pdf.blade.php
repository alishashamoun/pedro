<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5;
            color: #333;
            background-color: #f9f9f9;
        }

        .content-wrapper {
            padding: 20px;
        }

        .card {
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 20px;
        }

        .list-group {
            margin-bottom: 20px;
        }

        .list-group-item {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .list-group-item strong {
            font-weight: bold;
            margin-right: 10px;
        }

        .badge {
            font-size: 12px;
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 10px;
        }

        .badge-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .badge-success {
            background-color: #28a745;
            color: #fff;
        }

        .badge-warning {
            background-color: #ffc107;
            color: #fff;
        }

        /* Invoice Information Section */
        .bg-primary {
            background-color: #337ab7;
            color: #fff;
            padding: 10px;
            border-radius: 10px;
        }

        .bg-primary h3 {
            margin-top: 0;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .col-md-6 {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Your content goes here -->

                <div class="col-md-12 bg-primary rounded-lg text-center">
                    <h3 class="">Invoice Information</h3>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-body">
                                @foreach ($invoice->service as $invoices)
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <strong>Description:</strong>
                                            <span>{{ $invoices->description }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Warehouse:</strong>
                                            <span>{{ $invoices->warehouse }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Quantity/Hours:</strong>
                                            <span>{{ $invoices->qty_hrs }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Rate:</strong>
                                            <span>{{ $invoices->rate }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Total:</strong>
                                            <span>{{ $invoices->total }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Cost:</strong>
                                            <span>{{ $invoices->cost }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Margin Tax:</strong>
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
                                        <strong>Job ID:</strong>
                                        <span>{{ $invoice->job_id }}</span>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Status:</strong>
                                        <span
                                            class="badge badge-{{ $invoice->status === 'unpaid' ? 'danger' : ($invoice->status === 'paid' ? 'uccess' : 'warning') }}">{{ Str::ucfirst($invoice->status) }}</span>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Drive Time:</strong>
                                        <span>{{ $invoice->drive_time }}</span>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Labor Time:</strong>
                                        <span>{{ $invoice->labor_time }}</span>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Payments and Deposits Input:</strong>
                                        <span>{{ $invoice->payments_and_deposits_input }}</span>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Amount Description:</strong>
                                        <span>{{ $invoice->amount_description }}</span>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Amount:</strong>
                                        <span>{{ $invoice->amount }}</span>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Note to Customer:</strong>
                                        <span>{{ $invoice->note_to_cust }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</body>

</html>
