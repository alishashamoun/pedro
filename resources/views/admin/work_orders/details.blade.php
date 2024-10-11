@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' : 'manager.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('admin/work_order/show.work_order_details') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ __('admin/work_order/show.work_order_details') }}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('admin/work_order/show.work_order_details') }}</div>

                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="job_id"
                                        class="col-md-4 col-form-label text-md-right">{{ __('admin/work_order/show.job_id') }}</label>
                                    <div class="col-md-6">
                                        <p class="form-control-plaintext">{{ $workOrder->jobname?->name }}</p>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="vendor_id"
                                        class="col-md-4 col-form-label text-md-right">{{ __('admin/work_order/show.vendor_id') }}</label>
                                    <div class="col-md-6">
                                        <p class="form-control-plaintext">{{ $workOrder->vendor?->name }}</p>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="deadline"
                                        class="col-md-4 col-form-label text-md-right">{{ __('admin/work_order/show.deadline') }}</label>
                                    <div class="col-md-6">
                                        <p class="form-control-plaintext">{{ $workOrder->deadline }}</p>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="user_name"
                                        class="col-md-4 col-form-label text-md-right">{{ __('admin/work_order/show.user_name') }}</label>
                                    <div class="col-md-6">
                                        <p class="form-control-plaintext">{{ $workOrder->user?->name }}</p>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="user_address"
                                        class="col-md-4 col-form-label text-md-right">{{ __('admin/work_order/show.user_address') }}</label>
                                    <div class="col-md-6">
                                        <p class="form-control-plaintext">{{ $workOrder->jobname?->location_name }}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="user_address"
                                        class="col-md-4 col-form-label text-md-right">{{ __('admin/work_order/show.job_desc') }}</label>
                                    <div class="col-md-6">
                                        <p class="form-control-plaintext">{{ $workOrder->jobname?->job_description }}</p>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <a href="{{ route('work_orders.edit', $workOrder->id) }}" class="btn btn-primary">
                                            {{ __('admin/work_order/show.edit_work_order') }}
                                        </a>
                                        <form action="{{ route('work_orders.destroy', $workOrder->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                {{ __('admin/work_order/show.delete_work_order') }}
                                            </button>
                                        </form>
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
