function validateFileSize() {
    var fileInput = document.getElementById("fileInput");
    var file = fileInput.files[0];

    // Check if a file is selected
    if (!file) {
        alert("Please select a file.");
        return;
    }

    // Define the maximum file size in bytes (e.g., 2MB)
    var maxSizeBytes = 2 * 1024 * 1024; // 2MB

    // Check if the file size exceeds the maximum allowed size
    if (file.size > maxSizeBytes) {
        alert("File size exceeds the allowed limit of 2MB.");
        return;
    }

    // If the file size is valid, you can proceed with the upload process here.
    // For example:
    // uploadFile(file);
    alert("File uploaded successfully!");
}

function updateFee(feetype) {
    $.ajax({
        url: "get-fee/" + feetype,
        method: "GET",
        success: function (response) {
            if (response.fee) {
                $("#fee").html("Rs. " + response.fee);
            }
        },
        error: function () {
            // Handle errors if needed
        },
    });
}

// Function to calculate and update the percentage
function calculatePercentage() {
    const obtainedMarks = parseFloat($("#class_marks").val());
    const maxMarks = parseFloat($("#class_max_marks").val());

    if (!isNaN(obtainedMarks) && !isNaN(maxMarks) && maxMarks !== 0) {
        const percentage = (obtainedMarks / maxMarks) * 100;
        $("#class_percentage").val(percentage.toFixed(2) + "%");
    } else {
        $("#class_percentage").val("");
    }
}

function getdistricts(stateCode) {
    $.ajax({
        url: "districtslist",
        type: "POST",
        data: "stateCode=" + stateCode,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (result) {
            $("#district-dropdown").html(result);
        },
    });
}

// Define a function to generate dynamic options
function getDynamicOptions() {
    var dynamicOptions = {
        key: $("#payment").data("razorpaykey"),
        amount: $("#payment").data("fee"),
        currency: "INR",
        name: "Scholarship",
        description: "Test Transaction",
        image: "https://example.com/your_logo",
        handler: function (response) {
            // Payment was successful, continue with your success handling
            $.ajax({
                type: "POST",
                url: $("#payment").data("paymenturl"),
                dataType: "json",
                data: JSON.stringify(response),
                contentType: "application/json",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (result) {
                    if (result.hasOwnProperty("message")) {
                        // Handle the success response from the server here
                        $("#tab6").attr("disabled", false);
                        $("#tab6").trigger("click");
                        $('[for="tab6"]').find("[data-icon='lock']").remove();

                        $("#tab5").attr("disabled", true);
                        $('[for="tab5"]').append(
                            `<i class="fa fa-lock" aria-hidden="true"></i>`
                        );

                        $("#submit_information_form").removeClass(
                            "btn-secondary"
                        );
                        $("#submit_information_form").addClass("btn-success");
                        $("li.tabend").remove();
                        $("li.tab-content-last").after(result.html);
                        toastr.success(result.message);
                    }
                },
                error: function (xhr, status, error) {
                    // Handle errors, if any, during the Ajax request
                },
            });
        },
        prefill: {
            name: $("#payment").data("username"),
            email: $("#payment").data("email"),
            contact: $("#payment").data("contact"),
        },
        theme: {
            color: "#3399cc",
        },
    };
    return dynamicOptions;
}
