class Modal{
    constructor(obj, openBtn)
    {
        this.obj = obj;
        this.openBtn = openBtn;
        this.refresh = $(this.openBtn).data('refresh');
        this.type = $(this.openBtn).data('type');
        this.values = $(this.openBtn).data('values');
        this.itemDataValues = {};
        this.updateRequest = '';
        this.updateId = '';
        this.resultData = undefined;
    }

    openModal(){
        let that = this;
        let modalContent = this.obj;
        $.ajax({
            method: "POST",
            url: "./../modal_service.php",
            data: 'type='+this.type+this.values,
            type: 'json',
            success:function(data) {
                let obj = JSON.parse(data);
                that.updateRequest = obj.update;
                that.updateId = obj.id;
                $(modalContent).html(obj.html);
            },
            error:function() {},
            complete:function() {},
        }).done(function(){
            that.itemDataValues.select = $(modalContent).find('select');
            that.itemDataValues.inputText = $(modalContent).find('input[type="text"]');
            that.itemDataValues.textarea = $(modalContent).find('textarea');
            that.itemDataValues.inputCheckbox = $(modalContent).find('input[type="checkbox"]');
            that.itemDataValues.inputRadio = $(modalContent).find('input[type="radio"]');
            that.itemDataValues.inputDateTime = $(modalContent).find('input[type="datetime-local"]');
            that.itemDataValues.inputDate = $(modalContent).find('input[type="date"]');
            
            $(modalContent).find('.modal-accept').on('click', function(){
                that.getModalData()
            });
        });
    }
    
    getModalData(){
        let resultData = {};
        let temp = 0;
        for(let key in this.itemDataValues)
        {
            if(this.itemDataValues[key].length > 0)
            {
                if($(this.itemDataValues[key]).is('select')){
                    $(this.itemDataValues[key]).each(function(){
                        resultData[temp] = {
                            name: $(this).data('text'),
                            value: $(this).val()
                        }
                        temp++;
                    });
                }
                if($(this.itemDataValues[key]).prop('type') == 'text'){
                    $(this.itemDataValues[key]).each(function(){
                        resultData[temp] = {
                            name: $(this).data('text'),
                            value: $(this).val()
                        }
                        temp++;
                    });
                }
                if($(this.itemDataValues[key]).prop('type') == 'textarea'){
                    $(this.itemDataValues[key]).each(function(){
                        resultData[temp] = {
                            name: $(this).data('text'),
                            value: $(this).val()
                        }
                        temp++;
                    });
                }
                if($(this.itemDataValues[key]).prop('type') == 'checkbox'){
                    $(this.itemDataValues[key]).each(function(){
                        resultData[temp] = {
                            name: $(this).data('text'),
                            value: $(this).is(':checked')
                        }
                        temp++;
                    });
                }
                if($(this.itemDataValues[key]).prop('type') == 'radio'){
                    $(this.itemDataValues[key]).each(function(){
                        resultData[temp] = {
                            name: $(this).data('text'),
                            value: $(this).is(':checked')
                        }
                        temp++;
                    });
                }
                if($(this.itemDataValues[key]).prop('type') == 'datetime-local'){
                    $(this.itemDataValues[key]).each(function(){
                        resultData[temp] = {
                            name: $(this).data('text'),
                            value: $(this).val()
                        }
                        temp++;
                    });
                }
                if($(this.itemDataValues[key]).prop('type') == 'date'){
                    $(this.itemDataValues[key]).each(function(){
                        resultData[temp] = {
                            name: $(this).data('text'),
                            value: $(this).val()
                        }
                        temp++;
                    });
                }
            }
            else continue;
        }
        this.resultData = resultData;
        this.updateModal();
    }
    updateModal(){
        let that = this;
        let dataObj = that.resultData;
        let str = '';
        for(let key in dataObj){
            str += dataObj[key].name+'='+dataObj[key].value+'&';
        }
        str = str.slice(0,-1);
        $.ajax({
            method: "POST",
            url: "./../modal_service.php",
            data: 'type='+that.updateRequest+'&'+str+'&id='+that.updateId,
            success:function(data) {
                let obj = JSON.parse(data);
                if(obj.res == false)
                {
                    $.notify(obj.html, "error");
                }else
                {
                    this.refresh = true;
                }
            },
            error:function() {},
            complete:function() {
                if(this.refresh == 1){
                    delete this
                    location.reload();
                }
            }
        });
    }
}

export default Modal;