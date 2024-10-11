@extends('vendor.layouts.app')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Estimate Request</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <a href="{{ route('vendor_estimate_requests.index') }}" class="btn btn-primary my-3">Back to menu</a>
                <button class="btn btn-success my-3" id="download-pdf">Download PDF</button>
                <div class="row">
                    <div class="col-12">
                        <div class="p-3" id="pdf-content">
                            <table class="table ">
                                <tbody>
                                    <tr>
                                        <th>Client Name:</th>
                                        <td>{{ $estimate->first_name }} {{ $estimate->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email:</th>
                                        <td>{{ $estimate->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Street Address:</th>
                                        <td>{{ $estimate->street_address }}</td>
                                    </tr>
                                    <tr>
                                        <th>City:</th>
                                        <td>{{ $estimate->city }}</td>
                                    </tr>
                                    <tr>
                                        <th>State:</th>
                                        <td>{{ $estimate->state }}</td>
                                    </tr>
                                    <tr>
                                        <th>Zip Code:</th>
                                        <td>{{ $estimate->zip_code }}</td>
                                    </tr>
                                    <tr>
                                        <th>Job Description:</th>
                                        <td>{{ $estimate->details }}</td>
                                    </tr>
                                    <tr>
                                        <th>Bid Due Date:</th>
                                        <td>{{ $estimate->bids->where('user_id', auth()->id())->first()->due_date }}</td>
                                    </tr>
                                    <tr>
                                        <th>Frequency:</th>
                                        <td> <span class="badge badge-success">
                                                {{ $estimate->frequency }}
                                            </span></td>
                                    </tr>
                                    @if ($estimate->picture)
                                        <tr>
                                            <th>Picture:</th>
                                            <td>
                                                <img src="{{ asset('storage/' . $estimate->picture) }}" alt="User Picture"
                                                    class="img-fluid">
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <form action="{{ route('vendor_estimate_requests.update', $estimate->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-5">
                                    <div class="input-group ">
                                        <input type="number" name="bid" class="form-control"
                                            value="{{ $userBid ? $userBid->bid : '' }}" placeholder="Write your bid"
                                            aria-label="Write your bid" aria-describedby="basic-addon2"
                                            {{ $userBid->bid != null ? 'disabled' : '' }} id="bidInput">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">USD</span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        @if ($userBid->bid == null)
                                            <span class="font-weight-bold">Due Date:</span> <span
                                                class="remaining-time text-danger"
                                                data-due-date="{{ $userBid->due_date }}"></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-3">
                                    <button class="btn btn-indigo" id="bidButton"
                                        {{ $userBid->bid != null ? 'disabled' : '' }}>Place
                                        Bid</button>
                                </div>
                                <div class="col-4">
                                </div>
                            </div>
                        </form>

                        <a href="{{ route('vendor_estimate_requests.index') }}" class="btn btn-primary my-3">Back to
                            menu</a>
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </section>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const timeElements = document.querySelectorAll('.remaining-time');

            timeElements.forEach(element => {
                const dueDate = new Date(element.getAttribute('data-due-date'));
                const now = new Date();
                let remainingTime = Math.floor((dueDate - now) / 1000);

                if (remainingTime <= 0) {
                    element.textContent = "Time expired";
                    document.getElementById('bidInput').disabled = true;
                    document.getElementById('bidButton').disabled = true;
                    element.classList.add('text-danger');
                } else {
                    const interval = setInterval(() => {
                        remainingTime -= 1;
                        if (remainingTime <= 0) {
                            element.textContent = "Time expired";
                            element.classList.add('text-danger');
                            clearInterval(interval);
                        } else {
                            const days = Math.floor(remainingTime / (24 * 60 * 60));
                            const hours = Math.floor((remainingTime % (24 * 60 * 60)) / (60 * 60));
                            const minutes = Math.floor((remainingTime % (60 * 60)) / 60);
                            const seconds = remainingTime % 60;
                            element.textContent =
                                `${days}d ${hours}h ${minutes}m ${seconds}s remaining`;
                        }
                    }, 1000);
                }
            });
        });
    </script>

@endsection
