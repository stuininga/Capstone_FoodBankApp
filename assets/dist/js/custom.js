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
var form = $("#addClient").show();

$("#wizard").steps({
     headerTag: "h3",
     bodyTag: "div",
     transitionEffect: "slideLeft",
     autoFocus: true,
     enableFinishButton: true,
     enablePagination: true,
     enableAllSteps: true,
     onStepChanging: function (event, currentIndex, newIndex) {
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


     }, //End of onStepChanging
     onStepChanged: function (event, currentIndex, priorIndex) {
         
     }, //End of onStepChanged
     onFinishing: function (event, currentIndex) {
         alert("Submitted!");
     }
 }).validate({
     errorPlacement: function errorPlacement(error, element) {element.before(error); },
     rules: {
         fname: "required",
         lname: "required",
         gender: "required",
         "id-type": "required",
         "id-number" : {
             number: true
         },
         "birth-day": "required"

     },
     messages: {

     }
 });//End of jQuery Steps validation

