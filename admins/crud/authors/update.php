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

$sqlTitle = 'SELECT name, surname FROM authors';
$stmt = $pdo->prepare($sqlTitle);
$stmt->execute();
$title = '';
// echo '<pre>';
// print_r($title);
// die();




$flag = true;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (
            empty($_POST['name']) || empty($_POST['surname']) || empty($_POST['bio'])
        ) {
            $flag = false;
            // $_SESSION['error'] = 'All fields are required!';
            echo 'All fields required';
            // header('Location: editVehicle.php');
            // die();
        };

        while($title = $stmt->fetch()) {
            if($_POST['name'] == $title['name'] && $_POST['surname'] == $title['surname'] ){
                $flag = false;
                echo 'Author exists';
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

            $sql = "UPDATE authors SET name = :name,  surname = :surname, bio = :bio  WHERE id = :id ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(
                [
                    'id' => $_POST['id'],
                    'name' => $_POST['name'],
                    'surname' => $_POST['surname'],
                    'bio' => $_POST['bio'],
                ]
            );

            // $_SESSION['success'] = 'Vehicle updated!';
            echo 'Success';
            // header('Location: admins.php');
        }
 }

