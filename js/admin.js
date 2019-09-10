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
})