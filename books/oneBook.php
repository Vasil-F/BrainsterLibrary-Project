<?php 
require_once __DIR__ . '/../db/db.php';
require_once __DIR__ . '/../functions.php';


$sql = 'SELECT *
FROM books
JOIN authors ON books.author_id = authors.id
JOIN categories ON books.category_id = categories.id
where books.book_deleted = 0 and authors.author_deleted = 0 and categories.category_deleted = 0 and books.book_id = :id
';

// SELECT books.*, authors.*, categories.title as cat_title FROM books JOIN authors ON books.author_id = authors.id JOIN categories ON books.category_id = categories.id;

$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $_GET['id']]);

$data = $stmt->fetchAll();


// echo json_encode($data);