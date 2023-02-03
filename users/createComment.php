<?php
session_start();
require_once __DIR__ . '../../functions.php';
notuser();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location:' . base_url() . 'dashboard.php');
    die();
}
require_once __DIR__ . '../../db/db.php';


$flag = true;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (
            empty($_POST['comment'])
        ) {
            $flag = false;
            // $_SESSION['error'] = 'All fields are required!';
            echo 'All fields required';
            // header('Location: editVehicle.php');
            // die();
        }


        if ($flag) {
            // $id = $_POST['id'];
            // $book_title = $_POST['bookTitle'];
            // $author_id = $_POST['author'];
            // $year_published = $_POST['yearPublished'];
            // $pages = $_POST['pages'];
            // $cover = $_POST['cover'];
            // $category_id = $_POST['category'];

            $sql = "INSERT INTO comments (comment, user_id, book, approved)
            VALUES (:comment, :user_id, :book, :approved)";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute(
                [
                    'comment' => $_POST['comment'],
                    'user_id' => $_POST['user_id'],
                    'book' => $_POST['book'],
                    'approved' => 0,
                ]
            );

            // $_SESSION['success'] = 'Vehicle updated!';
            echo 'Success';
            // header('Location: admins.php');
        }
 }

