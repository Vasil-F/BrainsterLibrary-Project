<?php

session_start();
require_once __DIR__ . '../../../../functions.php';
notadmin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location:' . base_url() . 'admins/admins.php');
    die();
}
require_once __DIR__ . '../../../../db/db.php';

$sql = 'SELECT category FROM categories';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$data = '';


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
        }

        while($data = $stmt->fetch()) {
            if($_POST['category'] == $data['category']){
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

            $sql = "INSERT INTO categories (category, category_deleted)
            VALUES (:category, :category_deleted)";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute(
                [
                    'category' => $_POST['category'],
                    'category_deleted' => 0,
                ]
            );

            // $_SESSION['success'] = 'Vehicle updated!';
            echo 'Success';
            // header('Location: admins.php');
        }
 }

