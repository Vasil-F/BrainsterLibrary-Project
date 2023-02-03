<?php
die();

session_start();
require_once __DIR__ . '/db/db.php';

$email = "jacksmith@example.com";
$username = "Admin Jack";
$password = 123456;
$passwordHash = password_hash($password, PASSWORD_BCRYPT);
die();




$sql = 'INSERT INTO admins (email, username, password) VALUES (:email, :username, :password) ';
$stmt = $pdo->prepare($sql);
$stmt->execute(['email' => $email, 'username' => $username, 'password' => $passwordHash]);