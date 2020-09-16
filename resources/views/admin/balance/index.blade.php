@extends('layouts.admin_master')

@section('style')
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
@endsection

@section('title','All balance Lists')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h3 class="text-center">Today Openning Balance= {{ $opening_blance }}</h3>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Balance In List</h3>

            <div class="card-tools">
              <a class="btn btn-info btn-xs pull-right" style="color: #ffffff;" href="{{ route('balance-in.create') }}"><i
                class="fa fa-plus" aria-hidden="true"> &nbsp;Add balance In</i></a>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Type</th>
                  <th>Amount</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @php
                $total_amount=0;
                @endphp
                @foreach($BalanceIn as $row)
                <tr>
                  <td>{{$loop->iteration }}</td>
                  <td>{{$row->name}}</td>
                  <td>{{$row->type}}</td>
                  <td>{{$row->amount}}</td>


                  <td>

                    <form action="{{ route('balance-in.destroy',$row) }}" method="POST">
                      <a class="btn btn-primary btn-xs" href="{{ route('balance-in.edit',$row) }}"><i class="fa fa-pen"
                          aria-hidden="true"> &nbsp;Edit</i></a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" onclick="return confirm('Are you sure you want to delete this?');"
                        class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true">
                          &nbsp;Delete</i></button>
                    </form>
                  </td>
                </tr>
                @php
                $total_amount=$total_amount+$row->amount;
                @endphp
                @endforeach
                <tr>
                  <td colspan="3">Total Balance In Amount</td>
                  <td>{{$total_amount}}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <div class="col-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Balance Out List</h3>

            <div class="card-tools">
              <a class="btn btn-info btn-xs pull-right" style="color: #ffffff;" href="{{ route('balance-out.create') }}"><i
                  class="fa fa-plus" aria-hidden="true"> &nbsp;Add balance Out</i></a>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Type</th>
                  <th>Amount</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @php
                $total_amount=0;
                @endphp
                @foreach($BalanceOut as $row)
                <tr>
                  <td>{{$loop->iteration }}</td>
                  <td>{{$row->name}}</td>
                  <td>{{$row->type}}</td>
                  <td>{{$row->amount}}</td>


                  <td>

                    <form action="{{ route('balance-out.destroy',$row) }}" method="POST">
                      <a class="btn btn-primary btn-xs" href="{{ route('balance-out.edit',$row) }}"><i class="fa fa-pen"
                          aria-hidden="true">
                          &nbsp;Edit</i></a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" onclick="return confirm('Are you sure you want to delete this?');"
                        class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true">
                          &nbsp;Delete</i></button>
                    </form>
                  </td>
                </tr>
                @php
                $total_amount=$total_amount+$row->amount;
                @endphp
                @endforeach
                <tr>
                  <td colspan="3">Total Balance Out Amount</td>
                  <td>{{$total_amount}}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
  </div>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h3 class="text-center">Today Closing Balance= {{ $closing_blance }}</h3>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  @endsection

 @section('script')
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>

@endsection