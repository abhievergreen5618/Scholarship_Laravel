<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="row align-items-start">
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
                <div class="col-lg-3 text-center">
                    <h3>Total Revenue</h3>
                </div>
                <div class="col-lg-3 text-center">
                    <h3>{{$totalincome}}</h3>
                </div>
            </div>
        </div>
        <div class="col-12 mt-3">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table style="text-align:center; width:100%;" id="revenuetable" class="table table-bordered table-striped w-100">
                            <thead>
                                <tr>
                                    <th>Transaction Id</th>
                                    <th>Payment Date & time</th>
                                    <th>Amount</th>
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
