<li class="tab-content tab-content-first typography">
    <form id="frm" action="{{route('bamkingdetails')}}" enctype="multipart/form-data" method="POST">
        @csrf
        <input type="hidden" value="{{ encrypt(auth()->user()->id) }}" name="id">
        <div class="tab-content">
            <div class="tab-pane active" id="tab_3">
                <h3><span>Step [3/6] :</span> Banking details &nbsp;
                    <span id="Anthem_ctl00_ContentPlaceHolder1_lblPageMsg__"><span id="ctl00_ContentPlaceHolder1_lblPageMsg" style="color:Red;"></span></span>
                </h3>
                <div class="box-body table-responsive">
                    <table id="ctl00_ContentPlaceHolder1_Table1" class="table Eng_hindi_form mobile_form" width="100%" border="0" cellspacing="5" cellpadding="0">
                        <tbody>
                            <tr>
                                <td colspan="3"><b><u>Fields marked <span style="color: red">*</span> are mandatory.</u></b></td>
                            </tr>
                            <tr>
                                <td class="vtext">Account Number <span style="color: red">*</span><br>
                                    <strong>खाता संख्या</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_txtName__"><input name="name" type="text"  maxlength="50" id="name" class="textboxlong form-control" style="text-transform: uppercase"></span>
                                </td>
                            </tr>