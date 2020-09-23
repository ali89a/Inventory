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
                <div class="col-2 "></div>
                <div class="col-8">
                    <!-- Horizontal Form -->
                    <div class="card card-primary">
                        <div class="card-header bg-light">
                            <h3 class="card-title" style="color:#115548;">Add Trainer</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form  method="POST" action="{{ route('trainers.update',$trainer->id)}}" class="form form-horizontal" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" id="name" value="{{$trainer->name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mobile" class="col-sm-2 col-form-label">Mobile</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="mobile" id="mobile" value="{{$trainer->mobile}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="email" id="email" value="{{$trainer->email}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="gender">
                                            <option value="male" {{$trainer->gender=='male' ? 'selected' : ''}}>Male</option>
                                            <option value="female"{{$trainer->gender=='female' ? 'selected' : ''}}>Female</option>
                                            <option value="other" {{$trainer->gender=='other' ? 'selected' : ''}}>Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="date_of_birth" class="col-sm-2 col-form-label">Date of Birth</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="date_of birth" id="date_of_birth"  value="{{$trainer->date_of_birth}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="address" id="address"  value="{{$trainer->address}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Country</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="country_id" name="country_id" required="" >
                                            <option disabled selected hidden>Select one</option>
                                            @foreach($countries as $country)
                                                <option value="{{$country->id}}" {{$country->id==$trainer->country_id ? 'selected' : ''}}>{{$country->country_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="city" class="col-sm-2 col-form-label">City </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="city" id="city" value="{{$trainer->city}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label" >Region</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="region" id="region" value="{{$trainer->region}}" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="img_url" class="col-sm-2 col-form-label">Picture</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="img_url" id="img_url" value="{{$trainer->img_url}}">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
{{--                                <button type="submit" class="btn  float-right" style="background-color: #0D5245;color: white;" onclick="">Submit</button>--}}
                                <input type="submit" value="Submit" id="btnsubmit" onclick="submitForm()" class="btn  float-right" style="background-color: #0D5245;color: white;">
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
    <script>
        function submitForm() {
            // Get the first form with the name
            // Usually the form name is not repeated
            // but duplicate names are possible in HTML
            // Therefore to work around the issue, enforce the correct index
            var frm = document.getElementsByName('contact-form')[0];
            frm.submit(); // Submit the form
            frm.reset();  // Reset all form data
            return false; // Prevent page refresh
        }
    </script>

@endsection
