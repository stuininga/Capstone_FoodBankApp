    //Create functionality for the admin functions dropdown
    var dropdown = document.querySelector('#dropdown-menu');
    var dropdownToggle = document.querySelector('.dropdown-toggle');

    //Add event listener on dropdown button
    dropdownToggle.addEventListener('click', function(){
        if (dropdown.classList.contains('closed')) {
            dropdown.classList.remove('closed');
            dropdown.classList.add('open');
        }
        else {
            dropdown.classList.add('closed');
            dropdown.classList.remove('open');
        }
    });

//Multipage form (jQuery Steps)
var form = $("#addClient");



//Create the validation rules for the form
form.validate({
    errorPlacement: function errorPlacement(error, element) { 
        element.after(error); 
    },
    rules: {
        fname: {
            required: true,
            maxlength: 70
        },
        lname: {
            required: true,
            maxlength: 70   
        },
        gender: "required",
        "family-status": "required",
        "id-type": "required",
        "id-number" : {
            number: true
        },
        "birth-date": "required",
        "home-phone": {
            required: true,

        },
        // "cell-phone": {
        //     exactlength: 10
        // },
        "famv-date": {
            required: function(element){
                return $("#famv").val().length > 0;
            }
        },
        "famv-comments": {
            maxlength: 100
        },
        address: "required",
        city: "required",
        "postal-code": {
            required: true
            //exactlength: 7
        },
        location : "required",
        "location-type": "required",
        "res-status-type" : "required",
        "primary-income-type" : "required",
        "monthly-income" : {
            required: true,
            number: true
        },
        "res-amount" : {
            number: true
        },
        utilities : {
            number: true
        }
    },
    messages: {
        fname: {
            required: "First name is required",
            maxlength: "Maximum 70 characters"
        },
        lname: {
            required: "Last name is required",
            maxlength: "Maximum 70 characters"
        },
        gender: {
            required: "Gender is required"
        },
        "family-status": {
            required: "Family status is required"
        },
        "id-type": {
            required: "ID Type is required"
        },
        "id-number": {
            number: "ID must be a number with no special characters"
        },
        "birth-date": {
            required: "Birth date is required"
        },
        "home-phone": {
            required: "Home phone is required",
            exactlength: "Phone number must be complete (xxx)-xxx-xxxx"
        },
        "cell-phone": {
            exactlength: "Phone number must be complete (xxx)-xxx-xxxx"
        },
        "famv-date": {
            required: "FAMV date is required if an FAMV option is selected"
        },
        "famv-comments": {
            maxlength: "Maximum 100 characters"
        },
        address: {
            required: "Address is required"
        },
        city: {
            required: "City is required"
        },
        "postal-code": {
            required: "Postal code is required",
            exactlength: "Postal code must be complete \"a9a 9a9\""
        },
        location : {
            required: "Region is required"
        },
        "location-type": {
            required: "Location type is required"
        },
        "res-status-type" : {
            required: "Residential status type is required"
        },
        "primary-income-type" : {
            required: "Primary income source is required"
        },
        "monthly-income" : {
            required: "Monthly income is required",
            number: "Monthly income must be a number with no special characters added"
        },
        "res-amount" : {
            number: "Rent/Mortgage amount must be a number with no special characters added"
        },
        utilities : {
            number: "Utilities must be a number with no special characters added"
        }
    }
});

// Enable jQuery Steps for the multipage effect
form.children("div").steps({
    headerTag: "h3",
    bodyTag: "div",
    transitionEffect: "slideLeft",
    enableFinishButton: true,
    enablePagination: true,
    onStepChanging: function (event, currentIndex, newIndex)
    {
        //Always allow previous action even if the current form is not valid
         if (currentIndex > newIndex) {
             return true;
         }
         //Needed in some cases if the user went back (clean up) 
         if (currentIndex < newIndex) {
             //Remove error styles
             form.find(".body:eq(" + newIndex + ") label.error").remove();
             form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
         }
         form.validate().settings.ignore = ":disabled,:hidden";
         return form.valid();
    },
    onFinishing: function (event, currentIndex)
    {
        form.validate().settings.ignore = ":disabled";
        return form.valid();
    },
    onFinished: function (event, currentIndex)
    {
        alert("Submitted!");
    }
});

// Add masks
$("#home-phone").mask("(999)-999-9999", {placeholder:" "});
$("#cell-phone").mask("(999)-999-9999", {placeholder:" "});
$("#postal-code").mask("a9a 9a9", {placeholder:" "});













// $('#home-phone').change(function(e) {
//     var phone = $('#home-phone').val();
//     console.log(phone);
// });






// $("#wizard").steps({
//      headerTag: "h3",
//      bodyTag: "div",
//      transitionEffect: "slideLeft",
//      autoFocus: true,
//      enableFinishButton: true,
//      enablePagination: true,
//      enableAllSteps: true,
//      onStepChanging: function (event, currentIndex, newIndex) {
//          //Always allow previous action even if the current form is not valid
//          if (currentIndex > newIndex) {
//              return true;
//          }
//          //Needed in some cases if the user went back (clean up) 
//          if (currentIndex < newIndex) {
//              //Remove error styles
//              form.find(".body:eq(" + newIndex + ") label.error").remove();
//              form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
//          }
//          form.validate().settings.ignore = ":disabled,:hidden";
//          return form.valid();


//      }, //End of onStepChanging
//      onStepChanged: function (event, currentIndex, priorIndex) {
         
//      }, //End of onStepChanged
//      onFinishing: function (event, currentIndex) {
//          alert("Submitted!");
//      }
//  }).validate({
//      errorPlacement: function errorPlacement(error, element) {element.before(error); },
//      rules: {
//          fname: {
//             required: true,
//             maxlength: 70
//          },
//          lname: {
//             required: true,
//             maxlength: 70   
//          },
//          gender: "required",
//          "id-type": "required",
//          "id-number" : {
//              number: true
//          },
//          "birth-day": "required"

//      },
//      messages: {
//         fname: {
//             required: "First name is required",
//             maxlength: "Maximum 70 characters"
//         },
//         lname: {
//             required: "Last name is required",
//             maxlength: "Maximum 70 characters"
//         }
//      }
//  });//End of jQuery Steps validation




