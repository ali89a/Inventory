@extends('admin.layouts.app')
@section('title')
    Dashboard
@endsection
@section('style')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
{{--                    <h1 class="m-0 text-dark">Dashboard</h1>--}}
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <span class="m-0 text-dark">Filter &nbsp;</span>
                        <input style="" type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="green">
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <form method="POST" action="{{--{{ route('trainers.store')}}--}}#" class="form form-horizontal" enctype="multipart/form-data">
                <div class="row">

                    <div class="col-sm-3">
                        <div class="form-group">
                            <select class="form-control select2" id="country_id" name="country_id" required="" >
                                <option disabled selected hidden>Select one</option>
                                @foreach($countries as $country)
                                    <option value="{{$country->id}}">{{$country->country_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="city">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Region">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Training">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
{{--                                <input type="date" class="form-control" name="training_title" id="custom_date"--}}
{{--                                       placeholder="Custome Date">--}}

                            <p> <input type="text" id="datepicker" placeholder="Date" class="form-control" ></p>


                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <button type="submit" class="btn active-color btn-block">Search</button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>5201</h3>

                            <p>Participants</p>
                        </div>
                        <div class="icon">
                            <i style="color: aliceblue;" class="ion ion-person-stalker"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>51</h3>

                            <p>Trainers</p>
                        </div>
                        <div class="icon">
                            <i style="color: aliceblue;" class="nav-icon fas fa-user-tie"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>44</h3>

                            <p>Trainings</p>
                        </div>
                        <div class="icon">
                            <i style="color: aliceblue;" class="fas fa-chalkboard-teacher"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>65</h3>

                            <p>Todays Class</p>
                        </div>
                        <div class="icon">
                            <i style="color: aliceblue;" class="fas fa-book-reader"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <div class="col-md-12">
                    <!-- BAR CHART -->
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Training Wise Participant Status</h3>

                            <div class="card-tools">

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="barChart"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.card -->
                <!-- /.col (LEFT) -->

                <!-- /.col (RIGHT) -->
            </div>
            <!-- /.row -->
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@section('script')
    <!-- Bootstrap Switch -->
    <script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/js/select2.full.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js')}}"></script>
@endsection
@push('script-bottom')

    <script>

        $( function() {
            $( "#datepicker" ).datepicker();
        } );


        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
            $("input[data-bootstrap-switch]").each(function () {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });
            $('#custom_date').datetimepicker({
                format: 'YYYY-MM-DD'
            });
            /* ChartJS
      /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */
            //-------------
            //- BAR CHART -
            //-------------

            var ali = {
                labels: ['Training 1', 'Training 2', 'Training 3', 'Training 4', 'Training 5', 'Training 6', 'Training 7'],
                datasets: [
                    {
                        label: 'Total',
                        backgroundColor: '#7F8084',
                        // borderColor: 'rgba(210, 214, 222, 1)',
                        pointRadius: false,
                        pointColor: 'rgba(210, 214, 222, 1)',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data: [100, 60, 55, 81, 55, 55, 95]
                    },
                    {
                        label: 'Passed',
                        backgroundColor: '#0D5245',
                        // borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: [60, 48, 40, 25, 22, 25, 90]
                    },
                    {
                        label: 'Failed',
                        backgroundColor: '#FF3961',
                        // borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#bbb',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: [40, 12, 15, 56, 23, 20, 5]
                    },

                ]
            }
            var barChartCanvas = $('#barChart').get(0).getContext('2d')
            var barChartData = jQuery.extend(true, {}, ali)
            var temp0 = ali.datasets[0]
            var temp1 = ali.datasets[1]
            var temp2 = ali.datasets[2]
            barChartData.datasets[0] = temp0
            barChartData.datasets[1] = temp1
            barChartData.datasets[2] = temp2

            var barChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false
            }

            var barChart = new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            })

            //---------------------

        })
    </script>
@endpush
