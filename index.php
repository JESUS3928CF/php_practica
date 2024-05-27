<?php 

require_once("usuario.php");
    /* Crear la instacia de nuestro usuario */

$usuario = new Usuario(
    0, "Jesús", "Lopez", "32312324", 20
);

/* Ejecutar nuestro metodo */
$usuario->insertar();
?> 