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
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-2 "></div>
                <div class="col-8">
                    <!-- Horizontal Form -->
                    <div class="card card-primary">
                        <div class="card-header bg-light">
                            <h3 class="card-title" style="color:#115548;">Add Participants</h3>
                        </div>
                        <!-- form start -->
                        <form method="POST" action="{{ route('participants.update',$participant->id)}}"
                              class="form form-horizontal" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" id="name"
                                               value="{{$participant->name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mobile" class="col-sm-2 col-form-label">Mobile</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="mobile" id="mobile"
                                               value="{{$participant->mobile}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="email" id="email"
                                               value="{{$participant->email}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="gender">
                                            <option disabled selected hidden>Select one</option>
                                            <option value="male" {{$participant->gender=='male' ? 'selected' : ''}}>
                                                Male
                                            </option>
                                            <option value="female" {{$participant->gender=='female' ? 'selected' : ''}}>
                                                Female
                                            </option>
                                            <option value="other" {{$participant->gender=='other' ? 'selected' : ''}}>
                                                Other
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="date_of_birth" class="col-sm-2 col-form-label">Date of Birth</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="date_of birth" id="date_of_birth"
                                               value="{{$participant->date_of_birth}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="address" id="address"
                                               value="{{$participant->address}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Country</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="country_id" name="country_id" required="">
                                            <option disabled selected hidden>Select one</option>
                                            @foreach($countries as $country)
                                                <option
                                                    value="{{$country->id}}" {{$country->id==$participant->country_id ? 'selected' : ''}}>{{$country->country_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="city" class="col-sm-2 col-form-label">City</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="city" id="city"
                                               value="{{$participant->city}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Region</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="region" id="region"
                                               value="{{$participant->region}}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-2 align-items-center"> Interest</div>
                                    <div class="col-10">
                                        <textarea name="interest" id="interest" width="100%" rows="10" type="text"
                                                  class="form-control" value=""> {{$participant->interest}}</textarea>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-3 align-items-center">Preferred Language</div>
                                    <div class="col-9">
                                        <div class="checkbox">
                                            @php
                                                $lan = explode(",",$participant->language);
                                            @endphp
                                            <label> <input name="langs[]" type="checkbox" value="English" {{in_array("English",$lan) ? 'checked' : ''}}> English </label>
                                            <label><input name="langs[]" type="checkbox" value="French" {{in_array("French",$lan) ? 'checked' : ''}}> French </label>
                                            <label><input name="langs[]" type="checkbox" value="Portuguese" {{in_array("Portuguese",$lan) ? 'checked' : ''}}> Portuguese </label>
                                        </div>
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
                                <button type="submit" class="btn  float-right"
                                        style="background-color: #0D5245;color: white;">Submit
                                </button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                        <!-- /.card -->
                    </div>
                    <div class="col-2"></div>
                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->

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
