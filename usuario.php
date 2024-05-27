<?php
/* importar la clase de crud */
require_once("crud.php");

    class Usuario extends Crud{

        /* Definir los atributos de nuestro usuario */
        public function __construct(public int $id=0, 
                                    public string $nombre = "",
                                    public string $apellido = "",
                                    public string $telefono = "",
                                    public int $edad = 0
        ){
            /* PARA EXPESIFICAR LA TABLA A LA QUE VA ACA EN ESTE CONTRUTOR VAMOS A LLAMAR AL CONTRUPTOR DE CRUD */
            parent::__construct("usuario");
        }

        /* insertar usuario */

        public function insertar(){
            $this-> crear("id,nombre,apellido,telefono,edad", "?,?,?,?,?", [$this->id, $this->nombre, $this->apellido, $this->telefono, $this->edad]);
        }

    }
?>