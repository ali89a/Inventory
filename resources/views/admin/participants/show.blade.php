@extends('admin.layouts.app')
@push('css')
    <style>

.profile table{
border:1px solid #979797;
}
.profile th{
background-color: #E4E4E4;
border:1px solid #979797;
}
.profile tr{
background-color: #F5F5F5;
}

.proflie ul{
list-style-type: none;
}

</style>

@endpush
@section('title')
    Participant
@endsection
@section('content')
    <!-- Content Header (Page header) -->

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Participant Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Simple Tables</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-10">



                    <div class="card profile" >
                        <div class="row justify-content-center" style="margin-top: 20px;">
                            <div class="col-4">
                                <ul style="list-style-type: none;">
                                    <li><h3 class="bold">Abdel Al Kareem</h3></li>
                                    <li><b> Member Since</b> <span>20-april-2020</span></li>
                                    <li><b>Mobile:</b> <span>+234 1 298 </span></li>
                                    <li><b>Email:</b> <span>rashkareem@gmail.com </span></li>
                                    <li><b>Address:</b> <span>2,Hakeem ontiri street,offlago,palaway,nigeria</span></li>
                                    <li><b>Preferred Language:</b> <span>French,English</span></li>
                                </ul>
                            </div>
                            <div class="col-4" style="list-style-type: none;">
                                <ul  style="margin-top: 30%;">
                                    <li>Date of Birth : <span>20-april-2020</span></li>
                                    <li>Gender: <span>Male</span></li>
                                </ul>
                            </div>
                            <div class="col-2">
                                <img src="{{ asset('images/profile.png')}}" alt="img not found" class="img-fluid" style="max-height: 60px;max-width: 60px">
                            </div>
                        </div>


                        <!--  Apply table -->
                        <div class="row justify-content-center">

                            <div class="col-10">
                                <caption>Courses Applied </caption>
                                <table class="table table-bordered enroll_table">

                                    <thead class="">
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Start Date</th>
                                        <th>Enroll Date</th>
                                        <th>Score</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Binding Divides to Strengthen Communities</td>
                                        <td>12/dec/2129</td>
                                        <td>10/dec/2019</td>
                                        <td>59%</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Binding Divides to Strengthen Communities</td>
                                        <td>12/dec/2129</td>
                                        <td>10/dec/2019</td>
                                        <td>59%</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Binding Divides to Strengthen Communities</td>
                                        <td>12/dec/2129</td>
                                        <td>10/dec/2019</td>
                                        <td>59%</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>



                        <!--  Enrolled_table -->

                        <div class="row justify-content-center">
                            <div class="col-10">
                                <caption>Courses Enrolled </caption>
                                <table class="table table-bordered enroll_table">
                                    <thead class="">
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Start Date</th>
                                        <th>Enroll Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Binding Divides to Strengthen Communities</td>
                                        <td>12/dec/2129</td>
                                        <td>10/dec/2019</td>
                                        <td>>Enrolled</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Binding Divides to Strengthen Communities</td>
                                        <td>12/dec/2129</td>
                                        <td>10/dec/2019</td>
                                        <td>>Enrolled</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Binding Divides to Strengthen Communities</td>
                                        <td>12/dec/2129</td>
                                        <td>10/dec/2019</td>
                                        <td>Enrolled</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <!--  Enrolled_table -->
                    </div>


                </div>
            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
