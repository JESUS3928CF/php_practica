<?php 

/* Se busca la ruta como si estuviesemos en el index ose no hay que salir hay que entrar por que esto se ejecuta desde el 
controlador que esta en el index */
require_once("modelo/usuario.php");

/* Heredamos del modelo para tener acceso a el */
class UsuarioControlador extends Usuario {

    public function __construct()
    {
        /* Inicializar el contruptor de usuario */
        parent::__construct();
    }

    /* Crear un metodo para nuestro diseño, lo que hara es redireccionar a la pagina pricipal de usuario que es el listar usurio */
    public function indexUsuario(){
        require_once("vista/usuarios.php"); /* Manda a la tabla usuario */
    }

    /* Mostrar los datos del usuario */
    public function mostrarUsuario(){
        
        /* Esto es para buscar los datos del usar con el id que mandamos por la url */
        $id = $_REQUEST["id"]; 
        if(isset($id)){
            $usuario = $this->consultarUno($id);
        }

        /* Redireccionar */
        require_once("vista/usuario_formulario.php");

        /* Aun no usa el usuario */
    }



    /* Metodo para guardar datos, cuando ejecutemos este metodo optendremos la info de el formulario y mandamos a la db */
    public function guardar(){
        $this->id = $_REQUEST["id"];
        $this->nombre = $_REQUEST["nombre"];
        $this->apellido = $_REQUEST["apellido"];
        $this->telefono = $_REQUEST["telefono"];
        $this->edad = $_REQUEST["edad"];

        /* Validar si vamos a actulizar o crear un registor como lo sabemos, pues si mandan un id mayor a 0 es por que se actulizara */
        $this->id>0?$this->actualizar():$this->insertar();

         /* Redireccionar al index */
         header("Location:index.php");
    }

    /* Eliminar */
    public function eliminar()
    {
        /* Ejecutar funcion */
        $this->delete($_REQUEST["id"]);

        /* Redireccionar */
        header("Location:index.php");
    }
}

?>