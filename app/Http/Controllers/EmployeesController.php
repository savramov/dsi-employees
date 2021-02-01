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
     * Show the application dashboard.
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
            'first_name' => 'required',
            'last_name'  => 'required',
            'phone_number' => 'required'
        ]);

        // Save New Employee to Database
        $employee = new Employee([
            'first_name' => $request->input('first_name'),
            'last_name'  => $request->input('last_name')

        ]);
        $employee->save();

        return redirect('/employees')->with('success', 'Employee added.');
    }


    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect('/employees')->with('success', 'Employee deleted successfully.');
    }

}
