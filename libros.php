<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include(__DIR__.'/src/functions.php');
require_once __DIR__.'/conexion.php';

function contarDisponibles(PDO $pdo): int{
    $sql = 'SELECT COUNT(*) FROM libros WHERE disponible = 1';

    return (int) $pdo->query($sql)->fetchColumn();

}

function obtenerLibro(PDO $pdo, int $id): array|false{
    $stmt = $pdo->prepare('SELECT * FROM libros WHERE id = :id');
    $stmt->execute([':id' => $id]);

    return $stmt->fetch();
}

function listarLibros(PDO $pdo, ?string $genero = null): array{
    
    if($genero === null){

        $sql = 'SELECT * FROM libros ORDER BY titulo';
        return $pdo->query($sql)->fetchAll();

    }else{

        $sql = 'SELECT * FROM libros WHERE genero = :genero';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':genero' => $genero]);

        return $stmt->fetchAll();

    }
}


?>