// A $( document ).ready() block.
$( document ).ready(function() {

    $('.form-wrapper').load("components/layout/form-register.php");
    setTimeout(function(){
        $('#name_register').focus();
    }, 100);
    
    
    $('body').on('click','.register-wrapper .form-wrapper p #Register',function(){
        console.log("register");
        $('.form-wrapper').load("components/layout/form-login.php");
        setTimeout(function(){
            $('#email_login').focus();
        }, 100);
    })

    $('body').on('click','.register-wrapper .form-wrapper p #Login',function(){
        console.log("login");
        $('.form-wrapper').load("components/layout/form-register.php");
        setTimeout(function(){
            $('#name_register').focus();
        }, 100);
        
    })



    $('body').on('click','#RegistrarUsuario',function(){
        //Validaciones de campos
        let UserName = $('#name_register').val();        
        let UserSurname = $('#surname_register').val();
        let UserMail = $('#email_register').val();
        let UserPass = $('#pass_register').val();
        
        console.log("Datos: "+ UserName +", "+ UserSurname + ", "+ UserMail + ", "+ UserPass);

        if(UserName.length != 0 && UserSurname.length != 0 && UserMail.length != 0 && UserPass.length != 0){
            
            console.log("Todo ok");

            var parametros = {
                "Name" : UserName,
                "Surname" : UserSurname,
                "Mail" : UserMail,
                "Pass" : UserPass
            }

            $.ajax({
                    url: './php/script/AltaUsuario.php',
                    type: 'POST',
                    data: parametros,
                    success: function(resp){

                        console.log("respuesta ajax: "+resp);
                    }
            })



        }else{
            console.log("Falta completar datos");
        }

    })

});