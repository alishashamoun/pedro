<div class="row">
    <div class="col-12">

        <div class="card">

            {{-- <!-- /.card-header -->
            <div class="card-header">
                <a class="btn btn-success" href="{{ route('invoice.create') }}"
                    class="btn btn-primary">Create New Invoice</a>
            </div> --}}
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example3" class="table table-bordered table-striped">
                    <thead class="thead-light">
                        <tr>
                        <th> {{ __('vendor/invoice/index.date') }}</a></th>
                            <th> {{ __('vendor/invoice/index.customer_name') }}</a></th>
                            <th> {{ __('vendor/invoice/index.invoice') }}</a></th>
                            <th> {{ __('vendor/invoice/index.po') }}</a></th>
                            <th> {{ __('vendor/invoice/index.status') }}</a></th>
                            <th> {{ __('vendor/invoice/index.total') }}</a></th>
                            <th> {{ __('vendor/invoice/index.total_due') }}</a></th>
                            <th> {{ __('vendor/invoice/index.actions') }}</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @dd($recur) --}}
                        @if ($recur->isEmpty())

                        <tr>
                            <td class="text-center" colspan="8">
                                No Records Availabe

                            </td>
                        </tr>
                        @else
                        @foreach ($recur as $inv)
                            <tr>
                                <td>{{ $inv->updated_at->format('l, F j, Y h:i A') }}</td>
                                <td>{{ isset($inv->job->customer->name) ? $inv->job->customer->name : 'N/A' }}</td>
                                <td>{{ $inv->id }}</td>
                                <td>{{ isset($inv->job) ? $inv->job->po_no : 'N/A' }}</td>
                                <td class=""> <label class="badge badge-warning ">{{ Str::ucfirst($inv->status)  }}</label></td>
                                {{-- @dd($inv->unpaid->total) --}}
                                <td>{{ isset($inv->unpaid) ? $inv->unpaid->total : 'N/A' }}
                                </td>
                                <td>{{ isset($inv->unpaid) ? $inv->unpaid->total : 'N/A' }}
                                </td>
                                <td class="btn-group">
                                    <a href="{{ route('invoice.show', $inv->id) }}" class="btn btn-info btn-sm "><i
                                            class="fa fa-eye"></i></a>
                                    &nbsp;
                                    <a href="{{ route('invoice.edit', $inv->id) }}" class="btn btn-primary btn-sm"><i
                                            class="fa fa-edit"></i></a>&nbsp;
                                    <form action="{{ route('invoice.destroy', $inv->id) }}" method="POST"
                                        class="">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm dltBtn" data-id="{{$inv->id}}"
                                            ><i
                                            class="fas fa-trash"></i></a></button>
                                    </form>
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
