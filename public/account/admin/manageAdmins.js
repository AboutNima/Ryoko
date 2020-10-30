$(document).ready(function()
{
    $(document).on('submit','#add form',function(e)
    {
        e.preventDefault();
        ajaxHandler($(this)).done(function(data)
        {
            data=$.parseJSON(data)
            validationMessage(false,data.msg,data.type,data.err,'#add .validation-message')
            if(data.err==null) setTimeout(function(){location.reload()},1500)
        })
    })
    $("a[href='#edit']").click(function()
    {
        $.post('/ajax/account/admin/manageAdmins/getData',{id:$(this).attr('data-id')},function(data)
        {
            data=$.parseJSON(data)
            $("#edit input[name='data[name]']").val(data.name);
            $("#edit input[name='data[surname]']").val(data.surname);
            activePopup('#edit')
        })
    })
    $(document).on('submit','#edit form',function(e)
    {
        e.preventDefault();
        ajaxHandler($(this)).done(function(data)
        {
            data=$.parseJSON(data)
            validationMessage(false,data.msg,data.type,data.err,'#edit .validation-message')
            if(data.err==null) setTimeout(function(){location.reload()},1500)
        })
    })
    $("a[href='#resetPassword']").on('dblclick',function()
    {
        $.post('/ajax/account/admin/manageAdmins/resetPassword',{id:$(this).attr('data-id')},function(data)
        {
            data=$.parseJSON(data)
            validationMessage(true,data.msg,data.type,data.err)
        })
    })
})