<?php

    include "../class/User.php";
    //Obtengo desde donde se ejecuto el AJAX

    $Exec_from = trim($_POST['From']);
    $UserName = trim($_POST['Name']);
    $UserSurname = trim($_POST['Surname']);
    $UserMail = trim($_POST['Mail']);
    $UserPass = trim($_POST['Pass']);

    if($Exec_from == "register"){


        $UserPassConfirm = trim($_POST['PassConfirm']);
        $UserAdministrator = false;

        //Valido que no esten vacios
        if ($UserName == "" && $UserSurname == "" && $UserMail == "" && $UserPass == "" ) {
        echo "Falta completar datos";
        exit;
        }else if($UserPass != $UserPassConfirm){
        echo "Contraseñas con coinciden";
        exit;
        }
        //Por default, el usuario al principio no esta activado
        $UserActive = false;

        $User = new User($UserName,$UserSurname,$UserMail,$UserPass,$UserActive,$UserAdministrator);
        $User->Add();    


    }else if ($Exec_from == "Admin"){

    }

?>
	    
	
    