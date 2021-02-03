@extends('layouts.app')

@section('content')
<div class="container">

    <div class="card">

        <div class="card-header">
            <h4>{{ __('Add New Employee') }}</h4>
        </div>


        <div class="card-body">

            <form method="POST" action="{{ route('employees.store') }}">
                @csrf
        
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group @error('first_name') is-invalid @enderror">
                            <label>{{ __('First Name:') }}</label>
                            <input type="text" name="first_name" class="form-control" placeholder="{{ __('First Name') }}" />

                            @error('first_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    
                        <div class="form-group">
                            <label>{{ __('Gender:') }}</label>
                            <select class="custom-select" name="gender">
                                <option value="">{{ __('Please select your gender') }}</option>
                                <option value="M">{{ __('Male') }}</option>
                                <option value="F">{{ __('Female') }}</option>
                            </select>

                            @error('gender')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label>{{ __('Address:') }}</label>
                            <input type="text" name="address" class="form-control" placeholder="{{ __('Address') }}" />

                            @error('address')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label>{{ __('Department:') }}</label>
                            <select class="form-control custom-select" name="deprartment">
                                <option value="">{{ __('Please select a department ...') }}</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>

                            @error('deprartment')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
        
                        <div class="form-group">
                            <label>{{ __('Salary:') }}</label>
                            <input type="text" name="salary" class="form-control" placeholder="{{ __('Salary') }}" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('Last Name:') }}</label>
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name" />

                            @error('last_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Email:') }}</label>
                            <input type="text" name="email" class="form-control" placeholder="{{ __('Email') }}" />

                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Phone:') }}</label>
                            <input type="text" name="phone_number" class="form-control" placeholder="{{ __('Phone Number') }}" />

                            @error('phone_number')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Job Position:') }}</label>
                            <input type="text" name="job_position" class="form-control" placeholder="{{ __('Job Position') }}" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 text-center mt-5">
                        <input type="submit" class="btn btn-primary btn-lg" value="Add Employee" />
                    </div>
                </div>
            </form>

        </div>

    </div>

    

</div>
@endsection