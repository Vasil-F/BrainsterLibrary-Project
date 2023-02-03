<?php 
require_once __DIR__ . '/db/db.php';

$sql = 'SELECT *
FROM books
JOIN authors ON books.author_id = authors.id
JOIN categories ON books.category_id = categories.id
where books.book_deleted = 0 and authors.author_deleted = 0 and categories.category_deleted = 0 and books.book_id = :id';

$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $_GET['id']]);
$data = $stmt->fetchAll();

$sqlCom = 'SELECT * FROM comments
JOIN users ON comments.user_id = users.id
WHERE comments.book = :id and comments.approved = 1';
$stmtCom = $pdo->prepare($sqlCom);
$stmtCom->execute(['id' => $_GET['id']]);
$coms= $stmtCom->fetchAll();

// echo '<pre>';
// print_r($coms);
// die();

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
  <link rel="stylesheet" href="public/css/book.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <!-- Latest Font-Awesome CDN -->
  <script src="https://kit.fontawesome.com/64087b922b.js" crossorigin="anonymous"></script>
</head>

<body class="pb-5">
  <nav style=" background-color: rgb(35, 17, 17); " class="navbar navbar-expand-lg navbar-dark ">
    <a class="navbar-brand" href="#">BRAINSTER LIBRARY</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class=" btn btn-outline-warning" href="dashboard.php">Home <span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <div>
        <a class="nav-link btn btn-outline-warning" href="login.php">LOGIN</a>
      </div>
    </div>
  </nav>
  

    <div class="container">
        <div class="row text-light p-3 mt-5">
            <div class="col">
                <h2 class="my-3"> Book title: <?= $data[0]['book_title'] ?>  </h2>
                <h4 class="my-3"> Author: <?= $data[0]['name'] . " " . $data[0]['surname'] ?>  </h4>
                <h4 class="my-3"> Year published: <?= $data[0]['year_published'] ?>  </h4>
                <h4 class="my-3"> Number of pages: <?= $data[0]['pages'] ?>  </h4>
                <h4 class="my-3"> Category: <?= $data[0]['category'] ?>  </h4>
                <h5 class="my-3"> AUTHOR BIO: <?= $data[0]['bio'] ?>  </h5>
            </div>
            <div class="col d-flex align-items-start justify-content-center">
                <img class="h-500" src=" <?= $data[0]['cover'] ?> " alt="">
            </div>
        </div>
    </div>

    <div class="container text-center justify-content-center mb-5">
      <h4 class="text-center text-white mb-3 mr-0 w-100">COMMENTS</h4>
      <div id="comContainer" class="col-10 offset-1 text-white font-20">
      <?php if( $coms == null) {?>
        <h5 class="text-center mr-0 w-100">There are no comments for this book yet.</h5>
        <?php } else { ?>
        <ul>
        <?php foreach($coms as $com) { ?>
          <li class="my-2"> <?= '"' . $com['comment'] . '" -' . $com['name'] . ' ' .  $com['surname'] ?> </li>
          <?php }}?>
          </ul>
      </div>
    </div>

    <footer style="background-color: rgb(40, 11, 11); " class="text-center text-white fixed-bottom"> <p class="p-3 m-0"> <i></i> </p> </footer>
  <!-- jQuery library -->
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <!-- Latest Compiled Bootstrap 4.6 JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
  <!-- SweetAlert library -->
  <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
  <!-- <script src="sweetalert2.all.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tilt.js/1.2.1/tilt.jquery.min.js"></script>
    <script src="https://unpkg.com/tilt.js@1.2.1/dest/tilt.jquery.min.js"></script> -->
  <!-- <script src="public/js/allBooks.js"></script> -->
  <script src="public/js/footer.js"></script>
</body>

</html>