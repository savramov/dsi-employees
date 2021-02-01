@extends('layouts.app')

@section('content')
<div class="container">

    <form method="POST" action="{{ route('employees.store') }}">
        @csrf

        
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>First Name:</label>
                    <input type="text" name="first_name" class="form-control" placeholder="First Name" />
                </div>
                
                <div class="form-group">
                    <label>Last Name:</label>
                    <input type="text" name="last_name" class="form-control" placeholder="Last Name" />
                </div>
                
                <div class="form-group">
                    <label>Phone:</label>
                    <input type="text" name="phone_number" class="form-control" placeholder="Phone Number" />
                </div>
                
                <input type="submit" class="btn btn-primary" value="Add Employee" />
            </div>
        </div>
    </form>

</div>
@endsection