<?php
/**
 * Created by PhpStorm.
 * User: GODSPOWER
 * Date: 4/30/2019
 * Time: 8:12 AM
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
    <link href="{!! asset('css/iziToast.min.css') !!}" rel="stylesheet">
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
    <div class="main-wrapper  account-wrapper">
        <div class="account-page">
            <div class="account-center">
                <div class="account-box">
                    <div class="alert alert-success" v-if="submitted">
                        <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&#215;</button>
                        Registration is Successful
                    </div>
                    <form @submit.prevent="next()" class="form-signin" @keydown="clear($event.target.name)">
                        {{ csrf_field() }}
                        <div class="account-logo">
                            <a href="{!! url('/') !!}"><img src="{!! asset('images/logo-dark.png') !!}" alt=""></a>
                        </div>
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="full_name" v-model="userData.full_name" class="form-control">
                            <p class="help is-danger" style="color: red;">@{{ getSignupError('full_name') }}</p>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" v-model="userData.username" class="form-control">
                            <p class="help is-danger" style="color: red;">@{{ getSignupError('username') }}</p>
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" v-model="userData.email" class="form-control">
                            <p class="help is-danger" style="color: red;">@{{ getSignupError('email') }}</p>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" v-model="userData.password" class="form-control">
                            <p class="help is-danger" style="color: red;">@{{ getSignupError('password') }}</p>
                        </div>
                        <div class="form-group">
                            <label>Password Again</label>
                            <input type="password" name="password_confirmation" v-model="userData.password_confirmation" class="form-control">
                            <p class="help is-danger" style="color: red;">@{{ getSignupError('password_confirmation') }}</p>
                        </div>
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="text" name="mobile" v-model="userData.mobile" class="form-control">
                            <p class="help is-danger" style="color: red;">@{{ getSignupError('mobile') }}</p>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary account-btn" type="submit">Signup</button>
                        </div>
                        <div class="text-center login-link">
                            Already have an account? <a href="{!! url('/') !!}">Login</a>
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
<script src="{!! asset('js/main.js') !!}"></script>
<script src="{!! asset('js/iziToast.min.js') !!}"></script>
<script src="{!! asset('js/app.js') !!}"></script>

{{--<script src="{!! asset('js/app.js') !!}"></script>--}}
</body>
</html>


