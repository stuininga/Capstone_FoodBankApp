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
