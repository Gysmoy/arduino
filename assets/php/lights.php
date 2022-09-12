<?php

//Permisos CORS

//* es un comodin para desplegar la información a cualquier servidor que realice la peticion.
header("Access-Control-Allow-Origin: *"); 

//Debemos dar permisos de acuerdo a la llamada o metodo que necesites GET,POST,UPDATE.
header('Access-Control-Allow-Methods', 'GET');

//Para formatos JSON se debe asignar el encabezado correspondiente.
header("Content-Type: application/json");

include_once 'database.php';

$db = new Database();
$connection = $db -> connect();
$query = $connection -> query('SELECT * FROM rooms');

$rows = $query -> fetchAll(PDO::FETCH_ASSOC);

echo json_encode($rows);
