@extends('layouts.admin_master')
@section('title','Purchase Create')
@section('style')
<!-- daterange picker -->
<link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css')}}">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="{{ asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
<!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="{{ asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
@endsection
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Purchase</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
          <li class="breadcrumb-item active">Purchase Create</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- SELECT2 EXAMPLE -->
    {!! BootForm::open(['model' => $model, 'store' => 'purchase.store', 'update' => 'purchase.update']); !!}
    <div class="card card-default" id="vue_app">
      <div class="card-header">
        <h3 class="card-title">Purchase Create</h3>

        <div class="card-tools">
          <a class="btn btn-info btn-sm pull-right" style="" href="{{ route('purchase.index') }}"><i class="fa fa-reply"
              aria-hidden="true">&nbsp;Purchase List</i></a>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <h6>Supplier Info.</h6>
        <div class="row">
          <hr>
          <div class="col-md-4">
            {!! BootForm::select('category_id', 'Category',$categories, null,
            ['class'=>'select2','placeholder'=>'Select one','required'=>'required','v-model'=>"category_id",'v-on:change'=>'fetch_product'] ) !!}
          </div>
          <div class="col-md-4">
           <div class="form-group">
              <label for="product_id">Product</label>
              <select name="product_id" id="product_id" class="form-control select2" v-model="product_id">
                <option value="">Select one</option>
            
                <option :value="row.id" v-for="row in products" v-html="row.name">
                </option>
            
              </select>
            </div>
          </div>
          <div class="col-md-4">
            {!! BootForm::text('amount', null, null, ['placeholder'=>'Enter amount','required'=>'required'] ) !!}

          </div>

          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <h6>Product Info.</h6>
          <hr>
          <div class="col-md-12">

        <!-- Search form -->
        <input class="form-control" type="text" placeholder="Search" aria-label="Search" autofocus>

          </div>
          <div class="col-md-12">

            <div class="table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead class="bg bg-gradient-green">
                  <tr>
                    <th>#</th>
                    <th>Item Name</th>
                    <th>Unit</th>
                    <th>Qty</th>
                    <th>Unit Price</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>183</td>
                    <td>John Doe</td>
                    <td>11-7-2014</td>
                    <td><span class="tag tag-success">Approved</span></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <!-- /.col -->
        </div>
        <!-- /.row -->

      </div>
      <!-- /.card-body -->
      <div class="card-footer">

        <div class="row">
          <div class="col-md-12">
            {!! BootForm::submit('Submit',['class'=>'btn btn-primary']); !!}
          </div>
        </div>

      </div>
    </div>
    <!-- /.card -->
    {!! Bootform::close() !!}
    <!-- SELECT2 EXAMPLE -->



  </div><!-- /.container-fluid -->
</section>
@endsection
@section('script')
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
<!-- InputMask -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Bootstrap Switch -->
<script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
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
@endsection
@push('script-bottom')
<script src="{{ asset('vue-js/vue/dist/vue.js') }}"></script>
<script src="{{ asset('vue-js/axios/dist/axios.min.js') }}"></script>
<script src="{{ asset('vue-js/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
<script>
  $(document).ready(function () {

            var vue = new Vue({
                el: '#vue_app',
                data: {
                    config: {
                        get_category_wise_product_url: "{{ url('fetch-category-wise-product') }}",
                        get_product_info_url: "{{ url('fetch-product-info') }}",
                    },

                     
                        category_id:'',
                        product_id: '',
                        products: [],
                        items: [],
                        quantity: '',
                        price: '',
                     
                },
                computed: {

                },
                    methods: {
                   
                
                fetch_product(){
                
                var vm = this;
                
                var slug = vm.category_id;
                alert(slug);
                if (slug) {
                axios.get(this.config.get_category_wise_product_url + '/' + slug).then(function (response) {
                
                vm.products = response.data;
                
                
                }).catch(function (error) {
                
                toastr.error('Something went to wrong', {
                closeButton: true,
                progressBar: true,
                });
                
                return false;
                
                });
                }
                
                },
                    data_input() {

                        var vm = this;
                        if (!vm.product_id) {

                            toastr.error('Enter product', {
                                closeButton: true,
                                progressBar: true,
                            });

                            return false;

                        } else {

                            var slug = vm.product_id;

                            if (slug) {
                                axios.get(this.config.get_product_info_url + '/' + slug).then(function (response) {

                                    product_details = response.data;

                                    vm.items.push({
                                        product_id: product_details.id,
                                        vehicle_id: product_details.vehicle_id,
                                        product_name: product_details.name,
                                    });

                                    vm.product_id = '';

                                }).catch(function (error) {

                                    toastr.error('Something went to wrong', {
                                        closeButton: true,
                                        progressBar: true,
                                    });

                                    return false;

                                });
                            }

                        }

                    },
               
                    delete_row: function (row) {
                        this.items.splice(this.items.indexOf(row), 1);
                    },
                    itemtotal: function (index) {
console.log(index);
                      //  alert(index.price);
                    //  var total=parseFloat(row.price) * parseFloat(row.quantity);
                    //  row.itemtotal=total.isFl;
                    },

                },

                updated() {
                    $('.bSelect').selectpicker('refresh');
                }

            });

         
        });
</script>
@endpush