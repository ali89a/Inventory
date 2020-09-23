@extends('admin.layouts.app')
@section('title')
    Trainers List
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
                            <h3 class="card-title " style="color:#115548; font-weight: bold;">Trainer List</h3>
                            <div class="card-tools">
                                @can('Trainer Create')
                                <a href="{{route('trainers.create')}}" ><button class="btn btn-sm active-color "><i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp;Add Trainer</button></a>
                                @endcan
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered" >
                                <thead>
                                <tr style="background-color: #E4E4E4;" >
                                    <th >#</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Address</th>
                                    <th>Course Taken</th>
                                    {{--<th>City</th>
                                    <th>Region</th>
                                    <th>Country</th>
                                    <th>Picture</th>
                                    <th>Date of Birth</th>--}}
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($trainers as $index=>$trainer)
                                    <tr style="background-color: #F5F5F5">
                                        <td>{{$index+1}}</td>
                                        <td>{{$trainer->name}}</td>
                                        <td>{{$trainer->mobile}}</td>
                                        <td>{{$trainer->email}}</td>
                                        <td>{{$trainer->gender}}</td>
                                        <td>{{$trainer->address}},{{$trainer->region}},{{$trainer->city}},{{$trainer->country->country_name ?? ''}}</td>
                                        <td>13</td>
                                        {{-- <td>{{$trainer->date_of_birth}}</td>
                                        <td>{{$trainer->city}}</td>
                                        <td>{{$trainer->region}}</td>
                                        <td>{{$trainer->country->country_name ?? ''}}</td>--}}

                                        <td>
                                            @can('Trainer Edit')
                                            <a href="{{ route('trainers.edit', $trainer->id) }}" class=""> <i class="fas fa-pen "style="color: #0D5245;"> </i></a>&nbsp;
{{--                                            <a href="{{ route('trainers.edit', $trainer->id) }}" class=""><i class="fa fa-refresh"style="color: #75A2F0;"></i></a>--}}
                                                @endcan
                                            <a href="{{--{{ route('trainers.edit', $trainer->id) }}--}}#" class=""> <i class="fas fa-sync" style="color:#236EED"> </i> </a>&nbsp;
                                                @can('Trainer Delete')
                                            <form  method="POST" action="{{ route('trainers.destroy',$trainer->id)}}" class="d-inline" >
                                            @csrf
                                            @method('delete')
                                                <button type="submit " style="border: none;" class="danger"> <i class="fas fa-trash-alt text-danger"></i> </button>
                                            </form>
                                                @endcan
                                        </td>

                                       {{-- <td>{{$trainer->img_url}}</td>--}}
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
