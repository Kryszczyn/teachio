const loadMenu = () => {
    //TEST
    $.ajax({
        method: "POST",
        url: "./../teachio_service.php",
        data: 'type=WELCOME',
        success:function( data ) 
        {
            $('.container').html(data);
        },
        error:function( data ) {
            console.log(data)
        },
        complete:function() {}
    })
}
$(function(){
    loadMenu();
})