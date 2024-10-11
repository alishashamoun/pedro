@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' : 'manager.layouts.app')

<style>
    label {
        display: inline-block;
        margin-bottom: 0.5rem;
        margin-top: 18px;
    }
</style>

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('admin/purchase_order/edit.edit_products') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">{{ __('admin/purchase_order/edit.home') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('admin/purchase_order/edit.edit_products') }}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>{{ __('admin/purchase_order/edit.whoops') }}!</strong>
                        {{ __('admin/purchase_order/edit.there_were_some_problems_with_your_input') }}<br><br>
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
                                <form action="{{ route('purchase-orders.update', $purchaseOrder->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="inner-section-2">
                                        <div class="container">
                                            <div class="row bordewer">
                                                <div class="col-sm-12">
                                                    <div class="inner-header bg-colored pt-2 pb-2">
                                                        <h4 class="primary">
                                                            {{ __('admin/purchase_order/edit.purchase_order') }}</h4>
                                                    </div>
                                                </div>
                                                <div class="innerinputs">
                                                    <div class="row">
                                                        <div class="col-lg-7">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label for="exampleInputcustomer"
                                                                        class="form-label">{{ __('admin/purchase_order/edit.supplier') }}</label>
                                                                    <select name="supplier" class="form-select form-control"
                                                                        aria-label="Default select example" id="vender-div">
                                                                        <option value="0" disabled selected hidden>
                                                                            {{ __('admin/purchase_order/edit.select_a_supplier') }}
                                                                        </option>
                                                                        <option
                                                                            value="1"{{ old('supplier', $purchaseOrder->supplier) == '1' ? 'selected' : '' }}>
                                                                            {{ __('admin/purchase_order/edit.supplier_1') }}
                                                                        </option>
                                                                        <option
                                                                            value="2"{{ old('supplier', $purchaseOrder->supplier) == '2' ? 'selected' : '' }}>
                                                                            {{ __('admin/purchase_order/edit.supplier_2') }}
                                                                        </option>
                                                                    </select>
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <div class="purchase-order-div">
                                                                        <label for="reference" class="form-label">Order
                                                                            Reference</label>
                                                                        <input
                                                                            value="{{ old('order_ref', $purchaseOrder->order_ref) }}"
                                                                            name="order_ref" type="number"
                                                                            class="form-control" placeholder="1011"
                                                                            id="reference">
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <label for="vender-div"
                                                                        class="form-label">{{ __('admin/purchase_order/edit.order_progress') }}</label>
                                                                    <select name="order_progress"
                                                                        class="form-select form-control"
                                                                        aria-label="Default select example" id="vender-div">
                                                                        <option
                                                                            value="Open"{{ old('order_progress', $purchaseOrder->order_progress) == 'Open' ? 'selected' : '' }}>
                                                                            {{ __('admin/purchase_order/edit.open') }}
                                                                        </option>
                                                                        <option
                                                                            value="Close"{{ old('order_progress', $purchaseOrder->order_progress) == 'Close' ? 'selected' : '' }}>
                                                                            {{ __('admin/purchase_order/edit.close') }}
                                                                        </option>
                                                                    </select>
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <label for="vender-div" class="form-label">Payment
                                                                        Term</label>
                                                                    <select name="payment_term"
                                                                        class="form-select form-control"
                                                                        aria-label="Default select example" id="vender-div">
                                                                        <option value="0" disabled selected hidden>
                                                                            {{ __('admin/purchase_order/edit.cash_on_delivery') }}
                                                                        </option>
                                                                        <option
                                                                            value="Paypal"{{ old('payment_term', $purchaseOrder->payment_term) == 'Paypal' ? 'selected' : '' }}>
                                                                            Paypal</option>
                                                                        <option
                                                                            value="Stripe"{{ old('payment_term', $purchaseOrder->payment_term) == 'Stripe' ? 'selected' : '' }}>
                                                                            Stripe</option>
                                                                    </select>
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label for="reference"
                                                                            class="form-label">{{ __('admin/purchase_order/edit.order_date') }}</label>
                                                                        <div class="input-group date" id="datepicker">
                                                                            <input
                                                                                value="{{ old('order_date', $purchaseOrder->order_date) }}"
                                                                                name="order_date" type="date"
                                                                                class="form-control"
                                                                                placeholder="{{ __('admin/purchase_order/edit.08_16_2023') }}"
                                                                                id="date" />
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <div class="purchase-order-status">
                                                                        <label for="vender-div"
                                                                            class="form-label">{{ __('admin/purchase_order/edit.sender_of_po') }}</label>
                                                                        <select name="sender"
                                                                            class="form-select form-control"
                                                                            aria-label="Default select example"
                                                                            id="vender-div">
                                                                            <option
                                                                                value="Not Sent"{{ old('sender', $purchaseOrder->sender) == 'Not Sent' ? 'selected' : '' }}>
                                                                                {{ __('admin/purchase_order/edit.not_sent') }}
                                                                            </option>
                                                                            <option
                                                                                value="Self"{{ old('sender', $purchaseOrder->sender) == 'Self' ? 'selected' : '' }}>
                                                                                {{ __('admin/purchase_order/edit.self') }}
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-6">
                                                                    <div class="memo-main-div">
                                                                        <label for="reference"
                                                                            class="form-label">{{ __('admin/purchase_order/edit.memo_id') }}</label>
                                                                        <input
                                                                            value="{{ old('memo_id', $purchaseOrder->memo_id) }}"
                                                                            name="memo_id" type="number"
                                                                            class="form-control" id="reference">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div class="shipping-method-div">
                                                                        <label for="shipping-method"
                                                                            class="form-label">{{ __('admin/purchase_order/edit.shipping_option') }}</label>
                                                                        <input
                                                                            value="{{ old('ship_option', $purchaseOrder->ship_option) }}"
                                                                            name="ship_option" type="text"
                                                                            class="form-control" id="shipping-method">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div class="sent-on-div">
                                                                        <label for="sent-on"
                                                                            class="form-label">{{ __('admin/purchase_order/edit.sent_date') }}</label>
                                                                        <input
                                                                            value="{{ old('sent_date', $purchaseOrder->sent_date) }}"
                                                                            name="sent_date" type="date"
                                                                            class="form-control" id="sent-on">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-5">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label for="vender-div"
                                                                        class="form-label">{{ __('admin/purchase_order/edit.receipt_status') }}</label>
                                                                    <select name="receipt_status"
                                                                        class="form-select form-control"
                                                                        aria-label="Default select example"
                                                                        id="vender-div">
                                                                        <option
                                                                            value="Not Received"{{ old('receipt_status', $purchaseOrder->receipt_status) == 'Not Received' ? 'selected' : '' }}>
                                                                            {{ __('admin/purchase_order/edit.not_received') }}
                                                                        </option>
                                                                        <option
                                                                            value="Received"{{ old('receipt_status', $purchaseOrder->receipt_status) == 'Received' ? 'selected' : '' }}>
                                                                            {{ __('admin/purchase_order/edit.received') }}
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <div class="purchase-order-div">
                                                                        <label for="reference"
                                                                            class="form-label">{{ __('admin/purchase_order/edit.direct_shipping') }}</label>
                                                                        <input
                                                                            value="{{ old('direct_shipping', $purchaseOrder->direct_shipping) }}"
                                                                            name="direct_shipping" type="text"
                                                                            class="form-control"
                                                                            placeholder="{{ __('admin/purchase_order/edit.search_by_name_phone_street_city_or_email') }}"
                                                                            id="reference">
                                                                    </div>
                                                                </div>

                                                                <div class="col-12">
                                                                    <div class="shipping-address-div">
                                                                        <label for="reference"
                                                                            class="form-label">Reciepent's Address</label>
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <input
                                                                                    value="{{ old('location', $purchaseOrder->location) }}"
                                                                                    name="location" type="text"
                                                                                    class="form-control"
                                                                                    placeholder="{{ __('admin/purchase_order/edit.location_name_e_g_home_or_office') }}"
                                                                                    id="location-name">
                                                                            </div>
                                                                            <div class="col-sm-8">
                                                                                <input
                                                                                    value="{{ old('street', $purchaseOrder->street) }}"
                                                                                    name="street" type="text"
                                                                                    class="form-control"
                                                                                    placeholder="{{ __('admin/purchase_order/edit.street_address') }}"
                                                                                    id="streetaddress">
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <input
                                                                                    value="{{ old('apt', $purchaseOrder->apt) }}"
                                                                                    name="apt" type="text"
                                                                                    class="form-control"
                                                                                    placeholder="{{ __('admin/purchase_order/edit.ste_unit_apt') }}"
                                                                                    id="steunitapt">
                                                                            </div>
                                                                            <div class="col-sm-5">
                                                                                <input
                                                                                    value="{{ old('tampa', $purchaseOrder->tampa) }}"
                                                                                    name="tampa" type="text"
                                                                                    class="form-control"
                                                                                    placeholder="{{ __('admin/purchase_order/edit.tampa') }}"
                                                                                    id="steunitapt">
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <input
                                                                                    value="{{ old('fl', $purchaseOrder->fl) }}"
                                                                                    name="fl" type="text"
                                                                                    class="form-control"
                                                                                    placeholder="{{ __('admin/purchase_order/edit.fl') }}"
                                                                                    id="steunitapt">
                                                                            </div>
                                                                            <div class="col-sm-3">
                                                                                <input
                                                                                    value="{{ old('num', $purchaseOrder->num) }}"
                                                                                    name="num" type="text"
                                                                                    class="form-control"
                                                                                    placeholder="33602" id="steunitapt">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
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
                                                    @foreach ($purchaseOrder->items as $index => $item)
                                                        <div class="row item-row">
                                                            <div class="col-sm-2">
                                                                <label for="item_name"
                                                                    class="form-label">{{ __('admin/purchase_order/edit.item_name') }}</label>
                                                                <input
                                                                    value="{{ old('item_name.' . $index, $item->item_name) }}"
                                                                    name="item_name[]" type="text"
                                                                    class="form-control" id="item_name">
                                                            </div>
                                                            <div class="col-sm-1">
                                                                <label for="qty"
                                                                    class="form-label">{{ __('admin/purchase_order/edit.quantity') }}</label>
                                                                <input value="{{ old('qty.' . $index, $item->qty) }}"
                                                                    name="qty[]" type="number" class="form-control"
                                                                    id="qty">
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <label for="unit_price"
                                                                    class="form-label">{{ __('admin/purchase_order/edit.unit_price') }}</label>
                                                                <input
                                                                    value="{{ old('unit_price.' . $index, $item->unit_price) }}"
                                                                    name="unit_price[]" type="number"
                                                                    class="form-control" id="unit_price">
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <label for="total"
                                                                    class="form-label">{{ __('admin/purchase_order/edit.total_amount') }}</label>
                                                                <input value="{{ old('total.' . $index, $item->total) }}"
                                                                    name="total[]" type="number" class="form-control"
                                                                    id="total">
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <label for="jobs_id"
                                                                    class="form-label">{{ __('admin/purchase_order/edit.job_assignment') }}</label>
                                                                <input
                                                                    value="{{ old('jobs_id.' . $index, $item->jobs_id) }}"
                                                                    name="jobs_id[]" type="text" class="form-control"
                                                                    id="jobs_id">
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <label for="receipt" class="form-label">Reciept</label>
                                                                <input
                                                                    value="{{ old('receipt.' . $index, $item->receipt) }}"
                                                                    name="receipt[]" type="text" class="form-control"
                                                                    id="receipt">
                                                            </div>
                                                            <div class="col-sm-1 d-flex align-items-end">
                                                                @if ($index == 0)
                                                                    <button type="button"
                                                                        class="btn btn-success add-row">+</button>
                                                                @else
                                                                    <button type="button"
                                                                        class="btn btn-danger remove-row">-</button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="innerinputs-last">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <div class="message-main-div">
                                                                <label for="description" class="form-label">Item
                                                                    Description</label>
                                                                <textarea name="description" rows="5" cols="80">{{ old('description', $purchaseOrder->description) }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-4 total-cost">
                                                            <div class="inner-inner-inner">
                                                                <h5>{{ __('admin/purchase_order/edit.subtotal') }}</h5>
                                                                <input
                                                                    value="{{ old('subtotal', $purchaseOrder->subtotal ?? '0.00') }}"
                                                                    type="number" id="subtotal" name="subtotal"
                                                                    class="total" readonly>
                                                            </div>
                                                            <div class="inner-inner-inner">
                                                                <h5 style="color:green;">
                                                                    {{ __('admin/purchase_order/edit.received_discount') }}
                                                                    (-)</h5>
                                                                <input
                                                                    value="{{ old('discount', $purchaseOrder->discount ?? '0.00') }}"
                                                                    type="number" id="discount" name="discount"
                                                                    class="total">
                                                            </div>
                                                            <div class="inner-inner-inner">
                                                                <h5>{{ __('admin/purchase_order/edit.tax_paid') }}</h5>
                                                                <input
                                                                    value="{{ old('tax_paid', $purchaseOrder->tax_paid ?? '0.00') }}"
                                                                    type="number" id="tax_paid" name="tax_paid"
                                                                    class="total">
                                                            </div>
                                                            <div class="inner-inner-inner">
                                                                <h5>{{ __('admin/purchase_order/edit.shipping_cost') }}
                                                                </h5>
                                                                <input
                                                                    value="{{ old('ship_cost', $purchaseOrder->ship_cost ?? '0.00') }}"
                                                                    type="number" id="ship_cost" name="ship_cost"
                                                                    class="total">
                                                            </div>
                                                            <div class="inner-inner-inner">
                                                                <h5>{{ __('admin/purchase_order/edit.grand_total_price') }}
                                                                </h5>
                                                                <input
                                                                    value="{{ old('grand_total', $purchaseOrder->grand_total ?? '0.00') }}"
                                                                    type="number" id="grand_total" name="grand_total"
                                                                    class="total" readonly>
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
                                                <input type="submit" class="btn btn-primary" value="Update">
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

@section('scripts')
    <script>
        function calculateTotal() {
            let subtotal = 0;
            $('.item-row').each(function() {
                let unitPrice = parseFloat($(this).find('input[name="unit_price[]"]').val()) || 0;
                let quantity = parseFloat($(this).find('input[name="qty[]"]').val()) || 0;
                let total = unitPrice * quantity;
                $(this).find('input[name="total[]"]').val(total.toFixed(2));
                subtotal += total;
            });

            let discount = parseFloat($('#discount').val()) || 0;
            let taxRate = parseFloat($('#tax_paid').val()) || 0;
            let ship_cost = parseFloat($('#ship_cost').val()) || 0;

            let taxPaid = (subtotal - discount) * (taxRate / 100);

            let grand_total = subtotal - discount + tax_paid + ship_cost;

            $('#subtotal').val(subtotal.toFixed(2));
            $('#grand_total').val(grand_total.toFixed(2));
        }

        $(document).ready(function() {
            // Recalculate total on any relevant input change
            $(' #discount, #tax_paid, #ship_cost').on('input', function() {
                calculateTotal();
            });

            $(document).on('input',
                '.item-row input[name="qty[]"], .item-row input[name="unit_price[]"], .item-row input[name="total[]"]',
                function() {
                    calculateTotal();
                });
            // Initial calculation
            calculateTotal();

            // Function to add new row
            $('.add-row').on('click', function() {
                var newRow = $('.item-row:first').clone();
                newRow.find('input').val('');
                newRow.find('.add-row').removeClass('btn-success add-row').addClass('btn-danger remove-row')
                    .text('-');
                $('.item-row:last').after(newRow);
                calculateTotal();
            });

            // Function to remove row
            $(document).on('click', '.remove-row', function() {
                $(this).closest('.item-row').remove();
                calculateTotal();
            });

            // Recalculate total when adding a new row
            $(document).on('click', '.add-row', function() {
                calculateTotal();
            });
        });
    </script>
@endsection
