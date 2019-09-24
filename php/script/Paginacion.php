<?php
    include "../class/User.php";

    $Limit = $_POST['Limit'];

    $CantUsers = count(User::getUsers());

    

    $Paginas = $Limit / $CantUsers;
    echo ceil($Paginas);


    // echo $Limit;


?>