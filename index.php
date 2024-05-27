<?php 

require_once("usuario.php");
    /* Crear la instacia de nuestro usuario */

$usuario = new Usuario(
    2, "Maria", "Lopez", "32312324", 20
);

/* Ejecutar nuestro metodo para actualizar, no importa el id que le pasemos arriba*/
/* $usuario->insertar();
 */
/*  Llamar el metodo para actualizar */

$usuario->actualizar();
?> 