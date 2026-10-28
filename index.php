<!-- Contador de disponibles, filtro por género y listado con botones -->

<?php

require_once __DIR__.'/conexion.php';
require_once __DIR__.'/src/functions.php';
require_once __DIR__.'/libros.php';


$pdo = conectar();

$libros_disponibles = contarDisponibles($pdo);
dump($libros_disponibles);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Hay <?php $libros_disponibles; ?> libros dispobibles.</h2>
</body>
</html>