<?php 

class Conexion{
    /*- Atributos de la conexión  */
    public function __construct(
        public string $driver = "mysql",public string $host = "localhost",public string $user = "root",
        public string $pass = "",public string $dbName = "summy_side",public string $charset = "utf8"
    )
    {}

    /* Aca realizaremos la conexion a la base de datos */
    protected function conexion(){
        try {
            $pdo = new PDO("$this->driver:host=$this->host; dbname=this->dbName; char
            set = $this->charset", $this->user, $this->pass);

            /* Aca la retornamos */
            return $pdo;
        } catch (PDOException $mensaje) {
            echo $mensaje->getMessage();
        }

    }
}

?>