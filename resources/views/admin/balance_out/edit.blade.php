@extends('layouts.admin_master')
@section('title','Balance Out Edit')
@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css')}}">
@endsection
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Balance Out</h1>
      </div>
      <div class="col-sm-6">

      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- SELECT2 EXAMPLE -->
    {!! BootForm::open(['model' => $model, 'store' => 'balance-out.store', 'update' => 'balance-out.update']); !!}
    <div class="card card-default">
      <div class="card-header">
        <h3 class="card-title">Balance Out Edit</h3>

        <div class="card-tools">
          <a class="btn btn-info pull-right" style="color: #ffffff;" href="{{ route('balance.index') }}"><i
              class="fa fa-reply" aria-hidden="true">&nbsp;Back</i></a>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">

        <div class="row">
          <div class="offset-lg-3 offset-md-3 offset-sm-3 col-md-6">
            {!! BootForm::text('name', null, null, ['placeholder'=>'Enter name','required'=>'required'] ) !!}

          </div>
          <div class="offset-lg-3 offset-md-3 offset-sm-3 col-md-6">
            {!! BootForm::text('amount', null, null, ['placeholder'=>'Enter amount','required'=>'required'] ) !!}

          </div>
          <div class="offset-lg-3 offset-md-3 offset-sm-3 col-md-6">
            {!! BootForm::select('type', 'Type',['Cash'=>'Cash','Dbbl'=>'Dbbl'], null,
            ['class'=>'select2','placeholder'=>'Select one','required'=>'required'] ) !!}
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->


      </div>
      <!-- /.card-body -->
      <div class="card-footer">

        <div class="row">
          <div class="offset-lg-3 offset-md-3 offset-sm-3 col-md-6">
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

@push('script-bottom')
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
})
</script>
@endpush