<?php
/* importar la clase de crud de esta forma, asi importamos de un archivo de afuera*/
require_once(__DIR__ . "/../core/crud.php");

    class Animal extends Crud{

        /* Definir los atributos de nuestro usuario */
        public function __construct(public int $id=0, 
                                    public string $nombre = "",
                                    public string $raza = "",
                                    public string $sexo = "",
                                    public int $edad = 0
        ){
            /* PARA EXPESIFICAR LA TABLA A LA QUE VA ACA EN ESTE CONTRUTOR VAMOS A LLAMAR AL CONTRUPTOR DE CRUD */
            parent::__construct("animal");
        }

        public function insertar(){
            $this-> crear("id,nombre,raza,sexo,edad", "?,?,?,?,?", [$this->id, $this->nombre, $this->raza, 
            $this->sexo, $this->edad]);
        }

        public function actualizar() {
            /* Enviar las colunnas y los datos, el id mandar de ultimo por que esta en el where */
            $this->modificacion("nombre=?,raza=?,sexo=?,edad=?", [$this->nombre, $this->raza, $this->sexo, 
            $this->edad, $this->id]);
        }
        
        public function eliminar() {
            $this->delete($this->id);
        }
    }
?>