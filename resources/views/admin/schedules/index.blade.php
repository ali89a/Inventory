@extends('admin.layouts.app')
@section('title')
    Schedules List
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
                            <h3 class="card-title">Schedules List</h3>

                            <div class="card-tools">
                                <h4></h4>
                            </div>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <form class="form-horizontal" action="{{route('schedules.store')}}" method="Post">
                                @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="training_id" class="col-sm-3 col-form-label">Training</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="training_id">
                                                @foreach($trainings as $training)
                                                    <option
                                                        value="{{$training->id}}">{{$training->training_title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="batch_id" class="col-sm-3 col-form-label">Batch</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="batch_id">
                                                @foreach($batches as $batch)
                                                    <option
                                                        value="{{$batch->id}}">{{$batch->batch_title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-3 col-form-label">Date</label>
                                        <div class="col-sm-9">
                                            <div class="input-group date" id="reservationdate"
                                                 data-target-input="nearest">
                                                <input type="text" name="date" class="form-control datetimepicker-input"
                                                       data-target="#reservationdate"/>
                                                <div class="input-group-append" data-target="#reservationdate"
                                                     data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="starttimepicker" class="col-sm-3 col-form-label">Start Time</label>
                                        <div class="col-sm-3">
                                            <div class="bootstrap-timepicker">
                                                    <div class="input-group date" id="starttimepicker" data-target-input="nearest">
                                                        <input type="text" name="start_time" class="form-control datetimepicker-input" data-target="#starttimepicker">
                                                        <div class="input-group-append" data-target="#starttimepicker" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                        </div>
                                                    </div>
                                                    <!-- /.input group -->
                                            </div>
                                        </div>
                                        <label for="endtimepicker" class="col-sm-3 col-form-label">End Time</label>
                                        <div class="col-sm-3">
                                            <div class="input-group date" id="endtimepicker" data-target-input="nearest">
                                                <input type="text" name="end_time" class="form-control datetimepicker-input"
                                                       data-target="#endtimepicker"/>
                                                <div class="input-group-append" data-target="#endtimepicker"
                                                     data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn active-color float-right">Create</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <!-- Calendar -->
                                    <div class="card ">
                                        <div class="card-header border-0  bg-gradient-primary">

                                            <h3 class="card-title">
                                                <i class="far fa-calendar-alt"></i>
                                                Calendar
                                            </h3>
                                            <!-- tools card -->
                                            <div class="card-tools">
                                                <!-- button with a dropdown -->
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                                                        <i class="fas fa-bars"></i></button>
                                                    <div class="dropdown-menu" role="menu">
                                                        <a href="#" class="dropdown-item">Add new event</a>
                                                        <a href="#" class="dropdown-item">Clear events</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="#" class="dropdown-item">View calendar</a>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-primary btn-sm" data-card-widget="remove">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                            <!-- /. tools -->
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body pt-0">
                                            <!--The calendar -->
                                            <div id="calendar" style="width: 100%"></div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <div class="col-sm-3">
                                    3
                                </div>
                            </div>

                            </form>
                            <div>
                                <h5 class="">Schedules List</h5>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Batch</th>
                                        <th>Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>183</td>
                                        <td>John Doe
                                            <button style="margin-left:5px;" class="btn active-color pull-right">View</button>
                                        </td>
                                        <td>11</td>
                                        <td>11-7-2014</td>
                                        <td>12.30 PM</td>
                                        <td>1.00 AM</td>
                                        <td>
                                            <a href="#" class=""><i class="fa fa-pen text-success"
                                                                    aria-hidden="true"></i></a>&nbsp;
                                            <a href="#" class=""><i class="fa fa-trash text-danger"
                                                                    aria-hidden="true"></i></a>
                                        </td>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>


                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn active-color float-right">Submit</button>
                        </div>
                        <!-- /.card-footer -->
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

@endsection
@push('script-bottom')
    <script>
        $(function () {
            //Date range picker
            $('#reservationdate').datetimepicker({
                format: 'YYYY-MM-DD'
            });
            //Timepicker
            $('#starttimepicker').datetimepicker({
                format: 'LT'
            });
            //Timepicker
            $('#endtimepicker').datetimepicker({
                format: 'LT'
            });
            // The Calender
            $('#calendar').datetimepicker({
                format: 'L',
                inline: true
            });
        })
    </script>
@endpush
