@extends('admin.layouts.app')
@section('title')
Product
@endsection
@section('style')

<link rel="stylesheet" type="text/css"
  href="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
<link rel="stylesheet" href="{{ asset('vue-js/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
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
        <div class="row" id="vue_app">
           <div class="col-lg-12 col-md-12">
                {!! BootForm::open(['model' => $model, 'store' => 'purchase.store','enctype' =>
                'multipart/form-data']); !!}
              
              
                <div class="card">
                  <div class="card-body">
                    <div class="card-box">
                      <hr>
                      <div id="">
                        <div class="row">
                          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            {!! BootForm::select('category_id', 'Category',$categories, null,
                            ['class'=>'bSelect','placeholder'=>'Select
                            One','v-model'=>"category_id",'v-on:change'=>'fetch_product'] ) !!}
                          </div>
                        
              
                          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                              <label for="product_id">Product</label>
                              <select name="product_id" id="product_id" class="form-control bSelect" v-model="product_id">
                                <option value="">Select one</option>
              
                                <option :value="row.id" v-for="row in products" v-html="row.name">
                                </option>
              
                              </select>
                            </div>
                          </div>
              
                          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="margin-top: 26px;">
                            <button type="button" class="btn btn-info btn-block" @click="data_input">Add</button>
                          </div>
              
                          <br>
                          <br>
                          <br>
                          <br>
              
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" v-if="items.length>0">
              
                            <hr>
                            <div class="table-responsive">
                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th>Product Name</th>
                                    <th>Unit</th>
                                    <th>quantity</th>
                                    <th>Buying Price</th>
                                    <th>Selling Price</th>
                                    <th>Subtotal</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr v-for="(row, index) in items">
              
                                    <td>
                                      <input type="hidden" :name="'products['+index+'][product_id]'" class="form-control input-sm"
                                        v-bind:value="row.product_id">
              
              
                                      <input type="text" class="form-control input-sm" v-bind:value="row.product_name" readonly>
                                    </td>
              
                                    <td>
              
                                  <input type="text" class="form-control input-sm" v-bind:value="row.unit" readonly>
                                    </td>
                                    <td>
              
                                      <input type="number" v-model="row.quantity" :name="'products['+index+'][quantity]'"
                                        class="form-control input-sm" @change="itemtotal(row)">
                                    </td>
                                    <td>
                                      <input type="number" v-model="row.price" :name="'products['+index+'][buying_price]'"
                                        class="form-control input-sm" @change="itemtotal(row)">
                                    </td>
                                    <td>
                                      <input type="number" v-model="row.selling_price" :name="'products['+index+'][selling_price]'" class="form-control input-sm">
                                    </td>
                                    <td>
                                      <input type="text" class="form-control input-sm" v-bind:value="itemtotal(row)" readonly>
                                    </td>
                                    <td>
                                      <button type="button" class="btn btn-danger btn-xs" @click="delete_row(row)"><i
                                          class="fa fa-trash"></i></button>
                                    </td>
                                  </tr>
              
                                </tbody>
                                <tfoot>
              
                                  <tr>
                                    <td colspan="4">
                                                                  
                                                                  </td>
                                    <td>
                                                                     Total
                                                                  </td>
                                                                  <td>
                                                                        <input type="text" class="form-control input-sm" v-bind:value="subtotal" readonly>
                                                             
                                                                  </td>
                                  </tr>
                                  <tfoot>
                              </table>
                            </div>
                          </div>
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" v-if="items.length > 0">
                            {!! BootForm::textarea('description',null,null,['placeholder'=>'Enter description','rows'=>'2']); !!}
                          </div>
                        </div>
              
              
              
                      </div>
                    </div>
              
                  </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right" v-if="items.length > 0">
                  {!! BootForm::submit('Submit',['class'=>'btn btn-primary']); !!}
                </div>
                {!! Bootform::close() !!}
              
              </div> <!-- end col -->
        </div>
        <!-- /.row -->

    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
@push('script-bottom')

<script src="{{ asset('vue-js/vue/dist/vue.js') }}"></script>
<script src="{{ asset('vue-js/axios/dist/axios.min.js') }}"></script>
<script src="{{ asset('vue-js/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>

<script>
  $(document).ready(function () {

            var vue = new Vue({
                el: '#vue_app',
                data: {
                    config: {
                      
                      get_product_info_by_category_id_url: "{{ url('fetch-product-by-category-id') }}",
                      get_product_info_url: "{{ url('fetch-product-info') }}",
                    },
                        category_id:'',
                        product_id: '',
                        products: [],
                        items: [],
                        quantity: 0,
                        price: 0,
                        selling_price: 0,
                     
                },
                computed: {

subtotal:function(){
    return this.items.reduce((total,item)=>{
       return total + item.quantity* item.price
    },0)
}
                },
                    methods: {
                
                fetch_product(){
                
                var vm = this;
                
                var slug = vm.category_id;
            //    alert(slug);
                if (slug) {
                axios.get(this.config.get_product_info_by_category_id_url + '/' + slug).then(function (response) {
                
                vm.products = response.data.products;
                
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
                                        product_name: product_details.name,
                                        unit: product_details.unit_of_measurement.name,
                                        quantity:0,
                                        price:0,
                                        selling_price: 0,
                                        subtotal:0,
                                    });

                                    vm.product_id = '';
                                    vm.category_id = '';

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

                       console.log(index.quantity*index.price);
                       return index.quantity * index.price;


                    //   alert(quantity);
                    //  var total= row.quantity);
                    //  row.itemtotal=total;
                    },

                },

                updated() {
                    $('.bSelect').selectpicker('refresh');
                }

            });

            $('.bSelect').selectpicker({
                liveSearch: true,
                size: 5
            });
            $('.datepicker').datepicker({
            format: 'dd/mm/yyyy'
            });
        });
</script>
@endpush