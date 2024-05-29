<?php

/* al iniciar no tendremos ningua accion ni controlador para saber que hacer al inicio lo siguiente */
if (!isset($_REQUEST["controlador"])) {
    
    /* Por defecto decidiremos que lo mandaremos a la vista de usuario */
    require_once("controlador/usuario_controlador.php");

    $controlador = new UsuarioControlador(); //- Instancia del controlador
    $controlador->indexUsuario();

} else {
    $controlador = $_REQUEST["controlador"];
    $accion = $_REQUEST["accion"]; /* Esta es la accion que resiviremos por ejemplo eliminar, en la 12 la ejecutamos */

    require_once("controllar/$controlador" . "_controlador.php");

    $controlador = ucwords($controlador) . "Controlador";

    $controlador = new $controlador;

    /* Esto nos sercira para ejecutar funciones */
    call_user_func([$controlador, $accion]);
}
