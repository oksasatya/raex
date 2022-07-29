$(function() {
  'use strict';

//   $.validator.setDefaults({
//     submitHandler: function() {
//       alert("submitted!");
//     }
  });
  $(function() {
    // validate signup form on keyup and submit
    $("#signupForm").validate({
      rules: {
        name: {
          required: true,
          minlength: 3
        },
        email: {
          required: true,
          email: true
        },
        // age_select: {
        //   required: true
        // },
        // gender_radio: {
        //   required: true
        // },
        // skill_check: {
        //   required: true
        // },
        password: {
          required: true,
          minlength: 5
        },
        confirmed_password: {
          required: true,
          minlength: 5,
          equalTo: "#password"
        },
      },
      messages: {
        name: {
          required: "Please enter a name",
          minlength: "Name must consist of at least 3 characters"
        },
        email: "Please enter a valid email address",
        age_select: "Please select your age",
        skill_check: "Please select your skills",
        gender_radio: "Please select your gender",
        password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 5 characters long"
        },
        confirmed_password: {
          required: "Please confirm your password",
          minlength: "Your password must be at least 5 characters long",
          equalTo: "Please enter the same password as above"
        },
        terms_agree: "Please agree to terms and conditions"
      },
      errorPlacement: function(error, element) {
        error.addClass( "invalid-feedback" );

        if (element.parent('.input-group').length) {
          error.insertAfter(element.parent());
        }
        else if (element.prop('type') === 'radio' && element.parent('.radio-inline').length) {
          error.insertAfter(element.parent().parent());
        }
        else if (element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
          error.appendTo(element.parent().parent());
        }
        else {
          error.insertAfter(element);
        }
      },
      highlight: function(element, errorClass) {
        if ($(element).prop('type') != 'checkbox' && $(element).prop('type') != 'radio') {
          $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        }
      },
      unhighlight: function(element, errorClass) {
        if ($(element).prop('type') != 'checkbox' && $(element).prop('type') != 'radio') {
          $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        }
      }
    });


    // validate login
    $("#loginForm").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 5
            }
        },
        messages: {
            email: "Please enter a valid email address",
            password: {
                required: "Please enter a password",
                minlength: "Your password must be at least 5 characters long"
            }
        },
        errorPlacement: function(error, element) {
            error.addClass( "invalid-feedback" );

            if (element.parent('.input-group').length) {
              error.insertAfter(element.parent());
            }
            else if (element.prop('type') === 'radio' && element.parent('.radio-inline').length) {
              error.insertAfter(element.parent().parent());
            }
            else if (element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
              error.appendTo(element.parent().parent());
            }
            else {
              error.insertAfter(element);
            }
          },
          highlight: function(element, errorClass) {
            if ($(element).prop('type') != 'checkbox' && $(element).prop('type') != 'radio') {
              $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
            }
          },
          unhighlight: function(element, errorClass) {
            if ($(element).prop('type') != 'checkbox' && $(element).prop('type') != 'radio') {
              $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
            }
          }
    });


    // create product validation
    $("#submitProduct").validate({
        rules: {
            name: {
                required: true,
                minlength: 3
            },
            description:{
                required: true,
                minlength: 3
            },
            image:{
                required: true,
                accept: "image/*",
            },
            price: {
                required: true,
            },
            category: {
                required: true,
            }
        },
        messages: {
            name: {
                required: "Please enter a name",
                minlength: "Name must consist of at least 3 characters"
            },
            description: {
                required: "Please enter a description",
                minlength: "Description must consist of at least 3 characters"
            },
            image: {
                required: "Please upload an image",
                accept: "Please upload an image",
            },
            price: {
                required: "Please enter a price",
            },
            category: {
                required: "Please select a category",
            }
        },
        errorPlacement: function(error, element) {
            error.addClass( "invalid-feedback" );

            if (element.parent('.input-group').length) {
              error.insertAfter(element.parent());
            }
            else if (element.prop('type') === 'radio' && element.parent('.radio-inline').length) {
              error.insertAfter(element.parent().parent());
            }
            else if (element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
              error.appendTo(element.parent().parent());
            }
            else {
              error.insertAfter(element);
            }
        },
        highlight: function(element, errorClass) {
            if ($(element).prop('type') != 'checkbox' && $(element).prop('type') != 'radio') {
              $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
            }
        },
        unhighlight: function(element, errorClass) {
            if ($(element).prop('type') != 'checkbox' && $(element).prop('type') != 'radio') {
                $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
            }
        }

    });
});
