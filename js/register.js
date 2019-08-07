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
            // alert();
            $('#name_register').focus();
        }, 100);
        
    })

});