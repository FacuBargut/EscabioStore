<?php
    include "../class/User.php";
    //Obtengo datos desde ajax
    $UserEmail = $_POST['Email'];
    $UserPass = $_POST['Pass'];

    $UserLogued = User::SearchUserByEmailAndPass($UserEmail,$UserPass);
    if($UserLogued){
        //Inicio sesion
        session_start();
        $objUser = new User($UserLogued->Nombre,$UserLogued->Apellido,$UserLogued->Mail,$UserLogued->Password,$UserLogued->Activado,$UserLogued->Admin);
        $_SESSION['usuario'] = $objUser;
        
        echo "Sesion iniciada";

    }else{
        echo "Usuario no existe";
    }

    exit;


?>