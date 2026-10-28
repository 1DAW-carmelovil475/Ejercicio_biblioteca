<!-- Ficha de un libro, recibe ?id= por GET -->

<?php

    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    require_once __DIR__.'/libros.php';

    $pdo = conectar();

    // Validar que el id existe y es un entero positivo
    $id = filter_var($_GET['id'] ?? null, FILTER_VALIDATE_INT, [
        'options' => ['min_range' => 1],
    ]);

    $libro = ($id !== false) ? obtenerLibro($pdo, $id) : false;

    $listado = listarLibros($pdo);

    dump($listado);


?>
<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Ficha del libro</title>
    </head>
    <body>
        <?php if ($libro === false): ?>

            <p>Libro no encontrado</p>

        <?php else: ?>

            <h1>Ficha del libro</h1>

            <ul>
                <?php foreach ($libro as $campo => $valor): ?>
                    <li>
                        <strong><?= htmlspecialchars($campo) ?>:</strong>
                        <?php if ($campo === 'disponible'): ?>
                            <?php if($valor === 1): ?>
                                Disponible
                            <?php elseif($valor === 0): ?>
                                Prestado
                            <?php else: ?>
                                La disponibilidad no es correcta
                            <?php endif; ?>
                        <?php else: ?>
                            <?= htmlspecialchars((string) $valor) ?>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>

        <?php endif; ?>

        <p><a href="index.php">Volver al listado</a></p>
    </body>
</html>
