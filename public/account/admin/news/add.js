$(document).ready(function(){
    $(document).on('submit','form',function(e)
    {
        e.preventDefault();
        ajaxHandler($(this)).done(function(data)
        {
            data=$.parseJSON(data)
            validationMessage(false,data.msg,data.type,data.err,'.validation-message')
            if(data.err==null) setTimeout(function(){
                location.reload()
            },1500)
        })
    })

    $("input.date-picker").pDatepicker({
        minDate: new persianDate().valueOf(),
        format: 'YYYY/MM/DD',
        autoClose: true,
        toolbox:{
            enabled: false
        }
    });
    CKEDITOR.replace('description');
    $('input[name="data[title]"]').keyup(function(){
       $('input[name="data[link]"]').val($(this).val().split(' ').join('-'))
    });
})