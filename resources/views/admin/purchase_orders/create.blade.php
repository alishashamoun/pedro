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
                        <h1>New Purchase Order</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">New Purchase Order</li>
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
                                <form action="{{ route('purchase-orders.store') }}" method="POST">
                                    @csrf
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
                                                                            value="1"{{ old('supplier') == '1' ? 'selected' : '' }}>
                                                                            {{ __('admin/purchase_order/edit.supplier_1') }}
                                                                        </option>
                                                                        <option
                                                                            value="2"{{ old('supplier') == '2' ? 'selected' : '' }}>
                                                                            {{ __('admin/purchase_order/edit.supplier_2') }}
                                                                        </option>
                                                                    </select>
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <div class="purchase-order-div">
                                                                        <label for="reference" class="form-label">Order
                                                                            Reference</label>
                                                                        <input value="{{ old('order_ref') }}"
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
                                                                            value="Open"{{ old('order_progress') == 'Open' ? 'selected' : '' }}>
                                                                            {{ __('admin/purchase_order/edit.open') }}
                                                                        </option>
                                                                        <option
                                                                            value="Close"{{ old('order_progress') == 'Close' ? 'selected' : '' }}>
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
                                                                            value="Paypal"{{ old('payment_term') == 'Paypal' ? 'selected' : '' }}>
                                                                            Paypal</option>
                                                                        <option
                                                                            value="Stripe"{{ old('payment_term') == 'Stripe' ? 'selected' : '' }}>
                                                                            Stripe</option>
                                                                    </select>

                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label for="reference"
                                                                            class="form-label">{{ __('admin/purchase_order/edit.order_date') }}</label>
                                                                        <div class="input-group date" id="datepicker">
                                                                            <input value="{{ old('order_date') }}"
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
                                                                                value="Not Sent"{{ old('sender') == 'Not Sent' ? 'selected' : '' }}>
                                                                                {{ __('admin/purchase_order/edit.not_sent') }}
                                                                            </option>
                                                                            <option
                                                                                value="Self"{{ old('sender') == 'Self' ? 'selected' : '' }}>
                                                                                {{ __('admin/purchase_order/edit.self') }}
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-6">
                                                                    <div class="memo-main-div">
                                                                        <label for="reference"
                                                                            class="form-label">{{ __('admin/purchase_order/edit.memo_id') }}</label>
                                                                        <input value="{{ old('memo_id') }}" name="memo_id"
                                                                            type="number" class="form-control"
                                                                            id="reference">

                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div class="shipping-method-div">
                                                                        <label for="shipping-method"
                                                                            class="form-label">{{ __('admin/purchase_order/edit.shipping_option') }}</label>
                                                                        <input value="{{ old('ship_option') }}"
                                                                            name="ship_option" type="text"
                                                                            class="form-control" id="shipping-method">

                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div class="sent-on-div">
                                                                        <label for="sent-on"
                                                                            class="form-label">{{ __('admin/purchase_order/edit.sent_date') }}</label>
                                                                        <input value="{{ old('sent_date') }}"
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
                                                                            value="Not Received"{{ old('receipt_status') == 'Not Received' ? 'selected' : '' }}>
                                                                            {{ __('admin/purchase_order/edit.not_received') }}
                                                                        </option>
                                                                        <option
                                                                            value="Received"{{ old('receipt_status') == 'Received' ? 'selected' : '' }}>
                                                                            {{ __('admin/purchase_order/edit.received') }}
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <div class="purchase-order-div">
                                                                        <label for="reference"
                                                                            class="form-label">{{ __('admin/purchase_order/edit.direct_shipping') }}</label>
                                                                        <input value="{{ old('direct_shipping') }}"
                                                                            name="direct_shipping" type="text"
                                                                            class="form-control"
                                                                            placeholder="{{ __('admin/purchase_order/edit.search_by_name_phone_street_city_or_email') }}"
                                                                            id="reference">
                                                                    </div>
                                                                </div>

                                                                <div class="col-12">
                                                                    <div class="shipping-address-div">
                                                                        <label for="reference"
                                                                            class="form-label">Recipient's Address</label>
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <input value="{{ old('location') }}"
                                                                                    name="location" type="text"
                                                                                    class="form-control"
                                                                                    placeholder="{{ __('admin/purchase_order/edit.location_name_e_g_home_or_office') }}"
                                                                                    id="location-name">
                                                                            </div>
                                                                            <div class="col-sm-8">
                                                                                <input value="{{ old('street') }}"
                                                                                    name="street" type="text"
                                                                                    class="form-control"
                                                                                    placeholder="{{ __('admin/purchase_order/edit.street_address') }}"
                                                                                    id="streetaddress">
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <input value="{{ old('apt') }}"
                                                                                    name="apt" type="text"
                                                                                    class="form-control"
                                                                                    placeholder="{{ __('admin/purchase_order/edit.ste_unit_apt') }}"
                                                                                    id="steunitapt">
                                                                            </div>
                                                                            <div class="col-sm-5">
                                                                                <input value="{{ old('tampa') }}"
                                                                                    name="tampa" type="text"
                                                                                    class="form-control"
                                                                                    placeholder="{{ __('admin/purchase_order/edit.tampa') }}"
                                                                                    id="steunitapt">
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <input value="{{ old('fl') }}"
                                                                                    name="fl" type="text"
                                                                                    class="form-control"
                                                                                    placeholder="{{ __('admin/purchase_order/edit.fl') }}"
                                                                                    id="steunitapt">
                                                                            </div>
                                                                            <div class="col-sm-3">
                                                                                <input value="{{ old('num') }}"
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
                                                    <div class="row item-row">
                                                        <div class="col-sm-2">
                                                            <div class="addproduct-div">
                                                                <label for="addproduct"
                                                                    class="form-label">{{ __('admin/purchase_order/edit.item_name') }}</label>
                                                                <input value="{{ old('item_name') }}" name="item_name[]"
                                                                    type="text" class="form-control"
                                                                    placeholder="{{ __('admin/purchase_order/edit.add_product') }}"
                                                                    id="addproduct">

                                                            </div>
                                                        </div>

                                                        <div class="col-sm-1">
                                                            <div class="addproduct-div">
                                                                <label for="addproduct"
                                                                    class="form-label">{{ __('admin/purchase_order/edit.quantity') }}</label>
                                                                <input value="{{ old('qty') }}" name="qty[]"
                                                                    type="number" class="form-control" id="addproduct">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="addproduct-div">
                                                                <label for="addproduct"
                                                                    class="form-label">{{ __('admin/purchase_order/edit.unit_price') }}</label>
                                                                <input value="{{ old('unit_price') }}"
                                                                    name="unit_price[]" type="text"
                                                                    class="form-control" id="addproduct">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="addproduct-div">
                                                                <label for="addproduct"
                                                                    class="form-label">{{ __('admin/purchase_order/edit.total_amount') }}</label>
                                                                <input value="{{ old('total') }}" name="total[]"
                                                                    type="number" readonly class="form-control"
                                                                    id="addproduct">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="addproduct-div">
                                                                <label for="addproduct"
                                                                    class="form-label">{{ __('admin/purchase_order/edit.job_assignment') }}</label>
                                                                <input value="{{ old('jobs_id') }}" name="jobs_id[]"
                                                                    type="text" class="form-control" id="addproduct">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="addproduct-div">
                                                                <label for="addproduct" class="form-label">Reciept</label>
                                                                <input value="{{ old('receipt') }}" name="receipt[]"
                                                                    type="text" class="form-control" id="addproduct">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-1 d-flex align-items-end">
                                                            <button type="button"
                                                                class="btn btn-success end add-row">+</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- ///////////////////////// -->
                                                <div class="innerinputs-last">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <div class="message-main-div">
                                                                <label for="vender-div" class="form-label">Item
                                                                    Description</label>
                                                                <textarea name="description" rows="5" cols="80">{{ old('description') }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-4 total-cost">
                                                            <div class="inner-inner-inner">
                                                                <h5>{{ __('admin/purchase_order/edit.subtotal') }}</h5>
                                                                <input value="{{ old('subtotal' ?? '0.00') }}"
                                                                    type="number" id="subtotal" name="subtotal"
                                                                    class="total" readonly>
                                                            </div>
                                                            <div class="inner-inner-inner">
                                                                <h5 style="color:green;">
                                                                    {{ __('admin/purchase_order/edit.received_discount') }}
                                                                    (-)</h5>
                                                                <input value="{{ old('discount' ?? '0.00') }}"
                                                                    type="number" id="discount" name="discount"
                                                                    class="total">
                                                            </div>
                                                            <div class="inner-inner-inner">
                                                                <h5>{{ __('admin/purchase_order/edit.tax_paid') }}</h5>
                                                                <input value="{{ old('tax_paid' ?? '0.00') }}"
                                                                    type="text" id="tax_paid" name="tax_paid"
                                                                    class="total">
                                                            </div>
                                                            <div class="inner-inner-inner">
                                                                <h5>{{ __('admin/purchase_order/edit.shipping_cost') }}
                                                                </h5>
                                                                <input value="{{ old('ship_cost' ?? '0.00') }}"
                                                                    type="number" id="ship_cost" name="ship_cost"
                                                                    class="total">
                                                            </div>
                                                            <div class="inner-inner-inner">
                                                                <h5>{{ __('admin/purchase_order/edit.grand_total_price') }}
                                                                </h5>
                                                                <input value="{{ old('grand_total' ?? '0.00') }}"
                                                                    type="number" id="grand_total" name="grand_total"
                                                                    class="total" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="innerinputs-last">
                                                    <div class="row">
                                                        <!-- Other form fields go here -->
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

            let taxPaid = (subtotal - discount) * (taxRate / 100); // calculate tax paid amount
            console.log(taxPaid);

            let grand_total = subtotal - discount + taxPaid + ship_cost;

            $('#subtotal').val(subtotal.toFixed(2));
            let news = parseInt(grand_total);

            if (typeof news === 'number') {
                $('#grand_total').val(news.toFixed(2));
                console.log(news.toFixed(2)); // Check the type of grand_total
            } else {
                console.error('grand_total is not a number:', grand_total);
            }
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
