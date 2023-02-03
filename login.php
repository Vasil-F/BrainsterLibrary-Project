<?php 
require_once __DIR__ . '/functions.php';
session_start();
user();
admin();


?>

<!DOCTYPE html>
<html>

<head>
  <title>Brainster Library</title>
  <meta charset="utf-8" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />

  <!-- Latest compiled and minified Bootstrap 4.6 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <!-- CSS script -->
  <link rel="stylesheet" href="public/css/login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <!-- Latest Font-Awesome CDN -->
  <script src="https://kit.fontawesome.com/64087b922b.js" crossorigin="anonymous"></script>
</head>

<body class="vh-100 pb-5">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">BRAINSTER LIBRARY</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="btn btn-light ml-2" href="dashboard.php">Home <span class="sr-only">(current)</span></a>
        </li>
      </ul>

      <div>
        <a class="btn btn-outline mr-2" href="login.php">Login</a>
      </div>
    </div>
  </nav>
  
  <div id="loginAsAdmin" class="container text-right d-flex justify-content-center mt-5">
    <div class="w-50">
      <span class="font-weight-bold">Login as</span>
      <button id="showAdminButton" class="btn btn-light">Admin</button>
    </div>
  </div>
  <div id="loginAsUser" class="container text-right d-none justify-content-center mt-5">
    <div class="w-50">
      <span class="font-weight-bold">Login as</span>
      <button id="showUserButton" class="btn btn-light">User</button>
    </div>
  </div>

  <div id="userLogin" class="container d-flex flex-column justify-content-center align-items-center mt-0 animate__animated animate__fadeInDown">
    <!-- <form name="userForm" method="POST" action="auth.php" onsubmit="return validateUser()" class="w-50 mt-5"> -->
    <form name="userForm" class="w-50 mt-5">
      <input type="hidden" name="login" value="user">
      <h2 class="mb-3">Login user</h2>
      <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" name="email" class="form-control" id="email">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password">
      </div>
      <!-- <button id="loginUserButton" type="submit" formmethod="POST" formaction="auth.php" class="btn btn-primary">Login</button> -->
      <button id="loginUserButton" class="btn btn-light">Login</button>
    </form>
    <div class="mt-4">
      <span>Don't have an account yet?</span>
      <button id="registerButton" class="btn btn-light">Register</button>
    </div>
  </div>
  <div id="adminLogin" class="container d-none justify-content-center align-items-center mt-0 animate__animated animate__fadeInUp">
    <!-- <form method="POST" action="auth.php" class="w-50 mt-5"> -->
    <form class="w-50 mt-5">
      <input type="hidden" name="login" value="admin">
      <h2 class="mb-3">Login as admin</h2>
      <div class="form-group">
        <label for="adminUsername">Username</label>
        <input type="text" name="adminUsername" class="form-control" id="adminUsername">
      </div>
      <div class="form-group">
        <label for="adminPassword">Password</label>
        <input type="password" name="adminPassword" class="form-control" id="adminPassword">
      </div>
      <!-- <button id="loginAdminButton" type="submit" formmethod="POST" formaction="auth.php" class="btn btn-primary">Login</button> -->
      <button id="loginAdminButton" class="btn btn-light">Login</button>
    </form>
  </div>

  <div id="registerUser" class="container d-none flex-column justify-content-center align-items-center mt-0 animate__animated animate__fadeIn">
    <form class="w-50 mt-5" id="regirster-form">
      <h2 class="mb-3">Register user</h2>
      <div class="form-group">
        <label for="nameRegister">Name</label>
        <input type="text" name="nameRegister" class="form-control" id="nameRegister">
      </div>
      <div class="form-group">
        <label for="surnameRegister">Surname</label>
        <input type="text" name="surnameRegister" class="form-control" id="surnameRegister">
      </div>
      <div class="form-group">
        <label for="emailRegister">Email address</label>
        <input type="email" name="emailRegister" class="form-control" id="emailRegister">
      </div>
      <div class="form-group">
        <label for="passwordRegister">Password</label>
        <input type="password" name="passwordRegister" class="form-control" id="passwordRegister">
      </div>
      <button id="registerUserButton" class="btn btn-light">Register</button>
    </form>
    <div class="mt-4">
      <span>Already have an account?</span>
      <button id="loginButton" class="btn btn-light">Login</button>
    </div>
  </div>

  <footer class="text-center text-dark fixed-bottom"> <p class="p-3 m-0"> <i></i> </p> </footer>
  <!-- jQuery library -->
  <script
  src="https://code.jquery.com/jquery-3.6.3.min.js"
  integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
  crossorigin="anonymous"></script>  
  <!-- Latest Compiled Bootstrap 4.6 JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
  <!-- SweetAlert library -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- <script src="sweetalert2.all.min.js"></script> -->
  <script src="public/js/login.js"></script>
  <script src="public/js/footer.js"></script>
</body>

</html>