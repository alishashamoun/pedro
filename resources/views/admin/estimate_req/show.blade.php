@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' :  'manager.layouts.app' )


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('admin/estimatereq/index.estimate_request') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ __('admin/estimatereq/index.estimate_request') }}</li>
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
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>{{ __('admin/estimatereq/index.first_name') }}:</th>
                                    <td>{{ $estimate->first_name }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('admin/estimatereq/index.last_name') }}:</th>
                                    <td>{{ $estimate->last_name }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('admin/estimatereq/index.phone_number') }}:</th>
                                    <td>{{ $estimate->phone_number }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('admin/estimatereq/index.email') }}:</th>
                                    <td>{{ $estimate->email }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('admin/estimatereq/index.street_address') }}:</th>
                                    <td>{{ $estimate->street_address }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('admin/estimatereq/index.city') }}:</th>
                                    <td>{{ $estimate->city }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('admin/estimatereq/index.state') }}State:</th>
                                    <td>{{ $estimate->state }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('admin/estimatereq/index.zip_code') }}:</th>
                                    <td>{{ $estimate->zip_code }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('admin/estimatereq/index.details') }}:</th>
                                    <td>{{ $estimate->details }}</td>
                                </tr>
                                <tr>
                                    <th>Frequency:</th>
                                    <td> <span class="badge bg-success">
                                            {{ $estimate->frequency }}
                                        </span></td>
                                </tr>
                                @if ($estimate->picture)
                                    <tr>
                                        <th>Picture:</th>
                                        <td>
                                            <img src="{{ asset('storage/' . $estimate->picture) }}" alt="User Picture" class="img-fluid">
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                        <a href="{{ route('estimate_requests.index') }}" class="btn btn-primary">{{ __('admin/estimatereq/index.back_to_users') }}</a>
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </section>
    </div>



@endsection
