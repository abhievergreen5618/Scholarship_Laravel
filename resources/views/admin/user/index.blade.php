@extends('layouts.master')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Users</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Users</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Details</h3>
                    </div>
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Session</label>
                                        <div class="select2-purple">
                                            <select class="select2" id="sessiondropdown" data-placeholder="Select Session" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                                <option value="">Select Session</option>
                                                @foreach($sessions as $key => $session)
                                                <option value="{{$key}}">{{$session}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <table style="text-align:center;" id="usertable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email-ID</th>
                                                <th>Mobile No.</th>
                                                <th>Class</th>
                                                <th>Gender</th>
                                                <th>DOB</th>
                                                <th>Address</th>
                                                <th>Session</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


@endsection

@push('footer_extras')
<script>
    var sessiondropdown = $("#sessiondropdown").select2();

    var session = "all";

    //-------------------------------------USER DETAIL----------------------------------------------

    var usertable = $("#usertable").DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "userdetails",
            type: "POST",
            beforeSend: function(request) {
                request.setRequestHeader(
                    "X-CSRF-TOKEN",
                    jQuery('meta[name="csrf-token"]').attr("content")
                );
            },
            "data": function(d) {
                return $.extend({}, d, {
                    "session": session,
                });
            }
        },
        "columnDefs": [{
            "Name": "dt-center",
            "targets": "_all"
        }],
        "columns": [{
                "data": "name",
                "defaultContent": "Not Provided"
            },
            {
                "data": "email",
                "defaultContent": "Not Provided"
            },
            {
                "data": "mobileno",
                "defaultContent": "Not Provided"
            },
            {
                "data": "class",
                "defaultContent": "Not Provided"
            },
            {
                "data": "gender",
                "defaultContent": "Not Provided"
            },
            {
                "data": "dob",
                "defaultContent": "Not Provided"
            },
            {
                "data": "paddress",
                "defaultContent": "Not Provided"
            },
            {
                "data": "session",
                "defaultContent": "Not Provided"
            },
            {
                "data": "status",
                "defaultContent": "Not Provided"
            },
            {
                "data": "action",
                "defaultContent": "Not Provided"
            },

        ],
    });

    usertable.on("click", ".delete", function() {
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
                    url: "userdelete",
                    data: {
                        id: userid,
                    },
                    dataType: "json",
                    success: function(data) {
                        usertable.ajax.reload();
                    },
                    error: function(data) {
                        // console.log(data);
                    },
                });
            }
        });
    });

    usertable.on("click", ".status", function() {
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
                    url: "user-status-update",
                    data: {
                        id: userid,
                    },
                    dataType: "json",
                    success: function(data) {
                        usertable.ajax.reload();
                    },
                    error: function(data) {
                        // console.log(data);
                    },
                });
            }
        });
    });

    sessiondropdown.on('select2:select', function(e) {
        session = e.params.data.id;
        usertable.ajax.reload();
    });
</script>
@endpush