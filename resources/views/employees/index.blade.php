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
                                    <th>{{ __('First Name') }}</th>
                                    <th>{{ __('Last Name') }}</th>
                                    <th>{{ __('Department') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($employees as $employee)
                                @if($loop->even)
                                    <tr>
                                @elseif($loop->odd)
                                    <tr class="table-active">
                                @endif
                                    <td class="align-middle">{{ $employee->first_name }}</td>
                                    <td class="align-middle">{{ $employee->last_name }}</td>
                                    <td class="align-middle">{{ $employee->department->name }}</td>
                                    <td class="align-middle">
                                        <div class="btn-group">
                                            <a class="btn btn-primary" href="{{ route('employees.edit', $employee->id) }}">Edit</a>
                                            
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
