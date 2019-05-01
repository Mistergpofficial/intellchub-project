<?php
/**
 * Created by PhpStorm.
 * User: GODSPOWER
 * Date: 5/1/2019
 * Time: 8:13 AM
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


    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">Add Appointment</h4>
                </div>
            </div>
            @if(Session::has('danger'))
                <div class="alert alert-danger">
                    <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&#215;</button>
                    {{ Session::get('danger') }}
                </div>
            @endif
            @if(Session::has('success'))
                <div class="alert alert-success">
                    <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&#215;</button>
                    {{ Session::get('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="{!! url('user/post-add-appointment') !!}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Patient Name</label>
                                    <input type="text" name="patient_name" value="{{ Auth()->user()->full_name }}" class="form-control">
                                    @if ($errors->has('patient_name'))
                                        <span class="  help-block">
                                            <strong class="bg-white">{{ $errors->first('patient_name') }}</strong>
                                          </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Doctor</label>
                                    <select class="select" name="doctor">
                                        <option value="0">- Select a Doctor * -</option>
                                        @foreach($doctors as $doctor)
                                            <option value="{{ $doctor->user_id }}">{{ $doctor->full_name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('doctor'))
                                        <span class="  help-block">
                                            <strong class="bg-white">{{ $errors->first('doctor') }}</strong>
                                          </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Department</label>
                                    <select class="select" name="department">
                                        <option value="0">- Select department * -</option>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('department'))
                                        <span class="  help-block">
                                            <strong class="bg-white">{{ $errors->first('department') }}</strong>
                                          </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date</label>
                                    <div class="cal-icon">
                                        <input type="text" name="date" class="form-control datetimepicker">
                                        @if ($errors->has('date'))
                                            <span class="  help-block">
                                            <strong class="bg-white">{{ $errors->first('date') }}</strong>
                                          </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Time</label>
                                    <div class="time-icon">
                                        <input type="text" name="time" class="form-control" id="datetimepicker3">
                                        @if ($errors->has('time'))
                                            <span class="  help-block">
                                            <strong class="bg-white">{{ $errors->first('time') }}</strong>
                                          </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Patient Email</label>
                                    <input class="form-control" type="email" name="patient_email" value="{{ Auth()->user()->email }}">
                                    @if ($errors->has('patient_email'))
                                        <span class="  help-block">
                                            <strong class="bg-white">{{ $errors->first('patient_email') }}</strong>
                                          </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Patient Phone Number</label>
                                    <input class="form-control" type="text" name="patient_mobile">
                                    @if ($errors->has('patient_mobile'))
                                        <span class="  help-block">
                                            <strong class="bg-white">{{ $errors->first('patient_mobile') }}</strong>
                                          </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <textarea cols="30" rows="4" class="form-control" name="message"></textarea>
                            @if ($errors->has('message'))
                                <span class="  help-block">
                                            <strong class="bg-white">{{ $errors->first('message') }}</strong>
                                          </span>
                            @endif
                        </div>
                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary submit-btn">Create Appointment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<script src="{!! asset('js/jquery-3.2.1.min.js') !!}"></script>
<script src="{!! asset('js/popper.min.js') !!}"></script>
<script src="{!! asset('js/bootstrap.min.js') !!}"></script>
<script src="{!! asset('js/jquery.slimscroll.js') !!}"></script>
<script src="{!! asset('js/select2.min.js') !!}"></script>
<script src="{!! asset('js/moment.min.js') !!}"></script>
<script src="{!! asset('js/bootstrap-datetimepicker.min.js') !!}"></script>
<script src="{!! asset('js/main.js') !!}"></script>
<script>
    $(function () {
        $('#datetimepicker3').datetimepicker({
            format: 'LT'
        });
        $('#datetimepicker4').datetimepicker({
            format: 'LT'
        });
    });
</script>

{{--<script src="{!! asset('js/app.js') !!}"></script>--}}
</body>
</html>


