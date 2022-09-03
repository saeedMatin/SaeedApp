var clear=false;
//Phone number entry page
$('#error_li').hide();
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


$('#PhoneNumber').on('keyup', function() {
    if ($('#PhoneNumber').val().length == 0)
    {
        $('.input-number i').hide();
    }
    else
    {
        $('.input-number i').show();
        if(formatPhoneNumber($('#PhoneNumber').val()))
        {
            PhoneValidate(1);
        }
        else
        {
        $('#btn_next').attr('disabled','disabled');
            if($('#PhoneNumber').val().length==11)
            {
                $('#error_li').text("شماره وارد شده صحیح نمیباشد.");
                PhoneValidate(0);
            }
            else
            {
                PhoneValidate(-1)
            }
        }
    }
});
$(document).mousedown(function (event) {
    var specificDiv = $(".input-number i");
    if (specificDiv.is(event.target))
        clear=true;
});
$('#PhoneNumber').on('blur', function() {
    if(formatPhoneNumber($('#PhoneNumber').val()))
    {
        PhoneValidate(1);
    }
    else
    {
        if (clear==false)
        {
            $('#btn_next').attr('disabled', 'disabled');
            $('.fa-backspace').removeAttr('disabled');
            if ($('#PhoneNumber').val().length != 0) {
                $('#error_li').text("شماره موبایل باید 11 رقم باشد");
                PhoneValidate(0);
            }
        }

    }
});
 $('.input-number i').click(function(){
    $('#PhoneNumber').val(null);
    PhoneValidate(-1);
    $('.input-number i').hide();
    clear = false;
 });
function formatPhoneNumber(phoneNumberString) {
    var cleaned = ('' + phoneNumberString).replace(/\D/g, '');
    var match = cleaned.match(/^09(0[0-5]{1}|1[0-9]{1}|2[0-2]{1}|3(0|[3-9]{1})|98|99)\d{7}$/);
    if (match) {
         return true;
    }
    return false;
}
function PhoneValidate(res)
{
    switch (res) {
        case 1://isValid
            $('#PhoneNumber').addClass("validate-success");
            $('#PhoneNumber').removeClass("validate-failed");
            $('#btn_next').removeAttr('disabled');
            $('#error_li').hide();
            $('#validate_ul').hide();
            //$('.input-number i').hide();
            $('#error_li').text("");
            break;
        case 0:// invalid
            $('#PhoneNumber').addClass("validate-failed");
            $('#PhoneNumber').removeClass("validate-success");
            $('#error_li').show();
            $('#validate_ul').hide();
            $('.input-number i').show();
            $('#btn_next').attr('disabled','disabled');
            break;
        default://not complete (les than 11 characters)
            $('#PhoneNumber').removeClass("validate-failed");
            $('#PhoneNumber').removeClass("validate-success");
            $('#error_li').hide();
            $('#error_li').text("");
            $('#validate_ul').hide();
            // $('.input-number i').hide();
            $('#btn_next').attr('disabled','disabled');
            break;
    }
}
