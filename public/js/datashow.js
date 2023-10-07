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