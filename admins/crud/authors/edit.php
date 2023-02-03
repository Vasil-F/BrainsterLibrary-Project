<?php 
session_start();
require_once __DIR__ . '../../../../functions.php';
notadmin();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once __DIR__ . '../../../../db/db.php';
    $id = $_POST['edit'];

    $sql = 'SELECT * FROM authors WHERE id = :id LIMIT 1';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $data = $stmt->fetch();

    // echo '<pre>';
    // print_r($data);
    // die();

} else{
    header('Location:' . base_url() . 'admins/admins.php');
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit author</title>
    <meta charset="utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />

    <!-- Latest compiled and minified Bootstrap 4.6 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <!-- CSS script -->
    <link rel="stylesheet" href="../../../public/css/admins.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- Latest Font-Awesome CDN -->
    <script src="https://kit.fontawesome.com/64087b922b.js" crossorigin="anonymous"></script>
</head>

<body class="pb-5">
    <nav class="navbar navbar-expand-lg navbar-light ">
        <a class="navbar-brand" href="#">BRAINSTER LIBRARY</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div>
                <a href="../authors/view.php" class="btn btn-primary p-1 ml-2">Go back</a>
            </div>
            <div class="my-2 my-lg-0 mx-auto">
                <h5 class="mb-0">Logged in as <?= $_SESSION['username'] ?> </h5>
            </div>
            <div>
                <a class="btn btn-primary mr-3" href="../../../actions/logout.php">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5 animate__animated animate__fadeIn">
        
            <form id="update" class="text-left font-weight-bold">
                <div class="row">
                    <div id="updateForm" class="col-md-6 offset-md-3">
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                        <label class="mt-2" for="name">Name</label>
                        <input class="form-control" name="name" id="name" value="<?= $data['name'] ?>">
                        <label class="mt-2" for="surname">Surname</label>
                        <input class="form-control" name="surname" id="surname" value="<?= $data['surname'] ?>">
                        <label class="mt-2" for="bio">Bio</label>
                        <input class="form-control" name="bio" id="bio" value="<?= $data['bio'] ?>"></input>
                        <button class="btn btn-block btn-primary mt-4" id="updateButton">UPDATE</button>
                    </div>
                </div>
            </form>
       
    </div>
                          


    <footer class="text-center text-dark fixed-bottom"> <p class="p-3 m-0"> <i></i> </p> </footer>

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    
    <!-- Latest Compiled Bootstrap 4.6 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <script src="sweetalert2.all.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="../../../public/js/updateAuthor.js"></script>
    <script src="../../../public/js/footer.js"></script>
</body>

</html>