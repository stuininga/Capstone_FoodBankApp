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

    //Calculate age for field
    var ageField = document.querySelector('#age');
    var yearField = document.querySelector('#birth-year');
    yearField.addEventListener('change', function(){
        console.log("hello");
    }); 
