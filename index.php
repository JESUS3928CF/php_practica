<?php 
/* Asi importamos de un archivo de nivel mas bajo */
require_once("./modelo/usuario.php");

/* Incluir la clase de Animal */
require_once("./modelo/animal.php");

/* Incluir la clase de Adopcion */
require_once("./modelo/adopcion.php");


$usuario = new Usuario(
    2, "Jesus", "Castallo", "323121212", 26
);

$animal = new Animal(
    0, "Vaca", "Tinto Puro", "Hembra", 4
);

$adopcion = new Adopcion(
    0, 1, 2, "29/05/2024", "Jesus adopta a Vaca para matarla y hacer asado"
);



$usuario->insertar(); 

$animal->insertar();

$adopcion->insertar();

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Insertar </h1>
    <p> Una persona </p>
    <p> Una vaca</p>
    <p> Una adopcion</p>
</body>
</html>
