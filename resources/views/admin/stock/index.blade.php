@extends('admin.layouts.app')
@section('title')
Trainers List
@endsection
@section('style')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
@endsection
@section('content')
<!-- Content Header (Page header) -->

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-1">

        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="color:#115548;">Stock</h3>
                        <div class="card-tools">
                            @can('Training Create')
                            <a href="#" type="button" class="btn btn-sm active-color" data-toggle="modal"
                                data-target="#modal-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                                Input
                                Result
                            </a>
                            @endcan
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stock_ins as $item)
                                <tr>
                                    <td></td>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ \App\Classes\AvailableProductCalculation::product_id($item->product_id) }}</td>
                                    <td></td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>

                <!-- /.card -->

            </div>
        </div>
        <!-- /.row -->

    </div><!-- /.container-fluid -->
    <!-- modal -->
    <div class="modal fade" id="modal-sm">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #6c757d2b;color: black;">
                    <h5 class="modal-title">Input Result</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row form-group">
                        <label for="gender" class="col-sm-3 col-form-label">Training</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="batch_id">
                                <option value="">Select One</option>
                                <option value="Batch">Batch</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="gender" class="col-sm-3 col-form-label">Batch</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="batch_id">
                                <option value="">Select One</option>
                                <option value="Batch">Batch</option>

                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="gender" class="col-sm-3 col-form-label">File</label>
                        <div class="col-sm-9">
                            <input type="file">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" style="background-color: black;color: white;" class="btn btn-default"
                        data-dismiss="modal">Close
                    </button>
                    <button type="button" style="background-color: #0D5245;color: white;" class="btn btn-default">
                        Submit
                    </button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</section>
<!-- /.content -->
@endsection
@section('script')
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
@endsection
@push('script-bottom')
<!-- page script -->
<script>
    $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
</script>
@endpush