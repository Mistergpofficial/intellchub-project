<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Department;
use App\Models\Schedule;
use App\Models\UserAppointment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function appoint(){
       $appointments= Appointment::where('user_id', Auth::user()->id)->paginate(5);
        foreach($appointments as $sche){
            $dept = "";
            $sch = "";
            $ntu = '';
            $user = "";
            $user = $sche->doctor;
            $dept = $sche->department;
            $sch = User::where('id',  $user)->first();
            $ntu = Department::where('id',  $dept)->first();
        }
        //$appointmentn = User::where('role_id', 1)->with('userAppointments')->get();
        return view('pages.appointment', compact('appointments', 'appointmentn', 'sch', 'ntu'));
    }

    public function addAppointment(){
        //$doctors = User::where('role_id', 2)->get();
        $doctors = Schedule::all();
        //foreach ($doctors as doc)
        $departments = Department::all();
        return view('pages.add-appointment', compact('doctors', 'departments'));
    }

    public function postAppointment(Request $request){

        $request->validate([
           'patient_name' => 'required|string',
           'department' => 'required|not_in:0',
           'doctor' => 'required|not_in:0',
           'date' => 'required',
            'time' => 'required',
            'patient_email' => 'required|string|email|max:255',
            'patient_mobile' => 'required|min:11',
            'message' => 'required'
        ]);

        $schedules = Schedule::where('user_id', $request->doctor)->first();

        if ($schedules->department !== $request->department) {
            $request->session()->flash('danger', 'This Doctor does not belong to the selected department. Kindly correct it');
            return redirect('/user/add-appointment');
        }
        elseif($request->time < $schedules->start_time || $request->time > $schedules->end_time){
            $request->session()->flash('danger', 'The Doctor available time is between '. $schedules->start_time .' and '. $schedules->end_time);
            return redirect('/user/add-appointment');
        }
        elseif (Appointment::where('time', '=', $request->time)->where('date', '=', $request->date)->exists()){
            $request->session()->flash('danger', 'Appointment already booked at '. $request->time .' on '. $request->date. ', Please pick another appointment date and time');
            return redirect('/user/add-appointment');
        }else{
            $appointment = Appointment::create([
                'appointment_id' => 'APT:' . '' . str_random(4),
               'patient_name' => $request->patient_name,
               'doctor' => $request->doctor ,
                'department' => $request->department,
                'date' => $request->date,
                'time' => $request->time,
                'patient_email' => $request->patient_email,
                'patient_mobile' => $request->patient_mobile,
                'message' => $request->message,
                'user_id' => Auth::user()->id
        ]);
            UserAppointment::create([
               'user_id' =>  Auth::user()->id,
                'appointment_id' => $appointment->id
            ]);
            session()->flash('success', 'Appointment booked successfully!');
            return redirect()->back();
        }

    }
}
