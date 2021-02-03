$(document).ready(function() {
    $('#employee_form').on('submit', 'form#employee_form', function(e) {
        e.preventDefault();
        console.log('for submitted ...');
    });
});