@extends('layouts.admin_master')
@section('title','User Create')
@include('admin.partials.form-style')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>User</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Advanced Form</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    {{ BootForm::horizontal(['model'=>$model, 'store' => 'user.store', 'update' => 'user.update','enctype'=>'multipart/form-data','autocomplete'=>'off']) }}
    <!-- SELECT2 EXAMPLE -->
    <div class="card card-default">
      <div class="card-header">
        <h3 class="card-title">Select2 (Default Theme)</h3>

        <div class="card-tools">
        <a href="{{ route('user.index') }}" class="btn btn-primary btn-sm rounded"><i class="fa fa-list-ul"></i>
          See List</a>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            {{ BootForm::text('name', null, null, ['class'=>'form-control input-sm']) }}
          </div>
          <div class="col-md-6">
            {{ BootForm::text('email', null, null, ['class'=>'form-control input-sm']) }}
          </div>
          <div class="col-md-6">
            {{ BootForm::password('password', null, ['class'=>'form-control input-sm']) }}
          </div>
          <div class="col-md-6">
            {{ BootForm::password('password_confirmation', null, ['class'=>'form-control input-sm']) }}
          </div>
          <div class="col-md-6">
            {{ BootForm::select('roles[]', 'Roles', $roles, $selected_roles ?? '', ['class'=>'form-control select2', 'multiple','style="width: 100%;"','data-placeholder="Select a State"']) }}
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
       {{ BootForm::submit('Submit') }}
      </div>
    </div>
    <!-- /.card -->
    {{ BootForm::close() }}
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<div class="page-wrapper">
  <div class="content container-fluid">
    <div class="row">
      <div class="col-xs-7">
        <h4 class="page-title">User</h4>
      </div>

      @can('access_control_user_controller_index')
      <div class="col-xs-5 text-right m-b-30">
        <a href="{{ route('user.index') }}" class="btn btn-primary rounded"><i class="fa fa-list-ul"></i>
          See List</a>
      </div>
      @endcan
    </div>
    <div class="card-box">
      <div class="row">
        <div class="col-md-12">
          {{ BootForm::horizontal(['model'=>$model, 'store' => 'user.store', 'update' => 'user.update','enctype'=>'multipart/form-data','autocomplete'=>'off']) }}


          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-3">


            {{ BootForm::submit('Submit') }}

          </div>


          {{ BootForm::close() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@include('admin.partials.form-script')