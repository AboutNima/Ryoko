$(document).ready(function(){
    $("a[href='#read']").on('dblclick',function(){
        $.post('/ajax/account/admin/contactUs/read',{id:$(this).attr('data-id')},function(data){
            data=$.parseJSON(data)
            validationMessage(false,data.msg,data.type,data.err)
            if(data.err==null) setTimeout(function(){location.reload()},1500)
        })
    })
})