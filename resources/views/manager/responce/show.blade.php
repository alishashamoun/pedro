@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' : (Auth::user()->hasRole('vendor') ? 'vendor.layouts.app' : (Auth::user()->hasRole('account manager') ? 'manager.layouts.app' : (Auth::user()->hasRole('User') ? 'users.layouts.app' : 'default.app'))))


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header mb-5">
                <h1>{{ __('vendor/responce/index.inspection_checklist') }}</h1>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            @if (auth()->user()->hasRole('Admin'))
                                <div class="card-header ">
                                    <h3 class="card-title font-weight-bolder"></h3>

                                    <a class="btn btn-danger btn-sm"
                                        href="{{ route('reassign_checklist', ['id' => $id]) }}">{{ __('admin/checklist/index.reassign') }}</a>
                                </div>
                            @endif
                            <!-- /.card-header -->
                            {{-- @dd($response) --}}
                            @foreach ($response as $response1)
                                <div class="card-header">
                                    <h3 class="card-title">{{ __('vendor/responce/index.inspection_checklist_for') }} <span
                                            class="font-weight-bold">{{ $response1->checklist->name ?? '' }}</span>
                                    </h3>
                                </div>

                                <div class="card-body">

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                {{-- <th>Sheet</th> --}}
                                                <th>{{ __('vendor/responce/index.task') }}</th>
                                                <th>{{ __('vendor/responce/index.rating') }}</th>
                                                <th>{{ __('vendor/responce/index.remarks') }}</th>
                                                <th>{{ __('vendor/responce/index.image') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($response1->checklist->checklistItems))
                                                @foreach ($response1->checklist->checklistItems as $responses)
                                                    @php
                                                        $result = \App\Models\InspectionResponse::where('checklist_item_id', $responses->id)
                                                            ->where('location_id', $id)
                                                            ->first();
                                                    @endphp
                                                    {{-- @dd($result) --}}

                                                    <tr>
                                                        <td>{{ $responses->description ?? '' }}</td>
                                                        {{-- <td>{{ $responses->checklistItem->description ?? '' }}</td> --}}
                                                        <td>
                                                            @if ($result->rating === 'red')
                                                                <span class="badge bg-danger">{{ __('admin/checklist/index.red') }}</span>
                                                            @elseif ($result->rating === 'yellow')
                                                                <span class="badge bg-warning">{{ __('admin/checklist/index.yellow') }}</span>
                                                            @elseif ($result->rating === 'green')
                                                                <span class="badge bg-success">{{ __('admin/checklist/index.green') }}</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $result->remarks }}</td>
                                                        <td>
                                                            @if (isset($result->file_path))
                                                                <a href="{{ asset('storage/' . $result->file_path) }}"
                                                                    target="blank">
                                                                    <img src="{{ asset('storage/' . $result->file_path) }}"
                                                                        alt="" srcset="" class="img-thumbnail"
                                                                        style="max-width: 100px">
                                                                </a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            @endforeach
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                        {{ __('vendor/responce/index.notes') }}
                                        </th>
                                        <th>
                                        {{ __('vendor/responce/index.image') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <td colspan="">
                                        {{ $new->notess->notes ?? '' }}
                                    </td>
                                    <td>
                                        @if (isset($new->notess->file))
                                            <a href="{{ asset('storage/' . $new->notess->file) }}" target="blank">
                                                <img src="{{ asset('storage/' . $new->notess->file) }}" alt=""
                                                    srcset="" class="img-thumbnail" style="max-width: 200px">
                                            </a>
                                        @endif
                                    </td>
                                </tbody>

                            </table>
                            <!-- /.card-body -->

                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </section>
    </div>
@endsection
