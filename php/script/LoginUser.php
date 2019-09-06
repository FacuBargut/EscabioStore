<?php
    include '../class/User.php';
    //Obtengo datos desde Ajax
    $UserEmail = $_POST['Email'];
    $UserPass = $_POST['Pass'];

    if($UserEmail == "" && $UserPass == ""){
        echo "Falta completar datos";
        exit;
    }

    // $User = new User();
    $MailEncontrado = false;
    $MailEncontrado = User::SearchUserByEmailAndPass($UserEmail,$UserPass);

    
    

    

    

?>