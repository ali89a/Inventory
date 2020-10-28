<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> </title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        * {
            box-sizing: border-box;
        }

        .col-1 {
            width: 8.33%;
        }

        .col-2 {
            width: 16.33%;
        }

        .col-3 {
            width: 25%;
        }

        .col-4 {
            width: 33.33%;
        }

        .col-5 {
            width: 41.67%;
        }

        .col-6 {
            width: 50%;
        }

        .col-7 {
            width: 58.33%;
        }

        .col-8 {
            width: 66.67%;
        }

        .col-9 {
            width: 75%;
        }

        .col-10 {
            width: 83.33%;
        }

        .col-11 {
            width: 91.67%;
        }

        .col-12 {
            width: 100%;
        }

        [class*="col-"] {
            float: left;
            border: 1px red solid;
        }

        .row:after {
            content: ' ';
            clear: both;
            display: block;
        }

        .container {
            width: 80%;
            margin: auto;
            height: auto;
        }

        .container-full {
            width: 100%;
            margin: auto;
            height: auto;

        }

        .tc {
            text-align: center;
        }

        .page_20 img {
            width: 270px;
            height: 60px;
        }

        .page_30 img {
            width: 270px;
            height: 45px;
        }

        .page_32 img {
            width: 240px;
            height: 50px;
        }

        .page_40 img {
            width: 240px;
            height: 42px;
        }

        @page {
            size: 8.5in 11in;
            /* size: A4 landscape; */
        }

        @media print {
            .page_20 img {
                width: 240px;
                height: 50px;
            }

            .page_30 img {
                width: 240px;
                height: 30px;
            }

            .page_32 img {
                width: 140px;
                height: 40px;
            }

            .page_40 img {
                width: 140px;
                height: 30px;
            }
        }
    </style>

</head>

<body>

    <div class="container" id="box">
        <div class="row">
            <center>
                <button class="btn btn-primary hidden-print" onclick="window.print()"><span
                        class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
            </center>


            @foreach ($products as $item)

            @php
            $a= $item['quantity'];
            @endphp
            @for ($i = 0; $i < $a; $i++) @if ($page_size==32) <div class="col-3 page_32"
                style="padding:18px 10px;border:1px solid #ded9d9;">
                @if ($product_name==1)
                <div class="tc" style="font-size: 10px"> {{ $item['product_name'] }}</div>
                @endif
                @if ($product_price==1)
                <div class="tc" style="font-size: 10px"> {{ $item['selling_price'] }}</div>
                @endif
                <div class="tc">
                    <img src="{{asset(\Storage::url($item['img']))}}" alt="{{ $item['serial_number'] }}">
                </div>
                <div class="tc"> {{ $item['serial_number'] }}</div>

        </div>
        @elseif ($page_size== 20)
        <div class="col-4 page_20" style="padding:18px 10px;border:1px solid #ded9d9;">
            @if ($product_name==1)
            <div class="tc"> {{ $item['product_name'] }}</div>
            @endif
            @if ($product_price==1)
            <div class="tc" style="font-size: 10px"> {{ $item['selling_price'] }}</div>
            @endif
            <div class="tc">
                <img src="{{asset(\Storage::url($item['img']))}}" alt="{{ $item['serial_number'] }}">
            </div>
            <div class="tc"> {{ $item['serial_number'] }}</div>

        </div>
        @elseif ($page_size== 30)
        <div class="col-4 page_30" style="padding:5px 10px;border:1px solid #ded9d9;">
            @if ($product_name==1)
            <div class="tc"> {{ $item['product_name'] }}</div>
            @endif
            @if ($product_price==1)
            <div class="tc" style="font-size: 10px"> {{ $item['selling_price'] }}</div>
            @endif
            <div class="tc">
                <img src="{{asset(\Storage::url($item['img']))}}" alt="{{ $item['serial_number'] }}">
            </div>
            <div class="tc"> {{ $item['serial_number'] }}</div>

        </div>
        @elseif ($page_size== 40)
        <div class="col-3 page_40" style="padding:10px 10px;border:1px solid #ded9d9;">
            @if ($product_name==1)
            <div class="tc" style="font-size: 10px"> {{ $item['product_name'] }}</div>
            @endif
            @if ($product_price==1)
            <div class="tc" style="font-size: 10px"> {{ $item['selling_price'] }}</div>
            @endif
            <div class="tc">
                <img src="{{asset(\Storage::url($item['img']))}}" alt="{{ $item['serial_number'] }}">
            </div>
            <div class="tc"> {{ $item['serial_number'] }}</div>

        </div>
        @endif
        @endfor


        @endforeach

    </div>
    </div>




</body>

</html>