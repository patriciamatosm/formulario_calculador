<?php

/**
 * Class database
 * - Crea conexión a la bbdd
 */
class Database {
    public  $host = 'localhost';
    public  $db = 'prueba_patri';
    public  $user = 'root';
    public  $password = "Pm15081999";
    public  $charset = 'utf8mb4';

    /**
     * Funcion que permite conectarse a la bbdd y ejecutar un query
     * @return PDO para ejecutar sql
     */
    function connect(){
        try{
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            $pdo = new PDO($connection, $this->user, $this->password, $options);

            return $pdo;
        }catch (PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
            return null;
        }

    }
}