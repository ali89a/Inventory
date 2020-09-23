@extends('admin.layouts.app')
@section('title')

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
        <section class="content" >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <!-- Horizontal Form -->
                        <div class="card card-primary">
                            <div class="card-header bg-light">

                                <h3 class="card-title" style="color:#115548;">Add User</h3>
                                <div class="card-tools">
                                    <a href="{{route('users.index')}}" ><button class="btn btn-sm btn-primary">User List</button></a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form  method="POST" action="{{ route('users.store')}}" class="form form-horizontal" enctype="multipart/form-data">
                               @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name" id="name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mobile" class="col-sm-2 col-form-label">Mobile</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="mobile" id="mobile" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" name="email" id="email" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="gender">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="date_of_birth" class="col-sm-2 col-form-label">Date of Birth</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" name="date_of birth" id="date_of_birth">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="address" id="address">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Country</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="country_id" name="country_id" required="" >
                                                <option disabled selected hidden>Select one</option>
{{--                                                @foreach($countries as $country)--}}
{{--                                                    <option value="{{$country->id}}">{{$country->country_name}}</option>--}}
{{--                                                @endforeach--}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="city" class="col-sm-2 col-form-label">City</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="city" id="city" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Region</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="region" id="region" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="img_url" class="col-sm-2 col-form-label">Picture</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" name="img_url" id="img_url">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn  float-right" style="background-color: #0D5245;color: white;">Submit</button>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-2"></div>
                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->


@endsection
