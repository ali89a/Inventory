@extends('admin.layouts.app')
@section('title')
    Users List
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
                            <h3 class="card-title" style="color:#115548; font-weight: bold;">User List</h3>
                            <div class="card-tools">
{{--                                <a href="{{route('user.create')}}"></a>--}}

                                <button class="btn btn-sm active-color" data-toggle="modal"
                                        data-target="#exampleModalLong"><i class="fa fa-plus-circle"
                                                                           aria-hidden="true"></i> &nbsp;Add User
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered ">
                                <thead>
                                <tr style="background-color: #E4E4E4;">
                                    <th>#</th>
                                    <th>Name</th>
                                    {{--                                    <th>Email</th>--}}
                                    <th>User Id</th>
                                    <th> Role</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $row)
                                    <tr style="background-color: #F5F5F5;">
                                        <td>{{ $row->id }}</td>
                                        <td>{{ $row->name }}</td>
                                       <td>{{ $row->email }}</td>
                                        <td>
                                            @if($row->getRoleNames()->isNotEmpty())
                                                <span class="badge ">
                                                {!! $row->getRoleNames()->implode("</span> <span class='badge '>") !!}
                                            </span>
                                            @endif
                                        </td>
                                        <td>
                                            @can('User Edit')
                                                <center>
                                                    <div class="btn-group">
                                                        {{--   <a href="{{ route('user.edit', $row) }}
                                                               <i class="fa fa-pen"></i> </a>
                                                           <a href="{{ route('user.edit', $row) }}
                                                               <i class="fa fa-trash"></i> </a>
   --}}

                                                        <a href="{{ route('user.edit', $row->id) }}"> <i
                                                                class="fa fa-pen" aria-hidden="true"
                                                                style="color: #0D5245"></i> </a> &nbsp;

                                                        <form method="POST"
                                                              action="{{ route('user.destroy',$row->id)}}"
                                                              class="d-inline">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit " style="border: none;" class="danger">
                                                                <i
                                                                    class="fas fa-trash-alt text-danger"></i></button>
                                                        </form>
                                                    </div>
                                                </center>
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

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #0D5245; color: white;">
                <h5 class="modal-title" id="exampleModalLongTitle">Add User</h5>
               {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>--}}
            </div>
            <form action="" method="POST" class="form-group">
                @csrf
            <div class="modal-body">

                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email or Phone">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="gender" class="col-sm-3 col-form-label">Role</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="gender">
                            <option value="admin" >Admin</option>
                            <option value="trainer">Trainer</option>
                            <option value="participant" >Participant</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label">Confirm Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-dismiss="modal" style="background-color: black;color: white;">Close</button>
                <button type="Submit" class="btn active-color">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>



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
