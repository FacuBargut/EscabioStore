<?php
    // include "php/conexion/conexion.php";
    // session_start();
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
            <h1>Preguntas frecuentes</h1>
        </div>
        <div class="row">
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Guia de compra
                    </button>
                </h2>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
            Paso 1: Elegís lo que querés
Es muy fácil.
Para cargar los productos en tu carrito hacé click en el botón que dice “Comprar” , que aparece debajo de cada uno. Para eliminar productos de tu carrito, podes hacerlo clickeando en la “X” que figura al lado del detalle de compra. Para cambiar las cantidades del producto elegido, hacelo directamente desde el carrito de compras, clickeando en “+” o “-” según lo que desees. Una vez que hayas seleccionado todos los que desees, clickeá en “Finalizar compra” para avanzar en tu pedido.

Paso 2: Seleccionas el domicilio de entrega
Muy Cómodo. Enviamos tu pedido a la dirección que detalles en esta instancia.

Paso 3: Realizas el Pago
Último paso para finalizar tu compra!
Clickeando en “Ir a Pagar” vas a ser re-direccionado a la página de Mercado Pago para realizar de forma segura el pago con tarjeta de crédito/débito o efectivo.

Paso 4: Confirmación de compra
Ya estás listo para tu experiencia en Craft Society.
Vas a estar recibiendo un mail con la confirmación de tu compra y datos para el seguimiento de tu pedido.

Paso 5: Confirmación de despacho
Y la dulce espera, es recompensada.
Una vez que tu compra sea despachada, vas a recibir un mail con el número de seguimiento. Por último, recibilo en tu casa y disfrutá de momentos únicos.

¿Hay un mínimo de productos para comprar?
No, podés elegir la cantidad que quieras y combinarlos como prefieras!

¿Hay un máximo de productos para comprar?
Si. El Usuario podrá adquirir un máximo de 50 unidades, ya sea compradas de manera individual o dentro de un pack, cada 60 días. Podés conocer más sobre esto en nuestros Términos y Condiciones.

¿Cómo se envía mi orden?
Tu compra se despachará en una o varias cajas, esto dependerá del total de productos adquiridos. Las cajas no se arman en función de los packs sino en función del total de ítems adquiridos.

¿Tengo que registrarme para realizar una compra?
Sí, para realizar una compra es necesario que estés registrado. Podés hacerlo una vez que ya hayas llenado tu carrito!
Simplemente tenés que completar los siguientes datos:

- Nombre
- Apellido
- Mail
- Contraseña


¿Puedo modificar mi compra una vez finalizada?
No, una vez que tu orden está terminada ya no es posible sumarle más productos.

¿Puedo hacer el pago de mi compra con dos tarjetas de crédito?
Si, podés pagar tu compra utilizando dos tarjetas. A su vez, es posible utilizar distintos planes de financiación para cada una de ellas.
            </div>
            </div>
        </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Atencion al cliente
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
      Si querés contactarnos podés escribirnos a contacto@craftsociety.com.ar, estamos para lo que necesites!

Podés comunicarte con nosotros usando nuestro chat en línea de 9.30 a 17:30hs.

Si querés recibir información y promociones de forma exclusiva no dudes en inscribirte en nuestro Newsletter! El envío de emails promocionales será realizado solo con tu consentimiento y podrás desactivar esta opción en cualquier momento.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Seguridad de la compra
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
      Estamos comprometidos con la seguridad de las compras online, por lo que contamos con la tecnología SSL (Secure Sockets Layer) que asegura tanto la autenticidad de nuestro sitio como el cifrado de toda la información que nos entregás. Esta tecnología permite que tu información personal sea codificada para que no pueda ser leída cuando viaja a través de internet. Para garantizar la seguridad de los pagos usamos la tecnología de Mercado Pago.
      </div>
    </div>
  </div>
</div>
        </div>
    </div>

    
    

    
    <!-- footer -->
    <?php include "components/shared/Footer.php"?>
    
    
    

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/jquery.js"></script>     
<script src="js/header.js"></script>



</body>
</html>


