<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function departments(){
        $departments = Department::simplePaginate(4);
        return view('pages.departments', compact('departments'));
    }

    public function addDepartment(){
        return view('pages.add-departments');
    }

    public function postDepartment(Request $request){
        $request->validate([
            'department_name' => 'required'
        ]);

        Department::create([
           'name' => $request->department_name
        ]);
        session()->flash('success', 'Added Successfully!');
        return redirect()->back();
    }
}
