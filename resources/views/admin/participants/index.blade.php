@extends('admin.layouts.app')
@section('title')
    Participants List
@endsection
@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
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
                            <h3 class="card-title">Participants List</h3>
                            <div class="card-tools">
                                @can('Participant Create')
                                    <a href="{{route('participants.create')}}">
                                        <button class="btn btn-sm active-color">
                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                            &nbsp;Add Participant
                                        </button>
                                    </a>
                                @endcan
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Language</th>
                                        <th>Enrolled</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($participants as $index=>$participant)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$participant->name}}</td>
                                        <td>{{$participant->mobile}}</td>
                                        <td>{{$participant->email}}</td>
                                        <td>{{$participant->address}}</td>
                                        <td>{{$participant->language}}</td>
                                        <td>3</td>
                                        <td>
                                            @can('Participant Edit')
                                                <a href="{{ route('participants.edit', $participant->id) }}"><i
                                                        class="fa fa-pen" aria-hidden="true" style="color: #0D5245"></i></a>
                                            @endcan
                                            @can('Participant Delete')
                                                <form method="POST"
                                                      action="{{ route('participants.destroy',$participant->id)}}"
                                                      class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit " style="border: none;" class="danger"><i
                                                            class="fas fa-trash-alt text-danger"></i></button>
                                                </form>
                                            @endcan
                                            @can('Participant Show')
                                                <a href="{{route('participants.show',$participant->id)}}" class=""><i
                                                        class="fa fa-eye" aria-hidden="true"></i></a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
@section('script')
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
@endsection
@push('script-bottom')
    <!-- page script -->
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush
