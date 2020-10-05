@extends('admin.layouts.app')
@section('title')
Purchase Report
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
                        <h3 class="card-title" style="color:#115548;">Purchase Report</h3>
                        <div class="card-tools">
                            <a href="{{route('purchase.create')}}"><button class="btn btn-sm btn-primary"><i
                                        class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp;Add
                                    Purchase</button></a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Invoice Number</th>
                                    <th>Grand Amount</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($purchases as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->invoice_number}}</td>
                                    <td>{{ $row->grand_amount}}</td>
                                    <td>{{ \Carbon\Carbon::parse($row->created_at)->diffForHumans()}}</td>

                                    <td>
                                        @can('Role Edit')
                                        <div class="btn-group">
                                            <a href="{{ route('purchase.edit', $row->id) }}"
                                                class="btn btn-xs btn-primary">
                                                <i class="fa fa-pencil-square-o"></i>
                                                Edit
                                            </a>
                                        </div>
                                        @endcan
                                    </td>
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