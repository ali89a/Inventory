
@extends('admin.layouts.app')
@section('title')
User
@endsection
@section('style')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
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
    <section class="content" >
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">
                    <!-- Horizontal Form -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title" style="color:#115548; font-weight: bold;">User create</h3>
                            <div class="card-tools">
                                <a class="btn btn-sm active-color" href="{{route('user.index')}}">&nbsp;User List</a>
                    
                                {{--                                        <button class="btn btn-sm active-color" data-toggle="modal"
                                                            data-target="#exampleModalLong"><i class="fa fa-plus-circle"
                                                                                               aria-hidden="true"></i> &nbsp;Add User
                                                    </button>--}}
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        {{ BootForm::horizontal(['model'=>$model, 'store' => 'user.store', 'update' => 'user.update','enctype'=>'multipart/form-data','autocomplete'=>'off']) }}


                        <div class="card-body">
                        <div
                            class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            {{ BootForm::text('name', null, null, ['class'=>'form-control input-sm']) }}
                            {{ BootForm::text('email', null, null, ['class'=>'form-control input-sm']) }}
                            {{ BootForm::password('password', null, ['class'=>'form-control input-sm']) }}
                            {{ BootForm::password('password_confirmation', null, ['class'=>'form-control input-sm']) }}
                            {{ BootForm::select('roles[]', 'Roles', $roles, $selected_roles ?? '', ['class'=>'form-control input-sm select2','multiple'=>'multiple','data-placeholder'=>'Select a Roles'])}}
                            {{ BootForm::submit('Submit') }}

                        </div>
                        </div>


                        {{ BootForm::close() }}
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
@section('script')
    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/js/select2.full.min.js')}}"></script>


@endsection
@push('script-bottom')

    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })


        })
    </script>
@endpush
