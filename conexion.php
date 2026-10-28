<!-- Función conectar() que devuelve un objeto PDO -->

<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function conectar(){

  try{
    $dbh = new PDO(
        'mysql:host=localhost;dbname=biblioteca;charset=utf8mb4', // DSN
        'root', 
        '',
        [ 
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]
    );


    return $dbh;

  }catch(Exception $e){
    echo 'No se puede conectar con la base de datos';
  }


}