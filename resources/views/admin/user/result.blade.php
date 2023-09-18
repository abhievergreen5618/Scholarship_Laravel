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
                                <div class="col-sm-12">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-default">
                                                <div class="card-header">
                                                </div>
                                                <div class="card-body">
                                                    <div id="actions" class="row">
                                                        <div class="col-lg-6">
                                                            <div class="btn-group w-100">
    
                                                                <form action="{{ route('admin.user.uploadresult') }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf    
                                                                    <input type="file" name="file" accept=".xlsx, .xls">
                                                                <button type="submit" class="btn btn-primary col start">
                                                                    <i class="fas fa-upload"></i>
                                                                    <span>Start upload</span>
                                                                </button>
                                                                </form>

                                                                
                                                                <button type="reset" class="btn btn-warning col cancel">
                                                                    <i class="fas fa-times-circle"></i>
                                                                    <span>Cancel upload</span>
                                                                </button>
                                                            </div>
                                                        </div>


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