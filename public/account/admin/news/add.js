$(document).ready(function(){
    $("input.date-picker").pDatepicker({
        minDate: new persianDate().valueOf(),
        format: 'YYYY/MM/DD',
        autoClose: true,
        toolbox:{
            enabled: false
        }
    });
})