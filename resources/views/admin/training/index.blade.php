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
                            <h3 class="card-title" style="color:#115548;">Training List</h3>
                            <div class="card-tools">
                                @can('Training Create')
                                    <a href="{{route('training.create')}}">
                                        <button class="btn btn-sm active-color"><i class="fa fa-plus-circle"
                                                                                   aria-hidden="true"></i> &nbsp;Add
                                            Training
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
                                    <th>Title</th>
                                    <th>Duration</th>
                                    <th>Start Time</th>
                                    <th>Trainer</th>
                                    <th>Regions</th>
                                    <th>Enrolled</th>
                                    <th>Applied</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($trainings as $training)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$training->training_title}}</td>
                                        <td>{{$training->duration}}</td>
                                        <td>{{$training->start_date}}</td>
                                        <td>{{$training->trainer->name}}</td>
                                        <td>{{$training->applicable_region}}</td>
                                        <td>{{$training->session_no}}</td>
                                        <td>
                                            <a href="#" type="button" class="" data-toggle="modal"
                                               data-target="#modal-lg">
                                                3
                                            </a>
                                        </td>

                                        <td>
                                            @can('Training Edit')
                                                <a href="{{ route('training.edit', $training->id) }}" class=""> <i
                                                        class="fas fa-pen " style="color: #0D5245;"> </i> </a>&nbsp;
                                            @endcan
                                            @can('Training Delete')
                                                <form method="POST"
                                                      action="{{ route('training.destroy',$training->id)}}"
                                                      class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit " style="border: none;" class="danger"><i
                                                            class="fas fa-trash-alt text-danger"></i></button>
                                                </form>
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
        <!-- modal -->
        <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #6c757d2b;color: black;">
                        <h5 class="modal-title">List Of Applied Participants</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-sm-1 col-md-1"></div>
                            <div class="col-sm-10 col-md-10">
                                <h4 style="color: #0D5245;">Lists Of Entrolled Participants</h4>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-1 col-md-1"></div>

                            <div class="col-sm-2">
                                <p><b>Duration:</b></p>
                            </div>
                            <div class="col-sm-2">
                                <p>3 Months</p>
                            </div>
                            <div class="col-sm-2">
                                <p><b>Start Date:</b></p>
                            </div>
                            <div class="col-sm-2">
                                <p>3/Dec/2020</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-1 col-md-1"></div>
                            <div class="col-sm-2">
                                <p><b>Trainer:</b></p>
                            </div>
                            <div class="col-sm-2">
                                <p>Mr John</p>
                            </div>
                            <div class="col-sm-2">
                                <p><b>Region:</b></p>
                            </div>
                            <div class="col-sm-2">
                                <p>Central Africa</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-1 col-md-1"></div>
                            <div class="col-sm-10 col-md-10">

                                <table class="table table-bordered text-nowrap">
                                    <thead style="background-color: #6c757d2b;color: black;">
                                    <tr>
                                        <th><input type="checkbox"></th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Region</th>
                                        <th>Pref.Language</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>Abdel Al kareem</td>
                                        <td>+234 123586</td>
                                        <td>Central Africa</td>
                                        <td>English,French</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>Frida Qualimi</td>
                                        <td>+234 456586</td>
                                        <td>Central Africa</td>
                                        <td>French</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>Jimi Coker</td>
                                        <td>+234 983586</td>
                                        <td>Central Africa</td>
                                        <td>English,French</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="row form-group">
                            <div class="col-sm-1"></div>

                            <label for="gender" class="col-sm-2 col-form-label">Select Batch</label>
                            <div class="col-sm-5">
                                <select class="form-control" name="batch_id">
                                    <option value="">Select One</option>
                                    <option value="Batch">Batch</option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" style="background-color: black;color: white;" class="btn btn-default"
                                data-dismiss="modal">Close
                        </button>
                        <button type="button" style="background-color: #0D5245;color: white;" class="btn btn-default">
                            Enroll Participant
                        </button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
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
