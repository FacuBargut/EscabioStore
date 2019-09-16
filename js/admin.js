$( document ).ready(function() {
//#region Sidebar
    $('body').on('click','#sidebar > .list-group > li',function(){

        $('#sidebar > .list-group > li').each(function(){
            $(this).removeClass('sidebar-active');
        });
        $(this).addClass('sidebar-active');

       	switch($(this).text().trim()){
       		case "Clientes":
       			$('#admin-wrapp').load("./components/admin/customers.php");
       			break;
       		case "Productos":
       			$('#admin-wrapp').load("./components/admin/products.php");
       			break;
       	}
	})
// #endregion

//#region Tabla
$('body').on('click','.datos>tbody>tr>td>input',function(){
	if ($(this).is(':checked')){
		$(this).parent().parent().addClass('selectedRow');	
	}else{
		$(this).parent().parent().removeClass('selectedRow');	
	}
})
// #endregion

$('body').on('click','#AddNew',function(){
	CleanRegisterInputs();
})



$('body').on('click','#AddUser',function(e){
	e.preventDefault();

	let UserName = $('#UserName').val();
	let UserSurname = $('#Surname').val();
	let UserMail = $('#Mail').val();
	let UserPass = $('#Password').val();
	let UserAdmin = $('#chk_admin:checked').val();
	
	if(Enviar(UserName,UserSurname,UserMail,UserPass,UserAdmin)){
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
	}else{
		console.log("Todo mal")
	}

	

})

	

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

	
function ValidarVacios(_this){
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

function ValidarMail(_this){
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

function CleanRegisterInputs(){
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

function Enviar(UserName,UserSurname,UserMail,UserPass,UserPassConfirm){
	let testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
	if (UserName.trim() != "" && UserSurname.trim() != "" && (UserMail.trim() != "" && testEmail.test(UserMail)) && UserPass.trim() != "" && UserPassConfirm != "") {
		return true;
	}else{
		return false;
	}
}
// #endregion
	


})
