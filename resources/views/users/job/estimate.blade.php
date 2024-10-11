@extends('users.layouts.app')
<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>

<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                        <h1>{{ __('user/job/estimate.estimate_list') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ __('user/job/estimate.estimate_list') }}</li>
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
                                                                                                                                  <h3 class="card-title">User Managment</h3>
                                                                                                                                </div> -->
                            <!-- /.card-header -->

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>

                                            <th>{{ __('user/job/estimate.customer_name') }}</th>
                                            <th>{{ __('user/job/estimate.jobs') }}</th>
                                            <th>{{ __('user/job/estimate.assigned_manager') }}</th>
                                            <th>{{ __('user/job/estimate.status') }}</th>
                                            <th>{{ __('user/job/estimate.actions') }}</th>
                                            <th>{{ __('user/job/estimate.e_signature') }}</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if ($job)
                                            @foreach ($job as $jobs)
                                                {{-- @php
                                                    $phones = isset($jobs->phone) ? $jobs->phone : [];
                                                    $ext_ids = isset($jobs->ext_id) ? $jobs->ext_id : [];
                                                    $exts = isset($jobs->ext) ? $jobs->ext : [];
                                                    $emailAddresses = isset($jobs->email) ? $jobs->email : [];
                                                    $phone = implode(',', $phones);
                                                    $ext_id = implode(',', $ext_ids);
                                                    $ext = implode(',', $exts);
                                                    $emailList = implode(',', $emailAddresses);
                                                @endphp --}}
                                                <tr>
                                                    <td>{{ isset($jobs->customer->name) ? $jobs->customer->name : '' }}</td>
                                                    <td>{{ isset($jobs->job_category->name) ? $jobs->job_category->name : '' }}
                                                    </td>
                                                    <td>
                                                        {{ isset($jobs->account_manager_id) ? $jobs->manager->name : 'null' }}
                                                    </td>
                                                    <td>
                                                        @switch($jobs->client_status)
                                                            @case('pending')
                                                                <span class="badge bg-warning">Pending</span>
                                                            @break

                                                            @case('accepted')
                                                                <span class="badge bg-success">Accepted</span>
                                                            @break

                                                            @case('declined')
                                                                <span class="badge bg-danger">Declined</span>
                                                            @break

                                                            @default
                                                                {{ $jobs->client_status }}
                                                        @endswitch
                                                    </td>

                                                    <td>
                                                        @if ($jobs->client_status == 'pending')
                                                            <a class="btn btn-success"
                                                                href="{{ route('users.accept', $jobs->id) }}"
                                                                onclick="return confirm('{{ __('user/job/estimate.are_sure_want_accept_this_estimate') }}')"><i
                                                                    class="fas fa-check"></i></a>

                                                            <a class="btn btn-danger"
                                                                href="{{ route('users.decline', $jobs->id) }}"
                                                                onclick="return confirm('{{ __('user/job/estimate.are_sure_want_decline_this_estimate') }}')"><i
                                                                    class="fas fa-times"></i></a>
                                                        @endif

                                                        <a class="btn btn-primary"
                                                            href="{{ route('estimate.show', $jobs->id) }}">{{ __('user/job/estimate.show') }}</a>
                                                    </td>
                                                    <td class="w-25">
                                                        @if (empty($jobs->signature))
                                                            <div class="d-flex">
                                                                <button type="button" class="btn btn-success"
                                                                    data-toggle="modal"
                                                                    data-target="#signatureModal{{ $jobs->id }}">
                                                                    {{ __('user/job/estimate.sign') }}
                                                                </button>
                                                                <!-- Modal -->
                                                                <div class="modal fade"
                                                                    id="signatureModal{{ $jobs->id }}" tabindex="-1"
                                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">
                                                                                    {{ __('user/job/estimate.sign_here') }}
                                                                                </h5>
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <canvas
                                                                                    id="signature-pad-{{ $jobs->id }}"
                                                                                    class="signature-pad" width=400
                                                                                    height=200></canvas>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">Close</button>
                                                                                <button class="btn btn-success btn-sm mt-2"
                                                                                    id="save-signature-{{ $jobs->id }}"><i
                                                                                        class="fas fa-check"></i></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                {{-- <form method="POST" action="{{route('esignature',$jobs->id)}}" enctype="multipart/form-data">
                                                                @csrf
                                                            <input type="file" class="form-control form-control-sm w-75" id="formFile" name="signature" accept=".png,.jpg,.jpeg,.pdf,.doc,.docx">
                                                            <button class="btn btn-success btn-sm mt-2"><i
                                                                class="fas fa-check"></i></button></form> --}}
                                                            @else
                                                                <p class="badge badge-info">
                                                                    {{ __('user/job/estimate.signature_uploaded') }}</p>
                                                        @endif
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


@endsection
@section('scripts')
    <script>
        function initializeSignaturePad(canvasId) {
            var canvas = document.getElementById(canvasId);
            var signaturePad = new SignaturePad(canvas);

            // Add event listener for the save button
            document.getElementById('save-signature-' + canvasId.split('-')[2]).addEventListener('click', function() {
                if (signaturePad.isEmpty()) {
                    alert("{{ __('user/job/estimate.please_provide_signature') }}");
                } else {
                    var canvas = document.getElementById(canvasId);
                    const dataURI = canvas.toDataURL('image/png');
                    // console.log('Data URI:', dataURI);
                    // const blob = dataURItoBlob(dataURI);
                    // downloadImage(blob, 'signature.png');

                    var jobId = canvasId.split('-')[2];
                    var formData = new FormData();
                    formData.append('signature', dataURI);
                    formData.append('job_id', jobId);
                    console.log(formData);
                    $.ajax({
                        url: '{{ route('esignature', ':id') }}'.replace(':id', jobId),
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            console.log(response);
                            if (response.status == 200) {
                                toastr.success(response.message);
                                location.reload();
                            } else {
                                toastr.error(response.error);

                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error saving signature: ', error);
                        }
                    });
                }
            });
        }

        function dataURItoBlob(dataURI) {
            const byteString = atob(dataURI.split(',')[1]);
            const mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];
            const ab = new ArrayBuffer(byteString.length);
            const ia = new Uint8Array(ab);

            for (let i = 0; i < byteString.length; i++) {
                ia[i] = byteString.charCodeAt(i);
            }

            return new Blob([ab], {
                type: mimeString
            });
        }

        function downloadImage(blob, filename) {
            var url = window.URL.createObjectURL(blob);
            var a = document.createElement('a');
            a.href = url;
            a.download = filename;
            document.body.appendChild(a);
            a.click();
            window.URL.revokeObjectURL(url);
            document.body.removeChild(a);
        }
    </script>
    <script>
        $(document).ready(function() {
            @foreach ($job as $jobs)
                $('#signatureModal{{ $jobs->id }}').on('shown.bs.modal', function() {
                    var canvasId = $(this).find('.signature-pad').attr('id');
                    initializeSignaturePad(canvasId);
                });
            @endforeach
        });
    </script>
@endsection
