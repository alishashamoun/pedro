@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' : 'manager.layouts.app')

<meta name="csrf-token" content="{{ csrf_token() }}">


@section('content')
    <div class="content-wrapper">
        <div id="map" style="height: 500px; display: none;"></div>
        {{-- <button onclick="checkIn()" class="btn bg-indigo ">{{ __('admin/attendance/vendor.check_in') }}</button> --}}
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6">
                    <h2>{{ __('admin/attendance/vendor.check_in') }}/{{ __('admin/attendance/vendor.check_out') }}</h2>
                </div>
            </div>

            @if (!auth()->user()->hasRole('Admin'))
                <div class="row mt-3">
                    <div class="col-md-12">
                        <!-- Button trigger modal -->

                        <button class="btn bg-indigo mr-2 check-in-button" onclick="checkIn('checkIn')">{{ __('admin/attendance/vendor.check_in') }}</button>
                        {{-- <input type="hidden" id="job_id" value="{{ $id }}"> --}}
                        <input type="hidden" id="address-display" value="">
                        <button type="submit" class="btn btn-primary float-right check-out-button"
                            onclick="checkOut('checkOut')">{{ __('admin/attendance/vendor.check_out') }}</button>
                    </div>

                </div>
            @endif

            <div class="row mt-3">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('admin/attendance/vendor.name') }}</th>
                                <th scope="col">{{ __('admin/attendance/vendor.address') }}</th>
                                <th scope="col">{{ __('admin/attendance/vendor.status') }}</th>
                                <th scope="col">{{ __('admin/attendance/vendor.time') }}</th>
                                <th scope="col">{{ __('admin/attendance/vendor.duration') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendance as $key => $attendances)
                                <tr data-user-id="{{ $attendances->user->id }}">
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $attendances->user->name }}</td>
                                    <td>{{ $attendances->address }}</td>
                                    <td>
                                        @switch($attendances->attendance)
                                            @case('checkIn')
                                                <span class="badge bg-success">{{ __('admin/attendance/vendor.check_in') }}</span>
                                            @break

                                            @case('checkOut')
                                                <span class="badge bg-danger">{{ __('admin/attendance/vendor.check_out') }}</span>
                                            @break

                                            @default
                                                <span class="badge bg-secondary">{{ __('admin/attendance/vendor.unknown') }}</span>
                                            @break
                                        @endswitch
                                    </td>
                                    <td>
                                        {{ $attendances->created_at->format('d-m-Y h:i:s A') }}
                                    </td>
                                    <td>
                                        {{-- @php
                                        $checkOut = $attendances->checkOut;
                                        $checkInTime = \Carbon\Carbon::parse($attendances->created_at);
                                        $checkOutTime = $checkOut ? \Carbon\Carbon::parse($checkOut->created_at) : null;
                                        $timeDifference = $checkOutTime ? $checkOutTime->diff($checkInTime)->format('%H:%I:%S') : '';
                                    @endphp
                                     {{ $timeDifference }} --}}
                                        {{ $attendances->duration }}

                                    </td>
                                </tr>
                            @endforeach

                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
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
            function fetchAttendance() {
                $.ajax({
                    url: '{{ route('attendance.today') }}',
                    method: 'GET',
                    success: function(response) {
                        let attendance = response.attendance;
                        console.log(attendance);
                        // Disable the check-in button if there is already a check-in attendance
                        if (attendance === 'checkIn' || attendance === 'checkOut') {
                            $('.check-in-button').prop('disabled', true);
                        }

                        // Disable the check-out button if there is no check-in attendance yet or if already checked out
                        if (attendance === null || attendance === 'checkOut') {
                            $('.check-out-button').prop('disabled', true);
                        }
                    },
                    error: function(error) {
                        console.log('Error fetching attendance:', error);
                    }
                });
            }

            // Fetch attendance when the document is ready
            fetchAttendance();

            // Add click event listeners to the buttons
            $('.check-in-button').on('click', function() {
                // Enable the check-out button after check-in
                $('.check-out-button').prop('disabled', false);
                // Disable the check-in button after check-in
                $(this).prop('disabled', true);

            });

            $('.check-out-button').on('click', function() {
                // Enable the check-in button after check-out
                $('.check-in-button').prop('disabled', false);
                // Disable the check-out button after check-out
                $(this).prop('disabled', true);

            });
        });

        var map;
        var marker;
        var watchId;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: 0,
                    lng: 0
                },
                zoom: 13
            });

            // Start continuous location tracking
            watchId = navigator.geolocation.watchPosition(
                function(position) {
                    // Update map
                    var currentLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                    // Get and display the address
                    getAddress(currentLocation);

                    if (!marker) {
                        marker = new google.maps.Marker({
                            position: currentLocation,
                            map: map,
                            animation: google.maps.Animation.DROP
                        });
                    } else {
                        marker.setPosition(currentLocation);
                    }

                    map.panTo(currentLocation);

                    console.log(position.coords.latitude, position.coords.longitude);

                    // toastr.success(position.coords.latitude + ', ' + position.coords.longitude, 'Location updated:');

                    // Store the current location in variables accessible to checkIn function
                    currentLatitude = position.coords.latitude;
                    currentLongitude = position.coords.longitude;


                },
                function(error) {
                    toastr.error('Error getting location:', error.message);
                }, {
                    enableHighAccuracy: true,
                    timeout: 5000,
                    maximumAge: 0
                }
            );
            console.log(watchId);
        }

        function stopTracking() {
            // Stop location tracking
            navigator.geolocation.clearWatch(watchId);
        }

        function updateAttendanceTable(attendance) {
            // Get the table row with the matching user ID
            var row = $('tr[data-user-id="' + attendance.user_id + '"]');

            // Update the attendance status
            row.find('td:nth-child(3)').text(attendance.attendance);

            // Update the time
            row.find('td:nth-child(4)').text(attendance.created_at);

            // Update the duration
            row.find('td:nth-child(5)').text(attendance.duration);
        }

        function sendRequest(attendanceType) {
            if (typeof currentLatitude === 'undefined' || typeof currentLongitude === 'undefined') {
                // Show toastr message
                toastr.error('Please ensure your location is enabled and try again.');
                // Prevent further execution
                return;
            }

            // Get the address from the HTML element where you are displaying it
            // var jobID = $('#job_id').val();
            var address = $('#address-display').val();

            // Send AJAX request to log the current location and address
            $.ajax({
                type: 'POST',
                url: '{{ route('manager.attendance.store') }}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    latitude: currentLatitude,
                    longitude: currentLongitude,
                    // job: jobID,
                    address: address,
                    attendance: attendanceType
                },
                success: function(response) {
                    if (response.success == true) {
                        console.log('distance ', response.distance);
                        toastr.success(response.message);
                        location.reload();
                        // Update the attendance table row with the new data
                        // updateAttendanceTable(response.attendance);
                    } else {
                        toastr.warning(response.message);
                        console.log('distance ', response.distance);
                    }
                },
                error: function(error) {
                    toastr.error('Error checking in:', error);
                }
            });
        }

        function checkIn(attendanceType) {
            sendRequest(attendanceType);
        }

        function checkOut(attendanceType) {
            sendRequest(attendanceType);
        }

        function getAddress(location) {
            var geocoder = new google.maps.Geocoder();

            geocoder.geocode({
                'location': location
            }, function(results, status) {
                if (status === 'OK') {
                    if (results[0]) {
                        // Display the formatted address
                        var formattedAddress = results[0].formatted_address;

                        // toastr.info(formattedAddress, 'Address:');

                        // Update the HTML element with the address
                        $('#address-display').val(formattedAddress);
                    } else {
                        toastr.warning('No address found.');
                    }
                } else {
                    toastr.error('Geocoder failed due to: ' + status);
                }
            });
        }

        // Start tracking when the page loads
        initMap();
    </script>
@endsection
