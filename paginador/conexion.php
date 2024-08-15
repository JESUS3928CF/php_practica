<?php
$host = 'localhost';
$usuario = 'root';  // Cambia esto a tu usuario MySQL
$contrasena = '';  // Cambia esto a tu contraseña MySQL
$base_de_datos = 'tienda';

$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

if ($conexion->connect_error) {
    die('Error de conexión (' . $conexion->connect_errno . ') ' . $conexion->connect_error);
}

echo 'Conexión exitosa a la base de datos';