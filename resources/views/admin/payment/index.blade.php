@extends('layouts.master')

@section('content')

<link rel="stylesheet" href="{{ asset('css/all.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('css/tabs.css') }}">
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Payments</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Payments</li>
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
                                    <form>


                                    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Payment Details</h3>
                    </div>
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">

    <table style="text-align:center;" id="paymenttable" class="table table-bordered table-striped">
                                         
                                            <!-- <tr>
<div class="tabs">
  <ul class="tabs-nav">
    <li><a href="#tab-1">Success</a></li>
    <li><a href="#tab-2">Failure</a></li>
  </ul> 
</tr>
  <div class="tabs-stage">
    <div id="tab-1">
        <tr>
            <th>
    Transaction ID
</th>
</tr>
    </div>
    <div id="tab-2">
    </div>
  </div>
</div> -->

<!-- </table> -->

<div class="tabs">
  <ul class="tabs-nav">
    <li><a href="#tab-1">Success</a></li>
    <li><a href="#tab-2">Failure</a></li>
  </ul>
  
        <div class="tabs-stage">
            <thead>
        <tr>
    <th>
    <div id="tab-1">
        Transaction ID
       </div>
</th>
</tr>
    <div id="tab-2">
      
</div>
  </div>
</div>
</thead>
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
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/all.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/tabs.js') }}"></script>

@endsection