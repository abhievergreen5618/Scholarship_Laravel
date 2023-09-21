$(document).ready(function () {
    $("#categorycertificate").hide();

    $("#ctl00_ContentPlaceHolder1_chkboxCopyAddress").click(function (e) {
        if ($(this).is(":checked")) {
            $("#paddress").val($("#caddress").val());
        } else {
            $("#paddress").val();
        }
    });

    $("[name='disqualified/suspended']").click(function (e) {
        if ($(this).is(":checked") && $(this).attr("value") == "yes") {
            $("#details").attr("disabled", false);
        } else {
            $("#details").val("");
            $("#details").attr("disabled", true);
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
                $("#sign_photo_perview").attr("src", "http://placehold.it/180");
                // You can show an error message to the user or handle the case accordingly
            } else {
                // Create a FileReader object
                const reader = new FileReader();

                // Set up the FileReader's `onload` event handler
                reader.onload = function (event) {
                    const profilePhotoPreview =
                        document.getElementById("sign_photo_perview");
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
                $("#profile_photo_perview").attr(
                    "src",
                    "http://placehold.it/180"
                );
            } else {
                // Create a FileReader object
                const reader = new FileReader();

                // Set up the FileReader's `onload` event handler
                reader.onload = function (event) {
                    const profilePhotoPreview = document.getElementById(
                        "profile_photo_perview"
                    );
                    profilePhotoPreview.src = event.target.result;
                };

                // Read the file as a data URL, triggering the `onload` event when done
                reader.readAsDataURL(file);
            }
        }
    });

    $("#backstep1").click(function () {
        $("#tab1").trigger("click");
    });
    $("#backstep2").click(function () {
        $("#tab2").trigger("click");
    });

    $("#savestep3").click(function () {
        toastr.options = {
            closeButton: true,
            progressBar: true,
            timeOut: 5000,
            extendedTimeOut: 2000,
            positionClass: "toast-top-right",
            preventDuplicates: true,
        };

        $.ajax({
            type: "POST",
            url: $(this).data("action"),
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (result) {
                if (result.hasOwnProperty("message")) {
                    $("#tab1").attr("disabled", true);
                    $("#tab2").attr("disabled", true);
                    $("#tab3").attr("disabled", true);
                    $('[for="tab1"]').append(
                        `<i class="fa fa-lock" aria-hidden="true"></i>`
                    );
                    $('[for="tab2"]').append(
                        `<i class="fa fa-lock" aria-hidden="true"></i>`
                    );
                    $('[for="tab3"]').append(
                        `<i class="fa fa-lock" aria-hidden="true"></i>`
                    );

                    $("#tab5").attr("disabled", false);
                    $("#tab5").trigger("click");
                    $('[for="tab5"]').find("[data-icon='lock']").remove();
                    $("#payment_step").removeClass("btn-secondary");
                    $("#payment_step").addClass("btn-success");

                    toastr.success(result.message);
                }
            },
            error: function (xhr, status, error) {
                toastr.error(xhr.responseJSON.message);
            },
        });
    });

    $("input[name='physicallychallenged']").change(function (e) {
        var physicallyChallengedValue = $(this).val();
        if (physicallyChallengedValue === "yes") {
            updateFee("physicallychallenged");
            $("#proofofdocuments").show();
            $("#fee").show();
        } else {
            $("#proofofdocuments").hide();
            console.log($("#category :selected").val().length);
            if ($("#category :selected").val().length) {
                updateFee($("#category :selected").val());
            }
            else {
                $("#fee").html('');
            }
        }
    });

    $("select[name='category']").change(function (e) {
        var selectedValue = $(this).val();

        if (selectedValue === "OBC" ||selectedValue === "SC" || selectedValue === "ST"
        ) {
            $("#categorycertificate").show();
        } else {
            $("#categorycertificate").hide();
        }
    });

    $('#state-dropdown').on('change', function () {
        let stateCode = this.value;
        $.ajax({
            url: 'districtslist',
            type: 'POST',
            data: 'stateCode=' + stateCode,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (result) {
                $('#district-dropdown').html(result)
            }
        });
    });
    $("#subjects").select2({
        multiple: true
    });

    $('#category').on('change', function () {
        if ($(this).val().length && $("#physicallychallengedno").is(":checked")) {
            updateFee($(this).val());
        }
        else if(!$(this).val().length)
        {
            $("#fee").html('');
        }
    });
});
