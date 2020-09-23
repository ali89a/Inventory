@extends('admin.layouts.app')
@section('title')
Category
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
                    <div class="card card-primary">
                        <div class="card-header bg-light">

                            <h3 class="card-title" style="color:#115548;">Add Role</h3>
                            <div class="card-tools">
                                <a href="{{route('category.index')}}" ><button class="btn btn-sm btn-primary"><i class="fa fa-list" aria-hidden="true"></i> &nbsp;See List</button></a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        {!! BootForm::open(['model' => $model, 'store' => 'category.store', 'update' => 'category.update','class'=>'form-horizontal']);
                                                  !!}

                        <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                {!! BootForm::text('name', 'Category Name (Must be unique)', null,
                                ['placeholder'=>'Enter name','required'=>'required'] ) !!}
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


@endpush
