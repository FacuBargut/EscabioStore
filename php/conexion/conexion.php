<?php

// //Conexion que funcion
// $mysqli = new mysqli("localhost", "root", "1234578", "scabio");
// if ($mysqli->connect_errno) {
//     echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
// }


//Otra manera de conectar
class Conexion extends mysqli{

    private $DB_HOST = 'localhost';
    private $DB_USER = 'root';
    private $DB_PASS = 'ingenea';
    private $DB_NAME = 'scabio';
    
    public function __contruct(){
        parent:: __contruct($this->DB_HOST, $this->DB_USER, $this->DB_PASS, $this->DB_NAME);

        $this->set_charset('utf-8');

        $this->connect_errno ? die('Error en la conexion'. mysqli_connect_errno()) : $m = 'Conectado';

        echo $m;


    }


}