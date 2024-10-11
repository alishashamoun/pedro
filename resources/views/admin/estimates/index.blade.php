@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' : 'manager.layouts.app')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('admin/estimates/index.estimates') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ __('admin/estimates/index.estimates') }}</li>
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
                            <form action="{{ route('estimates.updateSelectedJobs') }}" method="POST">
                                @csrf
                                <div class="card-header">
                                    <a class="btn btn-success" href="{{ route('estimates.create') }}">
                                        {{ __('admin/estimates/index.create_estimates') }} </a>
                                    @csrf
                                    <button type="submit" class="btn btn-primary dltBtn"
                                        id="convertSelectedBtn">{{ __('admin/estimates/index.convert_selected') }}</button>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped table-responsive">
                                        <thead>
                                            <tr>
                                                <th>Select</th>
                                                <th class="text-nowrap">{{ __('admin/estimates/index.customer_name') }}</th>
                                                <th class="text-nowrap">{{ __('admin/estimates/index.location_address') }}
                                                </th>
                                                <th class="text-nowrap">{{ __('admin/estimates/index.location_city') }}</th>
                                                <th class="text-nowrap">{{ __('admin/estimates/index.primary_contact') }}
                                                </th>
                                                <th class="text-nowrap">{{ __('admin/estimates/index.e_signature') }}</th>
                                                <th class="text-nowrap">{{ __('admin/estimates/index.e_signature_time') }}
                                                </th>
                                                <th class="text-nowrap">{{ __('admin/estimates/index.actions') }}</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if ($estimates)
                                                @foreach ($estimates as $estimate)
                                                    {{-- @php
                                                        $phones = isset($estimate->phone) ? $estimate->phone : [];
                                                        $ext_ids = isset($estimate->ext_id) ? $estimate->ext_id : [];
                                                        $exts = isset($estimate->ext) ? $estimate->ext : [];
                                                        $emailAddresses = isset($estimate->email)
                                                            ? $estimate->email
                                                            : [];
                                                        $phone = implode(',', $phones);
                                                        $ext_id = implode(',', $ext_ids);
                                                        $ext = implode(',', $exts);
                                                        $emailList = implode(',', $emailAddresses);
                                                    @endphp --}}
                                                    <tr>
                                                        <td>
                                                            @if (!empty($estimate->jobs))
                                                                <span class="badge badge-primary"><a class="text-light"
                                                                        href="{{ route('job.edit', $estimate->jobs->id) }}">Converted
                                                                        to job#{{ $estimate->jobs->id }} <i
                                                                            class="fas fa-external-link-alt"></i></a></span>
                                                            @else
                                                                <input type="checkbox" name="selected_estimates[]"
                                                                    class="form-control form-control-sm"
                                                                    value="{{ $estimate->id }}">
                                                            @endif

                                                        </td>
                                                        <td>{{ isset($estimate->customer->name) ? $estimate->customer->name : '' }}
                                                        </td>
                                                        <td class="text-truncate">
                                                            {{ isset($estimate->location_address) ? $estimate->location_address : '' }}
                                                        </td>
                                                        <td>{{ isset($estimate->location_city) ? $estimate->location_city : '' }}
                                                        </td>
                                                        <td>{{ __('admin/estimates/index.primary_contact') }}:
                                                            {{ $estimate->first_name . '-' . $estimate->last_name }}
                                                            {{-- </br> {{ $emailList }} --}}

                                                        </td>
                                                        <td>
                                                            @if (isset($estimate->signature))
                                                                {{-- <a href="{{ asset('storage/' . $estimate->signature) }}"
                                                                    <i class="fas fa-link"></i>
                                                                    target="blank" class="btn btn-warning">E-Signature</a> --}}
                                                                <!-- Use Font Awesome or any other icon library -->
                                                                <button type="button" class="btn btn-success btn-sm"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#signatureModal{{ $estimate->id }}">
                                                                    {{ __('admin/estimates/index.show_signature') }}
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade"
                                                                    id="signatureModal{{ $estimate->id }}" tabindex="-1"
                                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog">

                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">Signature</h5>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal" aria-label="Close">

                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <img src="{{ $estimate->signature }}"
                                                                                    alt="Signature{{ $estimate->id }}">
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-bs-dismiss="modal">Close</button>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if (isset($estimate->signature))
                                                                <p class="lead" style="font-size: 16px !important;">
                                                                    {{ \Carbon\Carbon::parse($estimate->signature_time)->format('l, F j, Y h:i A') }}

                                                                </p>
                                                            @endif
                                                        </td>
                                                        <td class="d-flex">
                                                            {{-- @if (!empty($estimate->jobs))
                                                            <span class="badge badge-primary">Converted to job</span>
                                                        @else
                                                            <form
                                                                action="{{ route('estimates.updateSelectedJobs', $estimate) }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                <button type="submit" class="btn btn-primary dltBtn" data-id="{{ $estimate->id }}"
                                                                   >Convert</button>
                                                            </form>
                                                        @endif --}}
                                                            <a class="btn btn-success"
                                                                href="{{ route('estimates.edit', $estimate->id) }}">{{ __('admin/estimates/index.edit') }}</a>
                                                            <a class="btn btn-primary  mx-2"
                                                                href="{{ route('estimates.show', $estimate->id) }}">{{ __('admin/estimates/index.show') }}</a>
                                                            {{-- <form action="{{ route('estimates.destroy', $estimate) }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE') --}}
                                                            <a href="{{ route('estimates.destroy', $estimate->id) }}"
                                                                class="btn btn-danger"
                                                                onclick="return confirm('Are you sure you want to delete this estimate?')">{{ __('admin/estimates/index.delete') }}</a>
                                                            {{-- </form> --}}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </form>
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
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#convertSelectedBtn').prop('disabled', true);

            $('input[type="checkbox"]').change(function() {
                var anyCheckboxChecked = $('input[type="checkbox"]:checked').length > 0;
                $('#convertSelectedBtn').prop('disabled', !anyCheckboxChecked);
            });
        });
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.dltBtn').click(function(e) {
                var form = $(this).closest('form');
                var dataID = $(this).data('id');
                // alert(dataID);
                e.preventDefault();
                swal({

                        title: "Confirmation",
                        text: "{{ __('admin/estimates/index.convert_to_job') }}",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            form.submit();
                        } else {
                            swal("This estimate has not been converted to a job!");
                        }
                    });
            })
        })
    </script>
@endsection
