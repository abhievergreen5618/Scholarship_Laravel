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

    $("#disqualified/suspendedyes").click(function (e) {
        if($(this).is(':checked'))
        {
            $("#details").attr("disabled",false);
        }
        else
        {
            $("#details").val("");
            $("#details").attr("disabled",true);
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
                $("#sign_photo_perview").attr("src","http://placehold.it/180");
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
                $("#profile_photo_perview").attr("src","http://placehold.it/180");
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

    $("#backstep1").click(function(){
        $("#tab1").trigger('click');
    });
    $("#backstep2").click(function(){
        $("#tab2").trigger('click');
    });

    $("#savestep3").click(function(){
        $.ajax({
            type: 'POST',
            url: $(this).data("action"),
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(result) {
                if(result.hasOwnProperty("message"))
                {
                    $("#tab1").attr('disabled',true);
                    $("#tab2").attr('disabled',true);
                    $('[for="tab1"]').append(`<i class="fa fa-lock" aria-hidden="true"></i>`);
                    $('[for="tab2"]').append(`<i class="fa fa-lock" aria-hidden="true"></i>`);
                    $('[for="tab3"]').append(`<i class="fa fa-lock" aria-hidden="true"></i>`);

                    $("#tab5").attr('disabled',false);
                    $("#tab5").trigger('click');
                    $('[for="tab5"]').find("[data-icon='lock']").remove();
                    $("#payment_step").removeClass("btn-secondary");
                    $("#payment_step").addClass("btn-success");
                }
            },
            error : function(xhr, status, error) {

            }
        });
    });
});
