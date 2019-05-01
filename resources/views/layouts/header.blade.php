<?php
/**
 * Created by PhpStorm.
 * User: GODSPOWER
 * Date: 4/30/2019
 * Time: 7:45 AM
 */


?>

<div class="header">
<div class="header-left">
    <a href="{!! url('/') !!}" class="logo">
        <img src="{!! asset('images/logo.png') !!}" width="35" height="35" alt=""> <span>Intellchub</span>
    </a>
</div>
<a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
<a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
<ul class="nav user-menu float-right">
    <li class="nav-item dropdown d-none d-sm-block">
        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><i class="fa fa-bell-o"></i> <span class="badge badge-pill bg-danger float-right">3</span></a>
        <div class="dropdown-menu notifications">


        </div>
    </li>
    <li class="nav-item dropdown d-none d-sm-block">
        <a href="javascript:void(0);" id="open_msg_box" class="hasnotifications nav-link"><i class="fa fa-comment-o"></i> <span class="badge badge-pill bg-danger float-right">8</span></a>
    </li>
    <li class="nav-item dropdown has-arrow">
        <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img">
							<img class="rounded-circle" src="{!! asset('images/user.jpg') !!}" width="24" alt="Admin">
							<span class="status online"></span>
						</span>
                <span>{{ Auth()->user()->full_name }}</span>
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#">My Profile</a>
            <a class="dropdown-item" href="#">Edit Profile</a>
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="javascript:;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id ="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </li>
</ul>
<div class="dropdown mobile-user-menu float-right">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
    <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="#">My Profile</a>
        <a class="dropdown-item" href="#">Edit Profile</a>
        <a class="dropdown-item" href="#">Settings</a>
        <a class="dropdown-item" href="javascript:;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        <form id ="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
</div>
</div>