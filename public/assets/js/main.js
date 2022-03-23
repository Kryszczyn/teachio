/*
const __init__ = () =>{
    const container = $('.container');
    //....
}
*/
const loadMenu = () => {
    //TEST
    $.ajax({
        method: "POST",
        url: "./../teachio_service.php",
        data: 'type=TEST',
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
$(document).ready(function(){
    /* FUNCTIONS ON LOAD */
    //__init__();
    loadMenu();

    /* AJAX REQUESTS */


})