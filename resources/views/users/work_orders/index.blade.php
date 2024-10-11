@extends('users.layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                        <h1>{{ __('user/work_order/index.work_order') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ __('user/work_order/index.work_order') }}</li>
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
                            {{-- <div class="card-header">
              <a class="btn btn-success" href="{{ route('work-orders.create') }}"> New Work Order </a>
            </div> --}}
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>

                                            <th>{{ __('user/work_order/index.work_order_id') }}</th>
                                            <th>{{ __('user/work_order/index.job_name') }}</th>
                                            <th>{{ __('user/work_order/index.vendor') }}</th>
                                            <th>{{ __('user/work_order/index.status') }}</th>
                                            <th>{{ __('user/work_order/index.deadline') }}</th>
                                            <th>{{ __('user/work_order/index.action') }}</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if ($WorkOrders)
                                            @foreach ($WorkOrders as $workOrder)
                                                <tr>
                                                    <td>{{ $workOrder->id ?? '' }}</td>
                                                    <td>{{ $workOrder->jobname->name ?? '' }}</td>
                                                    <td>{{ $workOrder->vendor->name ?? '' }}</td>
                                                    <td>
                                                        @switch($workOrder->status)
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
                                                                {{ $workOrder->status }}
                                                        @endswitch
                                                    </td>

                                                    <td>{{ $workOrder->deadline ?? '' }}</td>

                                                    <td class="text-wrap">
                                                        @if ($workOrder->status == 'pending')
                                                            <span class="badge bg-warning">{{ __('user/work_order/index.waiting_for_vendor_to_accept') }}</span>
                                                        @elseif ($workOrder->JobLocation)
                                                            <span class="badge bg-success">{{ __('user/work_order/index.location_saved') }}</span>
                                                        @else
                                                            <span class="badge bg-danger">
                                                                {{ __('user/work_order/index.please_provide_a_job_location') }}
                                                            </span>
                                                            <button type="button" class="btn btn-primary open-map-modal"
                                                                data-workorder-id="{{ $workOrder->id }}"><i
                                                                    class="fas fa-map-marker-alt"></i></button>
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

            <!-- model -->
            <div class="modal fade" id="assignModal" tabindex="-1" role="dialog" aria-labelledby="assignModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <!-- Modal header -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="assignModalLabel">{{ __('user/work_order/index.assign_vendor') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                            </button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <!-- Vendor assignment form -->
                            <form action="{{ route('users.assign_vendor.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="work_order_id" id="work_order_id">

                                <div class="form-group">
                                    <label for="vendor_id">{{ __('user/work_order/index.select_vendor') }}:</label>
                                    <select class="form-control" id="vendor_id" name="vendor_id">
                                        @foreach ($vendors as $vendor)
                                            <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">{{ __('user/work_order/index.assign') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Feedback-->
            <div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="assignModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <!-- Modal header -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="assignModalLabel">{{ __('user/work_order/index.feedback') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                            </button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <!-- Vendor assignment form -->
                            <form action="{{ route('users.complete.order') }}" method="POST">
                                @csrf
                                <input type="hidden" name="work_order_code" id="work_order_code">

                                <div class="form-group">
                                    <label for="vendor_id">{{ __('user/work_order/index.order_status') }}</label>
                                    <select class="form-control" id="status" name="status" required>
                                        <option value="">Select Menu</option>
                                        <option value="1">{{ __('user/work_order/index.order_completed') }}</option>
                                        <option value="2">{{ __('user/work_order/index.order_rejected') }}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="vendor_id">{{ __('user/work_order/index.feedback') }}</label>
                                    <textarea name="feedback" class="form-control"></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">{{ __('user/work_order/index.save') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Feedback-->

            {{-- Modal Maps --}}
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{ __('user/work_order/index.pick_a_location') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Google Map container -->
                            <div id="maps" style="height: 400px;"></div>
                            <form id="location-form" style="display: none;">
                                <input type="hidden" id="longitude" name="longitude">
                                <input type="hidden" id="latitude" name="latitude">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('user/work_order/index.close') }}</button>
                            <button class="btn btn-primary" onclick="saveLocation()">{{ __('user/work_order/index.save_changes') }}</button>
                        </div>
                    </div>
                </div>
            </div>


        </section>
        <!-- /.content -->
    </div>



    <!-- Button to trigger the modal -->






    <script>
        $(document).ready(function() {
            // $('.assign-vendor').click(function() {
            //     var workOrderId = $(this).data('workorder-id');
            //     $('#work_order_id').val(workOrderId);
            //     $('#assignModal').modal('show');
            // });
            $('.open-map-modal').click(function() {
                var workOrderId = $(this).data('workorder-id');
                $('#work_order_id').val(workOrderId); // Set the work order ID in the hidden input field
                $('#exampleModal').modal('show'); // Show the modal
            });
        });


        $(document).ready(function() {
            $('.feedback').click(function() {
                var workOrderCode = $(this).data('workorder-code');
                $('#work_order_code').val(workOrderCode);
                $('#feedbackModal').modal('show');
            });
        });
    </script>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqnUWO38RJMjRlwsY1imxqB1WI8ZWsU3M&libraries=places&callback=Function.prototype">
    </script>
    <script>
        var map;
        var marker;
        var userLocation;
        navigator.geolocation.getCurrentPosition(function(position) {
            userLocation = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
        });

        function initMaps() {

            // Initial map settings
            var mapOptions = {
                center: userLocation,
                zoom: 19
            };

            // Create a new map
            map = new google.maps.Map(document.getElementById('maps'), mapOptions);

            placeMarker(userLocation);

            // Add click event listener to the map
            google.maps.event.addListener(map, 'click', function(event) {
                placeMarker(event.latLng);
            });
        }

        function placeMarker(location) {
            // Clear existing marker
            if (marker) {
                marker.setMap(null);
            }

            // Create a new marker
            marker = new google.maps.Marker({
                position: location,
                map: map
            });

            // Center the map on the marker
            map.panTo(location);
        }

        function saveLocation() {
            if (marker) {
                // Get latitude and longitude of the marker
                var latitude = marker.getPosition().lat();
                var longitude = marker.getPosition().lng();

                // Set the longitude and latitude values in the form
                document.getElementById("longitude").value = longitude;
                document.getElementById("latitude").value = latitude;

                // Get the work order ID
                var workOrderId = $('#work_order_id').val();
                // Get CSRF token
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                // Perform AJAX request to update the location with work order ID
                $.ajax({
                    type: 'POST',
                    url: "{{ route('put_location', ['id' => ':workOrderId']) }}".replace(':workOrderId',
                        workOrderId),
                    data: {
                        _token: csrfToken,
                        longitude: longitude,
                        latitude: latitude,
                        work_order_id: workOrderId
                    },
                    success: function(response) {
                        // Handle success response
                        console.log(response);
                        // Refresh the page
                        location.reload();
                        // Show success toastr
                        toastr.success(locationSavedSuccessfullyMessage);
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.error(error);
                        var locationSavedunSuccessfullyMessage = "{{ __('user/work_order/index.an_error_occurred_while_saving_location') }}";
                        // Show error toastr
                        toastr.error(locationSavedunSuccessfullyMessage);
                    }
                });

                // Close the modal
                $('#exampleModal').modal('hide');
            } else {
                alert('Please mark a location on the map before saving.');
            }
        }


        // Initialize the map when the modal is shown
        $('#exampleModal').on('shown.bs.modal', function() {
            initMaps();
        });
    </script>
@endsection
