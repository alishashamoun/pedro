@extends('users.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                        <h1>{{ __('user/invoice/index.invoices_list') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ __('user/invoice/index.invoices_list') }}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">

                            {{-- <!-- /.card-header -->
                            <div class="card-header">
                                <a class="btn btn-success" href="{{ route('invoice.create') }}"
                                    class="btn btn-primary">{{ __('user/invoice/index.create_new_invoice') }}</a>
                            </div> --}}
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead class="thead-light">
                                        <tr>

                                            <th>{{ __('user/invoice/index.date') }}</th>
                                            <th>{{ __('user/invoice/index.customer_name') }}</th>
                                            <th>{{ __('user/invoice/index.invoice_number') }}</th>
                                            <th>{{ __('user/invoice/index.po_number') }}</th>
                                            <th>{{ __('user/invoice/index.status') }}</th>
                                            <th>{{ __('user/invoice/index.total') }}</th>
                                            <th>{{ __('user/invoice/index.total_due') }}</th>
                                            <th>{{ __('user/invoice/index.actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @dd($recur) --}}
                                        @if ($invoices->isEmpty())
                                            <tr>
                                                <td class="text-center" colspan="8">
                                                    {{ __('user/invoice/index.no_records_available') }}

                                                </td>
                                            </tr>
                                        @else
                                            @foreach ($invoices as $inv)
                                                <tr>
                                                    <td>{{ Carbon\Carbon::parse($inv->updated_at)->format('l, F j, Y h:i A') }}
                                                    </td>
                                                    <td>{{ isset($inv->job->customer->name) ? $inv->job->customer->name : 'N/A' }}
                                                    </td>
                                                    <td>{{ $inv->id }}</td>
                                                    <td>{{ isset($inv->job) ? $inv->job->po_no : 'N/A' }}</td>
                                                    <td class="">
                                                        @if ($inv->status === 'unpaid')
                                                            <label
                                                                class="badge badge-danger">{{ Str::ucfirst($inv->status) }}</label>
                                                        @elseif ($inv->status === 'paid')
                                                            <label
                                                                class="badge badge-success">{{ Str::ucfirst($inv->status) }}</label>
                                                        @elseif ($inv->status === 'recurring')
                                                            <label
                                                                class="badge badge-warning">{{ Str::ucfirst($inv->status) }}</label>
                                                        @endif
                                                    </td>

                                                    <td>{{ isset($inv->unpaid) ? $inv->unpaid->total : 'N/A' }}
                                                    </td>
                                                    <td>
                                                        @if ($inv->status != 'paid')
                                                            {{ isset($inv->unpaid) ? $inv->unpaid->total : 'N/A' }}
                                                            @else
                                                            0
                                                        @endif
                                                    </td>
                                                    <td class="btn-group">
                                                        <a href="{{ route('invoices.show', $inv->id) }}"
                                                            class="btn btn-info "><i class="fa fa-eye"></i></a>
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>

                <!-- /.col -->
            </div>
            <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>




@endsection
