<?php 

/* Heredamos de la conexion */
class crud extends Conexion{

    private $pdo;
    public function __construct(public string $tabla)
    {
        $this->pdo = $this->conexion();
    }


    /* Comensamos a crear nuestro crud */

    public function consultarTodo(){
        try {
            /* Preparar consulta */
            $stm = $this->pdo->prepare("SELECT * FROM $this->tabla");

            /* Ejecutar consulta */
            $stm->execute();

            /* Obtener los datos en tipo objeto */
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $mensaje) {
            echo $mensaje->getMessage();
        }
    }


    public function consultarUno(int $id){
        try {
            /* Preparar consulta */
            $stm = $this->pdo->prepare("SELECT * FROM $this->tabla WHERE id = $id");

            /* Ejecutar consulta */
            $stm->execute();

            /* Obtener un dato */
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $mensaje) {
            echo $mensaje->getMessage();
        }
    }

    /*1.0 MANEJAR LA INYECIÓN DE DATOS */
    public function delete(int $id){
        try {
            /* Preparar consulta */
            $stm = $this->pdo->prepare("DELETE * FROM $this->tabla WHERE id = ?"); /*1.1  canbiar la variable por ? donde este el ? es 
            por que va un dato*/

            /* Ejecutar consulta */
            $stm->execute([$id]); /* Atraves del areglo el verifica que no haya codigo malicioso */

        } catch (PDOException $mensaje) {
            echo $mensaje->getMessage();
        }
    }

    /*Crear datos de foa dinamica para cualquier tabla*/
    public function crear(string $columnas,string $marcadores,array $datos){
        try {
            /* Preparar consulta, de forma dinamica para insertar en cualquier tabla */
            $stm = $this->pdo->prepare("INSERT INTO $this->tabla WHERE $columnas VALUES $marcadores"); 

            /* Ejecutar consulta */
            $stm->execute($datos);

        } catch (PDOException $mensaje) {
            echo $mensaje->getMessage();
        }
    }

    /*Crear datos de foa dinamica para cualquier tabla*/
    public function modificacion(string $columnas, $datos){
        try {
            /* Preparar consulta, de forma dinamica para insertar en cualquier tabla */
            $stm = $this->pdo->prepare("UPDATE INTO $this->tabla WHERE $columnas"); 

            /* Ejecutar consulta */
            $stm->execute($datos);

        } catch (PDOException $mensaje) {
            echo $mensaje->getMessage();
        }
    }

}

?>
