@extends('admin.layouts.app')
@section('title')
Print Labels
@endsection

@section('style')
<!-- DataTables -->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{ asset('vue-js/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
@endsection

@section('css-bottom')
<link rel="stylesheet" href="{{ asset('/') }}datatable/dataTables.bootstrap4.min.css">
<style>
  .green {
    background-color: #008000;
    }
    
    .yellow {
    background-color: #FFFF00;
    }
    
    table tr td {
    color: #000;
    }
    
    #li_hover ul li:hover {
    background-color: #008000;
    color: #fff;
    }
</style>
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
                        <h3 class="card-title" style="color:#115548;">Product List</h3>
                        <div class="card-tools">
                            <a href="{{route('product.create')}}"><button class="btn btn-sm btn-primary"><i
                                        class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp;Add Product</button></a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- end page title -->
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <form action="{{ route('label.store') }}" method="post" target="_blank">
                                        @csrf
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-box" id="vue_app">
                                                    <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="li_hover">
                            
                                                            <h4 class="font-size-18">Add products to generate Labels</h4>
                                                            <hr>
                                                        <div>
                                                            <div style="display:block; position:relative; z-index: 1">
                                                                <input type="text" placeholder="Search Name/Product Id" v-model="searchquery" v-on:keyup="autoComplete"
                                                                    class="form-control input-sm" autofocus>
                                                            </div>
                                                        
                                                            <div style="position: absolute;z-index: 99;">
                                                                <div v-if="data_results.length">
                                                                    <ul class="list-group" style="">
                                                        
                                                                        <li style="cursor: pointer;" class="list-group-item" v-for="result in data_results"
                                                                            v-on:click="selectautoComplete(result.product_id)" product_id="result.product_id">
                                                                             @{{ result.product_code }}- @{{ result.product_name }} -@{{ result.product_category }}
                                                                          </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Product Code</th>
                                                                            <th>Product Name</th>
                                                                            <th>Product Category</th>
                                                                            <th>No. of Labels</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr v-for="(row, index) in items">
                                                                            <td>
                            
                                                                                <input type="number" :name="'products['+index+'][serial_number]'"
                                                                                    class="form-control input-sm" v-bind:value="row.serial_number"
                                                                                    readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input type="hidden" :name="'products['+index+'][product_id]'"
                                                                                    class="form-control input-sm" v-bind:value="row.product_id">
                                                                                <input type="hidden" :name="'products['+index+'][img]'"
                                                                                    class="form-control input-sm" v-bind:value="row.img">
                                                                                <input type="hidden" :name="'products['+index+'][product_name]'"
                                                                                    class="form-control input-sm" v-bind:value="row.product_name">
                                                                                <input type="hidden" :name="'products['+index+'][selling_price]'"
                                                                                    class="form-control input-sm" v-bind:value="row.selling_price">
                            
                                                                                <input type="text" class="form-control input-sm"
                                                                                    v-bind:value="row.product_name" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input type="text" class="form-control input-sm" v-bind:value="row.product_category" readonly>
                                                                            </td>
                                                                            <td>
                                                                                <input type="number" :name="'products['+index+'][quantity]'"
                                                                                    class="form-control input-sm" value="1">
                                                                            </td>
                                                                            <td>
                                                                                <button type="button" class="btn btn-danger btn-xs"
                                                                                    @click="delete_row(row)"><i class="fa fa-trash"></i></button>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-box">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <h4 class="font-size-18">Information to show in Labels</h4>
                                                            <hr>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                            {!! BootForm::checkbox('product_name', ' Product Name', '1',
                                                            true,['v-model'=>'product_name']); !!}
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                            {!! BootForm::checkbox('product_price', ' Product Price', '1',
                                                            true,['v-model'=>'product_price']); !!}
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <hr>
                                                            <div class="form-group">
                                                                <label for="page_size">Barcode setting:</label>
                                                                <select name="page_size" v-model="page_size" id="page_size"
                                                                    class="form-control bSelect" required>
                                                                    <option value="">Select one</option>
                                                                    <option value="20">20 Labels per Sheet - (8.5" x 11")</option>
                                                                    <option value="30">30 Labels per sheet - (8.5" x 11")</option>
                                                                    <option value="32">32 Labels per sheet - (8.5" x 11")</option>
                                                                    <option value="40">40 Labels per sheet - (8.5" x 11")</option>
                                                                   
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="offset-lg-8  offset-md-8 offset-md-8 col-lg-4 col-sm-4 col-sm-4">
                                                            <button type="submit" class="btn btn-primary btn-block">Preview
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div> <!-- end col -->
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

@push('script-bottom')
<script src="{{ asset('vue-js/vue/dist/vue.js') }}"></script>
<script src="{{ asset('vue-js/axios/dist/axios.min.js') }}"></script>
<script src="{{ asset('vue-js/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

<script>
    $(document).ready(function () {

                var app = new Vue({
                el: '#vue_app',
                data: {
                        config: {

                        get_product_info_url: "{{ url('fetch-product-info-for-gatepass') }}",
                        get_requisition_info_url: "{{ url('fetch-requisition-info-for-gatepass') }}",
                        },
              


                searchquery: '',
                data_results: [],
                product_id: '',
                items: [],
               
                },
                //--------------
                methods: {
                
                autoComplete(){
                var vm = this;
                vm.data_results = [];
                
                if(vm.searchquery.length > 1){
                
                axios.get('/vuejs/autocomplete/search',{params: {searchquery: vm.searchquery}}).then(response => {
                
              
                
                vm.data_results = response.data;
                  console.log(vm.data_results);
                });
                
                }
                
                },
                selectautoComplete(product_id){

                    var vm = this;
                    if (!product_id) {

                    toastr.error('Enter product', {
                    closeButton: true,
                    progressBar: true,
                    });

                    return false;

                    } else {

                    var slug = product_id;

                    if (slug) {
                    axios.get(this.config.get_product_info_url + '/' + slug).then(function (response) {

                    product_details = response.data;

                    vm.items.push({
                    product_id: product_details.id,
                    product_name: product_details.name,
                    serial_number: product_details.code,
                    selling_price: product_details.selling_price,
                    product_category: product_details.product_category.name,
                    img: product_details.barcode_path,
                    });
                    vm.searchquery = '';
                    vm.data_results = [];

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
                 },
//-------------
                updated() {
                        $('.bSelect').selectpicker('refresh');
                        }
                    });

            $('.bSelect').selectpicker({
                liveSearch: true,
                size: 5
            });

        });
</script>
@endpush