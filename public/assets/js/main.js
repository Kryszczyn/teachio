import Modal from './modal.js';

$(function(){
    $('.modal-open').on('click', function(){
        let modal = new Modal($('.modal-content'), $(this));
        modal.openModal();
    });
    //Logout request
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