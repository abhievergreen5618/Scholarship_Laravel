$(document).ready(function () {
    $(".alert").not('.cancelrequest').not('.reportmail').delay(8000).slideUp(200, function () {
        $(this).alert('close');
    });
    //employee-list with the DataTables
    var employeetable = $('#employeetable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "employee-details",
            "type": "POST",
            'beforeSend': function (request) {
                request.setRequestHeader("X-CSRF-TOKEN", jQuery('meta[name="csrf-token"]').attr('content'));
            },
        },
        "columnDefs": [
            { "className": "dt-center", "targets": "_all" }
        ],
        "columns": [
            // {
            //     "data": "created_at",
            // },
            // {
            //     "data": "id",
            // },
            {
                "data": "name",
            },
            {
                "data": "email",
            },
            {
                "data": "company_phonenumber",
            },
            // {
            //     "data": "company_address",
            // },
            {
                "data": "city",
            },
            {
                "data": "state",
            },
            {
                "data": "zip_code",
            },
            {
                "data": "action",
            },

        ],
    });
});
