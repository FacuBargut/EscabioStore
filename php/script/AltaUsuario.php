<?php

    include "../class/User.php";
    //Obtengo datos del ajax
    $UserName = trim($_POST['Name']);
    $UserSurname = trim($_POST['Surname']);
    $UserMail = trim($_POST['Mail']);
    $UserPass = trim($_POST['Pass']);
    $UserPassConfirm = trim($_POST['PassConfirm']);

    exit;
    
    //Valido que no esten vacios
    if ($UserName == "" && $UserSurname == "" && $UserMail == "" && $UserPass == "" ) {
    	echo "Falta completar datos";
    	exit;
    }else if($UserPass != $UserPassConfirm){
    	echo "Contraseñas con coinciden";
    	exit;
    }


    $User = new User($UserName,$UserSurname,$UserMail,$UserPass,false);
	$User->Add();    

	
	    
	
    