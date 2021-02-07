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
     * Show a listing of the employees.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employees = Employee::orderBy('id', 'DESC')->paginate(10);

        return view('employees.index', ['employees' => $employees]);
    }


    /**
     * Show the form for creating a new employee.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        $departments = Department::all();

        return view('employees.create', ['departments' => $departments]);
    }


    /**
     * Store a newly created employee in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name'    => 'required|min:3|max:30|alpha',
            'last_name'     => 'required|min:3|max:30|alpha',
            'gender'        => 'required',
            'email'         => 'required|email',
            'address'       => 'required',
            'phone_number'  => 'required|digits:9',
            'department'    => 'required',
            'job_position'  => 'required|max:50',
            'salary'        => 'required|numeric'
        ]);


        // Save New Employee to Database
        $employee = new Employee([
            'first_name'    => $request->get('first_name'),
            'last_name'     => $request->get('last_name'),
            'gender'        => $request->get('gender'),
            'email'         => $request->get('email'),
            'address'       => $request->get('address'),
            'phone_number'  => $request->get('phone_number'),
            'department_id' => $request->get('department'),
            'job_position'  => $request->get('job_position'),
            'salary'        => $request->get('salary')
        ]);
        $employee->save();

        return redirect('/employees')->with('success', 'Employee added successfully.');
    }


    /**
     * Show the form for editing of the employee.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $departments = Department::all();

        return view('employees.edit', ['employee' => $employee, 'departments' => $departments]);
    }


    /**
     * Update the employee in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'first_name'    => 'required|min:3|max:30|alpha',
            'last_name'     => 'required|min:3|max:30|alpha',
            'gender'        => 'required',
            'email'         => 'required|email',
            'address'       => 'required',
            'phone_number'  => 'required|digits:9',
            'department'    => 'required',
            'job_position'  => 'required|max:50',
            'salary'        => 'required|numeric'
        ]);

        // Update the Employee to Database
        $employee = Employee::findOrFail($id);
        $employee->first_name    = $request->get('first_name');
        $employee->last_name     = $request->get('last_name');
        $employee->gender        = $request->get('gender');
        $employee->email         = $request->get('email');
        $employee->address       = $request->get('address');
        $employee->phone_number  = $request->get('phone_number');
        $employee->department_id = $request->get('department');
        $employee->job_position  = $request->get('job_position');
        $employee->salary        = $request->get('salary');
        $employee->save();

        return redirect('/employees')->with('success', 'Employee edited successfully.');
    }


    /**
     * Remove the employee from the database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect('/employees')->with('success', 'Employee deleted successfully.');
    }

}
