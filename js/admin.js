$( document ).ready(function() {
    
    $('body').on('click','#sidebar > .list-group > li',function(){

        $('#sidebar > .list-group > li').each(function(){
            $(this).removeClass('sidebar-active');
        });
        $(this).addClass('sidebar-active');
    })

})