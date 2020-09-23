@extends('admin.layouts.app')
@section('title')
    Participants List
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
                            <h3 class="card-title">Batch</h3>

                            <div class="card-tools">
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">

                            <form class="form-horizontal" action="{{route('batches.store')}}" method="Post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="gender" class="col-sm-2 col-form-label">Training</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="training_id">
                                                @foreach($trainings as $training)
                                                    <option
                                                        value="{{$training->id}}">{{$training->training_title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="batch_title" class="col-sm-2 col-form-label">Batch Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="batch_title" name="batch_title"
                                                   placeholder="Batch Title">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="col-sm-2 col-form-label">Details</label>
                                        <div class="col-sm-10">
                                            <textarea name="details" rows="5" class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-8 col-md-8 offset-2">
                                            <h4>Lists Of Entrolled Participants</h4>
                                            <table class="table table-bordered text-nowrap">
                                                <thead>
                                                <tr>
                                                    <th><input type="checkbox"></th>
                                                    <th>Name</th>
                                                    <th>Mobile</th>
                                                    <th>Region</th>
                                                    <th>Language</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td><input type="checkbox"></td>
                                                    <td>John Doe</td>
                                                    <td>11-7-2014</td>
                                                    <td>Dhaka</td>
                                                    <td>Bangla</td>
                                                </tr>
                                                <tr>
                                                    <td><input type="checkbox"></td>
                                                    <td>John Doe</td>
                                                    <td>11-7-2014</td>
                                                    <td>Dhaka</td>
                                                    <td>Bangla</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn active-color float-right">Submit</button>
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
