<?php

    include "../class/User.php";

    $mails = $_POST['mails'];
    $mails = implode(",",$mails);

    $User = User::Delete($mails);
    
    
?>