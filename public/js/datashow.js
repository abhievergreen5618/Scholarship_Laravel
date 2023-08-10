$(document).ready(function () {
    $(".alert").delay(8000).slideUp(200, function () {
        $(this).alert('close');
    });
    //employee-list with the DataTables
    var classtable = $('#classtable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "classdetails",
            "type": "POST",
            'beforeSend': function (request) {
                request.setRequestHeader("X-CSRF-TOKEN", jQuery('meta[name="csrf-token"]').attr('content'));
            },
        },
        "columnDefs": [
            { "className": "dt-center", "targets": "_all" }
        ],
        "columns": [
            {
                "data": "class",
            },
            {
                "data": "description",
            },
            {
                "data": "status",
            },
            {
                "data": "action",
            },

        ],
    });
});
