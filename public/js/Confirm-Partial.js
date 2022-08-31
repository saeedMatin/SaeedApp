$('.input-number i').hide();
$('#PhoneNumber,#CodeNumber').on('keydown', function(evt) {
    if((evt.keyCode>105||evt.keyCode<96) && (evt.keyCode>57||evt.keyCode<48)
        && evt.keyCode!=8 && evt.keyCode!=9
        && evt.keyCode!=13 && evt.keyCode!=46
        && evt.keyCode!=37 && evt.keyCode!=39)
    {
        return false;
    }
});
$('#CodeNumber').on('keyup', function() {

    if($('#CodeNumber').val().length==5)
    {
        $('#btn_confirm').removeAttr('disabled');
        $('#btn_confirm').click();
    }
    else{
        $('#btn_confirm').attr('disabled','disabled');
        $('#error_li').html("");
    }
});
$('#btn_next').click(startTimer());
$('#timer').text(60);

function startTimer() {
    var presentTime = $('#timer').text();
    var s = checkSecond((presentTime - 1));
    $('#timer').text(s);
    setTimeout(startTimer, 1000);
}

function checkSecond(sec) {
    if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
    if(sec==0)
    {
        $('.form-label.lable').remove();
        $('#timer_div').append( '<a href="javascript:void(0) " onClick="Resend()">ارسال مجدد</a>' );
    }
    return sec;
}
function Resend(){
    location.reload();
}


$('#btn_confirm').click(function ()
{
    var data= {
        "CodeNumber": $('#CodeNumber').val(),
        "_token": $('input[name="_token"]').val()
    }
    $.ajax({
        url: 'confirm',
        type: 'POST',
        data: data
    }).fail(function (sender, message, details) {
        var E=sender.responseJSON.errors.CodeNumber;
        var Errors='';
        E.forEach(element => {
            Errors +='<span class="right error">' + element + '</span><br>';
        });
        $('#error_li').html(Errors);
    }).done(function (result) {
        window.location='/login/success';
    });
});
