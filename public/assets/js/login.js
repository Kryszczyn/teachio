jQuery(function(){
    let typeButton = $('.login_type');
    let loginInput = $('.login_input');
    let pwdInput = $('.pwd_input');
    let loginBtn = $('.login_btn');
    let type = "";

    $(typeButton).on('click', function(){
        $(typeButton).removeClass('text-white');       
        $(typeButton).removeClass('bg-primary');
        $(this).addClass('text-white');
        $(this).addClass('bg-primary');
        type = $(this).data('usertype');
        checkType(type);
    });

    $(loginBtn).on('click', function(){
        let loginData = $(loginInput).val();
        let pwdData = $(pwdInput).val();
        if(loginData.length <= 0)
        {
            $.notify('Podaj email', 'error')
            return 0;
        }
        if(pwdData.length <= 0)
        {
            $.notify('Podaj hasło', 'error')
            return 0;
        }
        $.ajax({
            method: "POST",
            url: "./teachio_service.php",
            data: 'type=LOGIN&email='+loginData+'&password='+pwdData+'&type_user='+type,
            success:function(data)
            {
                if(data != 1)
                {
                    $.notify('Podano przez Ciebie konto nie istnieje', 'error');
                }
                else
                {
                    window.location.reload(true)
                }
            },
            error:function(data){
                console.log(data)
            },
            complete:function() {}
        })
    });

    const checkType = type => {
        if(type.length > 0)
        {
            $(loginInput).prop('disabled', false);
            $(pwdInput).prop('disabled', false);
            $(loginBtn).prop('disabled', false);
        }
    }

})