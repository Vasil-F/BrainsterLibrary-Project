<?php
session_start();
require_once __DIR__ . '/../functions.php';
notuser();
require_once __DIR__ . '/../db/db.php';

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
WHERE comments.book = :id';
$stmtCom = $pdo->prepare($sqlCom);
$stmtCom->execute(['id' => $_GET['id']]);
$coms = $stmtCom->fetchAll();

$sqlNote = 'SELECT * FROM notes
JOIN users ON notes.user_id = users.id
WHERE notes.book = :id';
$stmtNote = $pdo->prepare($sqlNote);
$stmtNote->execute(['id' => $_GET['id']]);
$notes = $stmtNote->fetchAll();
// echo '<pre>';
// print_r($notes);
// die();
global $flag;
$flag = false;
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
  <link rel="stylesheet" href="../public/css/book.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <!-- Latest Font-Awesome CDN -->
  <script src="https://kit.fontawesome.com/64087b922b.js" crossorigin="anonymous"></script>
</head>

<body class="pb-5 text-center">
  <nav style=" background-color: rgb(35, 17, 17); " class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="#">BRAINSTER LIBRARY</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class=" btn btn-outline-warning" href="users.php">Home <span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <div class="text-white text-center ml-auto mr-auto">
        <h5 class="ml-3"> Welcome <?= $_SESSION['name'] . ' ' . $_SESSION['surname']  ?></h5>
      </div>
      <div>
        <a class="nav-link btn btn-outline-warning" href="../actions/logout.php">LOGOUT</a>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row text-light p-3 mt-5">
      <div class="col">
        <h2 class="my-3"> Book title: <?= $data[0]['book_title'] ?> </h2>
        <h4 class="my-3"> Author: <?= $data[0]['name'] . " " . $data[0]['surname'] ?> </h4>
        <h4 class="my-3"> Year published: <?= $data[0]['year_published'] ?> </h4>
        <h4 class="my-3"> Number of pages: <?= $data[0]['pages'] ?> </h4>
        <h4 class="my-3"> Category: <?= $data[0]['category'] ?> </h4>
        <h5 class="my-3"> AUTHOR BIO: <?= $data[0]['bio'] ?> </h5>
      </div>
      <div class="col d-flex align-items-start justify-content-center">
        <img class="h-500" src=" <?= $data[0]['cover'] ?> " alt="">
      </div>
    </div>
  </div>

  <div class="container d-flex flex-column flex-md-row text-center justify-content-center align-items-center align-items-md-start">
    <div id="comContainer" class="col-10 col-md-6 text-white font-20 mb-3">
      <h4 class="text-center text-white mb-3 mr-0 w-100">COMMENTS</h4>
      <?php if ($coms == null) { ?>
        <h5 class="text-center mr-0 w-100">There are no comments for this book yet.</h5>
      <?php } else { ?>
        <ul>
          <?php foreach ($coms as $com) {
            if ($com['approved'] == 1) { ?>
              <li class="my-3"> <?= '"' . $com['comment'] . '" -' . $com['name'] . ' ' .  $com['surname'] ?> </li>
              <?php
              if ($com['user_id'] == $_SESSION['id']) {
                $flag = true;
              }
            } else {
              if ($com['user_id'] == $_SESSION['id']) {
                $flag = true; ?>
                <hr class="bg-white">
                <label for=""> <u> Your comment waiting for approval : </u></label>
                <p class="my-1"> <?= '"' . $com['comment'] . '" -' . $com['name'] . ' ' .  $com['surname'] ?> </p>
        <?php }
            }
          }
        } ?>
        </ul>

        <?php if ($flag) {
          foreach ($coms as $com) {
            if ($com['user_id'] == $_SESSION['id']) { ?>
              <div id="deleteForm">
                <button name="deleteComment" id="deleteComment" class="btn btn-block btn-danger w-50 mx-auto my-3" value="<?= $com['comment_id'] ?>">Delete your comment</button>
              </div>

          <?php }
          }
        } else { ?>
          <div class="d-flex text-center flex-column justify-content-center">
            <h5 class="text-center text-white w-100 my-3">Leave a comment here:</h5>
            <form id="comment" name="commentForm">
              <div id="commentForm" class="px-3">
                <input type="hidden" name="book" value="<?= $_GET['id'] ?>">
                <input type="hidden" name="user_id" value="<?= $_SESSION['id'] ?>">
                <input type="text" name="comment" id="comment" class="form-control" placeholder="Comment here...">
                <button id="submitComment" class="btn btn-block btn-warning w-50 mx-auto my-3">Submit</button>
              </div>
            </form>
          </div>
        <?php } ?>

    </div>

    <div id="noteContainer" class="col-10 col-md-6 text-white font-20 mb-3">
      <h5 class="text-center text-white mb-3 mr-0 w-100 font-22">USER NOTES</h5>
      <?php if ($notes == null) { ?>
        <h5 class="text-center mr-0 w-100">You have no notes for this book yet.</h5>
      <?php } else { ?>
        <ul class="pl-0">
          <?php foreach ($notes as $note) { ?>
            <div id="noteWrapper" class="noteWrapper d-flex align-items-center flex-lg-nowrap flex-wrap ">
              <li class="my-3 mx-3 text-left d-block"> &diams; <?= '"' . $note['note'] . '"' ?> </li>
              <button id="editNote" class="editNote btn btn-sm btn-inline btn-info ml-auto">Edit</button>
              <button id="deleteNote" value="<?= $note['note_id'] ?>" class="deleteNote btn btn-sm btn-inline btn-danger ml-2">Delete</button>
              <!-- <form class="editNoteForm d-none flex-grow-1 w-100"> -->
                <div id="editNoteForm" class="editNoteForm d-none align-items-center justify-content-center flex-grow-1 w-100 flex-wrap">
                  <input class="my-3 mx-0 w-100" name="note" value="<?=$note['note']?>">
                  <button id="updateNoteButton" value="<?=$note['note_id']?>" class="updateNoteButton btn btn-sm btn-inline btn-info ml-2">Update</button>
                  <button id="cancelUpdateButton" class="cancelUpdateButton btn btn-sm btn-inline btn-danger ml-2">Cancel</button>
                </div>
              <!-- </form> -->
            </div>
        <?php }
        } ?>
        </ul>

        <div class="d-flex text-center flex-column justify-content-center">
          <h5 class="text-center text-white w-100 my-3">Leave a note here:</h5>
          <form id="note" name="noteForm">
            <div id="noteForm" class="px-3">
              <input type="hidden" name="book" value="<?= $_GET['id'] ?>">
              <input type="hidden" name="user_id" value="<?= $_SESSION['id'] ?>">
              <input type="text" name="note" id="note" class="form-control" placeholder="Note here...">
              <button id="submitNote" class="btn btn-block btn-warning w-50 mx-auto my-3">Submit</button>
            </div>
          </form>
        </div>


    </div>

  </div>

  <footer style=" background-color: rgb(40, 11, 11); " class="text-center text-white fixed-bottom">
    <p class="p-3 m-0"> <i></i> </p>
  </footer>


  <!-- jQuery library -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

  <!-- Latest Compiled Bootstrap 4.6 JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- <script src="sweetalert2.all.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <!-- <script src="sweetalert2.all.min.js"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tilt.js/1.2.1/tilt.jquery.min.js"></script>
    <script src="https://unpkg.com/tilt.js@1.2.1/dest/tilt.jquery.min.js"></script> -->
  <!-- <script src="public/js/allBooks.js"></script> -->
  <script src="../public/js/footer.js"></script>
  <script src="../public/js/userComment.js"></script>
  <script src="../public/js/deleteComment.js"></script>
  <script src="../public/js/userNote.js"></script>
</body>

</html>