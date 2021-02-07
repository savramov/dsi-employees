// Check if email is valid
function email_is_valid (email) {
    return /\S+@\S+\.\S+/.test(email);
}

// Check if field is numeric
function check_is_numeric(value) {
    return /^[0-9]+$/.test(value);
}

// Show error message to the form
function show_error_message(element, message) {
    $(element).addClass('is-invalid');
    
    if(!$(element).parent().find('span.invalid-feedback').length) {
        $(element).parent().append('<span class="invalid-feedback"><strong>' + message + '</strong></span>');
    } else {
        $(element).parent().find('span.invalid-feedback').html('<strong>' + message + '</strong>');
    }
}

// Hide error message from the form
function hide_error_message(element) {
    $(element).removeClass('is-invalid');
}


$(document).ready(function() {

    $('form#employee_form #btn_submit').on('click', function(e) {
        e.preventDefault(e);
        var first_name = 'input#first_name';
        var first_name_val = $(first_name).val();
        var last_name = 'input#last_name';
        var last_name_val = $(last_name).val();
        var gender = 'select#gender';
        var gender_val = $(gender).val();
        var email = 'input#email';
        var email_val = $(email).val();
        var address = 'input#address';
        var address_val = $(address).val();
        var phone = 'input#phone_number';
        var phone_val = $(phone_number).val();
        var department = 'select#department';
        var department_val = $(department).val();
        var job_position = 'input#job_position';
        var job_position_val = $(job_position).val();
        var salary = 'input#salary';
        var salary_val = $(salary).val();


        var isFormValid = true;

        // First Name Validation
        if(first_name_val.length < 1) {
            show_error_message(first_name, 'Please enter first name.');
            isFormValid = false;

        } else if(first_name_val.length < 3) {
            show_error_message(first_name, 'The first name must be at least 3 characters.');
            isFormValid = false;

        } else if(first_name_val.length > 30) {
            show_error_message(first_name, 'The first name may not be greater than 30 characters.');
            isFormValid = false;

        } else {
            hide_error_message(first_name);
        }


        // Last Name Validation
        if(last_name_val.length < 1) {
            show_error_message(last_name, 'Please enter last name.');
            isFormValid = false;

        } else if(last_name_val.length < 3) {
            show_error_message(last_name, 'The last name must be at least 3 characters.');
            isFormValid = false;

        } else if(last_name_val.length > 30) {
            show_error_message(last_name, 'The last name may not be greater than 30 characters.');
            isFormValid = false;

        } else {
            hide_error_message(last_name);
        }


        // Gender Validation
        if(gender_val === '') {
            show_error_message(gender, 'The gender field is required.');
            isFormValid = false;

        } else {
            hide_error_message(gender);
        }


        // Email Validation
        if(email_val.length < 1) {
            show_error_message(email, 'The email field is required.');
            isFormValid = false;

        } else if(!email_is_valid(email_val)) {
            show_error_message(email, 'The email must be a valid email address.');
            isFormValid = false;

        } else {
            hide_error_message(email);
        }


        // Address Validation
        if(address_val.length < 1) {
            show_error_message(address, 'The address field is required.');
            isFormValid = false;

        } else {
            hide_error_message(address);
        }


        // Phone Number Validation
        if(phone_val.length < 1) {
            show_error_message(phone, 'The phone field is required.');
            isFormValid = false;

        } else if(phone_val.length != 9) {
            show_error_message(phone, 'The phone number must be 9 digits.');
            isFormValid = false;

        } else {
            hide_error_message(phone);
        }


        // Department Validation
        if(department_val === '') {
            show_error_message(department, 'The department field is required.');
            isFormValid = false;

        } else {
            hide_error_message(department);
        }


        // Job Position Validation
        if(job_position_val.length < 1) {
            show_error_message(job_position, 'The job position field is required.');
            isFormValid = false;

        } else if(job_position_val.length > 50) {
            show_error_message(job_position, 'The job position may not be greater than 50 characters.');
            isFormValid = false;

        } else {
            hide_error_message(job_position);
        }


        // Salary Validation
        if(salary_val.length < 1) {
            show_error_message(salary, 'The salary field is required.');
            isFormValid = false;

        } else if(!check_is_numeric(salary_val)) {
            show_error_message(salary, 'The salary must be a number.');
            isFormValid = false;

        } else {
            hide_error_message(salary);
        }



        // Submit the form, because it is valid
        if(isFormValid) {
            $("form#employee_form").submit();
        }
        
    });

});