/**
 * Created by mindfire on 27/3/17.
 */
$(function() {
    // Initialize form validation on the registration form.
    // It has the name attribute "registration"

    $.validator.methods.alpha = function( value) {
        return  (/[a-zA-Z]/).test( value );
    };

    $("form[name='registration']").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            firstName : {
                required: true,
                alpha:true
            },
            lastName : {
                required: true,
                alpha:true
            },
            username : {
                required: true,
                alpha:true
            },
            email: {
                required: true,
                // Specify that email should be validated
                // by the built-in "email" rule
                email: true
            },
            password: {
                required: true,
                minlength: 5
            },
            companyName: "required",
            designationName: "required",
            residenceStateName: {
                alpha:true
            },
            residenceCityName: {
                alpha: true
            },
            residenceZip: {
             minlength:6
            },
            officeStateName: {
                required: true,
                alpha: true
            },
            officeCityName: {
                required:true,
                alpha: true
            },
            officeZip: {
                required: true,
                minlength:6
            },
            contactNumber: {
                minlength:10
            },
            githubUserName: "required"

        },
        // Specify validation error messages
        messages: {
            firstName: {
                required: "Please enter your First Name",
                alpha: "First Name should only alphabet"
            },
            lastName: {
                required: "Please enter your Last Name",
                alpha: "Last Name should only alphabet"
             },
            username: {
                required: "Please enter your Username",
                alpha: "Last Name should only alphabet"
            },
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            email: "Please enter a valid email address",
            companyName: "Please enter your company name",
            designationName: "Please enter your designation",
            residenceCityName: "Please enter only alphabet",
            residenceStateName: "Please enter only alphabet",
            residenceZip: "Your zip must be at least 6",
            officeStateName: {
                required: "This field is required",
                alpha :"This field contain only alphabet"
            },
            officeCityName: {
                required: "This field is required",
                alpha :"This field contain only alphabet"
            },
            officeZip: {
                required: "This field is required",
                minlength :"Your zip must be at least 6"
            },
            contactNumber: {
                required: "this field is required",
                minlength: "Length must be 10"
            },
            githubUserName: "This field is required"

        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid

        submitHandler: function() {
            if($("#signUp").length <= 0) {
                event.preventDefault();
                var id = $("#hidden").val();
                update_row(id)
            }
        }
    });
});
