<li class="tab-content tab-content-third typography">
    <div class="typography">
    
<input type="hidden" value="{{ encrypt(auth()->user()->id) }}" name="id">
<div class="tab-content">
            <div class="tab-pane active" id="tab_1">

    <form id="bankform" method="POST" action="{{route('bankdetails')}}">
        @csrf
    <h3><span>Step [3/6] :</span> Bank Details &nbsp;
                    <span><span id="ctl00_ContentPlaceHolder1_lblPageMsg" style="color:Red;"></span></span>
                </h3>
                <div class="box-body table-responsive">
        <table id="ctl00_ContentPlaceHolder1_Table1" class="table Eng_hindi_form mobile_form" width="100%" border="0" cellspacing="5" cellpadding="0">
            <tbody>
    <tr>
        <td class="text">Account No. <span style="color: red">*</span>
        <br>
            <strong>खाता संख्या</strong>
        </td>
        <td class="colon">:</td>
            <td>
                <span id="Anthem_ctl00_ContentPlaceHolder1_txtAccountNo__"><input name="accountno"  maxlength="15" id="accountno" type="number" class="textboxlong form-control" ondrop="return false;" ondrag="return false;" onpaste="return false;" oncut="return false;" onkeydown="return AllownumberOnly(event,this);"></span>
            </td>
    </tr>
    <tr>
        <td class="text">Confirm Account No. <span style="color: red">*</span>
        <br>
            <strong>खाता संख्या</strong>
        </td>
        <td class="colon">:</td>
            <td>
                <span id="Anthem_ctl00_ContentPlaceHolder1_txtAccountNo__"><input name="cnfrmaccountno"  maxlength="15" id="accountno" type="number" class="textboxlong form-control" ondrop="return false;" ondrag="return false;" onpaste="return false;" oncut="return false;" onkeydown="return AllownumberOnly(event,this);"></span>
            </td>
    </tr>
    <tr>
        <td class="vtext">Account Holder Name<span style="color: red">*</span><br>
            <strong>बैंकिंग खाता नाम</strong>
        </td>
        <td class="colon">:</td>
            <td>
                <span id="Anthem_ctl00_ContentPlaceHolder1_txtName__"><input name="holdername" type="text" value="{{isset(auth()->user()->name) ? auth()->user()->name : ''}}" maxlength="50" id="name" class="textboxlong form-control" style="text-transform: uppercase"></span>
            </td>
    </tr>
        <tr>
            <td class="vtext">IFSC Code<span style="color: red">*</span><br>
                <strong>आईएफएससी कोड</strong>
            </td>
            <td class="colon">:</td>
                <td>
                    <span id="Anthem_ctl00_ContentPlaceHolder1_txtName__"><input name="ifsccode" type="text"  maxlength="50" id="name" class="textboxlong form-control" style="text-transform: uppercase"></span>
                </td>
        </tr>
                            <tr>
                                <td>Upload Passbook Front Page Image
                                    <br>
                                    <strong>पासबुक फ्रंट पेज छवि अपलोड करें
                                    </strong>
                                    <span style="color:red">*</span>
                                </td>
                                <td class="colon">:</td>
                                                <td>
                                                    <span id="Anthem_ctl00_ContentPlaceHolder1_Uploadpassbook__"><input type="file" name="passbook_photo" id="passbook_photo" class="uploadfiles" accept="image/jpeg,image/jpg"></span>
                                                    </td>
                            </tr>
                            <tr>
<td>
                            <button type="submit" class="btn btn-warning">Save</button>
</td>
                            </tr>
</tbody>
</table>
</div>
</form>
</div>
</div>
</div>
</li>