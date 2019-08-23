<?php

    include "../class/User.php";

    $UserName = $_POST['Name'];
    $UserSurname = $_POST['Surname'];
    $UserMail = $_POST['Mail'];
    $UserPass = $_POST['Pass'];

    $User = new User($UserName,$UserSurname,$UserMail,$UserPass);
	$User->Add();    

    

    exit;