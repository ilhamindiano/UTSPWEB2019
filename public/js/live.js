$(document).ready(function(){
    var myVar = setInterval(Refresh, 1000);
    var str ="";
    var x = $('#data').attr("data-id");
    function Send(){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type            : 'POST',
            url             : '/update',
            data            : {'body' : $('#textbox').val(),
                                'url' : x},
        }).done(function(datay){
            console.log(datay);
        });
    }
    function Refresh(){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type            : 'POST',
            url             : '/refresh',
            data            : {'url' : x},
        }).done(function(datax){
        console.log(datax);
        $("#textbox").val(datax);
        });
    }
    $("#textbox").focus(function(){
        clearInterval(myVar);
        var timeoutId=setTimeout(1000);
        $('#textbox').on('input propertychange change', function() {
            console.log('TextChange');
        
            clearTimeout(timeoutId);
            timeoutId = setTimeout(function() {
                Send();
            }, 1000);
        });
        
    })
    $('#textbox').focusout(function(){
        myVar = setInterval(Refresh, 1000);
    })
})