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
                alert("File size exceeds 20KB");
                $(this).val("");
                $("#sign_photo_perview").src("http://placehold.it/180");
                // You can show an error message to the user or handle the case accordingly
            } else {
                 // Create a FileReader object
                    const reader = new FileReader();

                    // Set up the FileReader's `onload` event handler
                    reader.onload = function(event) {
                    const profilePhotoPreview = document.getElementById('sign_photo_perview');
                    profilePhotoPreview.src = event.target.result;
                    };

                    // Read the file as a data URL, triggering the `onload` event when done
                    reader.readAsDataURL(file);
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
                alert("File size exceeds 20KB");
                $(this).val("");
                $("#profile_photo_perview").src("http://placehold.it/180");
            } else {
                // Create a FileReader object
                const reader = new FileReader();

                // Set up the FileReader's `onload` event handler
                reader.onload = function(event) {
                const profilePhotoPreview = document.getElementById('profile_photo_perview');
                profilePhotoPreview.src = event.target.result;
                };

                // Read the file as a data URL, triggering the `onload` event when done
                reader.readAsDataURL(file);
            }
        }
    });
});
