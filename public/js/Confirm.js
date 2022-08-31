$(document).ready(function () {
    $.ajax({
        url: 'confirm',
        type: 'GET'
    }).fail(function (sender, message, details) {
        console.log("Sorry, something went wrong!");
        console.log(sender);
        console.log(message);
        console.log(details);
    }).done(function (result) {
        $('#div_frm').html(result);
    });
});
