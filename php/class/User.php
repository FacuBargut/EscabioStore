<?php
    include "./conexion/conexion.php";
    class User {
        private $Name;
        private $Surname;
        private $Mail;
        private $Password;
        private $Activated;
        

        public function __contruct($name,$surname,$mail,$password,$activated = false){
            $this->Name = $name;    
            $this->Surname = $surname;
            $this->Mail = $mail;
            $this->Password = $password;
            $this->Activated = $activated;
        }

        public function Add(){
            $conn = new Conexion();
            $sql = "INSERT INTO Usuarios (Nombre, Apellido, Mail, Activado) VALUES ('$this->Name','$this->Surname','$this->Mail','$this->Activated')";


            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
            }else {
                echo "Error: " . $sql . "" . mysqli_error($conn);
            }

        }


    }