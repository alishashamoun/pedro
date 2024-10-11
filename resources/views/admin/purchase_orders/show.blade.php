@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' : 'manager.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('admin/purchase_order/show.view_purchase_order') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">{{ __('admin/purchase_order/show.home') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('admin/purchase_order/show.view_purchase_order') }}</li>
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
                                <h3 class="card-title">{{ __('admin/purchase_order/show.purchase_order_details') }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p><strong>{{ __('admin/purchase_order/show.supplier') }}:</strong>
                                            {{ $purchaseOrder->supplier }}</p>
                                        <p><strong>{{ __('admin/purchase_order/show.order_ref') }}:</strong>
                                            {{ $purchaseOrder->order_ref }}</p>
                                        <p><strong>{{ __('admin/purchase_order/show.order_progress') }}:</strong>
                                            {{ $purchaseOrder->order_progress }}</p>
                                        <p><strong>{{ __('admin/purchase_order/show.payment_term') }}:</strong>
                                            {{ $purchaseOrder->payment_term }}</p>
                                        <p><strong>{{ __('admin/purchase_order/show.order_date') }}:</strong>
                                            {{ $purchaseOrder->order_date }}</p>
                                        <p><strong>{{ __('admin/purchase_order/show.sender') }}:</strong>
                                            {{ $purchaseOrder->sender }}</p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p><strong>{{ __('admin/purchase_order/show.memo_id') }}:</strong>
                                            {{ $purchaseOrder->memo_id }}</p>
                                        <p><strong>{{ __('admin/purchase_order/show.ship_option') }}:</strong>
                                            {{ $purchaseOrder->ship_option }}</p>
                                        <p><strong>{{ __('admin/purchase_order/show.sent_date') }}:</strong>
                                            {{ $purchaseOrder->sent_date }}</p>
                                        <p><strong>{{ __('admin/purchase_order/show.receipt_status') }}:</strong>
                                            {{ $purchaseOrder->receipt_status }}</p>
                                        <p><strong>{{ __('admin/purchase_order/show.direct_shipping') }}:</strong>
                                            {{ $purchaseOrder->direct_shipping }}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <h4>{{ __('admin/purchase_order/show.recipient_address') }}</h4>
                                        <p><strong>{{ __('admin/purchase_order/show.location') }}:</strong>
                                            {{ $purchaseOrder->location }}</p>
                                        <p><strong>{{ __('admin/purchase_order/show.street') }}:</strong>
                                            {{ $purchaseOrder->street }}</p>
                                        <p><strong>{{ __('admin/purchase_order/show.apt') }}:</strong>
                                            {{ $purchaseOrder->apt }}</p>
                                        <p><strong>{{ __('admin/purchase_order/show.tampa') }}:</strong>
                                            {{ $purchaseOrder->tampa }}</p>
                                        <p><strong>{{ __('admin/purchase_order/show.fl') }}:</strong>
                                            {{ $purchaseOrder->fl }}</p>
                                        <p><strong>{{ __('admin/purchase_order/show.num') }}:</strong>
                                            {{ $purchaseOrder->num }}</p>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-12">
                                        <h4>{{ __('admin/purchase_order/show.item_list') }}</h4>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>{{ __('admin/purchase_order/show.item_name') }}</th>
                                                    <th>{{ __('admin/purchase_order/show.quantity') }}</th>
                                                    <th>{{ __('admin/purchase_order/show.unit_price') }}</th>
                                                    <th>{{ __('admin/purchase_order/show.total_amount') }}</th>
                                                    <th>{{ __('admin/purchase_order/show.job_assignment') }}</th>
                                                    <th>{{ __('admin/purchase_order/show.receipt') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($purchaseOrder->items as $item)
                                                    <tr>
                                                        <td>{{ $item->item_name }}</td>
                                                        <td>{{ $item->qty }}</td>
                                                        <td>{{ $item->unit_price }}</td>
                                                        <td>{{ $item->total }}</td>
                                                        <td>{{ $item->jobs_id }}</td>
                                                        <td>{{ $item->receipt }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-12">
                                        <h4>{{ __('admin/purchase_order/show.summary') }}</h4>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>{{ __('admin/purchase_order/show.subtotal') }}</th>
                                                <td>{{ $purchaseOrder->subtotal }}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __('admin/purchase_order/show.discount') }}</th>
                                                <td>{{ $purchaseOrder->discount }}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __('admin/purchase_order/show.tax_paid') }}</th>
                                                <td>{{ $purchaseOrder->tax_paid }}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __('admin/purchase_order/show.shipping_cost') }}</th>
                                                <td>{{ $purchaseOrder->ship_cost }}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __('admin/purchase_order/show.grand_total') }}</th>
                                                <td>{{ $purchaseOrder->grand_total }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-12">
                                        <a href="{{ route('purchase-orders.index') }}"
                                            class="btn btn-secondary">{{ __('admin/purchase_order/show.back') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
