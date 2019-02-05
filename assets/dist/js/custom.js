var dropdown = document.querySelector('#dropdown-menu');
var dropdownToggle = document.querySelector('.dropdown-toggle');

dropdownToggle.addEventListener('click', function() {
    if (dropdown.classList.contains('closed')) {
        dropdown.classList.remove('closed');
        dropdown.classList.add('open');
    }
    else {
        dropdown.classList.add('closed');
        dropdown.classList.remove('open');
    }

})