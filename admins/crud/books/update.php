<?php
// echo '<pre>';
// print_r($_POST);
// die();

session_start();
require_once __DIR__ . '../../../../functions.php';
notadmin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location:' . base_url() . 'admins/admins.php');
    die();
}
require_once __DIR__ . '../../../../db/db.php';

$sqlTitle = 'SELECT book_title FROM books';
$stmt = $pdo->prepare($sqlTitle);
$stmt->execute();
$title = $stmt->fetch();


$flag = true;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (
            empty($_POST['bookTitle']) || empty($_POST['author']) || empty($_POST['yearPublished']) || empty($_POST['pages']) || empty($_POST['cover']) || empty($_POST['category'])
        ) {
            $flag = false;
            // $_SESSION['error'] = 'All fields are required!';
            echo 'All fields required';
            // header('Location: editVehicle.php');
            // die();
        };

        while($title = $stmt->fetch()) {
            if($_POST['bookTitle'] == $title['book_title']){
                $flag = false;
                echo 'Book exists';
            };

        }

        if ($flag) {
            // $id = $_POST['id'];
            // $book_title = $_POST['bookTitle'];
            // $author_id = $_POST['author'];
            // $year_published = $_POST['yearPublished'];
            // $pages = $_POST['pages'];
            // $cover = $_POST['cover'];
            // $category_id = $_POST['category'];

            $sql = "UPDATE books SET book_title = :book_title,  author_id = :author_id, year_published = :year_published, pages = :pages, cover = :cover, category_id = :category_id  WHERE book_id = :book_id ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(
                [
                    'book_id' => $_POST['id'],
                    'book_title' => $_POST['bookTitle'],
                    'author_id' => $_POST['author'],
                    'year_published' => $_POST['yearPublished'],
                    'pages' => $_POST['pages'],
                    'cover' => $_POST['cover'],
                    'category_id' => $_POST['category'],
                ]
            );

            // $_SESSION['success'] = 'Vehicle updated!';
            echo 'Success';
            // header('Location: admins.php');
        }
 }

