@extends('admin.layouts.app')
@section('title')
Sales Report
@endsection
@section('style')
<!-- daterange picker -->
<link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css')}}">
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
                        <h3 class="card-title" style="color:#115548;">Sales Report</h3>
                        <div class="card-tools">
                            <a href="{{route('sale.create')}}"><button class="btn btn-sm btn-primary"><i
                                        class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp;Add
                                    Sales</button></a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('sale.report') }}" method="get">
                            @csrf
                            <div class="row">

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-group">
                                        <label>Form Date:</label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="from_date"
                                                class="form-control float-right datepicker" id="datepicker"
                                                autocomplete="off">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-group">
                                        <label>To Date:</label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                            <input name="to_date" type="text"
                                                class="form-control float-right datepicker" autocomplete="off">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-top:32px;">
                                    {!! BootForm::submit('Submit',['class'=>'btn btn-primary btn-block']); !!}
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-top:32px;">
                                    <a href="{{ route('sale.report') }}"
                                        class="btn btn-block btn-success">Refresh</a>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-4 col-xs-12" style="margin-top:20px;">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                        <th>#</th>
                                        <th>Invoice Number</th>
                                        <th>Subtotal</th>
                                        <th>discount</th>
                                        <th>Grand Total</th>
                                        <th>Created At</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($sales as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row->invoice_number}}</td>
                                            <td>{{ $row->subtotal}}</td>
                                            <td>{{ $row->discount}}</td>
                                            <td>{{ $row->grandtotal}}</td>
                                            <td>{{ \Carbon\Carbon::parse($row->created_at)->diffForHumans()}}</td>
                                        
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
<!-- date-range-picker -->
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
@endsection
@push('script-bottom')
<!-- page script -->
<script>
    $(function () {
$(".datepicker").datepicker(
   {
     changeMonth: true,
    changeYear: true,showButtonPanel: true,
  dateFormat: 'dd-mm-yy'
   
   } 
);
// //Date range picker
// $('#reservationdate').datetimepicker({
// format: 'YYYY-MM-DD'
// });
        
     
       
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