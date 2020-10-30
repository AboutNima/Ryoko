$(document).ready(function(){
    $("a[href='#delete']").on('click',function()
    {
        $.post('/ajax/account/admin/comments/delete',{id:$(this).attr('data-id')},function(data)
        {
            data=$.parseJSON(data)
            validationMessage(false,data.msg,data.type,data.err)
            if(data.err==null) setTimeout(function(){location.replace('/account/comments/list')},1500)
        })
    })
    $("a[href='#accept']").on('click',function()
    {
        $.post('/ajax/account/admin/comments/accept',{id:$(this).attr('data-id')},function(data)
        {
            data=$.parseJSON(data)
            validationMessage(false,data.msg,data.type,data.err)
            if(data.err==null) setTimeout(function(){location.replace('/account/comments/list')},1500)
        })
    })
})