<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>

        html, body {
            height: 100%;
            margin: 0;
        }

        .formarea h5 {
            color: #0D5245;
            position: relative;
            bottom: 15px;

        }
        .logo img{
            width:170px;
            height:100px;
        }

        .formarea {
            width: 60%;
            height: 100%;
            overflow-y: auto;
            background-color: white;
            border: 1px solid #C0C0C0;
            font-family: sans-serif;

        }

        .formarea button {
            background-color: #0D5245;
            color: white;
        }


        /* Optional styling for the form container box */




    </style>
</head>
<body>
<div id="app">
    <div class="py-4">
        <div class="logo">
            <img src="{{asset('images/logo.png')}}" alt="Cool Imam Logo" class="mx-auto d-block" style="">
            <p class="text-center" >Reference site about Lorem Ipsum, giving information on its origins,
                as well as a random Lipsum generator.</p>
        </div>

        <!-- registration form -->
        <div class="container shadow p-3 mb-5  rounded clearfix formarea">

            <br>
            <h5>Registration</h5>
            <form method="POST" action="{{ route('participants.store')}}" class="form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-2 align-items-center">Name<i class="text-danger">*</i></div>
                    <div class="col-10">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"  required="" >
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-2 align-items-center">Email <i class="text-danger">*</i> </div>
                    <div class="col-4">
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"  required="" >
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="col-2 align-items-center">Mobile <i class="text-danger">*</i> </div>
                    <div class="col-4">
                        <input type="text" class="form-control @error('mobile') is-invalid @enderror" id="mobile" name="mobile"  required="" >
                        @error('mobile')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                </div>
                <br>
                <div class="row">
                    <div class="col-2 align-items-center">Date of Birth <i class="text-danger">*</i> </div>
                    <div class="col-4">
                        <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" required="" >
                        @error('date_of_birth')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="col-2 align-items-center">Gender <i class="text-danger">*</i> </div>
                    <div class="col-4">
                        <select class="form-control" id="gender" name="gender" required="" >
                            <option disabled selected hidden>Select one</option>
                            <option value="male">Male</option>
                            <option value="male">Female</option>
                            <option value="male">Other</option>
                        </select>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-2 align-items-center">Address <i class="text-danger">*</i> </div>
                    <div class="col-4">
                        <input type="text" class="form-control" name="address" name="address"  required="" >
                    </div>
                    <div class="col-2 align-items-center">Country <i class="text-danger">*</i> </div>
                    <div class="col-4">
                        <select class="form-control" id="country_id" name="country_id" required="" >
                            <option disabled selected hidden>Select one</option>
                            @foreach($countries as $country)
                                <option value="{{$country->id}}">{{$country->country_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                </div>
                <br>


                <div class="row">
                    <div class="col-2 align-items-center">City<i class="text-danger">*</i></div>
                    <div class="col-4">
                        <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city"  required="" >
                        @error('city')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="col-2 align-items-center" >Region <i class="text-danger">*</i></div>
                    <div class="col-4">
                        <input type="text" class="form-control @error('region') is-invalid @enderror" id="region" name="region"  required="" >

                    </div>
                </div>
                <br>


                <div class="row">
                    <div class="col-2 align-items-center"> Interest</div>
                    <div class="col-10">
                        <textarea name="interest" id="interest" width="100%" rows="10" type="text" class="form-control"></textarea>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-3 align-items-center">Preferred Language</div>
                    <div class="col-9">
                        <div class="checkbox">
                            <label><input name="language" type="checkbox" value="english"> English </label>
                            <label><input name="language" type="checkbox" value="french"> French </label>
                            <label><input name="language" type="checkbox" value="Portuguese"> Portuguese </label>
                        </div>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-2 align-items-center" >Picture <i class="text-danger">*</i> </div>

                    <div class="col-4">
                        <input type="file" class="form-control " id="img_url" name="img_url" accept="image/*"
                               style="background-color: unset;border:none;">
                    </div>

                    <div class="col-6"></div>
                </div>
                <br>
                <button type="submit" class="btn float-right">Register</button>
            </form>
        </div>
        <!-- registration form -->
    </div>
</div>


</body>
</html>
