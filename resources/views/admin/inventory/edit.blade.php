@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' : 'manager.layouts.app')



@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('admin/inventory/edit.edit_inventory') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ __('admin/inventory/edit.edit_inventory') }}</li>
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
                                <form action="{{ route('inventory.update', $inventory->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="inner-section-2">
                                        <div class="container">
                                            <div class="row bordewer">
                                                <div class="col-sm-12">
                                                    <div class="inner-header bg-colored pt-2 pb-2">
                                                        <h4 class="primary">Order Summary</h4>
                                                    </div>
                                                </div>
                                                <div class="innerinputs">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label for="vender-div" class="form-label">{{ __('admin/inventory/edit.vendor') }}</label>
                                                            <select name="vendor" class="form-select form-control"
                                                                aria-label="Default select example" id="vender-div">
                                                                <option value="0" disabled selected hidden>Select a
                                                                    {{ __('admin/inventory/edit.vendor') }}</option>
                                                                @foreach ($vendor as $vendors)
                                                                    <option value="{{ $vendors->id }}"
                                                                        {{ $inventory->vendor == $vendors->id ? 'selected' : '' }}>
                                                                        {{ $vendors->name }}
                                                                    </option>
                                                                @endforeach

                                                            </select>

                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <label for="vender-div" class="form-label">{{ __('admin/inventory/edit.date') }}</label>
                                                                <div class="input-group date" id="datepicker">
                                                                    <input value="{{ old('date', $inventory->date) }}"
                                                                        name="date" type="date" class="form-control"
                                                                        id="date" />

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label for="vender-div" class="form-label">{{ __('admin/inventory/edit.paid_for') }}</label>
                                                                <select name="paid_for" class="form-select form-control"
                                                                    aria-label="Default select example" id="vender-div">
                                                                    <option value="0" disabled selected hidden>Check /
                                                                        ACH</option>
                                                                    <option
                                                                        value="Paypal"{{ old('paid_for', $inventory->paid_for) == 'Paypal' ? 'selected' : '' }}>
                                                                        Paypal</option>
                                                                    <option
                                                                        value="Stripe"{{ old('paid_for', $inventory->paid_for) == 'Stripe' ? 'selected' : '' }}>
                                                                        Stripe</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">

                                                            <label for="vender-div" class="form-label">{{ __('admin/inventory/edit.paid_for') }}</label>
                                                            <input value="{{ old('paid', $inventory->paid) }}"
                                                                name="paid" type="number" class="form-control"
                                                                id="reference" placeholder="Paid">
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="inner-section-3">
                                        <div class="container">
                                            <div class="row bordewer">
                                                <div class="col-sm-12">
                                                    <div class="inner-header bg-colored pt-2 pb-2">
                                                        <h4 class="primary">Item List</h4>
                                                    </div>
                                                </div>
                                                <div class="innerinputs">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <label for="receivedto" class="form-label">{{ __('admin/inventory/edit.received') }} to: </label>
                                                            <input value="{{ old('receive', $inventory->receive) }}"
                                                                name="receive" type="text" class="form-control"
                                                                id="receivedto" placeholder="Received" />

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="innerinputs-last">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="product-main-div">
                                                                <label for="receivedto" class="form-label">{{ __('admin/inventory/edit.product') }} </label>
                                                                <select name="product" class="form-select form-control"
                                                                    aria-label="Default select example" id="product-div">
                                                                    <option value="0" disabled selected hidden>Select a
                                                                        {{ __('admin/inventory/edit.product') }}</option>
                                                                    <option value="1"
                                                                        {{ old('product', $inventory->product) == '1' ? 'selected' : '' }}>
                                                                        {{ __('admin/inventory/edit.product') }} 1</option>
                                                                    <option
                                                                        value="2"{{ old('product', $inventory->product) == '2' ? 'selected' : '' }}>
                                                                        {{ __('admin/inventory/edit.product') }} 2</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="order-qty-main-div">
                                                                <label for="order-qty" class="form-label">{{ __('admin/inventory/edit.order_qty') }}</label>
                                                                <input value="{{ old('quantity', $inventory->quantity) }}"
                                                                    name="quantity" type="number" class="form-control"
                                                                    id="order-qty" placeholder="0.00">
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="unreceived-qty-main-div">
                                                                <label for="unreceived-qty" class="form-label">{{ __('admin/inventory/edit.unreceived_qty') }}</label>
                                                                <input
                                                                    value="{{ old('unreceived', $inventory->unreceived) }}"
                                                                    name="unreceived" type="number" class="form-control"
                                                                    id="unreceived-qty" placeholder="0.00">
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="unit-cost-main-div">
                                                                <label for="unit-cost" class="form-label">{{ __('admin/inventory/edit.unit_cost') }}</label>
                                                                <input
                                                                    value="{{ old('unit_cost', $inventory->unit_cost) }}"
                                                                    name="unit_cost" type="number" class="form-control"
                                                                    placeholder="0.00" id="unit-cost">
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="total-cost-main-div">
                                                                <label for="total-cost" class="form-label">{{ __('admin/inventory/edit.total') }}</label>
                                                                <input value="{{ old('total', $inventory->total) }}"
                                                                    name="total" type="number" class="form-control"
                                                                    placeholder="0.00" id="total-cost">
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-8">

                                                        </div>
                                                        <div class="col-4 total-cost">
                                                            <div class="inner-inner-inner">
                                                                <h5>ITEM {{ __('admin/inventory/edit.subtotal') }}</h5>
                                                                <input
                                                                    value="{{ old('customer_name', $inventory->customer_name ?? '0.00') }}"
                                                                    type="number" id="subtotal" name="subtotal"
                                                                    class="total" disabled value="0.00">
                                                            </div>
                                                            <div class="inner-inner-inner">
                                                                <h5 style="color:green;">{{ __('admin/inventory/edit.discount') }} RECIEVE (-)</h5>
                                                                <input
                                                                    value="{{ old('discount', $inventory->discount ?? '0.00') }}"
                                                                    type="number" id="discount" name="discount"
                                                                    class="total" disabled value="0.00">
                                                            </div>
                                                            <div class="inner-inner-inner">
                                                                <h5>{{ __('admin/inventory/edit.tax_paid') }}</h5>
                                                                <input
                                                                    value="{{ old('tax_paid', $inventory->tax_paid ?? '0.00') }}"
                                                                    type="number" id="tax_paid" name="tax_paid"
                                                                    class="total" disabled value="0.00">
                                                            </div>
                                                            <div class="inner-inner-inner">
                                                                <h5>{{ __('admin/inventory/edit.ship_cost') }}</h5>
                                                                <input
                                                                    value="{{ old('ship_cost', $inventory->ship_cost ?? '0.00') }}"
                                                                    type="number" id="ship_cost" name="ship_cost"
                                                                    class="total" disabled value="0.00">
                                                            </div>
                                                            <div class="inner-inner-inner">
                                                                <h5>{{ __('admin/inventory/edit.grand_total') }}</h5>
                                                                <input
                                                                    value="{{ old('grand_total', $inventory->grand_total ?? '0.00') }}"
                                                                    type="number" id="grand_total" name="grand_total"
                                                                    class="total" disabled value="0.00">
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="inner-section py-3">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="div-a">
                                                        <h2 class="a1" style="font-size:12px">{{ __('admin/inventory/edit.inventory_order') }}</h2>
                                                        <p class="a2" style="font-size:10px">View & edit {{ __('admin/inventory/edit.inventory_order') }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-9 float-1">
                                                    <button type="button" class="purchase-btn"><i class="fa-solid fa-file"></i> {{ __('admin/inventory/edit.purchase_orders') }}</button>
                                                    <button type="button" class="purchase-btn"><i class="fa-solid fa-plus"></i>
                                                        {{ __('admin/inventory/edit.inventory_order') }}</button>
                                                    <button type="button" class="purchase-btn"><i class="fa-solid fa-file"></i> {{ __('admin/inventory/edit.stock_levels') }}</button>
                                                    <button type="button" class="purchase-btn"><i class="fa-solid fa-file"></i>
                                                        {{ __('admin/inventory/edit.reallocate_inventory') }}</button>
                                                    <button type="button" class="purchase-btn"><i class="fa-solid fa-file"></i> {{ __('admin/inventory/edit.product_catalog') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="inner-section-2">
                                        <div class="container">
                                            <div class="form-div">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="inner-header bg-light pt-2 pb-2">
                                                            <h3 class="primary"><i
                                                                    class="fa-solid fa-calendar-days"></i>Order
                                                                History</h3>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <table class="table table-bordered table-striped table-inv">
                                                        <thead>
                                                            <tr>
                                                                <th>Date</th>
                                                                <th>Vendor</th>
                                                                <th>Ref #/Memo</th>
                                                                <th>paid By</th>
                                                                <th>Total</th>
                                                                <th>In Quick Books</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="myTable">
                                                            @foreach ($purchase as $purchases)
                                                                <tr>
                                                                    <td>{{ $purchases->sent_date }}</td>
                                                                    <td>{{ $purchases->supplier }}</td>
                                                                    <td>{{ $purchases->memo_id }}</td>
                                                                    <td>{{ $purchases->payment_term }}</td>
                                                                    <td>{{ $purchases->total }}</td>
                                                                    <td>{{ $purchases->item_name }}</td>
                                                                    <td>
                                                                        <a href="{{ route('purchase-orders.show', $purchases->id) }}"
                                                                            class="btn btn-info">Show</a>

                                                                    </td>
                                                                </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="inner-section py-3">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="div-a">
                                                        <h2 class="a1" style="font-size: 15px;">Inventory Management
                                                        </h2>
                                                        <p class="a2" style="font-size: 13px;">View and manage
                                                            inventory</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 float-1">
                                                    <button type="button" class="purchase-btn"> {{ __('admin/inventory/edit.manage_warehouses') }}</button>
                                                    <button type="button" class="purchase-btn">{{ __('admin/inventory/edit.inventory_order') }}</button>
                                                    <button type="button" class="purchase-btn">{{ __('admin/inventory/edit.purchase_orders') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="inner-section-2">
                                        <div class="container">
                                            <div class="form-div">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="inner-header bg-light pt-2 pb-2">
                                                            <h3 class="primary"> PRODUCT VIEW</h3>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="btn-div">
                                                            <button type="button" class="product-view-btn active"><img
                                                                    src="{{ asset('assets/images/2.png') }}"> {{ __('admin/inventory/edit.all_products') }} <span class="number-1">507</span> </button>
                                                            <button type="button" class="product-view-btn"><img
                                                                    src="{{ asset('assets/images/3.png') }}"> {{ __('admin/inventory/edit.open_pos') }}
                                                                <span class="number-1">5</span></button>
                                                            <button type="button" class="product-view-btn"><img
                                                                    src="{{ asset('assets/images/4.png') }}"> {{ __('admin/inventory/edit.low_stock') }} <span class="number-1">13</span></button>
                                                            <button type="button" class="product-view-btn"><img
                                                                    src="{{ asset('assets/images/1.png') }}"> {{ __('admin/inventory/edit.sublocation_assignment') }} <span class="number-1">70</span></button>
                                                        </div>
                                                        <div class="btn-div-content">
                                                            <div class="inner-header bg-light pt-2 pb-2">
                                                                <h3 class="primary-all"> Inventory: {{ __('admin/inventory/edit.all_products') }} </h3>
                                                                <button type="button" class="purchase-btn"><i
                                                                        class="fa-solid fa-print"></i> {{ __('admin/inventory/edit.print') }}</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="inner-section-4">
                                        <div class="container">
                                            <div class="row">
                                                <input name="" type="submit" />
                                            </div>
                                        </div>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </section>

    </div>
@endsection
