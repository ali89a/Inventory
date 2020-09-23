@extends('admin.layout.master')
@section('title','Permission Create')
@section('css')
    <link rel="stylesheet" href="{{ asset('vue-js/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Permission Create</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">
                                <button style="margin-right: 9px;" class="btn btn-info pull-right">
                                    <a style="color: #ffffff;" href="{{ route('permission.index') }}"><i class="fa fa-reply" aria-hidden="true"></i></a>
                                </button>
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

                        <div class="card-box">
                            <div id="vue_app">
                                <hr>
                                {!! BootForm::open(['model' => $model, 'store' => 'permission.store', 'update' => 'permission.update']); !!}

                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 offset-lg-4 offset-md-4 offset-sm-4">
                                    {!!  BootForm::text('name', 'Permission Name (Must be unique)', null, ['placeholder'=>'Enter name','required'=>'required'] ) !!}
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 offset-lg-6 offset-md-6 offset-sm-6" style="margin-top:20px;">
                                        {!! BootForm::submit('Submit',['class'=>'btn btn-primary']); !!}
                                    </div>
                                </div>
                                {!! Bootform::close() !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>

@endsection
@push('script-bottom')
    <script src="{{ asset('vue-js/vue/dist/vue.js') }}"></script>
    <script src="{{ asset('vue-js/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

    <script>
      

            $('.bSelect').selectpicker({
                liveSearch: true,
                size: 5
            });
        });
    </script>

@endpush
