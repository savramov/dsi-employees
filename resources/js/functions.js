const { first } = require("lodash");

// Check if email is valid
function emailIsValid (email) {
    return /\S+@\S+\.\S+/.test(email)
}

// Add error message to the form
function add_error(element, message) {
    $(element).addClass('is-invalid');
    
    if(!$(element).parent().find('span.invalid-feedback').length) {
        $(element).parent().append('<span class="invalid-feedback"><strong>' + message + '</strong></span>');
    } else {
        $(element).parent().find('span.invalid-feedback').html('<strong>' + message + '</strong>');
    }
}

function clear_error(element) {
    
}


$(document).ready(function() {

    $('form#employee_form #btn_submit').on('click', function(e) {
        e.preventDefault(e);
        var first_name = 'input#first_name';
        var first_name_val = $(first_name).val();
        var last_name = 'input#last_name';
        var last_name_val = $(last_name).val();
        var email = $('#email').val();

        var isFormValid = true;

        // First Name Validation
        if(first_name_val.length < 1) {
            add_error(first_name, 'Please enter first name.');
            isFormValid = false;

        } else if(first_name_val.length < 3) {
            add_error(first_name, 'The first name must be at least 3 characters.');
            isFormValid = false;

        } else if(first_name_val.length > 30) {
            add_error(first_name, 'The first name may not be greater than 30 characters.');
            isFormValid = false;

        }

        // Last Name Validation
        if(last_name_val.length < 1) {
            add_error(last_name, 'Please enter last name.');
            isFormValid = false;

        } else if(last_name_val.length < 3) {
            add_error(last_name, 'The last name must be at least 3 characters.');
            isFormValid = false;

        } else if(last_name_val.length > 30) {
            add_error(last_name, 'The last name may not be greater than 30 characters.');
            isFormValid = false;

        }


        // Submit the form, because it is valid
        if(isFormValid) {
            $("form#employee_form").submit();
        }
        
    });

});