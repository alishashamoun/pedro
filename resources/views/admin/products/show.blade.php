@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' :  'manager.layouts.app' )



@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Show Products</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('products.index') }}">Back</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $product->name }}
                </div>
                <div class="form-group">
                    <strong>Description:</strong>
                    {{ $product->description }}
                </div>
                <div class="form-group">
                    <strong>Price:</strong>
                    {{ $product->price }}
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
