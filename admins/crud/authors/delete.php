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

$sql = "UPDATE authors SET author_deleted = :author_deleted WHERE id = :id LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $_POST['id'], 'author_deleted' => 1 ]);

echo 'Success';

