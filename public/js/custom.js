$(document).ready(function () {
    $("#ctl00_ContentPlaceHolder1_chkboxCopyAddress").click(function (e) {
        if($(this).is(':checked'))
        {
            $("#paddress").val($("#caddress").val());
        }
        else
        {
            $("#paddress").val();
        }
    });
});
