@extends('layouts.app')

@section('content')
<div class="container">


    <div class="card">

        <div class="card-header">
            <h4>{{ __('Edit Employee') }}</h4>
        </div>


        <div class="card-body">

            <form method="POST" action="{{ route('employees.update', $employee->id) }}" id="employee_form">
                @csrf
                @method('PATCH')
        
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('First Name:') }}</label>
                            <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" placeholder="{{ __('First Name') }}" value="{{ old('first_name', $employee->first_name) }}" />

                            @error('first_name')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    
                        <div class="form-group">
                            <label>{{ __('Gender:') }}</label>
                            <select class="custom-select @error('gender') is-invalid @enderror" name="gender" id="gender">
                                <option value="">{{ __('Please select your gender') }}</option>
                                <option value="M" {{ old('gender', $employee->gender) == "M" ? "selected" : "" }}>{{ __('Male') }}</option>
                                <option value="F" {{ old('gender', $employee->gender) == "F" ? "selected" : "" }}>{{ __('Female') }}</option>
                            </select>

                            @error('gender')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label>{{ __('Address:') }}</label>
                            <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" placeholder="{{ __('Address') }}" value="{{ old('address', $employee->address) }}" />

                            @error('address')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label>{{ __('Department:') }}</label>
                            <select class="form-control custom-select" name="department" id="department">
                                <option value="">{{ __('Please select a department ...') }}</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}" {{ old('department', $employee->department_id) == $department->id ? "selected" : "" }}>{{ $department->name }}</option>
                                @endforeach
                            </select>

                            @error('department')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
        
                        <div class="form-group">
                            <label>{{ __('Salary:') }}</label>
                            <input type="text" name="salary" id="salary" class="form-control @error('salary') is-invalid @enderror" placeholder="{{ __('Salary') }}" value="{{ old('salary', $employee->salary) }}" />
                            
                            @error('salary')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ __('Last Name:') }}</label>
                            <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="{{ __('Last Name') }}" value="{{ old('last_name', $employee->last_name) }}" />

                            @error('last_name')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Email:') }}</label>
                            <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Email') }}" value="{{ old('email', $employee->email) }}" />

                            @error('email')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Phone:') }}</label>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">+359</span>
                                    </div>
                                    <input type="text" name="phone_number" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror" placeholder="{{ __('Phone Number') }}" value="{{ old('phone_number', $employee->phone_number) }}" />
                                </div>
                            </div>

                            @error('phone_number')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>{{ __('Job Position:') }}</label>
                            <input type="text" name="job_position" id="job_position" class="form-control @error('job_position') is-invalid @enderror" placeholder="{{ __('Job Position') }}" value="{{ old('job_position', $employee->job_position) }}" />

                            @error('job_position')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 text-center mt-5">
                        <input type="submit" class="btn btn-primary btn-lg" id="btn_submit" value="{{ __('Edit Employee') }}" />
                    </div>
                </div>
            </form>

        </div>

    </div>

    

</div>
@endsection