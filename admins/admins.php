<?php
session_start();
require_once __DIR__ . '/../functions.php';
notadmin();
// print_r($_SESSION['username']);
// die();

?>

<!DOCTYPE html>
<html>

<head>
    <title>Admins panel</title>
    <meta charset="utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />

    <!-- Latest compiled and minified Bootstrap 4.6 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- CSS script -->
    <link rel="stylesheet" href="../public/css/admins.css">
    <!-- Latest Font-Awesome CDN -->
    <script src="https://kit.fontawesome.com/64087b922b.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light ">
        <a class="navbar-brand" href="#">BRAINSTER LIBRARY</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="my-2 my-lg-0 mx-auto">
                <h5 class="mb-0">Logged in as <?= $_SESSION['username'] ?> </h5>
            </div>
            <div>
                <a class="btn btn-primary mr-3" href="../actions/logout.php">Logout</a>
            </div>
        </div>
    </nav>

<div class="container-fluid px-5 mb-5 pb-5">
        <div class="row my-5 flex-column text-center justify-content-center">
            <div>
                <h4 class="">Welcome, <?= $_SESSION['username'] ?>! Here you can <i>CREATE</i>, <i>EDIT</i> and <i>VIEW</i> all the resources in this library.</h4>
            </div>
            <div>
                <h3 class="mt-2">Select one of the resources below to begin managing:</h3>
            </div>
        </div>
    <div class="row">
        <div class="col text-center">
            <div class="card mx-auto" style="width: 18rem;  box-shadow: 13px 12px 22px -1px rgba(80, 59, 45, 0.74);">
                <img src="../public/Images/book.jpg" class="card-img-top" alt="books">
                <div class="card-body">
                    <h5 class="card-title">Books</h5>
                    <p class="card-text">View all available books in the database, edit or remove the existing books or create new ones.</p>
                    <a href="crud/books/view.php" class="btn btn-primary">Go to Books</a>
                </div>
            </div>
        </div>
        <div class="col text-center">
            <div class="card mx-auto" style="width: 18rem;  box-shadow: 13px 12px 22px -1px rgba(80, 59, 45, 0.74);">
                <img src="../public/Images/authors.jpg" class="card-img-top" alt="authors">
                <div class="card-body">
                    <h5 class="card-title">Authors</h5>
                    <p class="card-text">View all the authors, add or remove authors.</p>
                    <a href="crud/authors/view.php" class="btn btn-primary">Go to Authors</a>
                </div>
            </div>
        </div>
        <div class="col text-center">
            <div class="card mx-auto" style="width: 18rem;  box-shadow: 13px 12px 22px -1px rgba(80, 59, 45, 0.74);">
                <img src="../public/Images/folder.webp" class="card-img-top" alt="folder">
                <div class="card-body">
                    <h5 class="card-title">Categories</h5>
                    <p class="card-text">View all categories, add or remove categories.</p>
                    <a href="crud/categories/view.php" class="btn btn-primary">Go to Categories</a>
                </div>
            </div>
        </div>
        <div class="col text-center">
            <div class="card mx-auto" style="width: 18rem;  box-shadow: 13px 12px 22px -1px rgba(80, 59, 45, 0.74);">
                <img src="../public/Images/comments.jpg" class="card-img-top" alt="comments">
                <div class="card-body">
                    <h5 class="card-title">Comments</h5>
                    <p class="card-text">Review all the comments posted from users and decide what happens with the comments.</p>
                    <a href="crud/comments/view.php" class="btn btn-primary">Go to Comments</a>
                </div>
            </div>
        </div>
    </div>
 </div>

 <footer class="text-center text-dark fixed-bottom"> <p class="p-3 m-0"> <i></i> </p> </footer>
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    
    <!-- Latest Compiled Bootstrap 4.6 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <script src="sweetalert2.all.min.js"></script> -->
    <script src="../public/js/footer.js"></script>
</body>

</html>