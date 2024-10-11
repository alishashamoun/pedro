@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' : 'manager.layouts.app')



@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header mb-5">
                <h1>Inspection Checklist</h1>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title font-weight-bolder">Inspection Checklist for {{ $job->name }}</h3>
                                {{-- <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Re Assign
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Re Assign</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">

                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('reassign_checklist', ['id' => $id]) }}">
                                                    <div class="form-group">
                                                        <label for="name">Checklist Name</label>
                                                        <input type="text" class="form-control"
                                                            id="name" name="name" required>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <a class="btn btn-primary btn-sm" href="{{ route('reassign_checklist', ['id' => $id]) }}">Re
                                    Assign</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Task</th>
                                            <th>Rating</th>
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($response as $responses)
                                            <tr>
                                                <td>{{ $responses->checklistItem->inspectionChecklist->name ?? '' }}</td>
                                                <td>{{ $responses->checklistItem->description ?? '' }}</td>
                                                <td>
                                                    @if ($responses->rating === 'red')
                                                        <span class="badge badge-danger">Red</span>
                                                    @elseif ($responses->rating === 'yellow')
                                                        <span class="badge badge-warning">Yellow</span>
                                                    @elseif ($responses->rating === 'green')
                                                        <span class="badge badge-success">Green</span>
                                                    @endif
                                                </td>
                                                <td>{{ $responses->remarks }}</td>
                                            </tr>
                                        @endforeach

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

    </div>
@endsection
