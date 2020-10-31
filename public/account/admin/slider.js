$(document).ready(function()
{
    $(document).on('submit','#add form',function(e)
    {
        e.preventDefault();
        ajaxHandler($(this)).done(function(data)
        {
            data=$.parseJSON(data)
            validationMessage(false,data.msg,data.type,data.err,'#add .validation-message')
            if(data.err==null) setTimeout(function(){
                location.reload()
            },1500)
        })
    })

    $("a[href='#edit']").click(function(){
        $.post('/ajax/account/admin/slider/getData',{id:$(this).attr('data-id')},function(data){
            data=$.parseJSON(data)[0]
            $("#edit input[name='data[title]']").val(data.title);
            $("#edit input[name='data[description]']").val(data.description);
            activePopup('#edit')
        })
    })
    $(document).on('submit','#edit form',function(e)
    {
        e.preventDefault();
        ajaxHandler($(this),false).done(function(data)
        {
            ajaxT.html(data)
            data=$.parseJSON(data)
            validationMessage(false,data.msg,data.type,data.err,'#edit .validation-message')
            if(data.err==null) setTimeout(function(){location.reload()},1500)
        })
    })
    $("a[href='#delete']").on('dblclick',function()
    {
        $.post('/ajax/account/admin/slider/delete',{id:$(this).attr('data-id')},function(data)
        {
            data=$.parseJSON(data)
            validationMessage(false,data.msg,data.type,data.err)
            if(data.err==null) setTimeout(function(){location.reload()},1500)
        })
    })
    $("a[href='#status']").on('dblclick',function()
    {
        $.post('/ajax/account/admin/slider/status',{id:$(this).attr('data-id')},function(data)
        {
            data=$.parseJSON(data)
            validationMessage(false,data.msg,data.type,data.err)
            if(data.err==null) setTimeout(function(){location.reload()},1500)
        })
    })
})