/************************************************
 * TABLE OF CONTENTS
 ************************************************
 * 1. Hide and Show Elements
 * 2. Select2 Initialization
 * 3. Initializations and Checks
 * 4. Input Calculations
 * 5. Checkbox and Radio Button Actions
 * 6. File Upload Handling
 * 7. Navigation and Step Controls
 * 8. AJAX Requests
 * 9. Event Listeners
 ************************************************/

$(document).ready(function () {

    $(".alert").delay(8000)
        .slideUp(200, function () {
            $(this).alert("close");
        });

    $('#reservation').daterangepicker({
        autoUpdateInput: false
    });

    $('#reservationdate').datetimepicker({
        format: 'L',
        useCurrent: false, // Disable auto-updating
    });

    // Initialize a variable to keep track of whether #reservation has been selected
    var reservationSelected = false;

    if ($('#reservation').length) {
        // Set initial restrictions on page load if a date range is already selected
        var initialStartDate = $('#reservation').data('daterangepicker').startDate.format('MM/DD/YYYY');
        var initialEndDate = $('#reservation').data('daterangepicker').endDate.format('MM/DD/YYYY');
        updateReservationDateRestrictions(initialStartDate, initialEndDate);

        if ($('#reservation').val() !== '') {
            reservationSelected = true;
        }
    }


    // Disable the #reservationdate input initially
    $('#reservationdate').prop('disabled', true);

    // Hide the element with ID "categorycertificate"
    $("#categorycertificate").hide();

    // Initialize the "class" select input as a Select2 element with tags option
    $("#class").select2({
        tags: true
    });

    // Check if an element with ID "state-dropdown" exists and has a selected value
    if ($("#state-dropdown").length && $("#state-dropdown :selected").val().length) {
        var stateCode = $("#state-dropdown :selected").val();
        getdistricts(stateCode);
    }

    // Handle checkbox with ID "physicallychallengedyes" when it is checked
    if ($("#physicallychallengedyes").is(":checked")) {
        updateFee("physicallychallenged");
    } else if ($("#category").length && $("#category :selected").val().length) {
        updateFee($("#category :selected").val());
    }


    // Calculate and display percentage when inputs with class "marks-input" change
    $('.marks-input').on('input', function () {
        const obtainedMarks = parseFloat($('#class_marks').val());
        const maxMarks = parseFloat($('#class_max_marks').val());

        if (!isNaN(obtainedMarks) && !isNaN(maxMarks) && maxMarks !== 0) {
            const percentage = (obtainedMarks / maxMarks) * 100;
            $('#class_percentage').val(percentage.toFixed(2));
        } else {
            $('#class_percentage').val('0');
        }
    });

    // Handle checkbox with ID "ctl00_ContentPlaceHolder1_chkboxCopyAddress" click event
    $("#ctl00_ContentPlaceHolder1_chkboxCopyAddress").click(function (e) {
        if ($(this).is(":checked")) {
            $("#paddress").val($("#caddress").val());
        } else {
            $("#paddress").val();
        }
    });

    // Handle radio buttons with name "disqualified/suspended" click event
    $("[name='disqualified/suspended']").click(function (e) {
        if ($(this).is(":checked") && $(this).attr("value") == "yes") {
            $("#details").attr("disabled", false);
        } else {
            $("#details").val("");
            $("#details").attr("disabled", true);
        }
    });

    // Handle file input change event for "sign_photo"
    $("#sign_photo").change(function (e) {
        // Get the selected file
        var file = e.target.files[0];

        if (file) {
            var fileSizeKB = file.size / 1024;
            if (fileSizeKB > 20) {
                alert("File size exceeds 20KB");
                $(this).val("");
                $("#sign_photo_perview").attr("src", "http://placehold.it/180");
            } else {
                const reader = new FileReader();
                reader.onload = function (event) {
                    const profilePhotoPreview = document.getElementById("sign_photo_perview");
                    profilePhotoPreview.src = event.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    });

    // Handle file input change event for "profile_photo"
    $("#profile_photo").change(function (e) {
        var file = e.target.files[0];

        if (file) {
            var fileSizeKB = file.size / 1024;
            if (fileSizeKB > 20) {
                alert("File size exceeds 20KB");
                $(this).val("");
                $("#profile_photo_perview").attr("src", "http://placehold.it/180");
            } else {
                const reader = new FileReader();
                reader.onload = function (event) {
                    const profilePhotoPreview = document.getElementById("profile_photo_perview");
                    profilePhotoPreview.src = event.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    });

    // Handle "backstep" button clicks for navigating between steps
    $("#backstep1").click(function () {
        $("#tab1").trigger("click");
    });
    $("#backstep2").click(function () {
        $("#tab2").trigger("click");
    });
    $("#backstep3").click(function () {
        $("#tab3").trigger("click");
    });

    // Handle "savestep3" button click event
    $(document).on("click", "#savestep3", function () {
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
                    // Disable previous tabs and add lock icons, enable the next tab
                    $("#tab1").attr("disabled", true);
                    $("#tab2").attr("disabled", true);
                    $("#tab3").attr("disabled", true);
                    $("#tab4").attr("disabled", true);
                    $('[for="tab1"]').append(`<i class="fa fa-lock" aria-hidden="true"></i>`);
                    $('[for="tab2"]').append(`<i class="fa fa-lock" aria-hidden="true"></i>`);
                    $('[for="tab3"]').append(`<i class="fa fa-lock" aria-hidden="true"></i>`);
                    $('[for="tab4"]').append(`<i class="fa fa-lock" aria-hidden="true"></i>`);
                    $("#tab5").attr("disabled", false);
                    $("#tab5").trigger("click");
                    $('[for="tab5"]').find("[data-icon='lock']").remove();
                    $("#payment_step").removeClass("btn-secondary");
                    $("#payment_step").addClass("btn-success");
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                    toastr.success(result.message);
                } else {
                    toastr.error(result.message);
                }
            },
            error: function (xhr, status, error) {
                toastr.error(xhr.responseJSON.message);
            },
        });
    });

    // Handle "submitapplication" button click event
    $(document).on("click", "#submitapplication", function (e) {
        e.preventDefault();
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
                    toastr.success(result.message);
                }
            },
            error: function (xhr, status, error) {
                toastr.error(xhr.responseJSON.message);
            },
        });
    });

    // Handle radio buttons with name "physicallychallenged" change event
    $("input[name='physicallychallenged']").change(function (e) {
        var physicallyChallengedValue = $(this).val();
        if (physicallyChallengedValue === "yes") {
            updateFee("physicallychallenged");
            $("#proofofdocuments").show();
            $("#fee").show();
        } else {
            $("#proofofdocuments").hide();
            if ($("#category :selected").val().length) {
                updateFee($("#category :selected").val());
            } else {
                $("#fee").html('');
            }
        }
    });

    // Handle select input with name "category" change event
    $("select[name='category']").change(function (e) {
        var selectedValue = $(this).val();

        if (selectedValue === "OBC" || selectedValue === "SC" || selectedValue === "ST") {
            $("#categorycertificate").show();
        } else {
            $("#categorycertificate").hide();
        }
    });

    // Handle change event for select input with ID "state-dropdown"
    $('#state-dropdown').on('change', function () {
        let stateCode = this.value;
        getdistricts(stateCode);
    });

    // Initialize the "subjects" select input as a Select2 element with multiple selection
    $("#subjects").select2({
        multiple: true
    });

    // Handle change event for select input with ID "category"
    $('#category').on('change', function () {
        if ($(this).val().length && $("#physicallychallengedno").is(":checked")) {
            updateFee($(this).val());
        } else if (!$(this).val().length) {
            $("#fee").html('');
        }
    });

    // Handle click event for the Razorpay payment button
    $("#rzp-button1").on("click", function (e) {
        e.preventDefault();
        var dynamicOptions = getDynamicOptions(); // Get the dynamic options
        var rzp = new Razorpay(dynamicOptions); // Initialize the Razorpay payment button with dynamic options
        rzp.open(); // Open the payment modal
        rzp.on('payment.failed', function (response) {
            $.ajax({
                type: 'POST',
                url: $("#payment").data("failurepaymenturl"),
                dataType: "json",
                data: JSON.stringify(response), // Convert the response object to JSON format
                contentType: "application/json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (result) { },
                error: function (xhr, status, error) {
                    // Handle errors, if any, during the Ajax request
                    // You can display an error message or take appropriate action
                }
            });
        });
    });


    /*** add active class and stay opened when selected ***/
    var url = window.location;

    // for sidebar menu entirely but not cover treeview
    $('ul.nav-sidebar a').filter(function () {
        if (this.href) {
            return this.href == url || url.href.indexOf(this.href) == 0;
        }
    }).addClass('active');

    // for the treeview
    $("ul.nav-treeview a").removeClass("active");

    $("ul.nav-treeview a").each(function () {
        if (this.href && this.href == url) {
            $(this).addClass('active');
            $(this).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active')
        }
    });

    // Add an event listener for when the date range changes in #reservation
    $('#reservation').on('apply.daterangepicker', function (ev, picker) {
        // Get the selected start and end dates
        var startDate = picker.startDate.format('MM/DD/YYYY');
        var endDate = picker.endDate.format('MM/DD/YYYY');

        // Update the value of #reservation input
        $(this).val(startDate + ' - ' + endDate);

        // Update #reservationdate restrictions
        updateReservationDateRestrictions(startDate, endDate);

        // Set the reservationSelected variable to true
        reservationSelected = true;
    });

    // Add a click event to the #reservationdate input
    $('#reservationdate').on('click', function () {
        // Check if #reservation has been selected
        if (!reservationSelected) {
            alert('Please select session duration first.');
            return;
        }

        $(this).datetimepicker('show');
    });




});
