@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' : 'anager.layouts.app')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('admin/inventory/index.inventory') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ __('admin/inventory/index.inventory') }}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <!-- <div class="card-header">
                      <h3 class="card-title">{{ __('admin/inventory/index.inventory') }} Managment</h3>
                    </div> -->
                            <!-- /.card-header -->
                            <div class="card-header">
                                <a class="btn btn-success"
                                    href="{{ route('inventory.create') }}">{{ __('admin/inventory/index.create_new_inventory') }}</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>{{ __('admin/inventory/index.vendor') }}</th>
                                            <th>{{ __('admin/inventory/index.date') }}</th>
                                            <th>{{ __('admin/inventory/index.received_by') }}</th>
                                            <th>{{ __('admin/inventory/index.action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($inventory as $inv)
                                            <tr>
                                                <td>{{ $inv->vendor_name->name ?? '' }}</td>
                                                <td>{{ $inv->date }}</td>
                                                <td>{{ $inv->receive }}</td>
                                                <td>
                                                    <form action="{{ route('inventory.destroy', $inv->id) }}"
                                                        method="POST">
                                                        <a href="{{ route('inventory.show', $inv->id) }}"
                                                            class="btn btn-info">{{ __('admin/inventory/index.show') }}</a>
                                                        <a href="{{ route('inventory.edit', $inv->id) }}"
                                                            class="btn btn-primary">{{ __('admin/inventory/index.edit') }}</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('{{ __('admin/inventory/index.are_you_sure') }}')">
                                                            {{ __('admin/inventory/index.delete') }} </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>



@endsection
