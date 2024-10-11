@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' : 'manager.layouts.app')


@section('links')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #16ce19 !important;
        color: black !important;
        border-color: #16ce19 !important;
    }

    .select2-selection__choice__display {
        margin-left: 7px !important;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        color: black !important;

    }
</style>
@section('content')
    <div class="content-wrapper">

        <div class="container-fluid mt-5">
            <div class="">
                <div class="col-md-6">
                    <h2 class="mb-4">Section 1: Select Vendors</h2>
                    <form action="{{ route('estimate_requests.vendor.store') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $id }}" name="request_id">
                        <div class="form-group">
                            <label for="vendors">Select Vendors:</label>
                            <select name="vendors[]" id="vendors" class="form-control select2" multiple>
                                @foreach ($vendors as $vendor)
                                    <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="col-md-12 mt-5">
                    <h2 class="mb-4">Section 2: Bids from Vendors</h2>
                    <form action="{{ route('bid.accept') }}" method="POST">
                        @csrf
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    {{-- <th>Select</th> --}}
                                    <th>Vendor</th>
                                    <th>Bid Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bids as $bid)
                                    <tr>
                                        <td>
                                            {{-- @dump($bid) --}}
                                            <div class="form-check">
                                                <input type="radio" name="bid" value="{{ $bid->id }}"
                                                    class="bid-radio"
                                                    {{ $bid->selected ? 'checked disabled' : ($bid->selected == 0 ? 'disabled' : '') }}
                                                    required>

                                                <label class="form-check-label" for="exampleRadios1">
                                                    {{ $bid->user->name }} {{ $bid->selected ? '(Selected)' : '' }}
                                        </td>
                                        </label>
                                        <td class="@if (!$bid->bid) text-muted font-italic @endif">
                                            {{ $bid->bid ?? 'No bid yet' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"
                                {{ $bids->contains('selected', true) ? 'disabled' : '' }}>Approve</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    <script>
        document.getElementById('bidForm').addEventListener('submit', function(event) {
            var radios = document.querySelectorAll('.bid-radio');
            var checked = false;
            for (var i = 0; i < radios.length; i++) {
                if (radios[i].checked) {
                    checked = true;
                    break;
                }
            }
            if (!checked) {
                alert('Please select a bid before submitting.');
                event.preventDefault();
            }
        });
    </script>
@endsection
<!-- Scripts -->
