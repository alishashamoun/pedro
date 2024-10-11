@extends('users.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('user/inspection/index.inspection_reports') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">{{ __('user/inspection/index.home') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('user/inspection/index.inspection_reports') }}</li>
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

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                            <th>{{ __('user/inspection/index.location_name') }}</th>
                                            <th>{{ __('user/inspection/index.assigned_checklists') }}</th>

                                            <th>{{ __('user/inspection/index.actions') }}</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if ($show)
                                        @foreach ($show as $shows)
                                            <tr>
                                                <td>{{ $shows->name }}</td>
                                                <td>
                                                    @foreach ($shows->inspectionChecklists as $checklist)
                                                        <li>{{ $checklist->name }}</li>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @if ($shows->inspectionResponse->count() > 0)
                                                        <a class="btn btn-info"
                                                            href="{{ route('users.inspection.show', $shows->id) }}">Show</a>



                                                    @else
                                                      <span class="font-weight-bold">

                                                          {{ __('user/inspection/index.waiting_for_response') }}
                                                        </span>

                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>

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
