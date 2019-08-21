<?php
    include "./conexion/conexion.php";
    class User {
        private $Name;
        private $Surname;
        private $DNI;
        private $Telephone_Number;

        public function __contruct($name,$surname,$dni,$tel_num){
            $this->Name = $name;    
            $this->Surname = $surname;
            $this->DNI = $dni;
            $this->Telephone_Number = $tel_num;
        }

        public function Add(){
            $db = new Conexion();

        }


    }