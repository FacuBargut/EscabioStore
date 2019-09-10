<?php
    class Product {
        private $Name;
        private $Detail;
        private $Price;
        private $Img;
        private $Stock;
        private $Category;
        private $Trademark;
        

        public function __construct($name,$detail,$price,$img,$stock,$category,$trademark){
            $this->Name = $name;    
            $this->Detail = $detail;
            $this->Price = $price;
            $this->Img = $img;
            $this->Stock = $stock;
            $this->Category = $category;
            $this->Trademark = $trademark;
        }

        public function getName(){
            return $this->Name;
        }

        public function getDetail(){
            return $this->Detail;
        }

        public function getPrice(){
            return $this->Price;
        }

        public function getImg(){
            return $this->Img;
        }

        public function getStock(){
            return $this->Stock;
        }

        public function getCategory(){
            return $this->Category;
        }

        public function getTrademark(){
            return $this->Trademark;
        }


        // public function Add(){
        //     include "../conexion/conexion.php";

        //     if ($this->SearchUserByEmail($this->Mail)) {
        //         echo "Ya existe un usuario con mail ingresado";
        //         exit;
        //     }

        //     $sql = "INSERT INTO Usuarios (Nombre, Apellido, Mail, Activado, Administrador) VALUES ('$this->Name','$this->Surname','$this->Mail', false, $this->Administrator)";

        //     if ($conn->query($sql)) {
        //         echo "Usuario registrado con exito";
        //     } else {
        //         echo "Error: " . $sql . "<br>" . $conn->error;
        //     }

        // }

        // public function SearchUserByEmail ($email){
        //     include "../conexion/conexion.php";
        //     $resp = false;
        //     $result = $conn->query("SELECT * FROM Usuarios WHERE Mail = '$email'");
        //     $row_cnt = $result->num_rows;
        //     if ($row_cnt > 0) {
        //         $resp = true;
        //     }
        //     return $resp;
        // }

        public static function getProducts (){

            include "../../php/conexion/conexion.php";

            $Array_products = Array();

            if($result = $conn->query("SELECT * FROM Productos")){
                while ($row = $result->fetch_object()){
                    array_push($Array_products,$row);
                }
            }
            
            return $Array_products;            
        }


    }