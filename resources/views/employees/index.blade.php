@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Employees') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    @if(count($employees) > 0)
                        <table width="100%" border="1">
                            @foreach ($employees as $employee)
                                <tr>
                                    <td>{{ $employee->first_name }}</td>
                                    <td>{{ $employee->last_name }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="#">Edit</a>
                                        
                                        <form method="POST" action="{{ route('employees.destroy', $employee->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <input class="btn btn-danger" type="submit" value="Delete" />
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
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
