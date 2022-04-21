class Modal{
    constructor(obj, openBtn)
    {
        this.obj = obj;
        this.openBtn = openBtn;
    }

    modalOptions(){
        this.refresh = $(this.openBtn).data('refresh');
        this.type = $(this.openBtn).data('type');
        this.values = $(this.openBtn).data('values');
        this.itemDataValues = {};
    }

    openModal(){
        let that = this;
        let modalContent = this.obj;
        $.ajax({
            method: "POST",
            url: "./../modal_service.php",
            data: 'type='+this.type+'&values='+this.values,
            type: 'json',
            success:function(data) {
                $(modalContent).html(JSON.parse(data));
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
            that.getModalData();
        });
    }
    //!do Przerobienia aby jQ łapało modala jako obiekt
    getModalData(){
        let resultData = {};
        for(let key in this.itemDataValues)
        {
            if(this.itemDataValues[key].length > 0)
            {
                //console.log($(this.itemDataValues[key]).prop('type') );
                switch($(this.itemDataValues[key]).prop('type')){
                    case 'select':
                        resultData[key] = {
                            name:$(this.itemDataValues[key].select).data('text'),
                            value:$(this.itemDataValues[key].select).val(),
                        }
                        break;
                    case 'text':
                        resultData[key] = {
                            name:$(this.itemDataValues[key].inputText).data('text'),
                            value:$(this.itemDataValues[key].inputText).val(),
                        }
                        break;
                    case 'textarea':
                        resultData[key] = {
                            name:$(this.itemDataValues[key].textarea).data('text'),
                            value:$(this.itemDataValues[key].textarea).val(),
                        }
                        break;
                    case 'checkbox':
                        resultData[key] = {
                            name:$(this.itemDataValues[key].inputCheckbox).data('text'),
                            value: $(this.itemDataValues[key].inputCheckbox).prop('checked', true) ? this.itemDataValues[key].inputCheckbox.val() : '',
                        }
                        break;
                    case 'radio':
                        resultData[key] = {
                            name:$(this.itemDataValues[key].inputRadio).data('text'),
                            value: $(this.itemDataValues[key].inputRadio).prop('checked', true) ? this.itemDataValues[key].inputRadio.val() : '',
                        }
                        break;
                    case 'datetime-local':
                        resultData[key] = {
                            name:$(this.itemDataValues[key].inputDateTime).data('text'),
                            value: $(this.itemDataValues[key].inputDateTime).val()
                        }
                        break;
                    case 'date':
                        resultData[key] = {
                            name:$(this.itemDataValues[key].inputDate).data('text'),
                            value: $(this.itemDataValues[key].inputDate).val()
                        }
                        break;
                    default:
                        break;
                }
            }
            else continue;
        }
        
        console.log(resultData);
    }
    //updateModal(){}
}

export default Modal;