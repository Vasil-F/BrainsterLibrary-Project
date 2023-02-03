<?php
// echo '<pre>';
// print_r($_POST);
// die();
session_start();
require_once __DIR__ . '../../functions.php';
notuser();


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location:' . base_url() . 'dashboard.php');
    die();
}
require_once __DIR__ . '../../db/db.php';

$sql = "UPDATE notes SET note = :note WHERE note_id = :id LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'id' => $_POST['id'],
    'note' => $_POST['note'],
]);

echo 'Success';

