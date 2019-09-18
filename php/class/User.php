<?php
    class User {
        private $Name;
        private $Surname;
        private $Mail;
        private $Password;
        private $Activated;
        private $Administrator;
        

        public function __construct($name,$surname,$mail,$password,$activated,$admin){
            $this->Name = $name;    
            $this->Surname = $surname;
            $this->Mail = $mail;
            $this->Password = $password;
            $this->Activated = $activated;
            $this->Administrator = $admin;
        }

        public function getName(){
            return $this->Name;
        }

        public function getSurname(){
            return $this->Surname;
        }

        public function getMail(){
            return $this->Mail;
        }

        public function getPassword(){
            return $this->Password;
        }

        public function getActivated(){
            return $this->Activated;
        }

        public function getAdministrator(){
            return $this->Administrator;
        }


        public function Add(){
            include "../conexion/conexion.php";

            if ($this->SearchUserByEmail($this->Mail)) {
                echo "Ya existe un usuario con mail ingresado";
                exit;
            }

            $sql = "INSERT INTO Usuarios (Nombre, Apellido, Mail, Password, Activado, Admin) VALUES ('$this->Name','$this->Surname','$this->Mail','$this->Password', '$this->Activated', $this->Administrator)";

            if ($conn->query($sql)) {
                echo "Usuario registrado con exito";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

        }

        public function Delete($mails){
            include "../conexion/conexion.php";

            $sql = "DELETE FROM Usuarios WHERE Mail IN ($mails)";
            
            if ($conn->query($sql)) {
                echo "Delete";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

        }

        //Update incompleto, tengo que traerme si o si el ID, ya que aca, el mail puede llegar modificado
        public function Update($name,$surname,$mail,$pass,$admin){
            include "../conexion/conexion.php";

            $sql = "UPDATE Usuarios (Nombre, Apellido, Mail, Password, Admin) SET ('$name','$surname','$mail','$pass','$admin') WHERE Mail = '$mail'";
            
            if ($conn->query($sql)) {
                echo "Update";
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

        public static function SearchUserByEmailAndPass ($email,$pass){
            include "../conexion/conexion.php";
            $resp = false;
            $result = $conn->query("SELECT * FROM Usuarios WHERE Mail = '$email' AND Password = '$pass'");
            $row_cnt = $result->num_rows;
            $registro = $result->fetch_object();
            if ($registro) {
                return $registro;
            }else{
                return false;
            }
            
        }

        public static function getUsers (){

            include "../../php/conexion/conexion.php";

            $Array_users = Array();
            
            $resp = false;
            
            
            if($result = $conn->query("SELECT * FROM Usuarios")){
                while ($row = $result->fetch_object()){
                    array_push($Array_users,$row);
                }
            }
            
            return $Array_users;            
        }


    }