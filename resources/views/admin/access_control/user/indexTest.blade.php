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




{{--xam & result page--}}


<section class="content">
    <div class="container">

        <div class="row">
            <div class="col-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="color: #0D5245;font-weight: bold;">Participants List</h3>
                        <div class="card-tools">
                            <a href="">
                                <button class="btn btn-sm active-color" >
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp;
                                    Add Participant
                                </button>
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered" >
                            <thead style="background-color: #E4E4E4;">
                            <tr>
                                <th>#</th>
                                <th>Exam Attend</th>
                                <th>Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Result</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr style="background-color: #F5F5F5">
                                <td>1</td>
                                <td>Abdul Karem</td>
                                <td>22/jan/2020</td>
                                <td>12.00pm</td>
                                <td>12.30 pm</td>
                                <td>95%</td>
                                <td>
                                    <a class=""><i
                                            class="fa fa-pen" aria-hidden="true" style="color: #0D5245"></i></a>

                                    <form method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit " style="border: none;" class="danger"><i
                                                class="fas fa-trash-alt text-danger"></i></button>
                                    </form>



                                    <a class=""><i
                                            class="fa fa-eye" aria-hidden="true"></i></a>
                                </td>
                            </tr>
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

{{--xam & result page--}}


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
