@extends('agent.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Work Order</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Work Order</li>
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

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>S/No</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Work Order Status</th>
                    <th>Deliverd Order</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                  @if($WorkOrders)
                    <?php $i = 0; ?>
                    @foreach($WorkOrders as $workOrder)
                    <?php $i++; ?>
                        <tr>
                          <td>{{ $i }}</td>
                          <td>{{ $workOrder->title }}</td>
                          <td>{{ $workOrder->description }}</td>
                          <td>
                            @if ($workOrder->deliver_status === 1)
                                <strong class="text-success">Completed</strong>
                            @elseif ($workOrder->deliver_status === 2)
                                <strong class="text-danger">Rejected</strong>
                            @else
                                <strong class="text-warning">Pending</strong>
                            @endif
                          </td>
                          <td>
                            @if ($workOrder->status === 1)
                                <strong class="text-success">Completed</strong>
                            @elseif ($workOrder->status === 2)
                                <strong class="text-danger">Rejected</strong>
                            @else
                                <strong class="text-warning">Pending</strong>
                            @endif
                          </td>
                          @if($workOrder->status === 1)
                          <td>
                          </td>
                          @else
                          <td>
                          <a href="#" class="orderdel btn btn-primary" data-bs-toggle="modal" data-bs-target="#orderDelModal{{ $workOrder->id }}" data-workorder-code="{{ $workOrder->code }}"  data-status="{{ $workOrder->status }}"> <i class="fas fa-truck"></i></a>
                          </td>
                          @endif
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


    <!-- Modal Feedback-->
{{-- <div class="modal fade" id="orderDelModal" tabindex="-1" role="dialog" aria-labelledby="assignModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header">
                <h5 class="modal-title" id="assignModalLabel">Order Deliverd</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <!-- Vendor assignment form -->
                <form action="{{ route('vendor.deliver_order') }}" method="POST">
                    @csrf
                    <input type="hidden" name="work_order_code" id="work_order_code">

                    <div class="form-group">
                        <label for="deliverd_id">Select Status:</label>
                        <select class="form-control" id="status" name="status" required>
                                <option value="0">Slelect Menu</option>
                                <option value="1">Order Deliverd</option>
                                <option value="2">Reject</option>
                                <option value="3">Pending</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Order Deliver</button>
                </form>
            </div>
        </div>
    </div>
</div> --}}
<!--End Feedback-->



  </section>
  <!-- /.content -->
</div>

<script>

    $(document).ready(function() {
      $('.orderdel').click(function() {
            var workOrderCode = $(this).data('workorder-code');
            var status = $(this).data('status');

            $('#work_order_code').val(workOrderCode);
            $('#status').val(status);
            $('#orderDelModal').modal('show');
        });
    });


</script>
@endsection




