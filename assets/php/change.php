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

if ($rowCount) {
    $request['status'] = $request['status'] == 1 ? 0: 1; 
} 
echo json_encode($request);
