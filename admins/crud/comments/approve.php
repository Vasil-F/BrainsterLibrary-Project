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

$sql = "UPDATE comments SET approved = :approved WHERE comment_id = :comment_id LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute(['comment_id' => $_POST['id'], 'approved' => 1 ]);

echo 'Success';

