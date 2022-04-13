const loadMenu = () => {
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
        complete:function(){}
    })
}

loadMenu();

let sidebar = $('.sidenav');
$(sidebar).attr('data-color', 'info');

$(function(){
    $('.logout').on('click', function(){
        $.ajax({
            method: "POST",
            url: "./../teachio_service.php",
            data: 'type=LOGOUT',
            success:function() {
                
            },
            error:function() {},
            complete:function() {
                location.reload();
            }
        })
        
    });
})

