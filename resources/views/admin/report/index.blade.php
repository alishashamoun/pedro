@extends(Auth::user()->hasRole('Admin') ? 'admin.layouts.app' : 'manager.layouts.app')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('admin/moodreport/index.Title') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ __('admin/moodreport/index.Title') }}</li>
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
                            <div class="card-header">
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#moodReportModal">
                                    {{ __('admin/moodreport/index.NewReport') }}
                                </button>


                                <!-- Mood Report Modal -->
                                <div class="modal fade" id="moodReportModal" tabindex="-1" role="dialog"
                                    aria-labelledby="moodReportModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="moodReportModalLabel">Report Your
                                                    Mood</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Mood Report Form -->
                                                <form method="POST" action="{{ route('moodreport.store') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="mood">Select Your
                                                            {{ __('admin/moodreport/index.Mood') }}:</label>
                                                        <select class="form-control" id="mood" name="mood" required>
                                                            <option value="1">Very Happy</option>
                                                            <option value="2">Happy</option>
                                                            <option value="3">Neutral</option>
                                                            <option value="4">Sad</option>
                                                            <option value="5">Very Sad</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="comments">{{ __('admin/moodreport/index.Comments') }}:</label>
                                                        <textarea class="form-control" id="comments" name="comments" rows="4"></textarea>
                                                    </div>
                                                    <button type="submit"
                                                        class="btn btn-primary">{{ __('admin/moodreport/index.Submit') }}</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>S. No</th>
                                            <th>{{ __('admin/moodreport/index.Mood') }}</th>
                                            <th>{{ __('admin/moodreport/index.Comments') }}</th>
                                            <th>{{ __('admin/moodreport/index.Employee') }}</th>
                                            <th>{{ __('admin/moodreport/index.CreatedAt') }}</th>
                                            {{-- <th>Actions</th> --}}
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if ($report)
                                            <?php $i = 0; ?>
                                            @foreach ($report as $key => $reports)
                                                <?php $i++; ?>
                                                <tr>
                                                    <td>
                                                        {{ $i }}
                                                    </td>
                                                    <td>
                                                        @php
                                                            $moods = [
                                                                1 => [
                                                                    'label' => 'Very Happy',
                                                                    'class' => 'badge-success',
                                                                ],
                                                                2 => ['label' => 'Happy', 'class' => 'badge-info'],
                                                                3 => ['label' => 'Neutral', 'class' => 'badge-warning'],
                                                                4 => ['label' => 'Sad', 'class' => 'badge-dark'],
                                                                5 => ['label' => 'Very Sad', 'class' => 'badge-danger'],
                                                            ];
                                                            $moodData = $moods[$reports->mood] ?? null;
                                                            $badgeClass = $moodData
                                                                ? 'badge ' . $moodData['class']
                                                                : 'badge badge-secondary';
                                                            $moodText = $moodData ? $moodData['label'] : 'null';
                                                        @endphp

                                                        <span class="{{ $badgeClass }}">{{ $moodText }}</span>
                                                    </td>



                                                    <td>{{ isset($reports->comments) ? $reports->comments : '' }}
                                                    </td>
                                                    <td>{{ isset($reports->employee->name) ? $reports->employee->name : 'null' }}
                                                    </td>
                                                    <td>{{ isset($reports->created_at) ? $reports->created_at->format('F j, Y g:i A') : 'null' }}
                                                    </td>
                                                    {{-- <td>
                                                        <button type="button" class="btn btn-success" data-toggle="modal"
                                                            data-target="#exampleModal{{ $reports->id }}">
                                                            Edit
                                                        </button>
                                                         <form action="{{ route('task.destroy', $reports->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"
                                                                onclick="return confirm('Are you sure you want to delete this Report?')">Delete</button>
                                                        </form>
                                                    </td> --}}



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

@endsection
