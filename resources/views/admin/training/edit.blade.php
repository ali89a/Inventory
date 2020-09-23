@extends('admin.layouts.app')
@section('title')
    Training List
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
                            <h3 class="card-title" style="color:#115548;">Add Training</h3>
                            <div class="card-tools">
                                <a href="{{route('training.index')}}" ><button class="btn btn-sm active-color"><i class="fa fa-list" aria-hidden="true"></i> &nbsp;&nbsp;See List</button></a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">

                            <form  method="POST" action="{{ route('training.update',$training->id)}}" class="form form-horizontal" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="training_title" class="col-sm-2 col-form-label">Training
                                            Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="training_title" id="training_title"
                                                   placeholder="Training Title" value="{{$training->training_title}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="session_no" class="col-sm-4 col-form-label">Total Number of
                                            classes / sessions</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="session_no" name="session_no"
                                                   placeholder="Total Number of classes / sessions" value="{{$training->session_no}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="duration" class="col-sm-2 col-form-label">Duration</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="duration" name="duration"
                                                   placeholder="Duration" value="{{$training->duration}}">
                                        </div>
                                        <label for="start_date" class="col-sm-2 col-form-label" >Start Date</label>
                                        <div class="col-sm-4">

                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                <input type="text" name="start_date" class="form-control datetimepicker-input" data-target="#reservationdate" value="{{$training->start_date}}">
                                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="trainer_id" class="col-sm-2 col-form-label">Trainer</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="trainer_id" name="trainer_id">
                                              {{--  @foreach($trainers as $trainer)
                                                    <option value="{{$trainer->id}}">{{$trainer->name}}</option>
                                                @endforeach--}}

                                                    @foreach($trainers as $trainer)
                                                        <option value="{{$trainer->id}}" {{$trainer->id==$training->trainer_id ? 'selected' : ''}}>{{$trainer->name}}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="applicable_region" class="col-sm-2 col-form-label">Applicable Regions</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="applicable_region" id="applicable_region">
                                                <option value="Dhaka" {{$training->applicable_region=='Dhaka' ? 'selected' : ''}}>Dhaka</option>
                                                <option value="Goa" {{$training->applicable_region=='Goa' ? 'selected' : ''}}>Goa</option>
                                                <option value="other" {{$training->applicable_region=='other' ? 'selected' : ''}}>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="details" class="col-sm-2 col-form-label">Details</label>
                                        <div class="col-sm-10">
                                            <textarea id="details" name="details" rows="5" class="form-control" value="{{$training->details}}"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="file" class="col-sm-2 col-form-label">File</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" id="file"
                                                   placeholder="File"{{-- value="{{$training->img_url}}"--}}>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-default active-color float-right">Submit</button>
                                </div>
                                <!-- /.card-footer -->
                            </form>
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
@push('script-bottom')

    <script>
        $(function () {
            //Date range picker
            $('#reservationdate').datetimepicker({
                format: 'YYYY-MM-DD'
            });
        })
    </script>
@endpush
