<?php
     include "../class/User.php";
     //Obtengo datos desde ajax
     $UserName = $_POST['Name'];
     $UserSurname = $_POST['Surname'];
     $UserMail = $_POST['Mail'];
     $UserPass = $_POST['Pass'];
     $UserAdmin = $_POST['Admin'];
 
     $Update = User::Update($UserName,$UserSurname,$UserMail,$UserPass,$UserAdmin);
          



?>