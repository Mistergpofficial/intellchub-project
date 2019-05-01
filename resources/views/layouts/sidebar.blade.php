<?php
/**
 * Created by PhpStorm.
 * User: GODSPOWER
 * Date: 4/30/2019
 * Time: 7:44 AM
 */

?>
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            @if(Auth::user()->role_id == 2)
            <ul>
                <li class="menu-title">Main</li>
                <li class="active">
                    <a href="{!! url('user/dashboard') !!}"><i class="fa fa-dashboard"></i> <span>Doctor Dashboard</span></a>
                </li>
                {{--<li>--}}
                    {{--<a href="appointments.html"><i class="fa fa-calendar"></i> <span>Appointments</span></a>--}}
                {{--</li>--}}
                <li>
                    <a href="{!! url('user/schedule') !!}"><i class="fa fa-calendar-check-o"></i> <span>My Schedule</span></a>
                </li>
                <li>
                    <a href="{!! url('user/departments') !!}"><i class="fa fa-hospital-o"></i> <span>Departments</span></a>
                </li>
            </ul>
                @else
                @if(Auth::user()->role_id == 1)
                <ul>
                    <li class="menu-title">Main</li>
                    <li class="active">
                        <a href="{!! url('user/dashboard') !!}"><i class="fa fa-dashboard"></i> <span>Patient Dashboard</span></a>
                    </li>
                    <li>
                        <a href="{!! url('user/appointment') !!}"><i class="fa fa-calendar"></i> <span>Appointments</span></a>
                    </li>
                </ul>
                @endif
                @endif
        </div>
    </div>
</div>
