<?php
/* importar la clase de crud de esta forma, asi importamos de un archivo de afuera*/
require_once(__DIR__ . "/../core/crud.php");

class Adopcion extends Crud
{

    /* Definir los atributos de nuestra adopción */
    public function __construct(
        public int $id = 0,
        public string $id_animal = "",
        public string $id_usuario = "",
        public string $fecha = "",
        public string $motivo = ""
    ) {
        /* Especificar la tabla a la que va en este constructor llamando al constructor de CRUD */
        parent::__construct("adopcion");
    }

    public function insertar()
    {
        $this->crear("id,id_animal,id_usuario,fecha,motivo", "?,?,?,?,?", [
            $this->id, $this->id_animal, $this->id_usuario,
            $this->fecha, $this->motivo
        ]);
    }

    public function actualizar()
    {
        /* Enviar las colunnas y los datos, el id mandar de ultimo por que esta en el where */
        $this->modificacion("id_animal=?,id_usuario=?,fecha=?, motivo=?", [
            $this->id_animal, $this->id_usuario, $this->fecha,
            $this->motivo, $this->id
        ]);
    }

    public function eliminar()
    {
        $this->delete($this->id);
    }
}
