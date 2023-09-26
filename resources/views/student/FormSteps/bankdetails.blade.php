<li class="tab-content tab-content-third typography">
    <form id="bankform" method="POST" action="{{route('bankdetails')}}">
        @csrf
        <input type="hidden" value="{{ encrypt(auth()->user()->id) }}" name="id">
        <div class="typography">
            <div class="tab-content">
                <div class="tab-pane active" id="tab_3">

                    <h3><span>Step [3/6] :</span> Bank Details &nbsp;
                        <span><span id="ctl00_ContentPlaceHolder1_lblPageMsg" style="color:Red;"></span></span>
                    </h3>
                    <div class="box-body table-responsive">
                        <table id="ctl00_ContentPlaceHolder1_Table1" class="table Eng_hindi_form mobile_form" width="100%" border="0" cellspacing="5" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td colspan="3"><b><u>Fields marked <span style="color: red">*</span> are mandatory.</u></b></td>
                                </tr>
                                <tr>
                                    <td class="text">Account No. <span style="color: red">*</span>
                                        <br>
                                        <strong>खाता संख्या</strong>
                                    </td>
                                    <td class="colon">:</td>
                                    <td>
                                        <span id="Anthem_ctl00_ContentPlaceHolder1_txtAccountNo__"><input name="accountno" maxlength="15" id="accountno" value="{{!empty(auth()->user()->step3_updated_at) ? auth()->user()->load('bankDetails')->bankDetails->accountno : ''}}" type="number" class="textboxlong form-control" ondrop="return false;" ondrag="return false;" onpaste="return false;" oncut="return false;" onkeydown="return AllownumberOnly(event,this);"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text">Confirm Account No. <span style="color: red">*</span>
                                        <br>
                                        <strong>खाता संख्या</strong>
                                    </td>
                                    <td class="colon">:</td>
                                    <td>
                                        <span id="Anthem_ctl00_ContentPlaceHolder1_txtAccountNo__"><input name="cnfrmaccountno" maxlength="15" id="cnfrmaccountno" value="{{!empty(auth()->user()->step3_updated_at) ? auth()->user()->load('bankDetails')->bankDetails->cnfrmaccountno : ''}}" type="number" class="textboxlong form-control" ondrop="return false;" ondrag="return false;" onpaste="return false;" oncut="return false;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="vtext">Account Holder Name<span style="color: red">*</span><br>
                                        <strong>बैंकिंग खाता नाम</strong>
                                    </td>
                                    <td class="colon">:</td>
                                    <td>
                                        <span id="Anthem_ctl00_ContentPlaceHolder1_txtName__"><input name="holdername" type="text" value="{{!empty(auth()->user()->step3_updated_at) ? auth()->user()->load('bankDetails')->bankDetails->holdername : ''}}" maxlength="50" id="name" class="textboxlong form-control" style="text-transform: uppercase"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="vtext">IFSC Code<span style="color: red">*</span><br>
                                        <strong>आईएफएससी कोड</strong>
                                    </td>
                                    <td class="colon">:</td>
                                    <td>
                                        <span id="Anthem_ctl00_ContentPlaceHolder1_txtName__"><input name="ifsccode" type="text" maxlength="50" value="{{!empty(auth()->user()->step3_updated_at) ? auth()->user()->load('bankDetails')->bankDetails->ifsccode : ''}}" id="name" class="textboxlong form-control" style="text-transform: uppercase"></span>
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
                                        <span id="Anthem_ctl00_ContentPlaceHolder1_Uploadpassbook__"><input type="file" name="passbook_photo" id="passbook_photo" class="uploadfiles" accept="image/png, image/jpg, image/jpeg"></span>
                                        <br>
                                            @if(!empty(auth()->user()->load('bankDetails')->bankDetails->passbook_photo) ? 'style="display: none;"' : '')
                                            <div><img id="passbookphoto_photo_perview" src="{{ asset('images/proofdoc/'.auth()->user()->load('bankDetails')->bankDetails->passbook_photo) }}" class="img-thumbnail mt-2" alt="..."></div>
                                            @endif
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
                </div>
            </div>
        </div>
    </form>
</li>
