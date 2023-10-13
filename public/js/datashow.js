$(document).ready(function () {
    //employee-list with the DataTables
    var classtable = $("#classtable").DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "classdetails",
            type: "POST",
            beforeSend: function (request) {
                request.setRequestHeader(
                    "X-CSRF-TOKEN",
                    jQuery('meta[name="csrf-token"]').attr("content")
                );
            },
        },
        columnDefs: [{ className: "dt-center", targets: "_all" }],
        columns: [
            {
                data: "class",
                defaultContent: "Not Provided",
            },
            {
                data: "description",
                defaultContent: "Not Provided",
            },
            {
                data: "subjects",
                defaultContent: "Not Provided",
            },
            {
                data: "status",
                defaultContent: "Not Provided",
            },
            {
                data: "action",
                defaultContent: "Not Provided",
            },
        ],
    });

    classtable.on("click", ".delete", function () {
        $(".datatables_processing").show();
        element = $(this);
        var userid = $(this).attr("data-id");
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    headers: {
                        "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    url: "classdelete",
                    data: {
                        id: userid,
                    },
                    dataType: "json",
                    success: function (data) {
                        classtable.ajax.reload();
                    },
                    error: function (data) {
                        // console.log(data);
                    },
                });
            }
        });
    });

    classtable.on("click", ".status", function () {
        $(".datatables_processing").show();
        element = $(this);
        var userid = $(this).attr("data-id");
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes!",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    headers: {
                        "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    url: "class-status-update",
                    data: {
                        id: userid,
                    },
                    dataType: "json",
                    success: function (data) {
                        classtable.ajax.reload();
                    },
                    error: function (data) {
                        // console.log(data);
                    },
                });
            }
        });
    });

    //---------------------------------------CLASS TABLE END---------------------------

    //----------------------------------------SUBJECT TABLE START---------------------------

    var subjecttable = $("#subjecttable").DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "subjectsdetails",
            type: "POST",
            beforeSend: function (request) {
                request.setRequestHeader(
                    "X-CSRF-TOKEN",
                    jQuery('meta[name="csrf-token"]').attr("content")
                );
            },
        },
        columnDefs: [
            { className: "dt-center", targets: "_all" },
            { visible: false, targets: [5] }, // Hide the "created_at" column
        ],
        columns: [
            {
                data: "name",
                defaultContent: "Not Provided",
            },
            {
                data: "classes",
                defaultContent: "Not Provided",
            },
            {
                data: "description",
                defaultContent: "Not Provided",
            },
            {
                data: "status",
                defaultContent: "Not Provided",
            },
            {
                data: "action",
                defaultContent: "Not Provided",
            },
            {
                data: "created_at",
            },
        ],
        order: [[5, "desc"]], // Order by the "action" column in descending order
    });

    subjecttable.on("click", ".delete", function () {
        $(".datatables_processing").show();
        element = $(this);
        var userid = $(this).attr("data-id");
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    headers: {
                        "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    url: "subjectdelete",
                    data: {
                        id: userid,
                    },
                    dataType: "json",
                    success: function (data) {
                        subjecttable.ajax.reload();
                    },
                    error: function (data) {
                        // console.log(data);
                    },
                });
            }
        });
    });

    subjecttable.on("click", ".status", function () {
        $(".datatables_processing").show();
        element = $(this);
        var userid = $(this).attr("data-id");
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes!",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    headers: {
                        "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    url: "subject-status-update",
                    data: {
                        id: userid,
                    },
                    dataType: "json",
                    success: function (data) {
                        subjecttable.ajax.reload();
                    },
                    error: function (data) {
                        // console.log(data);
                    },
                });
            }
        });
    });

    //---------------------------SUBJECT TABLE END---------------------------------------

    //----------------------------SCHOLARSHIP TABLE START--------------------------------

    var scholarshiptable = $("#scholarshiptable").DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "scholarshipdetails",
            type: "POST",
            beforeSend: function (request) {
                request.setRequestHeader(
                    "X-CSRF-TOKEN",
                    jQuery('meta[name="csrf-token"]').attr("content")
                );
            },
        },
        columnDefs: [{ scholarshipName: "dt-center", targets: "_all" }],
        columns: [
            {
                data: "name",
                defaultContent: "Not Provided",
            },
            {
                data: "description",
                defaultContent: "Not Provided",
            },
            {
                data: "status",
                defaultContent: "Not Provided",
            },
            {
                data: "action",
                defaultContent: "Not Provided",
            },
        ],
    });

    scholarshiptable.on("click", ".delete", function () {
        $(".dataTables_processing").show();
        element = $(this);
        var userid = $(this).attr("data-id");
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    headers: {
                        "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    url: "scholarshipdelete",
                    data: {
                        id: userid,
                    },
                    dataType: "json",
                    success: function (data) {
                        scholarshiptable.ajax.reload();
                    },
                    error: function (data) {
                        // console.log(data);
                    },
                });
            }
        });
    });

    scholarshiptable.on("click", ".status", function () {
        $(".datatables_processing").show();
        element = $(this);
        var userid = $(this).attr("data-id");
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes!",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    headers: {
                        "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    url: "scholarship-status-update",
                    data: {
                        id: userid,
                    },
                    dataType: "json",
                    success: function (data) {
                        scholarshiptable.ajax.reload();
                    },
                    error: function (data) {
                        // console.log(data);
                    },
                });
            }
        });
    });

    //--------------------------------------SCHOLARSHIP TYPE ENDs------------------------------------

    //-------------------------------------FEE DETAIL----------------------------------------------

    var feetable = $("#feetable").DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "feedetails",
            type: "POST",
            beforeSend: function (request) {
                request.setRequestHeader(
                    "X-CSRF-TOKEN",
                    jQuery('meta[name="csrf-token"]').attr("content")
                );
            },
        },
        columnDefs: [{ Fee: "dt-center", targets: "_all" }],
        columns: [
            {
                data: "feetype",
            },
            {
                data: "fee",
            },
            {
                data: "description",
            },
            {
                data: "status",
            },
            {
                data: "action",
            },
        ],
    });

    feetable.on("click", ".delete", function () {
        $(".dataTables_processing").show();
        element = $(this);
        var userid = $(this).attr("data-id");
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    headers: {
                        "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    url: "feedelete",
                    data: {
                        id: userid,
                    },
                    dataType: "json",
                    success: function (data) {
                        feetable.ajax.reload();
                    },
                    error: function (data) {
                        // console.log(data);
                    },
                });
            }
        });
    });

    feetable.on("click", ".status", function () {
        $(".dataTables_processing").show();
        element = $(this);
        var userid = $(this).attr("data-id");
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes!",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    headers: {
                        "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    url: "fee-status-update",
                    data: {
                        id: userid,
                    },
                    dataType: "json",
                    success: function (data) {
                        feetable.ajax.reload();
                    },
                    error: function (data) {
                        // console.log(data);
                    },
                });
            }
        });
    });
});



/**
 * Failure Payment table...
 */

var paymenttable = $("#failurepaymenttable").DataTable({
    processing: true,
    "scrollX": true,
    serverSide: true,
    ajax: {
        url: "failurepaymentdetails",
        type: "POST",
        beforeSend: function (request) {
            request.setRequestHeader(
                "X-CSRF-TOKEN",
                jQuery('meta[name="csrf-token"]').attr("content")
            );
        },
    },
    columns: [
        {
            data: "razorpay_id",
        },
        {
            data: "name",
        },
        {
            data: "email",
        },
        {
            data: "mobileno",
        },
        {
            data: "amount",
        },
        {
            data: "method",
        },
        {
            data: "description",
        },
        {
            data: "error_code",
        },
        {
            data: "error_description",
        },
        {
            data: "error_source",
        },
        {
            data: "error_step",
        },
        {
            data: "error_reason",
        },
        {
            data: "payment_created_at",
        },
        {
            data: "status",
        },
        {
            data: "action",
        },
    ],
});


/**
 * Success Payment table...
 */


var paymenttable = $("#successpaymenttable").DataTable({
    processing: true,
    "scrollX": true,
    serverSide: true,
    ajax: {
        url: "successpaymentdetails",
        type: "POST",
        beforeSend: function (request) {
            request.setRequestHeader(
                "X-CSRF-TOKEN",
                $('meta[name="csrf-token"]').attr("content")
            );
        },
    },
    columns: [
        {
            data: "razorpay_id",
        },
        {
            data: "name",
        },
        {
            data: "email",
        },
        {
            data: "mobileno",
        },
        {
            data: "amount",
        },
        {
            data: "method",
        },
        {
            data: "description",
        },
        {
            data: "status",
        },
        {
            data: "payment_created_at",
        },
        {
            data: "action",
        },
    ],
});

//sessiontable 

var sessiontable = $("#sessiontable").DataTable({
    "preDrawCallback": function (settings) {
        setTimeout(function () {
            admitCardButton();
        }, 1000);
    },
    processing: true,
    serverSide: true,
    ajax: {
        url: "sessiondetails",
        type: "POST",
        beforeSend: function (request) {
            request.setRequestHeader(
                "X-CSRF-TOKEN",
                jQuery('meta[name="csrf-token"]').attr("content")
            );
        },
    },
    columnDefs: [{ Fee: "dt-center", targets: "_all" }],
    columns: [
        {
            data: "name",
        },
        {
            data: "session_duration",
        },
        {
            data: "description",
        },
        {
            data: "exam_date",
        },
        {
            data: "current",
        },
        {
            data: "status",
        },
        {
            data: "action",
        },
    ],
});

sessiontable.on("click", ".delete", function () {
    $(".dataTables_processing").show();
    element = $(this);
    var userid = $(this).attr("data-id");
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: "sessiondelete",
                data: {
                    id: userid,
                },
                dataType: "json",
                success: function (data) {
                    sessiontable.ajax.reload();
                },
                error: function (data) {
                    // console.log(data);
                },
            });
        }
    });
});

sessiontable.on("click", ".status", function () {
    $(".dataTables_processing").show();
    element = $(this);
    var userid = $(this).attr("data-id");
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes!",
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: "session-status-update",
                data: {
                    id: userid,
                },
                dataType: "json",
                success: function (data) {
                    sessiontable.ajax.reload();
                },
                error: function (data) {
                    // console.log(data);
                },
            });
        }
    });
});


sessiontable.on("click", ".current", function () {
    $(".dataTables_processing").show();
    element = $(this);
    var userid = $(this).attr("data-id");
    Swal.fire({
        title: "Are you sure?",
        text: "You will be able to revert this!!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes!",
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: "current-session-update",
                data: {
                    id: userid,
                },
                dataType: "json",
                success: function (data) {
                    $(".dataTables_processing").hide();
                    toastr.success(data.msg);
                    sessiontable.ajax.reload();
                },
                error: function (data) {
                    $(".dataTables_processing").hide();
                    toastr.error(xhr.responseJSON.msg);
                },
            });
        }
    });
});


//statetable
var statetable = $("#statetable").DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: "statedetails",
        type: "POST",
        beforeSend: function (request) {
            request.setRequestHeader(
                "X-CSRF-TOKEN",
                jQuery('meta[name="csrf-token"]').attr("content")
            );
        },
    },
    columnDefs: [{ Fee: "dt-center", targets: "_all" }],
    columns: [
        {
            data: "name",
        },
        {
            data: "code",
        },
        {
            data: "description",
        },
        {
            data: "examdatetime",
        },
        {
            data: "status",
        },
        {
            data: "action",
        },
    ],
});

statetable.on("click", ".status", function () {
    $(".dataTables_processing").show();
    element = $(this);
    var userid = $(this).attr("data-id");
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes!",
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: "state-status-update",
                data: {
                    id: userid,
                },
                dataType: "json",
                success: function (data) {
                    statetable.ajax.reload();
                },
                error: function (data) {
                    // console.log(data);
                },
            });
        }
    });
});

statetable.on("click", ".delete", function () {
    $(".dataTables_processing").show();
    element = $(this);
    var userid = $(this).attr("data-id");
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: "statedelete",
                data: {
                    id: userid,
                },
                dataType: "json",
                success: function (data) {
                    statetable.ajax.reload();
                },
                error: function (data) {
                    // console.log(data);
                },
            });
        }
    });
});

statetable.on("click", ".admitcardtimedate", function () {
    $(".dataTables_processing").show();
    element = $(this);
    var stateid = $(this).attr("data-id");
    var examdate = $(this).attr("data-examdate");
    var examstarttime = $(this).attr("data-examstarttime");
    var examendtime = $(this).attr("data-examendtime");
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
                url: "stateexam",
                data: {
                    examdate : result.value.date,
                    examstarttime : result.value.startTime,
                    examendtime : result.value.endTime,
                    id : stateid
                },
                dataType: "json",
                success: function (data) {
                    statetable.ajax.reload();
                    toastr.success(data.msg);
                },
                error: function (data) {
                    toastr.error(data.responseJSON.msg);
                },
            });
        }
    });    
});



//district
var districttable = $("#districttable").DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: "districtdetails",
        type: "POST",
        beforeSend: function (request) {
            request.setRequestHeader(
                "X-CSRF-TOKEN",
                jQuery('meta[name="csrf-token"]').attr("content")
            );
        },
    },
    order: [[1, 'asc']],
    columnDefs: [{ Fee: "dt-center", targets: "_all" }],
    columns: [
        {
            data: "name",
        },
        {
            data: "statecode",
        },
        {
            data: "description",
        },
        {
            data: "examdatetime",
        },
        {
            data: "status",
        },
        {
            data: "action",
        },
    ],
});

districttable.on("click", ".status", function () {
    $(".dataTables_processing").show();
    element = $(this);
    var userid = $(this).attr("data-id");
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes!",
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: "district-status-update",
                data: {
                    id: userid,
                },
                dataType: "json",
                success: function (data) {
                    districttable.ajax.reload();
                },
                error: function (data) {
                    // console.log(data);
                },
            });
        }
    });
});

districttable.on("click", ".delete", function () {
    $(".dataTables_processing").show();
    element = $(this);
    var userid = $(this).attr("data-id");
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr("content"),
                },
                url: "districtdelete",
                data: {
                    id: userid,
                },
                dataType: "json",
                success: function (data) {
                    districttable.ajax.reload();
                },
                error: function (data) {
                    // console.log(data);
                },
            });
        }
    });
});


//Exam Venue
var venuetable = $("#venuetable").DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: "venuedetails",
        type: "POST",
        beforeSend: function (request) {
            request.setRequestHeader(
                "X-CSRF-TOKEN",
                jQuery('meta[name="csrf-token"]').attr("content")
            );
        },
    },
    order: [[0, 'asc']],
    columnDefs: [{ Fee: "dt-center", targets: "_all" }],
    columns: [
        {
            data: "statecode",
        },
        {
            data: "district",
        },
        {
            data: "name",
        },
        {
            data: "address",
        },
        {
            data: "status",
        },
        {
            data: "action",
        },
    ],
});

venuetable.on("click", ".status", function () {
    $(".dataTables_processing").show();
    element = $(this);
    var userid = $(this).attr("data-id");
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes!",
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                url: "venue-status-update",
                data: {
                    id: userid,
                },
                dataType: "json",
                success: function (data) {
                    venuetable.ajax.reload();
                },
                error: function (data) {
                    // console.log(data);
                },
            });
        }
    });
});

venuetable.on("click", ".delete", function () {
    $(".dataTables_processing").show();
    element = $(this);
    var userid = $(this).attr("data-id");
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr("content"),
                },
                url: "venuedelete",
                data: {
                    id: userid,
                },
                dataType: "json",
                success: function (data) {
                    venuetable.ajax.reload();
                },
                error: function (data) {
                    // console.log(data);
                },
            });
        }
    });
});