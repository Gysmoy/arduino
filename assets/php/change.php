<?php

//Permisos CORS

//* es un comodin para desplegar la información a cualquier servidor que realice la peticion.
header("Access-Control-Allow-Origin: *"); 

//Debemos dar permisos de acuerdo a la llamada o metodo que necesites GET,POST,UPDATE.
header('Access-Control-Allow-Methods', 'POST');

//Para formatos JSON se debe asignar el encabezado correspondiente.
header("Content-Type: application/json");

include_once 'database.php';

$request = $_POST;

$db = new Database();
$connection = $db -> connect();

$query = $connection -> prepare('UPDATE rooms SET status = !status WHERE id = :id');
$query -> execute([
    ':id' => $request['id']
]);

$rowCount = $query -> rowCount();

$query2 = $connection -> prepare('SELECT * FROM rooms WHERE id = :id');
$query2 -> execute([
    ':id' => $request['id']
]);
$row = $query2 -> fetch(PDO::FETCH_ASSOC);


echo json_encode($row);
