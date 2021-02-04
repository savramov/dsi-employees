@extends('layouts.app')

@section('content')
<div class="container">


    <div class="card">

        <div class="card-header">
            <h4>{{ __('Add New Employee') }}</h4>
        </div>


        <div class="card-body">

            <form method="POST" action="{{ route('employees.store') }}" id="employee_form">
                @csrf
        
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('First Name:') }}</label>
                            <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" placeholder="{{ __('First Name') }}" value="{{ old('first_name') }}" />

                            @error('first_name')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    
                        <div class="form-group">
                            <label>{{ __('Gender:') }}</label>
                            <select class="custom-select @error('gender') is-invalid @enderror" name="gender">
                                <option value="">{{ __('Please select your gender') }}</option>
                                <option value="M" {{ old('gender') == "M" ? "selected" : "" }}>{{ __('Male') }}</option>
                                <option value="F" {{ old('gender') == "F" ? "selected" : "" }}>{{ __('Female') }}</option>
                            </select>

                            @error('gender')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
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
                            <select class="form-control custom-select" name="department">
                                <option value="">{{ __('Please select a department ...') }}</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}" {{ old('department') == $department->id ? "selected" : "" }}>{{ $department->name }}</option>
                                @endforeach
                            </select>

                            @error('department')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
        
                        <div class="form-group">
                            <label>{{ __('Salary:') }}</label>
                            <input type="text" name="salary" class="form-control" placeholder="{{ __('Salary') }}" />
                            
                            @error('salary')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('Last Name:') }}</label>
                            <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last Name" />

                            @error('last_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Email:') }}</label>
                            <input type="text" name="email" class="form-control" placeholder="{{ __('Email') }}" value="{{ old('email') }}" />

                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Phone:') }}</label>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">+359</span>
                                    </div>
                                    <input type="text" name="phone_number" class="form-control" placeholder="{{ __('Phone Number') }}" />
                                </div>
                            </div>

                            @error('phone_number')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Job Position:') }}</label>
                            <input type="text" name="job_position" class="form-control" placeholder="{{ __('Job Position') }}" />

                            @error('job_position')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 text-center mt-5">
                        <input type="submit" class="btn btn-primary btn-lg" id="btn_submit" value="Add Employee" />
                    </div>
                </div>
            </form>

        </div>

    </div>

    

</div>
@endsection