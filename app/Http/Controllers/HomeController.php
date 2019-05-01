<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Department;
use App\Models\Schedule;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function welcome(){
        if(!Auth::check()){
           return redirect()->to(url('/'));
        }else
        $doctor = User::where('role_id', 2)->with('userDepartments')->get();
        $patient = User::where('role_id', 1)->get();
        $appointments= Appointment::where('user_id', Auth::user()->id)->orderBy('created_at', 'asc')->paginate(5);
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
        return view('pages.account', compact('doctor', 'patient', 'appointments', 'sch', 'ntu'));
    }
}
