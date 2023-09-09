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

<div class="card-header" style="background-color:#007bff; color:white; margin:10px;">
      <h3 class="card-title">Filter</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-plus"></i>
          <select id="filterSelect" style="display: none;"></select>
  </button>
      </div>
    </div>

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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#filterBtn').click(function() {
            var selectElement = $('#filterSelect');
            if (selectElement.is(':visible')) {
                selectElement.hide();
            } else {
                var classOptions = User::where('class')->get();

                
                selectElement.empty();

                $.each(classOptions, function(index, value) {
                    selectElement.append($('<option>').text('Class Block: ' + value));
                });

                

                selectElement.show();
            }
        });
    });
</script>


@endsection
