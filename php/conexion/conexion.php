<?php

// //Conexion que funcion
$conn = new mysqli("localhost", "root", "", "scabiostore");
if ($conn->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


//Otra manera de conectar
// class Conexion extends mysqli{

//     private $DB_HOST = 'localhost';
//     private $DB_USER = 'root';
//     private $DB_PASS = '';
//     private $DB_NAME = 'scabiostore';
    
//     public function __construct(){
//         parent:: __contruct($this->DB_HOST, $this->DB_USER, $this->DB_PASS, $this->DB_NAME);

//         $this->set_charset('utf-8');

//         $this->connect_errno ? die('Error en la conexion'. mysqli_connect_errno()) : $m = 'Conectado';

//         echo $m;


//     }


// }