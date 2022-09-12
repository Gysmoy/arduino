<?php

include_once 'database.php';

$db = new Database();
$connection = $db -> connect();
$query = $connection -> query('SELECT * FROM rooms');

$rows = $query -> fetchAll(PDO::FETCH_ASSOC);

echo json_encode($rows);

?>