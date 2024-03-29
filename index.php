<?php
    session_start();
    include "php/conexion/conexion.php";
    
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
    <?php include "components/shared/Header.php"?>

    
    <!-- Main -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 text-center text-success"><h2>Product Slider</h2>

            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="owl-carousel owl-theme">
                <div class="item">
                    <div class="card">
                        <img src="img/Productos/porrong.png" alt="" class="card-img-top">
                        <div class="card-body">
                            <h3>Porron</h3>
                            <h5>$ <span class="text-center">25</span></h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit eum tenetur possimus, quas accusamus rerum adipisci alias quia nulla sint in tempora, itaque quasi? Earum, eaque! Deserunt consectetur molestias reiciendis.</p>
                            <button class="btn btn-primary btn-sm">Comprar</button>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>

    
<!-- Footer -->
<!-- <?php include "components/shared/Footer.php"?> -->
    
    
    

<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/jquery.js"></script>     
<script src="js/header.js"></script>
<script src="js/owl.carousel.js"></script>
<script>
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    })
</script>
</body>

</html>


