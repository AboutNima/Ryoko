$(document).ready(function(){
    $(document).on('submit','form',function(e){
        e.preventDefault();
        ajaxHandler($(this)).done(function(data){
            data=$.parseJSON(data)
            validationMessage(false,data.msg,data.type,data.err,'.validation-message')
            if(data.err=null) setTimeout(function(){
                location.replace('/account/projects/list')
            },1500)
        })
    })
    CKEDITOR.replace('description')
})