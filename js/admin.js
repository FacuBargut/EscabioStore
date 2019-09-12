$( document ).ready(function() {
    
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

    $('body').on('click','.datos>tbody>tr>td>input',function(){
    	if ($(this).is(':checked')){
    		$(this).parent().parent().addClass('selectedRow');	
    	}else{
    		$(this).parent().parent().removeClass('selectedRow');	
    	}
	})
	





	$('body').on('click','#AddNew',function(){
		setTimeout(function(){
			$('.modal-body>form>.form-group:first>input').focus();
		  }, 500);




	})

	


	


})
