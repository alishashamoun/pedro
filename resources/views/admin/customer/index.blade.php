@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' : 'manager.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('admin/customer/index.client') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">{{ __('admin/customer/index.home') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('admin/customer/index.client') }}</li>
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
                                      <h3 class="card-title">{{ __('admin/customer/index.user_management') }}</h3>
                                    </div> -->
                            <!-- /.card-header -->
                            <div class="card-header">
                                <a class="btn btn-success"
                                    href="{{ route('customer.create') }}">{{ __('admin/customer/index.new_customer') }}</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>{{ __('admin/customer/index.no') }}</th>
                                            <th>{{ __('admin/customer/index.name') }}</th>
                                            <th>{{ __('admin/customer/index.account_num') }}</th>
                                            <th>{{ __('admin/customer/index.roles') }}</th>
                                            <th width="560px">{{ __('admin/customer/index.action') }}</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if ($customers)
                                            @foreach ($users as $key => $user)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $user->name ?? '' }}</td>
                                                    <td>{{ $user->customer->acnum ?? '' }}</td>
                                                    <td>
                                                        @if (!empty($user))
                                                            <?php $roles = $user->getRoleNames(); ?>
                                                            <label class="badge badge-success">{{ $roles[0] }}</label>
                                                        @endif

                                                    </td>
                                                    <td>
                                                        <!-- <a class="btn btn-info" href="{{ route('users.show', $user->id) }}">{{ __('admin/customer/index.show') }}</a> -->
                                                        <a class="btn btn-primary"
                                                            href="{{ route('customer.edit', $user->id) }}">{{ __('admin/customer/index.edit') }}</a>

                                                        <form action="{{ route('customer.destroy', $user->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"
                                                                onclick="return confirm('{{ __('admin/customer/index.confirm_delete') }}')">{{ __('admin/customer/index.delete') }}</button>
                                                        </form>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        @endif
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

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
@endsection
