@extends(Auth::user()->hasRole('Admin')? 'admin.layouts.app' : 'manager.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('admin/purchase_order/index.title') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ __('admin/purchase_order/index.breadcrumb') }}</li>
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
                            <div class="card-header">
                                <a class="btn btn-success" href="{{ route('purchase-orders.create') }}">{{ __('admin/purchase_order/index.create_button') }}</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>{{ __('admin/purchase_order/index.table_headers.order_number') }}</th>
                                            <th>{{ __('admin/purchase_order/index.table_headers.order_date') }}</th>
                                            <th>{{ __('admin/purchase_order/index.table_headers.payment_type') }}</th>
                                            <th>{{ __('admin/purchase_order/index.table_headers.action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($purchaseOrders as $purchaseOrder)
                                            <tr>
                                                <td>{{ $purchaseOrder->id }}</td>
                                                <td>{{ $purchaseOrder->order_date }}</td>
                                                <td>{{ $purchaseOrder->payment_term }}</td>
                                                <td>
                                                    <form action="{{ route('purchase-orders.destroy', $purchaseOrder->id) }}" method="POST">
                                                        <a href="{{ route('purchase-orders.show', $purchaseOrder->id) }}" class="btn btn-info">{{ __('admin/purchase_order/index.actions.view') }}</a>
                                                        <a href="{{ route('purchase-orders.edit', $purchaseOrder->id) }}" class="btn btn-primary">{{ __('admin/purchase_order/index.actions.edit') }}</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('{{ __('admin/purchase_order/index.confirm_delete') }}')">{{ __('admin/purchase_order/index.actions.delete') }}</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
@endsection
