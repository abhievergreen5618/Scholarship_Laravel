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

    $("#sign_photo").change(function (e) {
        // Get the selected file
        var file = e.target.files[0];

        // Check if a file is selected
        if (file) {
            // Check the file size in KB
            var fileSizeKB = file.size / 1024;
            if (fileSizeKB > 20) {
                // File size exceeds 20KB, do something (e.g., show an error message)
                console.log("File size exceeds 20KB");
                // You can show an error message to the user or handle the case accordingly
            } else {
                // File size is within the limit, proceed with your logic
                console.log("File size is within the limit");
                // You can proceed with your logic here, e.g., upload the file or process it further
            }
        }
    });
    $("#profile_photo").change(function (e) {
        // Get the selected file
        var file = e.target.files[0];

        // Check if a file is selected
        if (file) {
            // Check the file size in KB
            var fileSizeKB = file.size / 1024;
            if (fileSizeKB > 20) {
                // File size exceeds 20KB, do something (e.g., show an error message)
                console.log("File size exceeds 20KB");
                // You can show an error message to the user or handle the case accordingly
            } else {
                // File size is within the limit, proceed with your logic
                console.log("File size is within the limit");
                // You can proceed with your logic here, e.g., upload the file or process it further
            }
        }
    });
});
