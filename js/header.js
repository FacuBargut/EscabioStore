// A $( document ).ready() block.
$( document ).ready(function() {
    var esVisible = $("#ModalCarrito").is(":visible");
    // Mostrar carro de compras
    $('#opc_nav_cart').click(function(){
        $("#ModalCarrito").fadeIn(200,function(){
            $("#ModalCarrito .chart-wrapper").css("right", "0");
            let esVisible = $("#ModalCarrito").is(":visible");
            Escape(esVisible);
        });
    })

    // Ocultar carro de compras
    $('#HideCart').click(function(){
        $("#ModalCarrito .chart-wrapper").css("right", "-25%");
        $("#ModalCarrito").fadeOut(700);
    })


    // Hacer
    function Escape (Visibility) {
        if(Visibility){
            $(document).keyup(function(e){
                if(e.which == 27) {
                    
                }
            });
        }else{
            console.log("El carro no esta visible");
        }

    }


});