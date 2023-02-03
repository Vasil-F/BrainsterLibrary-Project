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

$sqlTitle = 'SELECT category FROM categories';
$stmt = $pdo->prepare($sqlTitle);
$stmt->execute();
$title = '';


$flag = true;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (
            empty($_POST['category']) 
        ) {
            $flag = false;
            // $_SESSION['error'] = 'All fields are required!';
            echo 'All fields required';
            // header('Location: editVehicle.php');
            // die();
        };

        while($title = $stmt->fetch()) {
            if($_POST['category'] == $title['category']){
                $flag = false;
                echo 'Category exists';
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

            $sql = "UPDATE categories SET category = :category  WHERE id = :id ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(
                [
                    'id' => $_POST['id'],
                    'category' => $_POST['category'],
                ]
            );

            // $_SESSION['success'] = 'Vehicle updated!';
            echo 'Success';
            // header('Location: admins.php');
        }
 }

