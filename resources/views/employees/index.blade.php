@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <h4 class="card-header d-flex justify-content-between align-items-center p-4">
                    {{ __('Employees') }}
                    <a class="btn btn-primary" href="{{ route('employees.create') }}">{{ __('Add Employee') }}</a>
                </h4>

                <div class="card-body">

                    @if(count($employees) > 0)
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="align-middle">{{ __('First Name') }}</th>
                                    <th class="align-middle">{{ __('Last Name') }}</th>
                                    <th class="align-middle">{{ __('Department') }}</th>
                                    <th class="align-middle">{{ __('Job Position') }}</th>
                                    <th class="align-middle">{{ __('Actions') }}</th>
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
                                    <td class="align-middle">{{ $employee->job_position }}</td>
                                    <td class="align-middle">
                                        <div class="btn-group">
                                            <a class="btn btn-primary" href="{{ route('employees.edit', $employee->id) }}">{{ __('Edit') }}</a>
                                            
                                            <form method="POST" action="{{ route('employees.destroy', $employee->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <input class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this employee?')" type="submit" value="{{ __('Delete') }}" />
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{ $employees->links() }}
                    @else
                        <p>{{ __('No employees') }}</p>
                    @endif

                </div>
  
            </div>
                    
        </div>
    </div>
</div>
@endsection
