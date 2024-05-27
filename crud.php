<?php

require_once("conexion.php");

/* Heredamos de la conexion */
class Crud extends Conexion {
    
    private $pdo;
    public function __construct(public string $tabla) {
        /* Ejecutar el constructor padre para iniciar la clase */
        parent::__construct();
        $this->pdo = $this->conexion();
    }

    /* Comenzamos a crear nuestro CRUD */

    public function consultarTodo() {
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

    public function consultarUno(int $id) {
        try {
            /* Preparar consulta */
            $stm = $this->pdo->prepare("SELECT * FROM $this->tabla WHERE id = ?");

            /* Ejecutar consulta */
            $stm->execute([$id]);

            /* Obtener un dato */
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $mensaje) {
            echo $mensaje->getMessage();
        }
    }

    /* Manejar la inyección de datos */
    public function delete(int $id) {
        try {
            /* Preparar consulta */
            $stm = $this->pdo->prepare("DELETE FROM $this->tabla WHERE id = ?");

            /* Ejecutar consulta */
            $stm->execute([$id]);
        } catch (PDOException $mensaje) {
            echo $mensaje->getMessage();
        }
    }

    /* Crear datos de forma dinámica para cualquier tabla */
    public function crear(string $columnas, string $marcadores, array $datos) {
        try {
            /* Preparar consulta, de forma dinámica para insertar en cualquier tabla */
            $stm = $this->pdo->prepare("INSERT INTO $this->tabla ($columnas) VALUES ($marcadores)");

            /* Ejecutar consulta */
            $stm->execute($datos);
        } catch (PDOException $mensaje) {
            echo $mensaje->getMessage();
        }
    }

    /* Modificación de datos de forma dinámica para cualquier tabla */
    public function modificacion(string $columnas, array $datos) {
        try {
            /* Preparar consulta, de forma dinámica para actualizar en cualquier tabla */
            $stm = $this->pdo->prepare("UPDATE $this->tabla SET $columnas WHERE id = ?");

            /* Ejecutar consulta */
            $stm->execute($datos);
        } catch (PDOException $mensaje) {
            echo $mensaje->getMessage();
        }
    }
}

?>
