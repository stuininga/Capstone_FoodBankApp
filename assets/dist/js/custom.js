//Create functionality for the admin functions dropdown
var dropdown = document.querySelector('#dropdown-menu');
var dropdownToggle = document.querySelector('.dropdown-toggle');

//Add event listener on dropdown button
dropdownToggle.addEventListener('click', function() {
    if (dropdown.classList.contains('closed')) {
        dropdown.classList.remove('closed');
        dropdown.classList.add('open');
    }
    else {
        dropdown.classList.add('closed');
        dropdown.classList.remove('open');
    }
});

//Ensure that the user can't choose a date that isn't real (e.g. February 31)
var birthMonth = document.querySelector('#birth-month');
var birthDay = document.querySelector('#birth-day');

//Declare arrays for each "kind" of month
var month31 = [1, 3, 5, 7, 8, 10, 12];
var month30 = [4, 6, 9, 11];

//Add event listener to check if the user has selected anything, and update live as they change their choices
// birthMonth.addEventListener('change', function(e) {
//     if(birthMonth.value == 1  )


// });