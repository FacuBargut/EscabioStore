$(document).ready(function() {
    //#region Sidebar
    $('body').on('click', '#sidebar > .list-group > li', function() {

            $('#sidebar > .list-group > li').each(function() {
                $(this).removeClass('sidebar-active');
            });
            $(this).addClass('sidebar-active');

            switch ($(this).text().trim()) {
                case "Clientes":
                    $('#admin-wrapp').load("./components/admin/customers.php");
                    validateRowsInTable()
                    break;
                case "Productos":
                    $('#admin-wrapp').load("./components/admin/products.php");
                    break;
            }
        })
        // #endregion

    //#region Tabla
    $('body').on('click', '.datos>tbody>tr>td>input', function() {
            if ($(this).is(':checked')) {
                $(this).parent().parent().addClass('selectedRow');
            } else {
                $(this).parent().parent().removeClass('selectedRow');
            }
        })
        // #endregion

    $('body').on('click', '#AddNew', function() {
        CleanRegisterInputs();
    })



    $('body').on('click', '#AddUser', function(e) {
        e.preventDefault();

        let UserName = $('#UserName').val();
        let UserSurname = $('#Surname').val();
        let UserMail = $('#Mail').val();
        let UserPass = $('#Password').val();
        let UserAdmin = GetCheckboxValue();

        if (Enviar(UserName, UserSurname, UserMail, UserPass)) {
            var parametros = {
                "Name": UserName,
                "Surname": UserSurname,
                "Mail": UserMail,
                "Pass": UserPass,
                "UserAdmin": UserAdmin,
                "From": "Admin"
            }
            $.ajax({
                url: './php/script/AltaUsuario.php',
                type: 'POST',
                data: parametros,
                success: function(resp) {

                    switch (resp.trim()) {
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
                                    reloadTable
                                }
                            })
                            break;
                        case "Usuario registrado con exito":
                            Swal.fire({
                                type: 'question',
                                title: 'Usuario creado con exito',
                                text: '¿Desea crear otro usuario?',
                                confirmButtonText: 'Si',
                                cancelButtonText: 'No',
                                allowOutsideClick: false,
                                showCancelButton: true,
                            }).then((result) => {
                                if (result.value) {
                                    CleanRegisterInputs();
                                    // reloadTable();
                                } else {
                                    // $('#modal_add').modal('hide')
                                    reloadTable();

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
                    console.log(resp);
                }
            })
        } else {
            Swal.fire({
                type: 'error',
                title: 'Error',
                text: 'Debe completar todos los datos de manera correcta',
                allowOutsideClick: false
            }).then((result) => {
                if (result.value) {
                    CleanRegisterInputs();
                }
            })
        }



    })


    $('body').on('click', '#deleteOpc', function() {
        let Mails = [];
        $('table.datos>tbody>tr').each(function() {
            if ($(this).hasClass('selectedRow')) {
                Mails.push("'" + $(this).children().eq(3).text() + "'");
            }
        })
        if (Mails.length == 0) {
            Swal.fire({
                type: 'error',
                title: 'Error',
                text: 'Debe seleccionar por lo menos un usuario para eliminarlo',
                allowOutsideClick: false
            })
        } else {
            Delete(Mails);
        }

    })

    //#region Select
    $('body').on('click','#selectLimit',function(){
        
        let limit = $(this).val();
        var Parametros = {
            "Limit": limit
        }

        $.ajax({
            type:'POST',
            url:'./php/script/Paginacion.php',
            data: Parametros,
            success: (resp)=>{
                console.log(resp)
            }
        })
    })
    //#endregion


    //#region Edicion
    //Editar Usuario
    $('body').on('click', '.editUser', function() {

        let Name = $(this).parent().parent().children().eq(1).text();
        let Surname = $(this).parent().parent().children().eq(2).text();
        let Mail = $(this).parent().parent().children().eq(3).text();
        let Password = $(this).parent().parent().children().eq(4).text();
        let State = $(this).parent().parent().children().eq(5).text();
        let Admin = $(this).parent().parent().children().eq(6).text();

        $('#modal_edit-body>form>.form-group>#UserName').val(Name);
        $('#modal_edit-body>form>.form-group>#Surname').val(Surname);
        $('#modal_edit-body>form>.form-group>#Mail').val(Mail);
        $('#modal_edit-body>form>.form-group>#Password').val(Password);
        if (Admin == "Si") {
            $('#modal_edit-body>form>.form-group>#chk_admin').prop('checked', true);
        } else {
            $('#modal_edit-body>form>.form-group>#chk_admin').prop('checked', false);
        }

    })

    $('body').on('click', '#EditUser', function() {

            let UserName = $('#modal_edit-body>form>.form-group>#UserName').val();
            let UserSurname = $('#modal_edit-body>form>.form-group>#Surname').val();
            let UserMail = $('#modal_edit-body>form>.form-group>#Mail').val();
            let UserPass = $('#modal_edit-body>form>.form-group>#Password').val();
            let Admin = false;
            if ($('#modal_edit-body>form>.form-group>#chk_admin').is(':checked')) {
                Admin = true;
            }

            var parametros = {
                "Name": UserName,
                "Surname": UserSurname,
                "Mail": UserMail,
                "Pass": UserPass,
                "Admin": Admin
            }



            $.ajax({
                type: 'POST',
                url: './php/script/UpdateUser.php',
                data: parametros,
                success: function(resp) {

                }
            })
        })
        //#endregion


    //#region Validaciones
    //Inputs
    $('body').on('blur', '#UserName', function() {
        let _this = $('#UserName');
        ValidarVacios(_this);

    })

    $('body').on('blur', '#Surname', function() {
        let _this = $('#Surname');
        ValidarVacios(_this);

    })

    $('body').on('blur', '#Mail', function() {
        let _this = $('#Mail');
        ValidarMail(_this);

    })

    $('body').on('blur', '#Password', function() {
            let _this = $('#Password');
            ValidarVacios(_this);
        })
        //#endregion

    //#region Funciones


    function ValidarVacios(_this) {
        if (_this.val().trim() == "") {
            _this.removeClass("border border-success");
            _this.removeClass("text-success");
            _this.addClass("border border-danger");
            _this.addClass("text-danger");
            _this.addClass("input-error");
        } else {
            _this.removeClass("border border-danger");
            _this.removeClass("text-danger");
            _this.addClass("border border-success");
            _this.addClass("text-success");
        }
    }

    function ValidarMail(_this) {
        let testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;

        if (testEmail.test(_this.val()) && _this.val().trim != "") {
            _this.removeClass("border border-danger");
            _this.removeClass("text-danger");
            _this.addClass("border border-success");
            _this.addClass("text-success");
        } else {
            _this.removeClass("border border-success");
            _this.removeClass("text-success");
            _this.addClass("border border-danger");
            _this.addClass("text-danger");
            _this.addClass("input-error");
        }
    }

    function CleanRegisterInputs() {
        $('#frm_AltaUsuario_Admin > .form-group').each(function() {
            $(this).children("input").removeClass("border border-danger");
            $(this).children("input").removeClass("border border-success");
            $(this).children('input').removeClass("text-success");
            $(this).children('input').removeClass("text-danger");
            $(this).children('input').removeClass("input-error");
            $(this).children('input').val('');
        });

        setTimeout(() => {
            $('#frm_AltaUsuario_Admin > .form-group:first > input').focus();
        }, 500);
    }

    function Enviar(UserName, UserSurname, UserMail, UserPass) {
        let testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        if (UserName.trim() != "" && UserSurname.trim() != "" && (UserMail.trim() != "" && testEmail.test(UserMail)) && UserPass.trim() != "") {
            return true;
        } else {
            return false;
        }
    }

    function GetCheckboxValue() {
        if ($('#chk_admin').is(':checked')) {
            return true;
        } else {
            return false;
        }
    }

    function Delete(mails) {
        $.ajax({
            type: 'POST',
            url: './php/script/DeleteUser.php',
            data: { mails: mails },
            success: function(resp) {
                switch (resp) {
                    case "Delete":
                        Swal.fire({
                            type: 'success',
                            title: 'Aviso',
                            text: 'Registros seleccionados eliminados con éxito',
                            allowOutsideClick: false
                        }).then((result) => {
                            if (result.value) {
                                reloadTable();
                            }
                        })
                        break;
                    default:
                        console.log(resp);
                        break;
                }
            }
        })
    }

    function reloadTable() {
        $('#admin-wrapp').load("./components/admin/customers.php");
        validateRowsInTable();
    }

    function validateRowsInTable() {
        console.log("Filas: " + $('table.datos>tbody>tr').length);
        if ($('table.datos>tbody>tr').length == 0) {
            $('table.datos').html("<h1>No hay registros en la base de datos</h1>");
        }
    }

    // #endregion



})