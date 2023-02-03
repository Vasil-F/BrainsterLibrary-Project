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

$sql = "UPDATE books SET book_deleted = :book_deleted WHERE book_id = :book_id LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute(['book_id' => $_POST['id'], 'book_deleted' => 1 ]);

echo 'Success';

