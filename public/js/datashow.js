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


    
    classtable.on('click', '.status', function () {
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
            confirmButtonText: 'Yes!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    },
                    url: 'class-status-update',
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


    
jQuery('#class-add-form').validate({
    rules:{
        class:"required",
        name:"required",
        classes:"required",
        status:"required",
        },
    messages:{
        class:"Select an option",
        classes:"Select an option",
    },
    submitHandler : function(form,e) {
        e.preventDefault();
        // Create a new FormData object
        var formData = new FormData($(form)[0]);
       
        // toastr.options = {
        //     closeButton: true,
        //     progressBar: true,
        //     timeOut: 5000,
        //     extendedTimeOut: 2000,
        //     positionClass: "toast-top-right",
        //     preventDuplicates: true
        // };


        $.ajax({
            type: 'POST',
            url: $(form).attr("action"),
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(result) {
                if(result.hasOwnProperty("message"))
                {
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                    // toastr.success(result.message);
                }
            },
            error : function(xhr, status, error) {
                if(xhr.status == 422)
                {
                    $.each(xhr.responseJSON.error,(index,value) => {
                        $("#"+index+"-error").remove();
                        $("#"+index).parent().append('<label id="'+index+'-error" class="error" for="name">'+value+'</label>');
                        $("#"+index).focus();
                        // toastr.error(xhr.responseJSON.message);
                    });
                }
                else{
                    // toastr.error("!OOPs Something went wrong");
                }

            }

        });
    }
})

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



    subjecttable.on('click', '.status', function () {
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
            confirmButtonText: 'Yes!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    },
                    url: 'subject-status-update',
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

    
    scholarshiptable.on('click', '.status', function () {
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
            confirmButtonText: 'Yes!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    },
                    url: 'scholarship-status-update',
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


//--------------------------------------SCHOLARSHIP TYPE ENDs------------------------------------

//-------------------------------------USER DETAIL----------------------------------------------
  

var usertable = $('#usertable').DataTable({
    "processing": true,
    "serverSide": true,
    "ajax": {
        "url": "userdetails",
        "type": "POST",
        'beforeSend': function (request) {
            request.setRequestHeader("X-CSRF-TOKEN", jQuery('meta[name="csrf-token"]').attr('content'));
        },
    },
    "columnDefs": [
        { "Name": "dt-center", "targets": "_all" }
    ],
    "columns": [
        {
            "data": "name",
        },
        {
            "data": "email",
        },
        {
            "data": "mobileno",
        },
        {
            "data": "class",
        },
        {
            "data": "gender",
        },
        {
            "data": "dob",
        },
        {
            "data": "paddress",
        },
        {
            "data": "status",
        },
        {
            "data": "action",
        },

    ],
});


usertable.on('click', '.delete', function () {
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
                url: 'userdelete',
                data: {
                    id: userid
                },
                dataType: 'json',
                success: function (data) {
                    usertable.ajax.reload();
                },
                error: function (data) {
                    // console.log(data);
                }
            });
        };
    });
});


usertable.on('click', '.status', function () {
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
        confirmButtonText: 'Yes!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                },
                url: 'user-status-update',
                data: {
                    id: userid
                },
                dataType: 'json',
                success: function (data) {
                    usertable.ajax.reload();
                },
                error: function (data) {
                    // console.log(data);
                }
            });
        };
    });
});

});


    

    
    