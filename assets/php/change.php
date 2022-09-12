<?php

include_once 'database.php';

$request = json_decode(file_get_contents('php://input'), true);

$db = new Database();
$connection = $db -> connect();

$query = $connection -> prepare('UPDATE rooms SET status = !status WHERE id = :id');
$query -> execute([
    ':id' => $request['id']
]);

$rowCount = $query -> rowCount();

$query = $connection -> prepare('SELECT * FROM rooms WHERE id = :id');
$query -> execute([
    ':id' => $request['id']
]);
$row = $query -> fetch(PDO::FETCH_ASSOC);


echo json_encode($ow);
