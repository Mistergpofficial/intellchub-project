<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Schedule;
use App\Models\UserDepartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function schedule(){
        $schedule = Schedule::where('user_id', Auth::user()->id)->paginate(5);
        foreach($schedule as $sche){
            $dept = "";
            $sch = "";
            $dept = $sche->department;
            $sch = Department::where('id',  $dept)->first();
        }
        return view('pages.schedule', compact('schedule', 'sch'));
    }

    public function addSchedule(){
        $departments = Department::all();

        return view('pages.add-schedule', compact('departments'));
    }
    public function postSchedule(Request $request){
        //dd($request->input('department'));
        $request->validate([
            'full_name' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'message' => 'required',
            'department' => 'required|not_in:0'
        ]);

        $schedule = Schedule::where('user_id', Auth::user()->id)->get();
        if (count($schedule) === 1) {
            // appointment found
            $request->session()->flash('danger', 'You have a schedule already');
            return redirect('/user/add-schedule');
        }
        else {
            Schedule::create([
                'full_name' => $request->full_name,
                'department' => $request->department,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'message' => $request->message,
                'user_id' => Auth::user()->id
            ]);
            UserDepartment::create([
               'user_id' => Auth::user()->id,
               'department_id' => $request->department
            ]);
            session()->flash('success', 'Added Successfully!');
            return redirect()->back();
        }

    }
}
