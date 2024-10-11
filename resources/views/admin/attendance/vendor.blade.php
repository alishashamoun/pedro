@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' : 'manager.layouts.app')
@section('content')
<style>
    th {
    width: 15px;
}
</style>
    <div class="content-wrapper">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="text-primary">{{ __('admin/attendance/vendor.check_in') }}/{{ __('admin/attendance/vendor.check_out') }}</h2>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('admin/attendance/vendor.name') }}</th>
                                <th scope="col">{{ __('admin/attendance/vendor.address') }}</th>
                                <th scope="col">{{ __('admin/attendance/vendor.status') }}</th>
                                <th scope="col">{{ __('admin/attendance/vendor.work_order_id') }}</th>
                                <th scope="col">{{ __('admin/attendance/vendor.time') }}</th>
                                <th scope="col">{{ __('admin/attendance/vendor.duration') }}</th>
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
                                                <span class="badge badge-success">{{ __('admin/attendance/vendor.check_in') }}</span>
                                            @break

                                            @case('checkOut')
                                                <span class="badge badge-danger">{{ __('admin/attendance/vendor.check_out') }}</span>
                                            @break

                                            @default
                                                <span class="badge badge-secondary">{{ __('admin/attendance/vendor.unknown') }}</span>
                                            @break
                                        @endswitch
                                    </td>
                                    <td>
                                        <a title="{{ __('admin/attendance/vendor.view_work_order') }}" href="{{ route('work_orders.show', $attendances->work_orders_id) }}"
                                            class="text-primary">{{ $attendances->work_orders_id }}</a>

                                    </td>
                                    <td>
                                        {{ $attendances->created_at->format('d-m-Y h:i:s A') }}
                                    </td>
                                    <td>

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
