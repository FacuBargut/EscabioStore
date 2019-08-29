<?php
    class User {
        private $Name;
        private $Surname;
        private $Mail;
        private $Password;
        private $Activated;
        

        public function __construct($name,$surname,$mail,$password,$activated = false){
            $this->Name = $name;    
            $this->Surname = $surname;
            $this->Mail = $mail;
            $this->Password = $password;
            $this->Activated = false;
        }

        public function Add(){
            include "../conexion/conexion.php";

            if ($this->SearchUserByEmail($this->Mail)) {
                echo "Ya existe un usuario con mail ingresado";
                exit;
            }

            $sql = "INSERT INTO Usuarios (Nombre, Apellido, Mail, Activado) VALUES ('$this->Name','$this->Surname','$this->Mail', false)";

            if ($conn->query($sql)) {
                echo "Usuario registrado con exito";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

        }

        public function SearchUserByEmail ($email){
            include "../conexion/conexion.php";
            $resp = false;
            $result = $conn->query("SELECT * FROM Usuarios WHERE Mail = '$email'");
            $row_cnt = $result->num_rows;
            if ($row_cnt > 0) {
                $resp = true;
            }
            return $resp;
        }


    }