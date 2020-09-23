@extends('admin.layouts.app')
@section('title')
Product
@endsection
@section('style')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css')}}">
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
                <!-- Horizontal Form -->
                <div class="card card-primary">
                    <div class="card-header bg-light">

                        <h3 class="card-title" style="color:#115548;">Add Product</h3>
                        <div class="card-tools">
                            <a href="{{route('product.index')}}"><button class="btn btn-sm btn-primary"><i
                                        class="fa fa-list" aria-hidden="true"></i> &nbsp;See List</button></a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    {!! BootForm::open(['model' => $model, 'store' => 'product.store', 'update' =>
                    'product.update','class'=>'form-horizontal']);
                    !!}

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                {!! BootForm::select('product_category_id', 'Category',$categories, null,
                                ['class'=>'select2','placeholder'=>'Select one','required'=>'required'] ) !!}
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                {!! BootForm::select('country_id', 'Country',$countries, null,
                                ['class'=>'select2','placeholder'=>'Select one','required'=>'required'] ) !!}
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                {!! BootForm::select('unit_of_measurement_id', 'Unit',$units, null,
                                ['class'=>'select2','placeholder'=>'Select one','required'=>'required'] ) !!}
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                {!! BootForm::text('name', 'Product Name', null,
                                ['placeholder'=>'Enter name','required'=>'required'] ) !!}
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                {!! BootForm::select('status', 'Status',['active'=>'Active','inactive'=>'Inactive'],
                                null,
                                ['class'=>'select2','placeholder'=>'Select one','required'=>'required'] ) !!}
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:20px;">
                                {!! BootForm::submit('Submit',['class'=>'btn btn-primary']); !!}
                            </div>
                        </div>
                    </div>
                    {!! Bootform::close() !!}

                </div>
                <!-- /.card -->
            </div>
            <div class="col-2"></div>
        </div>
        <!-- /.row -->

    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
@push('script-bottom')
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js')}}"></script>
<script>
    $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>

@endpush