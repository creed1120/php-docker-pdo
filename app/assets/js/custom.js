// animate success alert after form submit
const element = document.querySelector('.alert');
element.classList.add('animate__animated', 'animate__bounceInLeft');

function timeOut() {
    const element = document.querySelector('.alert');
    element.classList.add('animate__animated', 'animate__bounceOutLeft');
}
setTimeout( timeOut, 5000 );