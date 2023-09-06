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

    classtable.on('click', '.delete', function () {
        $('.datatables_processing').show();
        element = $(this);
        var userid = $(this).attr('data-id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    },
                    url: 'classdelete',
                    data: {
                        id: userid
                    },
                    dataType: 'json',
                    success: function (data) {
                        classtable.ajax.reload();
                    },
                    error: function (data) {
                        // console.log(data);
                    }
                });
            };
        });
    });


    
    classtable.on('click', '.delete', function () {
        $('.datatables_processing').show();
        element = $(this);
        var userid = $(this).attr('data-id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    },
                    url: 'classdelete',
                    data: {
                        id: userid
                    },
                    dataType: 'json',
                    success: function (data) {
                        classtable.ajax.reload();
                    },
                    error: function (data) {
                        // console.log(data);
                    }
                });
            };
        });
    });


    //---------------------------------------CLASS TABLE END---------------------------

    //----------------------------------------SUBJECT TABLE START---------------------------
   
    var subjecttable = $('#subjecttable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "subjectsdetails",
            "type": "POST",
            'beforeSend': function (request) {
                request.setRequestHeader("X-CSRF-TOKEN", jQuery('meta[name="csrf-token"]').attr('content'));
            },
        },
        "columnDefs": [
            { "subjectName": "dt-center", "targets": "_all" }
        ],
        "columns": [
            {
                "data": "name",
            },
            {
                "data": "classes",
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



    subjecttable.on('click', '.delete', function () {
        $('.datatables_processing').show();
        element = $(this);
        var userid = $(this).attr('data-id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    },
                    url: 'subjectdelete',
                    data: {
                        id: userid
                    },
                    dataType: 'json',
                    success: function (data) {
                        subjecttable.ajax.reload();
                    },
                    error: function (data) {
                        // console.log(data);
                    }
                });
            };
        });
    });

    //---------------------------SUBJECT TABLE END---------------------------------------

    //----------------------------SCHOLARSHIP TABLE START--------------------------------

    var scholarshiptable = $('#scholarshiptable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "scholarshipdetails",
            "type": "POST",
            'beforeSend': function (request) {
                request.setRequestHeader("X-CSRF-TOKEN", jQuery('meta[name="csrf-token"]').attr('content'));
            },
        },
        "columnDefs": [
            { "scholarshipName": "dt-center", "targets": "_all" }
        ],
        "columns": [
            {
                "data": "name",
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


    scholarshiptable.on('click', '.delete', function () {
        $('.datatable_processing').show();
        element = $(this);
        var userid = $(this).attr('data-id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    },
                    url: 'scholarshipdelete',
                    data: {
                        id: userid
                    },
                    dataType: 'json',
                    success: function (data) {
                        scholarshiptable.ajax.reload();
                    },
                    error: function (data) {
                        // console.log(data);
                    }
                });
            };
        });
    });

});



  

    

    
    