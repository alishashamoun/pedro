@extends('vendor.layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <div class="content-wrapper">
        <div id="map" style="height: 500px; display: none;"></div>
        {{-- <button onclick="checkIn()" class="btn bg-indigo ">Check-In</button> --}}
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6">
                    <h2>Check-In/Check-Out</h2>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <!-- Button trigger modal -->

                    <button class="btn bg-indigo mr-2 check-in-button" onclick="checkIn()">Check In</button>
                    <input type="hidden" id="job_id" value="{{ $id }}">
                    <input type="hidden" id="address-display" value="">
                    <button type="submit" class="btn btn-primary float-right check-out-button" onclick="checkIn()">Check
                        Out</button>
                </div>

            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Status</th>
                                <th scope="col">Time</th>
                                <th scope="col">Duration</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendance as $key => $attendances)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $attendances->user->name }}</td>
                                    <td>{{ $attendances->address }}</td>
                                    <td>
                                        @switch($attendances->attendance)
                                            @case('checkIn')
                                                <span class="badge bg-success">Check In</span>
                                            @break

                                            @case('checkOut')
                                                <span class="badge bg-danger">Check Out</span>
                                            @break

                                            @default
                                                <span class="badge bg-secondary">Unknown</span>
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
        // Get the current attendance status
        var attendanceStatus = '{{ $attendance->first()->attendance ?? null }}';

        // Disable the check-in button if there is already a check-in attendance
        if (attendanceStatus === 'checkIn' || attendanceStatus === 'checkOut') {
            $('.check-in-button').prop('disabled', true);
        }

        // Disable the check-out button if there is no check-in attendance yet
        if (attendanceStatus === null || attendanceStatus === 'checkOut') {
            $('.check-out-button').prop('disabled', true);
        }

        // Add click event listeners to the buttons
        $('.check-in-button').on('click', function() {
            // checkIn();
            // Enable the check-out button after check-in
            $('.check-out-button').prop('disabled', false);
            // Disable the check-in button after check-in
            $('.check-in-button').prop('disabled', true);
        });

        $('.check-out-button').on('click', function() {
            // checkIn();
            // checkOut();
            // Enable the check-in button after check-out
            $('.check-in-button').prop('disabled', false);
            // Disable the check-out button after check-out
            $('.check-out-button').prop('disabled', true);
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

        function checkIn() {


            if (typeof currentLatitude === 'undefined' || typeof currentLongitude === 'undefined') {
                // Show toastr message
                toastr.error('Please ensure your location is enabled and try again.');
                // Prevent further execution
                return;
            }


            // Get the address from the HTML element where you are displaying it
            var jobID = $('#job_id').val();
            var address = $('#address-display').val();

            // var JobLat = marker.getPosition().lat();
            // var JobLong = marker.getPosition().lng();
            // console.log('new ', JobLat, JobLong);
            // Send AJAX request to log the current location and address
            $.ajax({
                type: 'POST',
                url: '{{ route('attendance.vendor') }}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    latitude: currentLatitude,
                    longitude: currentLongitude,
                    job: jobID,
                    address: address
                },
                success: function(response) {
                    if (response.success == true) {
                        console.log('distance ', response.distance);
                        toastr.success(response.message);
                        location.reload();
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
