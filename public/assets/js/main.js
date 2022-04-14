import {mockData} from './mockData.js';
import {Calendar} from './calendar.js';
//Initialize calendar
document.addEventListener("DOMContentLoaded", async ()=>{
    const cal = Calendar('calendar');
    cal.bindData(mockData);
    cal.render();
});
//Logout request
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


