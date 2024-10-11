@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' : 'manager.layouts.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('admin/technicians/index.technicians') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ __('admin/technicians/index.technicians') }}</li>
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

                            <!-- /.card-header -->
                            <div class="card-header"> <a class="btn btn-success"
                                    href="{{ route('technicians.create') }}">{{ __('admin/technicians/index.new_technician') }}</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>S.N</th>
                                            <th>{{ __('admin/technicians/index.name') }}</th>
                                            <th>{{ __('admin/technicians/index.email') }}</th>
                                            <th>{{ __('admin/technicians/index.actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($technicians)
                                            @foreach ($technicians as $key => $technician)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $technician->fname }}&nbsp;{{ $technician->lname }}</td>
                                                    <td>{{ $technician->email }}</td>
                                                    <td> <a class="btn btn-info"
                                                            href="{{ route('technicians.show', $technician->id) }}">{{ __('admin/technicians/index.show') }}</a>

                                                        <a class="btn btn-primary"
                                                            href="{{ route('technicians.edit', $technician->id) }}">{{ __('admin/technicians/index.edit') }}</a>

                                                        <form action="{{ route('technicians.destroy', $technician->id) }}"
                                                            method="post" style="display:inline"> @method('DELETE') @csrf

                                                            <button type="submit" class="btn btn-danger"
                                                                onclick="return confirm('{{ __('admin/technicians/index.Are you sure you want to Remove this Technician?') }}')">{{ __('admin/technicians/index.delete') }}</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div> <!-- /.card-body -->
                        </div> <!-- /.card -->
                    </div> <!-- /.col -->
                </div> <!-- /.row -->
            </div> <!-- /.container-fluid -->
        </section> <!-- /.content -->
    </div>
@endsection
