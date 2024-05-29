<?php
/* importar la clase de crud de esta forma, asi importamos de un archivo de afuera*/
require_once(__DIR__ . "/../core/crud.php");

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
            $this-> crear("id,nombre,apellido,telefono,edad", "?,?,?,?,?", [$this->id, $this->nombre, $this->apellido, 
            $this->telefono, $this->edad]);
        }


        /* Actualizar Usuario  */
        public function actualizar() {
            /* Enviar las colunnas y los datos, el id mandar de ultimo por que esta en el where */
            $this->modificacion("nombre=?,apellido=?,telefono=?,edad=?", [$this->nombre, $this->apellido, $this->telefono, 
            $this->edad, $this->id]);
        }
        

        /* Crear el metodo eliminar */

        public function eliminar() {
            $this->delete($this->id);
        }
    }
?>