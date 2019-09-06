<?php
   
    include "php/conexion/conexion.php";
    include "php/class/User.php";
    session_start();
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- CDN BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- FONTS -->
    <link href="css/css/all.css" rel="stylesheet">
    <!-- ESTILOS PERSONALIZADOS     -->
    <link href="css/header.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.default.css" rel="stylesheet">
    
    <title>ScabioStore</title>
</head>
<body>
    <!-- Header -->
    <?php include "components/shared/Header.php";?>

    
    <!-- Main -->
    <div class="container">
        <div class="row">
            <h1>Datos del usuario</h1>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="">Nombre</label>
                <input type="text" value="<?php echo $_SESSION['usuario']->getName(); ?>">
            </div>
            <div class="form-group">
                <label for="">Apellido</label>
                <input type="text" value="<?php echo $_SESSION['usuario']->getSurname();?>">
            </div>
            <div class="form-group">
                <label for="">Mail</label>
                <input type="text" value="<?php echo $_SESSION['usuario']->getMail();?>">
            </div>
            <div class="form-group">
                <label for="">Contraseña</label>
                <input type="text" value="<?php echo $_SESSION['usuario']->getPassword();?>">
            </div>
            <div class="form-group">
                <label for="">Estado cuenta</label>
                <input type="text"
                    value="<?php if($_SESSION['usuario']->getActivated() == 0){echo "Activacion pendiente";}else{echo "Activo";}?>">
            </div>
        </div>
        <div class="row">
            <button id="closeSesion" class="btn btn-danger">Cerrar sesión</button>
            <button class="btn btn-success">Guardar cambios</button>
        </div>
    </div>

    <p style=
                <?php if($_SESSION['usuario']->getAdministrator() == 1){
                        ?> "display:block"; <?php
                    }else{
                        ?> "display:none;" <?php
                    }
                ?>
    >Esta cuenta esta registrada como admin y puede acceder al <a href="admin.php" target="_blank">Panel de administrador</a>.</p>
    

    
    <!-- footer -->
    <?php include "components/shared/Footer.php"?>
    
    
    

<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/jquery.js"></script>     
<script src="js/header.js"></script>
<script src="js/user.js"></script>



</body>
</html>


