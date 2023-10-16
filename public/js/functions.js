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


 // Function to update #reservationdate restrictions
 function updateReservationDateRestrictions(startDate, endDate) {
    // Set the minimum and maximum dates for #reservationdate
    $('#reservationdate').datetimepicker('minDate', startDate);
    $('#reservationdate').datetimepicker('maxDate', endDate);
}



function admitCardButton() {
    $("input[data-bootstrap-switch]").each(function() {
       $("input[data-bootstrap-switch]").each(function() {
        $(this).bootstrapSwitch({
        'state':$(this).prop('checked'),
        'onSwitchChange': function(event, state){
        element = $(this);
        var userid = $(this).attr("data-req-id");
        Swal.fire({
            title: 'Are you sure?',
            text: "You will be able to revert this!!",
            icon: 'warning', // Use 'icon' instead of 'type'
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.value) {
                $(".dataTables_processing").show();
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    },
                    url: 'admitcardupdate',
                    data: {
                        id: userid,
                        state : state
                    },
                    dataType: 'json',
                    success: function (data) {
                        $(".dataTables_processing").hide();
                        toastr.success(data.msg);
                        sessiontable.ajax.reload();
                    },
                    error: function (xhr) {
                        $(".dataTables_processing").hide();
                        toastr.error(xhr.responseJSON.msg);
                    }
                });
            }
            else
            {
                $(this).bootstrapSwitch('state',!state, true);
            }
        });
        },
        })
    });
    });
}

function setExamDate(id,examdate,examstarttime,examendtime,url,type)
{
    Swal.fire({
        title: 'Set Exam Date And Time',
        html: `
            <div class="bootstrap-datepicker">
                <div class="form-group">
                    <label>Exam Date</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" value="${examdate}"/>
                    </div>
                </div>
            </div>
            <div class="bootstrap-timepicker">
                <div class="form-group">
                    <label>Exam Start Time</label>
                    <div class="input-group date" id="starttimepicker" data-target-input="nearest">
                        <div class="input-group-append" data-target="#starttimepicker" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                        </div>
                        <input type="text" class="form-control datetimepicker-input" data-target="#starttimepicker" value="${examstarttime}"/>
                    </div>
                </div>
                <div class="form-group">
                    <label>Exam End Time</label>
                    <div class="input-group date" id="endtimepicker" data-target-input="nearest">
                        <div class="input-group-append" data-target="#endtimepicker" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                        </div>
                        <input type="text" class="form-control datetimepicker-input" data-target="#endtimepicker" value="${examendtime}"/>
                    </div>
                </div>
            </div>
        `,
        didOpen: function () {
            // Initialize the date and time pickers
            $('#reservationdate').datetimepicker({
                format: 'L'
            });
            $('#starttimepicker').datetimepicker({
                format: 'LT'
            });
            $('#endtimepicker').datetimepicker({
                format: 'LT'
            });
        },
        showCancelButton: true,
        confirmButtonText: 'Submit',
        preConfirm: () => {
            const selectedDate = $('#reservationdate').data('datetimepicker').date();
            const selectedStartTime = $('#starttimepicker').data('datetimepicker').date();
            const selectedEndTime = $('#endtimepicker').data('datetimepicker').date();
    
            if (!selectedDate || !selectedStartTime || !selectedEndTime) {
                Swal.showValidationMessage(`Please select a valid date and time.`);
            }
    
            return {
                date: selectedDate.format('L'),
                startTime: selectedStartTime.format('LT'),
                endTime: selectedEndTime.format('LT')
            };
        }
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: url,
                data: {
                    examdate : result.value.date,
                    examstarttime : result.value.startTime,
                    examendtime : result.value.endTime,
                    id : id
                },
                dataType: "json",
                success: function (data) {
                    (type == "state") ? statetable.ajax.reload() : districttable.ajax.reload();
                    toastr.success(data.msg);
                },
                error: function (data) {
                    $(".dataTables_processing").hide();
                    toastr.error(data.responseJSON.msg);
                },
            });
        }
        else
        {
            $(".dataTables_processing").hide();
        }
    });   
}