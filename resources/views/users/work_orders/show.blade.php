@extends('users.layouts.app')


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Show Work order</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('work-orders.index') }}"> Back</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    {{ $workOrders->title }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    {{ $workOrders->description }}
                </div>
            </div>
            
        </div>
    </section>
</div>
@endsection