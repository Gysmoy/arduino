<?php

include_once 'assets/php/database.php';

$database = new Database();
$connection = $database->connect();

if (isset($_GET['light'])) {
    $query = $connection->prepare('UPDATE Luces SET estado = !estado WHERE id = :id;');
    $query->execute([$_GET['light']]);
    $rowCount = $query -> rowCount();
    if ($rowCount) {
        header('location: ./');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARDUINO</title>
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <main>
        <h1>PROYECTO LUCES <i class="fa fa-lightbulb"></i></h1>
        <table>
            <?php
            
            $query = $connection -> query('SELECT id, nombre, estado FROM Luces;');
            $rows = $query -> fetchAll(PDO::FETCH_ASSOC);

            foreach ($rows as $row) {+

                $id = $row['id'];
                $nombre = $row['nombre'];
                $estado = $row['estado'];
                $texto = $estado == '1' ? 'OFF': 'ON';

                echo "
                <tr>
                    <td>{$nombre}</td>
                    <td>
                        <button onclick='location.href = \"./?light={$id}\"'>{$texto}</button>
                    </td>
                    <td>{$estado}</td>
                </tr>
                ";
            }

            ?>
        </table>
    </main>
    <script src="assets/js/fontawesome.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>