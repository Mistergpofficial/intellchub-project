<?php
/**
 * Created by PhpStorm.
 * User: GODSPOWER
 * Date: 4/30/2019
 * Time: 7:34 AM
 */

?>

        <!DOCTYPE html>
<html lang="en" xmlns:v-bind="http://www.w3.org/1999/xhtml">
<head>
    <title>Intellchub Test | Appointment Scheduler</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="BitCoin and Ethereum Investment">
    <meta name="author" description="meeksTrade Option">
    <meta property="og:url"           content="{{ url('/') }}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="meeksTrade Option" />
    <meta property="og:description"   content="a bitcoin and ethereum investment platform" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="{!! asset('css/bootstrap.min.css') !!}">
    <link href="{!! asset('css/font-awesome.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/style.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/select2.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/bootstrap-datetimepicker.min.css') !!}" rel="stylesheet">

    <link rel="icon" type="image/png" href="{!! asset('images/logo.png') !!}" width="40px">



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <![endif]-->

    <!-- pass php vars to javascript -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
            'appUrl' => url("/")
        ]); ?>
    </script>
</head>
<body>
<div id="app">
    <div class="main-wrapper">
@include('layouts.header')

@include('layouts.sidebar')


    </div>
    <div class="sidebar-overlay" data-reff=""></div>





























    @yield('content')



</div>
<script src="{!! asset('js/jquery-3.2.1.min.js') !!}"></script>
<script src="{!! asset('js/popper.min.js') !!}"></script>
<script src="{!! asset('js/bootstrap.min.js') !!}"></script>
<script src="{!! asset('js/jquery.slimscroll.js') !!}"></script>
<script src="{!! asset('js/Chart.bundle.js') !!}"></script>
<script src="{!! asset('js/chart.js') !!}"></script>
<script src="{!! asset('js/main.js') !!}"></script>
<script src="{!! asset('js/select2.min.js') !!}"></script>
<script src="{!! asset('js/moment.min.js') !!}"></script>
<script src="{!! asset('js/bootstrap-datetimepicker.min.js') !!}"></script>
<script src="{!! asset('js/app.js') !!}"></script>


{{--<script src="{!! asset('js/app.js') !!}"></script>--}}
</body>
</html>
