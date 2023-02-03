var base_url = 'http://localhost/Brainster%20Library%20Project%202/';

// login menu routes and switch buttons
$(document).ready(function(){
$('#loginUserButton').on('click', function(e){
    e.preventDefault();
    $.ajax({
        url: 'actions/auth.php',
        method: 'POST',
        data: { login: $('#userLogin input[name="login"]').val(), email: $('#userLogin input[name="email"]').val(), password: $('#userLogin input[name="password"]').val() }
    }).done(function(data){
        if(data == 'Success') {
        window.location.assign( base_url + 'users/users.php');
        }
        if(data == 'Wrong combination') {
            Swal.fire({
                background: "linear-gradient(to bottom, #66ccff 0%, #ffccff 134%)",
                icon: 'error',
                title: 'Oops...',
                text: 'Wrong email and password combination!',
              })
        }
        if(data == 'Wrong credentials') {
            Swal.fire({
                background: "linear-gradient(to bottom, #66ccff 0%, #ffccff 134%)",
                icon: 'error',
                title: 'Oops...',
                text: 'Wrong credentials!',
              })
        }
    })
})

$('#loginAdminButton').on('click', function(e){
    e.preventDefault();
    $.ajax({
        url: 'actions/auth.php',
        method: 'POST',
        data: { login: $('#adminLogin input[name="login"]').val(), adminUsername: $('#adminLogin input[name="adminUsername"]').val(), adminPassword: $('#adminLogin input[name="adminPassword"]').val() }
    }).done(function(data){  
        if(data == 'Success') {
        window.location.assign( base_url + 'admins/admins.php');
        }
        if(data == 'Wrong combination') {
            Swal.fire({
                background: "linear-gradient(to bottom, #66ccff 0%, #ffccff 134%)",
                icon: 'error',
                title: 'Oops...',
                text: 'Wrong username and password combination!',
              })
        }
        if(data == 'Wrong credentials') {
            Swal.fire({
                background: "linear-gradient(to bottom, #66ccff 0%, #ffccff 134%)",
                icon: 'error',
                title: 'Oops...',
                text: 'Wrong credentials!',
              })
        }
    })
})

$('#registerUserButton').on('click', function(e){
    e.preventDefault();
    $.ajax({
        url: 'actions/register.php',
        method: 'POST',
        data: { nameRegister: $('#registerUser input[name="nameRegister"]').val(), surnameRegister: $('#registerUser input[name="surnameRegister"]').val(), emailRegister: $('#registerUser input[name="emailRegister"]').val(), passwordRegister: $('#registerUser input[name="passwordRegister"]').val() }
    }).done(function(data){
        console.log(data);
        if(data == 'Success') {
            Swal.fire({
                background: "linear-gradient(to bottom, #66ffff 0%, #ffffff 100%)",
                icon: 'success',
                title: 'User registered!',
                text: 'You can log in now. Redirecting to log in...',
              })

            setTimeout(function(){window.location.assign( base_url + 'login.php')}, 2000)
       
        }
        if(data == 'All fields required') {
            Swal.fire({
                background: "linear-gradient(to bottom, #66ccff 0%, #ffccff 134%)",
                icon: 'error',
                title: 'All fields are required!',
              })
            // alert('Wrong email and password combination!');
        }
        if(data == 'User already exists') {
            Swal.fire({
                background: "linear-gradient(to bottom, #66ccff 0%, #ffccff 134%)",
                icon: 'error',
                title: 'A user with that email already exists',
              })
            // alert('Wrong credentials!');
        }
        if(data == 'All fields requiredUser already exists') {
            Swal.fire({
                background: "linear-gradient(to bottom, #66ccff 0%, #ffccff 134%)",
                icon: 'error',
                title: 'A user with that email already exists',
              })
            // alert('Wrong credentials!');
        }
    })
})

});

let adminButton = document.querySelector('#showAdminButton');
let userButton = document.querySelector('#showUserButton');
let registerButton = document.querySelector('#registerButton');
let loginButton = document.querySelector('#loginButton');

let loginForm = document.querySelector('#userLogin');
let adminForm = document.querySelector('#adminLogin');
let registerForm = document.querySelector('#registerUser');
let loginAsAdmin = document.querySelector('#loginAsAdmin');
let loginAsUser = document.querySelector('#loginAsUser');

adminButton.addEventListener('click', function() {
    loginForm.classList.replace('d-flex', 'd-none');
    adminForm.classList.replace('d-none', 'd-flex');
    loginAsAdmin.classList.replace('d-flex', 'd-none');
    loginAsUser.classList.replace('d-none', 'd-flex');

});

userButton.addEventListener('click', function() {
    loginForm.classList.replace('d-none', 'd-flex');
    adminForm.classList.replace('d-flex', 'd-none');
    loginAsAdmin.classList.replace('d-none', 'd-flex');
    loginAsUser.classList.replace('d-flex', 'd-none');

});

registerButton.addEventListener('click', function() {
    loginForm.classList.replace('d-flex', 'd-none');
    loginAsAdmin.classList.replace('d-flex', 'd-none');
    registerForm.classList.replace('d-none', 'd-flex');

});

loginButton.addEventListener('click', function() {
    loginForm.classList.replace('d-none', 'd-flex');
    loginAsAdmin.classList.replace('d-none', 'd-flex');
    registerForm.classList.replace('d-flex', 'd-none');

});
// // login menu end





