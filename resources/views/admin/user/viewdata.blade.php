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
                                    <form>
                                        <table>
                                            <tr>
                                                <td colspan="2"><b> Name :</b></td>
                                                <td colspan="2">{{(!empty(auth()->user()->step2_updated_at))
                                                    ? strtoupper(auth()->user()->name) : ''}}</td>
                                                <td rowspan="2"><img src="{{ (!empty(auth()->user()->step2_updated_at)) ? asset('public/images/proofdoc/'.auth()->user()->photo) : ''}}" class="rounded float-end" alt="..."></td>
                                            </tr>
                                            <tr>
                                                <td><b>E-mail ID :</b></td>
                                                <td>{{(!empty(auth()->user()->step2_updated_at))
                                                ? auth()->user()->email : ''}}</td>
                                            </tr>
                                        </table>
                                    </form>
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