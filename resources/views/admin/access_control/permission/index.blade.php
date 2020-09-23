@extends('admin.layout.master')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{ asset('vue-js/bootstrap-select/dist/css/bootstrap-select.min.css') }}">

    <style>
        table[class="table dataTable no-footer"]{
            width: 100%!important;
        }
        table thead th:first-child {
            width: 5%;
        }
        table thead th:nth-child(2) {
            width: 65%;
        }
        table thead th:nth-child(3) {
            width: 20%;
        }
      
        table thead th:last-child{
            width: 10%;
        }
    </style>
@endsection

@section('title','Permission Lists')

@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Permission Lists</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">

                            <li class="breadcrumb-item">
                            {{-- <button style="margin-right: 9px;" class="btn btn-info pull-right">
                                    <a style="color: #ffffff;" href="{{route('permission.create')}}">Add
                                    Permission</a>
                                </button> --}}
                            </li>

                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive">
                        <table id="datatable" class="display datatable table table-stripped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Guard Name</th>
                            </tr>
                            </thead>
                            <tbody>

                                @foreach($permissions as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->name}}</td>
                                        <td>{{ $row->guard_name }}</td>
                                     
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('script')

   <!-- Plugins js -->
    <script src="{{ URL::asset('assets/libs/datatables/datatables.min.js')}}"></script>
    <!-- Init js-->
    <script src="{{ URL::asset('assets/js/pages/datatables.init.js')}}"></script>
    <script src="{{ asset('vue-js/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

  

@endsection

