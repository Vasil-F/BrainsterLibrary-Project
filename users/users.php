<?php 
session_start();
require_once __DIR__ . '/../functions.php';
notuser();
require_once __DIR__ . '/../db/db.php';
$sql = 'SELECT category FROM categories WHERE categories.category_deleted = 0';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$category = $stmt->fetchAll();

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
  <link rel="stylesheet" href="../public/css/allBooks.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <!-- Latest Font-Awesome CDN -->
  <script src="https://kit.fontawesome.com/64087b922b.js" crossorigin="anonymous"></script>
</head>

<body class="pb-5">
  <nav style=" background-color: rgb(40, 11, 11); " class="navbar navbar-expand-lg navbar-dark  mb-3">
    <a class="navbar-brand" href="#">BRAINSTER LIBRARY</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- <ul class="navbar-nav ">
        <li> -->
          <button id="showFilters" class="btn btn-sm btn-outline-warning">SHOW FILTERS</button>
        <!-- </li>
      </ul> -->

      <div class="text-white text-center ml-5">
       <h5 class="ml-auto"> Welcome <?= $_SESSION['name'] . ' ' . $_SESSION['surname']  ?></h5>
      </div>

      <div id="searchForm" class="my-2 my-lg-0 mx-auto">
        <!-- <div class="bg-warning p-2 mx-3 my-2 font-weight-bold">Search books</div> -->
        <input id="searchBox" class="form-control mr-sm-2 bg-transparent text-white" type="search" placeholder="Search books" aria-label="Search">
      </div>

      <div>
        <a class="nav-link btn btn-outline-warning" href="../actions/logout.php">LOGOUT</a>
      </div>
    </div>
  </nav>

  <div id="filterContainer" class="filterContainer container-fluid px-5 d-none text-white flex-wrap  justify-content-evenly animate__animated animate__fadeInDown">
    <!-- <label class="font-weight-bold font-22 mt-2" for="filterContainer">FILTERS -></label> -->
    <?php foreach($category as $category) { ?>
      <div class="px-3 font-20">
      <label id="label<?=$category['category']?>" class=" btn btn-outline-light mt-2" for="filter<?=$category['category']?>"><?=$category['category']?></label>
      <input class="mx-1" type="checkbox" id="filter<?=$category['category']?>" value="<?=$category['category']?>">
    </div>
      <?php } ?>
    <!-- <div class="px-3 font-20">
      <label id="labelDrama" class=" btn btn-outline-light mt-2" for="filterDrama">Drama</label>
      <input class="mx-1" type="checkbox" id="filterDrama" value="Drama">
    </div>
    <div class="px-3 font-20">
      <label id="labelThriller" class=" btn btn-outline-light mt-2" for="filterThriller">Thriller</label>
      <input class="mx-1 " type="checkbox" id="filterThriller" value="Thriller">
    </div>
    <div class="px-3 font-20">
      <label id="labelSciFi" class=" btn btn-outline-light mt-2" for="filterSciFi">Science fiction</label>
      <input class="mx-1" type="checkbox" id="filterSciFi" value="Science fiction">
    </div>
    <div class="px-3 font-20">
      <label id="labelPolitical" class=" btn btn-outline-light mt-2" for="filterPolitical">Political</label>
      <input class="mx-1" type="checkbox" id="filterPolitical" value="Political">
    </div>
    <div class="px-3 font-20">
      <label id="labelHorror" class=" btn btn-outline-light mt-2" for="filterHorror">Horror</label>
      <input class="mx-1" type="checkbox" id="filterHorror" value="Horror">
    </div>
    <div class="px-3 font-20">
      <label id="labelFantasy" class=" btn btn-outline-light mt-2" for="filterFantasy">Fantasy</label>
      <input class="mx-1" type="checkbox" id="filterFantasy" value="Fantasy">
    </div>
    <div class="px-3 font-20">
      <label id="labelRomance" class=" btn btn-outline-light mt-2" for="filterRomance">Romance</label>
      <input class="mx-1" type="checkbox" id="filterRomance" value="Romance">
    </div> -->
  </div>

  <div class="container-fluid px-5">
    <div class="container d-flex flex-column flex-md-row">
      <div id="wrapper" class="cardContainer row">

      </div>
    </div>
  </div>

  <footer style=" background-color: rgb(40, 11, 11); " class="text-center text-white fixed-bottom"> <p class="p-3 m-0"> <i></i> </p> </footer>
  <!-- jQuery library -->
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <!-- Latest Compiled Bootstrap 4.6 JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
  <!-- SweetAlert library -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- <script src="sweetalert2.all.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tilt.js/1.2.1/tilt.jquery.min.js"></script>
  <script src="https://unpkg.com/tilt.js@1.2.1/dest/tilt.jquery.min.js"></script>
  <script src="../public/js/allBooksUsers.js"></script>
  <script src="../public/js/allCategories.js"></script>
  <script src="../public/js/footer.js"></script>
</body>

</html>




