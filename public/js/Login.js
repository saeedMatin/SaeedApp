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
});
$('#PhoneNumber').on('blur', function() {
    if(formatPhoneNumber($('#PhoneNumber').val()))
    {
        PhoneValidate(1);
    }
    else
    {
        $('#btn_next').attr('disabled','disabled');
        $('.fa-backspace').removeAttr('disabled');
        if($('#PhoneNumber').val().length!=0)
        {
            $('#error_li').text("شماره موبایل باید 11 رقم باشد");
            PhoneValidate(0);
        }
    }
});
 $('.input-number i').click(function(){
    $('#PhoneNumber').val(null);
    PhoneValidate(-1);
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
        case 1:
            $('#PhoneNumber').addClass("validate-success");
            $('#PhoneNumber').removeClass("validate-failed");
            $('#btn_next').removeAttr('disabled');
            $('#error_li').hide();
            $('#validate_ul').hide();
            $('.input-number i').hide();
            $('#error_li').text("");
            break;
        case 0:
            $('#PhoneNumber').addClass("validate-failed");
            $('#PhoneNumber').removeClass("validate-success");
            $('#error_li').show();
            $('#validate_ul').hide();
            $('.input-number i').show();
            $('#btn_next').attr('disabled','disabled');
            break;
        default:
            $('#PhoneNumber').removeClass("validate-failed");
            $('#PhoneNumber').removeClass("validate-success");
            $('#error_li').hide();
            $('#error_li').text("");
            $('#validate_ul').hide();
            $('.input-number i').hide();
            $('#btn_next').attr('disabled','disabled');
            break;
    }
}
//
$('#CodeNumber').on('keyup', function() {

    if($('#CodeNumber').val().length==5)
    {
       $('#btn_confirm').removeAttr('disabled');
       $('#btn_confirm').click();
    }
    else{
        $('#btn_confirm').attr('disabled','disabled');
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

//  $("#btn_confirm").click(function (e) {
//               e.preventDefault();
// //   var token = $("input[name='_token']").val();
// var token = $("meta[name='csrf-token']").attr("content");
// console.log(token );
//         $.ajax({
//             url: "/login/CheckCode",
//             type: "POST",
//              data:{CodeNumber:$('#CodeNumber').val(),
//                _token:token,
//                 },
//             dataType: "json",
//             success: function (data) {
//                 console.log('SUCCESS: ', data);
//                 // location.reload();
//                 return false;
//             },
//             error: function (data) {
//                 console.log("ERROR: ", data);
//                 // location.reload();
//                 return false;
//             },
//         });
//     });
