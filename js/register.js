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



    $('body').on('click','#RegistrarUsuario',function(e){
        //Validaciones de campos
        e.preventDefault();

        let UserName = $('#name_register').val();        
        let UserSurname = $('#surname_register').val();
        let UserMail = $('#email_register').val();
        let UserPass = $('#pass_register').val();
        let UserPassConfirm = $('#pass_confirm_register').val();

        if(UserName.trim() != "" && UserSurname.trim() != "" && UserMail.trim() != "" && UserPass.trim() != "" && UserPassConfirm != ""){

            var parametros = {
                "Name" : UserName,
                "Surname" : UserSurname,
                "Mail" : UserMail,
                "Pass" : UserPass,
                "PassConfirm": UserPassConfirm
            }

            $.ajax({
                    url: './php/script/AltaUsuario.php',
                    type: 'POST',
                    data: parametros,
                    success: function(resp){

                        if(resp == "Ya existe un usuario con mail ingresado"){      
                            Swal.fire({
                                type: 'error',
                                title: 'Usuario ya existe',
                                text: 'Existe un usuario registrado con ese email',
                                allowOutsideClick: false
                            })
                        }


                        console.log("respuesta ajax: "+resp);
                    }
            })



        }else{
            console.log("Falta completar datos");
        }

    })


    //Inputs
     $('body').on('blur','#name_register',function(){
        let _this = $('#name_register');
        if( _this.val().trim() == ""){
            _this.parent().removeClass("border border-success");
            _this.removeClass("text-success");
            _this.parent().addClass("border border-danger");
            _this.addClass("text-danger");
            _this.addClass("input-error");
        }else{
            _this.parent().removeClass("border border-danger");
            _this.removeClass("text-danger");
            _this.parent().addClass("border border-success");
            _this.addClass("text-success");
        }
    })

    $('body').on('blur','#surname_register',function(){
        let _this = $('#surname_register');
        if( _this.val().trim() == ""){
            _this.parent().removeClass("border border-success");
            _this.removeClass("text-success");
            _this.parent().addClass("border border-danger");
            _this.addClass("text-danger");
            _this.addClass("input-error");
        }else{
            _this.parent().removeClass("border border-danger");
            _this.removeClass("text-danger");
            _this.parent().addClass("border border-success");
            _this.addClass("text-success");
        }
    })

    $('body').on('blur','#email_register',function(){
        let _this = $('#email_register');
        let testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;

        if( _this.val().trim() == "" && testEmail.test(_this.val())){
            _this.parent().removeClass("border border-success");
            _this.removeClass("text-success");
            _this.parent().addClass("border border-danger");
            _this.addClass("text-danger");
            _this.addClass("input-error");
        }else{
            _this.parent().removeClass("border border-danger");
            _this.removeClass("text-danger");
            _this.parent().addClass("border border-success");
            _this.addClass("text-success");
        }
    })

    $('body').on('blur','#pass_register',function(){
        let _this = $('#pass_register');
        let _password_confirm = $('#pass_confirm_register');
        if( _this.val().trim() == ""){
            _this.parent().removeClass("border border-success");
            _this.removeClass("text-success");
            _this.parent().addClass("border border-danger");
            _this.addClass("text-danger");
            _this.addClass("input-error");
        }else if(_this.val().trim() != _password_confirm.val().trim()){
            _this.parent().removeClass("border border-danger");
            _this.removeClass("text-danger");
            _this.parent().addClass("border border-success");
            _this.addClass("text-success");
        }
        else{
            _this.parent().removeClass("border border-danger");
            _this.removeClass("text-danger");
            _this.parent().addClass("border border-success");
            _this.addClass("text-success");
        }
    })

    $('body').on('blur','#pass_confirm_register',function(){
        let _this = $('#pass_confirm_register');
        let _password = $('#pass_register');
        if( _this.val().trim() == ""){
            _this.parent().removeClass("border border-success");
            _this.removeClass("text-success");
            _this.parent().addClass("border border-danger");
            _this.addClass("text-danger");
            _this.addClass("input-error");
        }else if(_password.val().trim() != _this.val().trim()){
            _this.parent().removeClass("border border-danger");
            _this.removeClass("text-danger");
            _this.parent().addClass("border border-success");
            _this.addClass("text-success");
        }
        else{
            _this.parent().removeClass("border border-danger");
            _this.removeClass("text-danger");
            _this.parent().addClass("border border-success");
            _this.addClass("text-success");
        }
    })

});