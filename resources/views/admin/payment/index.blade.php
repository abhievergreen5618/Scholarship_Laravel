@extends('layouts.master')

@section('content')
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
            <div class="col-md-12">
                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-five-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="all-payments-tab" data-toggle="pill" href="#all-payments" role="tab" aria-controls="all-payments" aria-selected="true">All Payments</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="success-payments-tab" data-toggle="pill" href="#success-payments" role="tab" aria-controls="success-payments" aria-selected="false">Success Payments</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="failure-payments-tab" data-toggle="pill" href="#failure-payments" role="tab" aria-controls="failure-payments" aria-selected="false">Failure Payments</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-five-tabContent">
                            <div class="tab-pane fade active show" id="all-payments" role="tabpanel" aria-labelledby="all-payments-tab">
                                @include('admin.payment.allpayment')
                            </div>
                            <div class="tab-pane fade" id="success-payments" role="tabpanel" aria-labelledby="success-payments-tab">
                                @include('admin.payment.success')
                            </div>
                            <div class="tab-pane fade" id="failure-payments" role="tabpanel" aria-labelledby="failure-payments-tab">
                                @include('admin.payment.failure')
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

    //revenuetable 
    var revenuetable = $("#revenuetable").DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "revenuepaymentdetails",
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
        columnDefs: [{
            Fee: "dt-center",
            targets: "_all"
        }],
        columns: [{
                data: "razorpay_id",
            },
            {
                data: "payment_created_at",
            },
            {
                data: "amount",
            },
        ],
    });

    sessiondropdown.on('select2:select', function (e) {
        session = e.params.data.id;
        revenuetable.ajax.reload();
    });
</script>
@endpush