@extends('users.layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Open Location Picker
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Pick a Location</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Google Map container -->
                                    <div id="maps" style="height: 400px;"></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="saveLocation()">Save
                                        changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn bg-indigo mr-2 " onclick="checkIn()">Check In</button>
                    <button class="btn bg-Maroon" onclick="stopTracking()">Stop</button>
                    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#locationPickerModal">
                        Open Location Picker
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="locationPickerModal" tabindex="-1" role="dialog"
                        aria-labelledby="locationPickerModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="locationPickerModalLabel">Pick a Location</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Google Map container -->
                                    <div id="maps" style="height: 400px;"></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="saveLocation()">Save
                                        Location</button>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <button type="submit" class="btn btn-primary float-right" onclick="checkOut()">Check Out</button>
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
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>John Doe</td>
                                <td id="address-display"></td>
                                <td>Checked In</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jane Doe</td>
                                <td></td>
                                <td>Checked Out</td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>


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

                // Do something with the latitude and longitude (e.g., save to database)
                alert('Location saved - Latitude: ' + latitude + ', Longitude: ' + longitude);

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
    <script>
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

                    // Get and display the address
                    getAddress(currentLocation);
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
            var address = $('#address-display').text();

            var JobLat = marker.getPosition().lat();
            var JobLong = marker.getPosition().lng();
            console.log('new ', JobLat, JobLong);
            // Send AJAX request to log the current location and address
            $.ajax({
                type: 'POST',
                url: '{{ route('attendance.store') }}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    latitude: currentLatitude,
                    longitude: currentLongitude,
                    Joblatitude: JobLat,
                    Joblongitude: JobLong,
                    address: address
                },
                success: function(response) {
                    if (response.success == true) {
                        console.log('distance ', response.distance);
                        toastr.success(response.message);
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
                        $('#address-display').text(formattedAddress);
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
@endsection
