<?php 

require_once __DIR__ . '/../db/db.php';

$sql = 'SELECT *
FROM categories WHERE categories.category_deleted = 0
';

// SELECT books.*, authors.*, categories.title as cat_title FROM books JOIN authors ON books.author_id = authors.id JOIN categories ON books.category_id = categories.id;

$stmt = $pdo->prepare($sql);
$stmt->execute();

$data = $stmt->fetchAll();

echo json_encode($data);