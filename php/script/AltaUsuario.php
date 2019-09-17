<?php

    include "../class/User.php";
    //Obtengo desde donde se ejecuto el AJAX
    $Exec_from = trim($_POST['From']);
    $UserName = trim($_POST['Name']);
    $UserSurname = trim($_POST['Surname']);
    $UserMail = trim($_POST['Mail']);
    $UserPass = trim($_POST['Pass']);

    ValidarCampos($UserName,$UserSurname,$UserMail,$UserPass);
    
    if($Exec_from == "register"){
        $UserPassConfirm = trim($_POST['PassConfirm']);
        $UserAdministrator = false;

        if($UserPass != $UserPassConfirm){
            echo "Contraseñas con coinciden";
            exit;
        }
        //Cuando el alta lo hace un usuario comun, se debe activar el usuario via mail
        $UserActive = false;

    }else if ($Exec_from == "Admin"){
        $UserAdministrator = trim($_POST['UserAdmin']);
        //Cuando se da el alta como administrador, el usuario nuevo, no necesita activar la cuenta
        $UserActive = true;
    }

    $User = new User($UserName,$UserSurname,$UserMail,$UserPass,$UserActive,$UserAdministrator);
    $User->Add();  






//<Funciones>    
    function ValidarCampos($Name,$Surname,$Mail,$Pass){
        if ($Name == "" && $Surname == "" && $Mail == "" && $Pass == "" ) {
            echo "Falta completar datos";
            exit;
            }
    }
//</Funciones>    

?>
	    
	
    