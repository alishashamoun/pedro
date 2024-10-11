@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' : 'manager.layouts.app')

<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('admin/work_order/index.work_order_list') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ __('admin/work_order/index.work_order_list') }}</li>
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
                            <div class="card-header">
                                <a class="btn btn-success" data-bs-toggle="tooltip"
                                data-placement="top" title="Create new Work Order" href="{{ route('work_orders.create') }}">
                                    {{ __('admin/work_order/index.create_work_order') }} </a>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>{{ __('admin/work_order/index.job_name') }}</th>
                                            <th>Vendor</th>
                                            <th>Status</th>
                                            <th>{{ __('admin/work_order/index.deadline') }}</th>
                                            <th>{{ __('admin/work_order/index.payment') }}</th>
                                            <th>{{ __('admin/work_order/index.action') }}</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if ($WorkOrders)
                                            @foreach ($WorkOrders as $workOrder)
                                                <tr data-id="{{ $workOrder->id }}">
                                                    <td>{{ $workOrder->id ?? '' }}</td>
                                                    <td>{{ $workOrder->jobname->name ?? '' }}</td>
                                                    <td>{{ $workOrder->vendor->name ?? '' }}</td>
                                                    <td>
                                                        @switch($workOrder->status)
                                                            @case('pending')
                                                                <span class="badge bg-warning">{{ __('admin/work_order/index.pending') }}</span>
                                                            @break

                                                            @case('accepted')
                                                                <span class="badge bg-success">{{ __('admin/work_order/index.accepted') }}</span>
                                                            @break

                                                            @case('declined')
                                                                <span class="badge bg-danger">{{ __('admin/work_order/index.declined') }}</span>
                                                            @break

                                                            @default
                                                                {{ $workOrder->status }}
                                                        @endswitch
                                                    </td>

                                                    <td>{{ $workOrder->deadline ?? '' }}</td>
                                                    <td> @switch($workOrder->payment_info)
                                                            @case('quick_pay')
                                                                <span class="badge bg-success">{{ __('admin/work_order/index.quick_pay') }}</span>
                                                            @break

                                                            @default
                                                                ----
                                                        @endswitch
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('work_orders.edit', $workOrder->id) }}" data-bs-toggle="tooltip"
                                                            data-placement="top" title="Edit this work order"
                                                            class="btn btn-primary"><i class="fas fa-edit"></i></a>

                                                        <a href="{{ route('work_orders.details', $workOrder->id) }}" data-bs-toggle="tooltip"
                                                            data-placement="top" title="show details of this work order"
                                                            class="btn btn-info"><i class="fas fa-eye"></i></a>

                                                        <a href="{{ route('work_orders.show', $workOrder->id) }}" data-bs-toggle="tooltip"
                                                            data-placement="top" title="add images and notes to this work order"
                                                            class="btn btn-warning"><i class="fas fa-paperclip"></i></a>

                                                        <button type="button" class="btn btn-success open-map-modal" data-bs-toggle="tooltip"
                                                            data-placement="top" title="add/update location of this work order"
                                                            data-workorder-id="{{ $workOrder->id }}"><i
                                                                class="fas fa-map-marker-alt"></i>
                                                            @if (!$workOrder->JobLocation)
                                                                {{ __('admin/work_order/index.put') }}
                                                            @else
                                                                {{ __('admin/work_order/index.update') }}
                                                            @endif
                                                        </button>
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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('admin/work_order/index.pick_a_location') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Google Map container -->
                    <div id="maps" style="height: 400px;"></div>
                    <form id="location-form" style="display: none;">
                        <input type="hidden" id="longitude" name="longitude">
                        <input type="hidden" id="latitude" name="latitude">
                        <input type="hidden" name="work_order_id" id="work_order_id">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" onclick="saveLocation()">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqnUWO38RJMjRlwsY1imxqB1WI8ZWsU3M&libraries=places&callback=Function.prototype">
    </script>
    <script>
        $(document).ready(function() {
            $('.open-map-modal').click(function() {
                var workOrderId = $(this).data('workorder-id');
                $('#work_order_id').val(workOrderId); // Set the work order ID in the hidden input field
                $('#exampleModal').modal('show'); // Show the modal
            });
        });
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
                        toastr.success('Location saved successfully.');
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.error(error);
                        // Show error toastr
                        toastr.error('An error occurred while saving location.');
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
