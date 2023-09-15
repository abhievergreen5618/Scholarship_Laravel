@extends('layouts.master')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Fee</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Fee</li>
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
    <link rel="stylesheet" href="{{ asset('css/tabs.css') }}">

    
<div class="tabs">
  <ul class="tabs-nav">
    <li><a href="#tab-1">Success</a></li>
    <li><a href="#tab-2">Failure</a></li>
  </ul>
  <div class="tabs-stage">
    <div id="tab-1">
    </div>
    <div id="tab-2">
    </div>
  </div>
</div>


<script src="{{asset('js/tabs.js')}}"></script>
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
