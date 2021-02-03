@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
            
                <div class="card-header align-middle">
                    <h4>{{ __('Employees') }}</h4>
                    <a class="btn btn-primary" href="{{ route('employees.create') }}" role="button">{{ __('Add Employee') }}</a>
                </div>        

                <div class="card-body">

                    @if(count($employees) > 0)
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Department</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($employees as $employee)
                                <tr class="table-active">
                                    <td>{{ $employee->first_name }}</td>
                                    <td>{{ $employee->last_name }}</td>
                                    <td>{{ $employee->department->name }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-primary" href="#">Edit</a>
                                            
                                            <form method="POST" action="{{ route('employees.destroy', $employee->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <input class="btn btn-danger" type="submit" value="Delete" />
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{ $employees->links() }}
                    @else
                        <p>No employees</p>
                    @endif

                </div>
  
            </div>
                    
        </div>
    </div>
</div>
@endsection
