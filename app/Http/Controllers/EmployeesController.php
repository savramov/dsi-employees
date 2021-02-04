<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Employee;
use App\Department;

class EmployeesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the employees dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employees = Employee::orderBy('id', 'DESC')->paginate(1);

        return view('employees.index', ['employees' => $employees]);
    }


    public function create()
    {
        $departments = Department::all();

        return view('employees.create', ['departments' => $departments]);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name'   => 'required|min:3|max:30|alpha',
            'last_name'    => 'required|min:3|max:30|alpha',
            'gender'       => 'required|in:M,F',
            'email'        => 'required|email',
            'address'      => 'required',
            'phone_number' => 'required|digits:9',
            'department'   => 'required',
            'job_position' => 'required',
            'salary'       => 'required'
        ]);

        // Save New Employee to Database
        $employee = new Employee([
            'first_name'    => $request->input('first_name'),
            'last_name'     => $request->input('last_name'),
            'gender'        => $request->input('gender'),
            'email'         => $request->input('email'),
            'gender'        => $request->input('gender'),
            'email'         => $request->input('email'),
            'address'       => $request->input('address'),
            'phone_number'  => $request->input('phone_number'),
            'department_id' => $request->input('department'),
            'job_position'  => $request->input('job_position'),
            'salary'        => $request->input('salary')
        ]);
        $employee->save();

        return redirect('/employees')->with('success', 'Employee added successfully.');
    }


    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect('/employees')->with('success', 'Employee deleted successfully.');
    }

}
