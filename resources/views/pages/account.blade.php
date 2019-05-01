<?php
/**
 * Created by PhpStorm.
 * User: GODSPOWER
 * Date: 4/30/2019
 * Time: 8:11 AM
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
@extends('layouts.master')

@section('content')

    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg1"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>{{ $doctor->count() }}</h3>
                            <span class="widget-title1">Doctors <i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg3"><i class="fa fa-user-md" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>{{ $patient->count() }}</h3>
                            <span class="widget-title2">Patients <i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg3"><i class="fa fa-user-md" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>72</h3>
                            <span class="widget-title3">Attend <i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg4"><i class="fa fa-heartbeat" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>618</h3>
                            <span class="widget-title4">Pending <i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 col-lg-8 col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title d-inline-block">Upcoming Appointments</h4> <a href="#" class="btn btn-primary float-right">View all</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                @if($appointments->count() > 0)
                                <table class="table mb-0">
                                    <thead class="d-none">
                                    <tr>
                                        <th>Patient Name</th>
                                        <th>Doctor Name</th>
                                        <th>Timing</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($appointments as $appointment)
                                    <tr>
                                        <td style="min-width: 200px;">
                                            <a class="avatar" href="#">B</a>
                                            <h2><a href="#">{{ $appointment->patient_name }}<span>{{ $appointment->patient_email }}</span></a></h2>
                                        </td>
                                        <td>
                                            <h5 class="time-title p-0">Appointment With</h5>
                                            <p>{{ $sch->full_name }}</p>
                                        </td>
                                        <td>
                                            <h5 class="time-title p-0">Date</h5>
                                            <p>{{ $appointment->date }}</p>
                                        </td>
                                        <td>
                                            <h5 class="time-title p-0">Timing</h5>
                                            <p>{{ $appointment->time }}</p>
                                        </td>
                                        <td class="text-right">
                                            <a href="#" class="btn btn-outline-primary take-btn">Take up</a>
                                        </td>
                                    </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                    <div class="alert alert-info">You have no registered appointment </div>
                                @endif

                                    <div class="col-md-12 text-center">
                                        {{ $appointments->links() }}
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="card member-panel">
                        {{--<div class="card-header bg-white">--}}
                            {{--<h4 class="card-title mb-0">Doctors</h4>--}}
                        {{--</div>--}}
                        {{--@if($doctor->count() > 0)--}}
                        {{--<div class="card-body">--}}
                            {{--@foreach($doctor as $doct)--}}
                            {{--<ul class="contact-list">--}}
                                {{--<li>--}}
                                    {{--<div class="contact-cont">--}}
                                        {{--<div class="float-left user-img m-r-10">--}}
                                            {{--<a href="#" title="John Doe"><img src="{!! asset('images/user.jpg') !!}" alt="" class="w-40 rounded-circle"><span class="status online"></span></a>--}}
                                        {{--</div>--}}
                                        {{--<div class="contact-info">--}}
                                            {{--<span class="contact-name text-ellipsis">{{ $doct->full_name }}</span>--}}
                                            {{--<span class="contact-date">{{ $doct->userDepartments->departments->name }}</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                                {{--@endforeach--}}
                        {{--</div>--}}
                        {{--@else--}}
                            {{--<div class="alert alert-info">You have no registered Doctor </div>--}}
                        {{--@endif--}}
                        {{--<div class="card-footer text-center bg-white">--}}
                            {{--<a href="#" class="text-muted">View all Doctors</a>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8 col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title d-inline-block">New Patients </h4> <a href="#" class="btn btn-primary float-right">View all</a>
                        </div>
                        <div class="card-block">
                            <div class="table-responsive">
                                @if($patient->count() > 0)
                                <table class="table mb-0 new-patient-table">
                                    <tbody>
                                    @foreach($patient as $pat)
                                    <tr>
                                        <td>
                                            <img width="28" height="28" class="rounded-circle" src="{!! asset('images/user.jpg') !!}" alt="">
                                            <h2>{{ $pat->full_name  }}</h2>
                                        </td>
                                        <td>{{ $pat->email  }}</td>
                                        <td>{{ $pat->mobile  }}</td>
                                        <td><button class="btn btn-primary btn-primary-one float-right">WELCOME</button></td>
                                    </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                    <div class="alert alert-info">You have no registered patient </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



