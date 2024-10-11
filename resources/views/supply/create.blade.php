@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' : (Auth::user()->hasRole('vendor') ? 'vendor.layouts.app' : (Auth::user()->hasRole('account manager') ? 'manager.layouts.app' : (Auth::user()->hasRole('User') ? 'users.layouts.app' : 'default.app'))))


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
                        <h1>New Supply Request</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">New Supply Request</li>
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
                                <form action="{{ route('supply.store') }}" method="POST">
                                    @csrf
                                    <div class="inner-section-2">
                                        <div class="container">
                                            <div class="row bordewer">
                                                <div class="col-sm-12">
                                                    <div class="inner-header bg-colored pt-2 pb-2">
                                                        <h4 class="primary">Supply Request</h4>
                                                    </div>
                                                </div>
                                                <div class="innerinputs">
                                                    <div class="row">
                                                        <div class="col-lg-7">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label for="vender-div" class="form-label">Order
                                                                        Progress</label>
                                                                    <select name="order_progress"
                                                                        class="form-select form-control"
                                                                        aria-label="Default select example" id="vender-div">
                                                                        <option value="Open"
                                                                            {{ old('order_progress') == 'Open' ? 'elected' : '' }}>
                                                                            Open</option>
                                                                        <option value="Close"
                                                                            {{ old('order_progress') == 'Close' ? 'elected' : '' }}>
                                                                            Close</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label for="reference" class="form-label">Order
                                                                            Date</label>
                                                                        <div class="input-group date" id="datepicker">
                                                                            <input name="order_date" type="date"
                                                                                class="form-control"
                                                                                placeholder="08/16/2023" id="date"
                                                                                value="{{ old('order_date') }}" />
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-4">
                                                                    <div class="purchase-order-status">
                                                                        <label for="vender-div"
                                                                            class="form-label">PO#</label>
                                                                        <input disabled type="number"
                                                                            class="form-control" id="reference"
                                                                            value="{{ old('po_num') }}">
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-6">
                                                                    <div class="memo-main-div">
                                                                        <label for="reference" class="form-label">Account
                                                                            Manager's Email</label>
                                                                        <input name="manager_email" type="email"
                                                                            class="form-control" id="reference"
                                                                            value="{{ old('manager_email') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div class="sent-on-div">
                                                                        <label for="sent-on" class="form-label">Sent
                                                                            Date</label>
                                                                        <input name="sent_date" type="date"
                                                                            class="form-control" id="sent-on"
                                                                            value="{{ old('sent_date') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <label for="vender-div" class="form-label">Receipt
                                                                        Status</label>
                                                                    <select name="receipt_status"
                                                                        class="form-select form-control"
                                                                        aria-label="Default select example" id="vender-div">
                                                                        <option value="Not Received"
                                                                            {{ old('receipt_status') == 'Not Received' ? 'elected' : '' }}>
                                                                            Not Received</option>
                                                                        <option value="Received"
                                                                            {{ old('receipt_status') == 'Received' ? 'elected' : '' }}>
                                                                            Received</option>
                                                                    </select>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-5">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="shipping-address-div">
                                                                        <label for="reference" class="form-label">Service
                                                                            Location</label>
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <input name="location" type="text"
                                                                                    class="form-control"
                                                                                    placeholder="Location Name (e.g Home or Office)"
                                                                                    id="location-name"
                                                                                    value="{{ old('location') }}">
                                                                            </div>
                                                                            <div class="col-sm-8">
                                                                                <input name="street" type="text"
                                                                                    class="form-control"
                                                                                    placeholder="Street Address"
                                                                                    id="streetaddress"
                                                                                    value="{{ old('street') }}">
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <input name="apt" type="text"
                                                                                    class="form-control"
                                                                                    placeholder="Ste/Unit/Apt"
                                                                                    id="steunitapt"
                                                                                    value="{{ old('apt') }}">
                                                                            </div>
                                                                            <div class="col-sm-5">
                                                                                <input name="tampa" type="text"
                                                                                    class="form-control"
                                                                                    placeholder="Tampa" id="steunitapt"
                                                                                    value="{{ old('tampa') }}">
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <input name="fl" type="text"
                                                                                    class="form-control" placeholder="FL"
                                                                                    id="steunitapt"
                                                                                    value="{{ old('fl') }}">
                                                                            </div>
                                                                            <div class="col-sm-3">
                                                                                <input name="num" type="text"
                                                                                    class="form-control"
                                                                                    placeholder="33602" id="steunitapt"
                                                                                    value="{{ old('num') }}">
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
                                                <div class="inners innerinputs">
                                                    <div class="row" id="item-list-row">
                                                        <div class="col-sm-3">
                                                            <div class="addproduct-div">
                                                                <label for="addproduct" class="form-label">Item
                                                                    Name</label>
                                                                <input name="item_name[]" type="text"
                                                                    class="form-control" placeholder="Add Product"
                                                                    id="addproduct" >
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-3">
                                                            <div class="addproduct-div">
                                                                <label for="addproduct"
                                                                    class="form-label">Quantity</label>
                                                                <input name="qty[]" type="number" class="form-control"
                                                                    id="addproduct" >
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="addproduct-div">
                                                                <label for="jobs_id" class="form-label">Job
                                                                    Assignment</label>
                                                                <select name="jobs_id[]" class="form-control">
                                                                    @forelse ($jobs as $job)
                                                                        <option value="{{ $job->id }}">
                                                                            {{ $job->name }}</option>
                                                                    @empty
                                                                        <option hidden>no job available</option>
                                                                    @endforelse

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3 add-row d-flex align-items-end">
                                                            <button class="btn btn-primary d-flex align-items-end"
                                                                type="button">Add Row</button>
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
            </div>
    </div>
    </section>

    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            var rowCount = 1;
            $(".add-row").click(function() {
                var row = $("#item-list-row").clone();
                row.find("input").val("");
                row.find(".add-row").remove();
                row.append(
                    '<div class="col-sm-3 d-flex align-items-end"><button class="btn btn-danger remove-row d-flex align-items-end" type="button">Remove</button></div>'
                );
                row.appendTo(".inners");
                rowCount++;
            });

            $(".inners").on("click", ".remove-row", function() {
                $(this).closest(".row").remove();
                rowCount--;
            });
        });
    </script>
@endsection
