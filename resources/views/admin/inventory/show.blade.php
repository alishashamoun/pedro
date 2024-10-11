@extends(Auth::user()->hasRole('Admin')? 'admin.layouts.app' :  'anager.layouts.app' )


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container mt-4">
            <h1 class="mb-4">{{ __('admin/inventory/show.inventory_details') }}</h1>

            <div class="card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <table class="table table-bordered table-hover table-striped">
                        <tbody>
                            <tr>
                                <th class="w-25">{{ __('admin/inventory/show.vendor') }}</th>
                                <td>{{ $inventory->vendor }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('admin/inventory/show.date') }}</th>
                                <td>{{ $inventory->date }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('admin/inventory/show.paid_for') }}</th>
                                <td>{{ $inventory->paid_for }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('admin/inventory/show.paid') }}</th>
                                <td>{{ $inventory->paid }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('admin/inventory/show.receive') }}</th>
                                <td>{{ $inventory->receive }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('admin/inventory/show.product') }}</th>
                                <td>{{ $inventory->product }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('admin/inventory/show.quantity') }}</th>
                                <td>{{ $inventory->quantity }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('admin/inventory/show.unreceived') }}</th>
                                <td>{{ $inventory->unreceived }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('admin/inventory/show.unit_cost') }}</th>
                                <td>{{ $inventory->unit_cost }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('admin/inventory/show.total') }}</th>
                                <td>{{ $inventory->total }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('admin/inventory/show.subtotal') }}</th>
                                <td>{{ $inventory->subtotal }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('admin/inventory/show.discount') }}</th>
                                <td>{{ $inventory->discount }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('admin/inventory/show.tax_paid') }}</th>
                                <td>{{ $inventory->tax_paid }}</td>
                           </tr>
                            <tr>
                                <th>{{ __('admin/inventory/show.ship_cost') }}</th>
                                <td>{{ $inventory->ship_cost }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('admin/inventory/show.grand_total') }}</th>
                                <td>{{ $inventory->grand_total }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="text-center">
                <a href="{{ route('inventory.index') }}" class="btn btn-primary mt-3">{{ __('admin/inventory/show.back_to_inventory_list') }}</a>
            </div>
        </div>
    </section>
</div>
@endsection
