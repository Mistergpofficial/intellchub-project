<?php
/**
 * Created by PhpStorm.
 * User: GODSPOWER
 * Date: 4/30/2019
 * Time: 8:55 PM
 */
?>

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


    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">Add Schedule</h4>
                </div>
            </div>

            @if(Session::has('success'))
                <div class="alert alert-success">
                    <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&#215;</button>
                    {{ Session::get('success') }}
                </div>
            @endif
            @if(Session::has('danger'))
                <div class="alert alert-danger">
                    <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&#215;</button>
                    {{ Session::get('danger') }}
                </div>
            @endif
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="{!! url('user/post-add-schedule') !!}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Doctor Name</label>
                                    <input type="text" value="{{ Auth()->user()->full_name }}"  name="full_name" class="form-control">
                                    @if ($errors->has('full_name'))
                                        <span class="  help-block">
                                            <strong class="bg-white">{{ $errors->first('full_name') }}</strong>
                                          </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Department</label>
                                    <select name="department" class="form-control">
                                        <option value="0">- Select your department * -</option>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id}}">{{ $department->name }}</option>
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
                                    <label>Start Time</label>
                                    <div class="time-icon">
                                        <input type="text" name="start_time" class="form-control" id="datetimepicker3">
                                        @if ($errors->has('start_time'))
                                            <span class="  help-block">
                                            <strong class="bg-white">{{ $errors->first('start_time') }}</strong>
                                          </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>End Time</label>
                                    <div class="time-icon">
                                        <input type="text" name="end_time" class="form-control" id="datetimepicker4">
                                        @if ($errors->has('end_time'))
                                            <span class="  help-block">
                                            <strong class="bg-white">{{ $errors->first('end_time') }}</strong>
                                          </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <textarea cols="30" rows="4" name="message" class="form-control"></textarea>
                            @if ($errors->has('message'))
                                <span class="  help-block">
                                            <strong class="bg-white">{{ $errors->first('message') }}</strong>
                                          </span>
                            @endif
                        </div>
                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary submit-btn">Create Schedule</button>
                        </div>
                    </form>
                </div>
            </div>
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






