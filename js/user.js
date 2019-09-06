$(document).ready(function() {
    $('body').on('click', '#closeSesion', function() {
        $.ajax({
            type: 'POST',
            url: './php/script/CloseSesion.php',
            success: function(resp) {
                console.log(resp);
                if (resp === "Sesion finalizada") {
                    window.location.href = "./index.php";
                } else {
                    alert("Problemas graves");
                }
            }
        })
    })
})