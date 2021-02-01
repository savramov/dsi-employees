<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Employee;

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
        return view('employees.create');
    }


    public function store(Request $request)
    {
        // return $request->all();
        
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
