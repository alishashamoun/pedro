@extends('users.layouts.app')

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
                        <h1>New Estimate Request</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">New Estimate Request</li>
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
                                <form method="POST" action="{{ route('estimate_request.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_number">Phone Number</label>
                                        <input type="tel" class="form-control" id="phone_number" name="phone_number" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="street_address">Street Address</label>
                                        <input type="text" class="form-control" id="street_address" name="street_address" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" class="form-control" id="city" name="city" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="state">State</label>
                                        <input type="text" class="form-control" id="state" name="state" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="zip_code">Zip Code</label>
                                        <input type="text" class="form-control" id="zip_code" name="zip_code" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="details">Please Enter Details of Requested Work and/or Description of Problem</label>
                                        <textarea class="form-control" id="details" name="details" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="picture">Picture(if any)</label>
                                        <input type="file" class="form-control-file" id="picture" name="picture">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Create Request</button>
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
