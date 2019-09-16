// A $( document ).ready() block.
$(document).ready(function() {

    $('.form-wrapper').load("components/layout/form-register.php");
    setTimeout(function() {
        $('#name_register').focus();
    }, 100);


    $('body').on('click', '.register-wrapper .form-wrapper p #Register', function() {
        console.log("register");
        $('.form-wrapper').load("components/layout/form-login.php");
        setTimeout(function() {
            $('#email_login').focus();
        }, 100);
    })

    $('body').on('click', '.register-wrapper .form-wrapper p #Login', function() {
        console.log("login");
        $('.form-wrapper').load("components/layout/form-register.php");
        setTimeout(function() {
            $('#name_register').focus();
        }, 100);

    })



    $('body').on('click', '#RegistrarUsuario', function(e) {
        //Validaciones de campos
        e.preventDefault();

        let UserName = $('#name_register').val();
        let UserSurname = $('#surname_register').val();
        let UserMail = $('#email_register').val();
        let UserPass = $('#pass_register').val();
        let UserPassConfirm = $('#pass_confirm_register').val();

        if (UserName.trim() != "" && UserSurname.trim() != "" && UserMail.trim() != "" && UserPass.trim() != "" && UserPassConfirm != "") {

            var parametros = {
                "Name": UserName,
                "Surname": UserSurname,
                "Mail": UserMail,
                "Pass": UserPass,
                "PassConfirm": UserPassConfirm,
                "From": "register"
            }

            $.ajax({
                url: './php/script/AltaUsuario.php',
                type: 'POST',
                data: parametros,
                success: function(resp) {

                    switch (resp) {
                        case "Ya existe un usuario con mail ingresado":
                            Swal.fire({
                                type: 'error',
                                title: 'Usuario ya existe',
                                text: 'Existe un usuario registrado con ese email. Intentelo con un correo electronico distinto',
                                allowOutsideClick: false
                            }).then((result) => {
                                if (result.value) {
                                    $('#email_register').val('');
                                    $('#email_register').focus();
                                }
                            })
                            break;
                        case "Contraseñas con coinciden":
                            Swal.fire({
                                type: 'error',
                                title: 'Las contraseñas no coinciden',
                                text: 'Las contraseñas no coinciden',
                                allowOutsideClick: false
                            }).then((result) => {
                                if (result.value) {
                                    $('#pass_register').val('');
                                    $('#pass_confirm_register').val('');

                                    $('#pass_register').parent().removeClass("border border-danger");
                                    $('#pass_confirm_register').parent().removeClass("border border-danger");

                                    $('#pass_register').removeClass("input-error");
                                    $('#pass_confirm_register').removeClass("input-error");

                                    $('#pass_register').removeClass("text-danger");
                                    $('#pass_confirm_register').removeClass("text-danger");

                                    $('#pass_register').focus();
                                }
                            })
                            break;
                        case "Usuario registrado con exito":
                            Swal.fire({
                                type: 'success',
                                title: 'Usuario creado con exito',
                                text: 'Se le ha enviado un mail para completar el proceso de registro',
                                allowOutsideClick: false
                            }).then((result) => {
                                if (result.value) {
                                    CleanRegisterInputs();
                                }
                            })
                            break;
                        case "Falta completar datos":
                            Swal.fire({
                                type: 'error',
                                title: 'Todos los datos se deben completar',
                                text: 'Hay campos que no fueron completados. Por favor,completelos y vuela a intentarlo',
                                allowOutsideClick: false
                            }).then((result) => {
                                if (result.value) {
                                    CleanRegisterInputs();
                                }
                            })
                            break;
                    }
                    console.log("respuesta ajax: " + resp);
                }
            })



        } else {
            Swal.fire({
                type: 'error',
                title: 'Todos los datos se deben completar',
                text: 'Hay campos que no fueron completados. Por favor, completelos y vuela a intentarlo',
                allowOutsideClick: false
            }).then((result) => {
                if (result.value) {
                    CleanRegisterInputs();
                }
            })
        }

    })





    

    //Inputs
    $('body').on('blur', '#name_register', function() {
        let _this = $('#name_register');
        if (_this.val().trim() == "") {
            _this.parent().removeClass("border border-success");
            _this.removeClass("text-success");
            _this.parent().addClass("border border-danger");
            _this.addClass("text-danger");
            _this.addClass("input-error");
        } else {
            _this.parent().removeClass("border border-danger");
            _this.removeClass("text-danger");
            _this.parent().addClass("border border-success");
            _this.addClass("text-success");
        }
    })

    $('body').on('blur', '#surname_register', function() {
        let _this = $('#surname_register');
        if (_this.val().trim() == "") {
            _this.parent().removeClass("border border-success");
            _this.removeClass("text-success");
            _this.parent().addClass("border border-danger");
            _this.addClass("text-danger");
            _this.addClass("input-error");
        } else {
            _this.parent().removeClass("border border-danger");
            _this.removeClass("text-danger");
            _this.parent().addClass("border border-success");
            _this.addClass("text-success");
        }
    })

    $('body').on('blur', '#email_register', function() {
        let _this = $('#email_register');
        let testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;

        if (testEmail.test(_this.val())) {
            _this.parent().removeClass("border border-danger");
            _this.removeClass("text-danger");
            _this.parent().addClass("border border-success");
            _this.addClass("text-success");
        } else {
            _this.parent().removeClass("border border-success");
            _this.removeClass("text-success");
            _this.parent().addClass("border border-danger");
            _this.addClass("text-danger");
            _this.addClass("input-error");
        }
    })

    $('body').on('blur', '#pass_register', function() {
        let _this = $('#pass_register');
        let _password_confirm = $('#pass_confirm_register');
        if (_this.val().trim() == "") {
            _this.parent().removeClass("border border-success");
            _this.removeClass("text-success");
            _this.parent().addClass("border border-danger");
            _this.addClass("text-danger");
            _this.addClass("input-error");
        } else if (_this.val().trim() != _password_confirm.val().trim()) {
            _this.parent().removeClass("border border-success");
            _this.removeClass("text-success");
            _this.parent().addClass("border border-danger");
            _this.addClass("text-danger");
            _password_confirm.parent().addClass("border border-danger");
            _password_confirm.addClass("text-danger");
            _password_confirm.addClass("input-error");
            _this.addClass("input-error");
        } else {
            _this.parent().removeClass("border border-danger");
            _this.removeClass("text-danger");
            _password_confirm.removeClass("text-danger");
            _password_confirm.parent().removeClass("border border-danger");

            _this.parent().addClass("border border-success");
            _password_confirm.addClass("text-success");
            _this.addClass("text-success");
            _password_confirm.parent().addClass("border border-success");
        }
    })

    $('body').on('blur', '#pass_confirm_register', function() {
        let _this = $('#pass_confirm_register');
        let _password = $('#pass_register');
        if (_this.val().trim() == "") {
            _this.parent().removeClass("border border-success");
            _this.removeClass("text-success");
            _this.parent().addClass("border border-danger");
            _this.addClass("text-danger");
            _this.addClass("input-error");
        } else if (_password.val().trim() != _this.val().trim()) {
            _this.parent().removeClass("border border-success");
            _this.removeClass("text-success");
            _this.parent().addClass("border border-danger");
            _this.addClass("text-danger");
            _this.addClass("input-error");
        } else {
            _this.parent().removeClass("border border-danger");
            _this.removeClass("text-danger");
            _password.removeClass("text-danger");
            _password.parent().removeClass("border border-danger");

            _this.parent().addClass("border border-success");
            _password.addClass("text-success");
            _this.addClass("text-success");
            _password.parent().addClass("border border-success");
        }
    })


    //Limpia o inicializa inputs de registro en blanco    
    function CleanRegisterInputs() {
        $('#form_register > .form-group').each(function() {
            $(this).removeClass("border border-danger");
            $(this).removeClass("border border-success");
            $(this).children('input').removeClass("text-success");
            $(this).children('input').removeClass("text-danger");
            $(this).children('input').removeClass("input-error");
            $(this).children('input').val('');
        });
        $('#name_register').focus();
    }

    //Limpia o inicializa inputs de registro en blanco    
    function CleanLoginInputs() {
        $('#form_login > .form-group').each(function() {
            $(this).removeClass("border border-danger");
            $(this).removeClass("border border-success");
            $(this).children('input').removeClass("text-success");
            $(this).children('input').removeClass("text-danger");
            $(this).children('input').removeClass("input-error");
            $(this).children('input').val('');
        });
        $('#email_login').focus();
    }






    //Login de usuario
    $('body').on('blur', '#email_login', function() {
        let _this = $('#email_login');
        let testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;

        if (testEmail.test(_this.val())) {
            _this.parent().removeClass("border border-danger");
            _this.removeClass("text-danger");
            _this.parent().addClass("border border-success");
            _this.addClass("text-success");
        } else {
            _this.parent().removeClass("border border-success");
            _this.removeClass("text-success");
            _this.parent().addClass("border border-danger");
            _this.addClass("text-danger");
            _this.addClass("input-error");
        }
    })

    $('body').on('blur', '#pass_login', function() {
        let _this = $('#pass_login');
        if (_this.val().trim() == "") {
            _this.parent().removeClass("border border-success");
            _this.removeClass("text-success");
            _this.parent().addClass("border border-danger");
            _this.addClass("text-danger");
            _this.addClass("input-error");
        } else {
            _this.parent().removeClass("border border-danger");
            _this.removeClass("text-danger");
            _this.parent().addClass("border border-success");
            _this.addClass("text-success");
        }
    })

    $('body').on('click', '#LoguearUsuario', function(e) {
        e.preventDefault();
        let pass = $('#pass_login').val();
        let email = $('#email_login').val();

        if (pass.trim() != "" && email.trim() != "") {

            var parametros = {
                "Email": email,
                "Pass": pass
            }

            $.ajax({
                url: './php/script/LoginUser.php',
                type: 'POST',
                data: parametros,
                success: function(resp) {
                    console.log(resp);
                    switch (resp){
                        case "Sesion iniciada":
                            window.location.href = "./index.php";
                        break;

                        case "Usuario no existe":
                            Swal.fire({
                                type: 'error',
                                title: 'Usuario no existe',
                                text: 'No existe un usuario relacionado al mail ingresado',
                                allowOutsideClick: false
                            }).then((result) => {
                                if (result.value) {
                                    CleanLoginInputs();
                                }
                            })
                        break;
                    }
                }
            })
        }

    })

});