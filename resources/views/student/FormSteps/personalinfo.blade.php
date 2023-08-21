<li class="tab-content tab-content-first typography">
    <form id="frm" action="{{route('personalinfosubmit')}}" enctype="multipart/form-data">
        <input type="hidden" value="{{ encrypt(auth()->user()->id) }}" name="id">
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <h3><span>Step [1/5] :</span> Personal Information &nbsp;
                    <span id="Anthem_ctl00_ContentPlaceHolder1_lblPageMsg__"><span id="ctl00_ContentPlaceHolder1_lblPageMsg" style="color:Red;"></span></span>
                </h3>
                <div class="box-body table-responsive">
                    <table id="ctl00_ContentPlaceHolder1_Table1" class="table Eng_hindi_form mobile_form" width="100%" border="0" cellspacing="5" cellpadding="0">
                        <tbody>
                            <tr>
                                <td colspan="3"><b><u>Fields marked <span style="color: red">*</span> are mandatory.</u></b></td>
                            </tr>
                            <tr>
                                <td width="42%" class="vtext">Name of Scholarship
                                    <br>
                                    <strong>छात्रवृत्ति का नाम</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_ddlExamCenter__">
                                        <select name="scholarshipname" id="scholarshipname" class="dropdownlong form-select">
                                            <option value=""> Please Select </option>
                                            <option value="3" @if(!empty(auth()->user()->step1_updated_at)) {{auth()->user()->scholarshipname == "3" ? 'selected' : ''}} @endif>open scholarships </option>
                                            <option value="17" @if(!empty(auth()->user()->step1_updated_at)) {{auth()->user()->scholarshipname == "17" ? 'selected' : ''}} @endif> vidyabharti scholarship</option>
                                        </select>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="vtext">Name(IN CAPITAL LETTERS) as per Matric certificate <span style="color: red">*</span><br>
                                    <strong>नाम (मैट्रिक सर्टिफिकेट के अनुसार)</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_txtName__"><input name="name" type="text" value="{{isset(auth()->user()->name) ? auth()->user()->name : ''}}" maxlength="50" id="name" class="textboxlong form-control" style="text-transform: uppercase"></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="vtext">
                                    Father's Name (As per Matric certificate) <span style="color: red">*</span>
                                    <br>
                                    <strong>पिता का नाम (मैट्रिक सर्टिफिकेट के अनुसार)</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_txtFatherName__"><input name="fathername" type="text" value="@if(!empty(auth()->user()->step1_updated_at)) {{auth()->user()->fathername}} @endif" maxlength="50" id="fathername" class="textboxlong form-control" style="text-transform: uppercase"></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="vtext">Mother's Name <span style="color: red">*</span>
                                    <br>
                                    <strong>मां का नाम</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_txtMName__"><input name="mothername" type="text" value="@if(!empty(auth()->user()->step1_updated_at)) {{auth()->user()->mothername}} @endif" maxlength="50" id="mothername" class="textboxlong form-control" style="text-transform: uppercase"></span>
                                </td>
                            </tr>
                            <tr id="ctl00_ContentPlaceHolder1_trExamCenter">
                                <td class="vtext">Examination Centre for Entrance Test <span style="color: red">*</span><br>
                                    <strong>प्रवेश परीक्षा के लिए परीक्षा केन्द्र</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_ddlExamCenter__"><select name="examcentre" id="examcentre" class="dropdownlong form-select">
                                            <option value="">-- Select Exam Center --</option>
                                            <option value="3" @if(!empty(auth()->user()->step1_updated_at)) {{auth()->user()->examcentre == "3" ? 'selected' : ''}} @endif>SOLAN</option>
                                            <option value="17" @if(!empty(auth()->user()->step1_updated_at)) {{auth()->user()->examcentre == "17" ? 'selected' : ''}} @endif>SHIMLA</option>
                                            <option value="18" @if(!empty(auth()->user()->step1_updated_at)) {{auth()->user()->examcentre == "18" ? 'selected' : ''}} @endif>DHARAMSHALA</option>
                                            <option value="19" @if(!empty(auth()->user()->step1_updated_at)) {{auth()->user()->examcentre == "19" ? 'selected' : ''}} @endif>UNA</option>
                                            <option value="20" @if(!empty(auth()->user()->step1_updated_at)) {{auth()->user()->examcentre == "20" ? 'selected' : ''}} @endif>HAMIRPUR</option>
                                            <option value="21" @if(!empty(auth()->user()->step1_updated_at)) {{auth()->user()->examcentre == "21" ? 'selected' : ''}} @endif>PALAMPUR</option>
                                            <option value="24" @if(!empty(auth()->user()->step1_updated_at)) {{auth()->user()->examcentre == "24" ? 'selected' : ''}} @endif>MANDI</option>
                                            <option value="33" @if(!empty(auth()->user()->step1_updated_at)) {{auth()->user()->examcentre == "33" ? 'selected' : ''}} @endif>AMB (UNA)</option>
                                            <option value="34" @if(!empty(auth()->user()->step1_updated_at)) {{auth()->user()->examcentre == "34" ? 'selected' : ''}} @endif>BILASPUR</option>
                                            <option value="35" @if(!empty(auth()->user()->step1_updated_at)) {{auth()->user()->examcentre == "35" ? 'selected' : ''}} @endif>CHAMBA</option>
                                            <option value="36" @if(!empty(auth()->user()->step1_updated_at)) {{auth()->user()->examcentre == "36" ? 'selected' : ''}} @endif>KANGRA</option>
                                            <option value="37" @if(!empty(auth()->user()->step1_updated_at)) {{auth()->user()->examcentre == "37" ? 'selected' : ''}} @endif>KULLU</option>
                                            <option value="38" @if(!empty(auth()->user()->step1_updated_at)) {{auth()->user()->examcentre == "38" ? 'selected' : ''}} @endif>NAHAN</option>
                                            <option value="39" @if(!empty(auth()->user()->step1_updated_at)) {{auth()->user()->examcentre == "39" ? 'selected' : ''}} @endif>RAMPUR</option>
                                            <option value="40" @if(!empty(auth()->user()->step1_updated_at)) {{auth()->user()->examcentre == "40" ? 'selected' : ''}} @endif>SUNDER NAGAR</option>

                                        </select></span>
                                </td>
                            </tr>
<!------------------------------------------------->
                    <tr id="ctl00_ContentPlaceHolder1_trExamCenter">
                                <td class="vtext">Examination Centre for Entrance Test <span style="color: red">*</span><br>
                                    <strong>प्रवेश परीक्षा के लिए परीक्षा केन्द्र</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                
                                <div class="form-group mb-3">
                                <select  id="state-dropdown" name="statedropdown" class="form-control">
                            <option value="">-- Select State --</option>
                            @if(!empty($states))
                            @foreach ($states as $state)
                            <option value="{{ $state->id }}">
                                {{ $state->name }}
                            </option>
                            @endforeach
                            @endif
                        </select>

                        </div>

                        <div class="form-group">
                        <select id="district-dropdown" name="district-dropdown" class="form-control">
                        </select>
                    </div>

                                </td>
                            </tr>
<!-------------------------------------------------->

                            <tr>
                                <td class="vtext">Address for Correspondence (IN CAPITAL LETTERS) <span style="color: red">*</span>
                                    <br>
                                    <strong>पत्रव्यवहार हेतु पता</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>

                                    <span id="Anthem_ctl00_ContentPlaceHolder1_txtCAddress__"><textarea name="caddress" rows="5" cols="20" id="caddress" class="textboxmultiline form-control" onkeypress="if (this.value.length > 199) { return false; }" style="text-transform: uppercase">{{!empty(auth()->user()->step1_updated_at) ? auth()->user()->caddress : ''}}</textarea></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="vtext">Mobile No. <span style="color: red">*</span>
                                    <br>
                                    <strong>मोबाइल नंबर</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_txtMobileNo__"><input name="mobileno" value="@if(!empty(auth()->user()->step1_updated_at)) {{auth()->user()->mobileno}} @endif" maxlength="10" id="mobileno" type="number" class="textboxlong form-control" ondrop="return false;" ondrag="return false;" onpaste="return false;" oncut="return false;" onkeydown="return AllownumberOnly(event,this);"></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="vtext">Permanent Home Address (IN CAPITAL LETTERS) <span style="color: red">*</span>
                                    <br>
                                    <strong>स्थाई घर का पता</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_chkboxCopyAddress__"><span class="chkbox" style="color: black;"><input id="ctl00_ContentPlaceHolder1_chkboxCopyAddress" type="checkbox" name="ctl00$ContentPlaceHolder1$chkboxCopyAddress" class="form-check-input"><label for="ctl00_ContentPlaceHolder1_chkboxCopyAddress">Same as Correspondence
                                                Address</label></span></span>
                                    <br>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_txtPAddress__"><textarea name="paddress" rows="5" cols="20" id="paddress" class="textboxmultiline form-control" onkeypress="if (this.value.length > 199) { return false; }" style="text-transform: uppercase;">{{!empty(auth()->user()->step1_updated_at) ? auth()->user()->paddress : ''}}</textarea></span>


                                </td>
                            </tr>
                            <tr>
                                <td class="vtext">Email-Id <span style="color: red">*</span>
                                    <br>
                                    <strong>ईमेल-आईडी</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_txtEmail__"><input name="email" type="text" value="{{auth()->user()->email}}" readonly maxlength="50" id="email" class="textboxlong form-control" ondrop="return false;"></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="vtext">Date of Birth
                                    <br>
                                    <strong>जन्म की तारीख</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_txtDob__"><input type="date" value="{{!empty(auth()->user()->step1_updated_at) ? date('Y-m-d',strtotime((auth()->user()->dob))) : ''}}" id="dob" name="dob" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td class="vtext">Aadhaar No.<br>
                                    <strong>आधार संख्या</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_txtAadhaarNo__"><input name="aadhaarno" id="aadhaarno" class="form-control" type="number" value="{{!empty(auth()->user()->step1_updated_at) ? auth()->user()->aadhaarno : ''}}" maxlength="12" ondrop="return false;" ondrag="return false;" class="textboxlong"></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="vtext">High School (Matric) Mark-Sheet No. <span style="color: red">*</span><br>
                                    <strong>हाई स्कूल (मैट्रिक) मार्क-शीट नं</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_txtHSchoolCno__"><input name="hsmarksheetmatric" type="number" id="hsmarksheetmatric" class="form-control" value="{{(!empty(auth()->user()->step1_updated_at)) ? auth()->user()->hsmarksheetmatric : ''}}" maxlength="20" id="ctl00_ContentPlaceHolder1_txtHSchoolCno" class="textboxlong" ondrop="return false;" onpaste="return false;"></span>
                                </td>
                            </tr>

                            <tr>
                                <td class="vtext">High School (+2) Mark-Sheet No. <span style="color: red">*</span><br>
                                    <strong>हाई स्कूल (+2) मार्कशीट नं</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_txtHSchoolCno__"><input name="hsmarksheet" type="number" id="hsmarksheet" class="form-control" value="{{(!empty(auth()->user()->step1_updated_at)) ? auth()->user()->hsmarksheet : ''}}" maxlength="20" id="ctl00_ContentPlaceHolder1_txtHSchoolCno" class="textboxlong" ondrop="return false;" onpaste="return false;"></span>
                                </td>
                            </tr>






                            <tr>
                                <td class="vtext">Nationality<br>
                                    <strong>राष्ट्रीयता</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <div id="Anthem_ctl00_ContentPlaceHolder1_rdNationality__">
                                        <table id="ctl00_ContentPlaceHolder1_rdNationality" class="radio" border="0">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="nationality" id="Nationality1" value="I" @if(!empty(auth()->user()->step1_updated_at)) {{auth()->user()->nationality == "I" ? 'checked' : ''}} @endif>
                                                            <label class="form-check-label" for="Nationality1">Indian</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="nationality" id="Nationality2" value="O" @if(!empty(auth()->user()->step1_updated_at)) {{auth()->user()->nationality == "O" ? 'checked' : ''}} @endif>
                                                            <label class="form-check-label" for="Nationality2">Other</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td class="vtext">Gender<br>
                                    <strong>लिंग </strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <div id="Anthem_ctl00_ContentPlaceHolder1_rdSex__">
                                        <table id="ctl00_ContentPlaceHolder1_rdSex" class="radio" border="0">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gender" id="gender1" value="M" @if(!empty(auth()->user()->step1_updated_at)) {{auth()->user()->gender == "M" ? 'checked' : ''}} @endif>
                                                            <label class="form-check-label" for="gender1">Male</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gender" id="gender2" value="F" @if(!empty(auth()->user()->step1_updated_at)) {{auth()->user()->gender == "F" ? 'checked' : ''}} @endif>
                                                            <label class="form-check-label" for="gender2">Female</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </td>
                            </tr>
                            <tr id="ctl00_ContentPlaceHolder1_trSingleGirlChild">
                                <td class="vtext">
                                    <div>
                                        <span id="ctl00_ContentPlaceHolder1_TrIfGirlsEng">Are you only the single girl
                                            child of your parent?</span><br>
                                        <strong><span id="ctl00_ContentPlaceHolder1_TrIfGirlsHindi">क्या आप अपने माता-पिता
                                                के केवल एक लड़की हैं?</span></strong>
                                    </div>

                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="singlegirlchild" id="singlegirlchildyes" value="yes" @if(!empty(auth()->user()->step1_updated_at)) {{auth()->user()->singlegirlchild == "yes" ? 'checked' : ''}} @endif>
                                        <label class="form-check-label" for="yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="singlegirlchild" id="singlegirlchildno" value="no" @if(!empty(auth()->user()->step1_updated_at)) {{auth()->user()->singlegirlchild == "no" ? 'checked' : ''}} @endif>
                                        <label class="form-check-label" for="no">No</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>

                            <tr id="ctl00_ContentPlaceHolder1_trSportCulturalBoth">
                                <td class="vtext">You are applying for? <span style="color: red">*</span>
                                    <br>
                                    <strong>आप आवेदन कर रहे हैं</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_ddlSportCulturalBoth__">
                                        <select name="applyingfor" id="applyingfor" class="dropdownlong form-control">
                                            <option value="">--Please Select --</option>
                                            <option value="Sport" @if(!empty(auth()->user()->step1_updated_at)) {{auth()->user()->applyingfor == "Sport" ? 'selected' : ''}} @endif>Sport</option>
                                            <option value="Cultural" @if(!empty(auth()->user()->step1_updated_at)) {{auth()->user()->applyingfor == "Cultural" ? 'selected' : ''}} @endif>Cultural</option>
                                            <option value="Both" @if(!empty(auth()->user()->step1_updated_at)) {{auth()->user()->applyingfor == "Both" ? 'selected' : ''}} @endif>Both(Sport &amp; Cultural )</option>
                                            <option value="Not Applicable" @if(!empty(auth()->user()->step1_updated_at)) {{auth()->user()->applyingfor == "Not Applicable" ? 'selected' : ''}} @endif>Not Applicable</option>
                                        </select></span>
                                    <br>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_lblSCBN__"></span>
                                </td>
                            </tr>

                            <tr id="ctl00_ContentPlaceHolder1_trPhysicallChall">
                                <td class="vtext">
                                    <div>
                                        <span id="ctl00_ContentPlaceHolder1_spnPhysicallyChallnged">Are you Physically
                                            Challenged?</span>
                                        <span style="color: red">*</span>
                                        <br>
                                        <strong><span id="ctl00_ContentPlaceHolder1_spnPhysicallyChallngedHindi">क्या आप
                                                शारीरिक रूप से विकलांग हैं?</span> </strong>
                                        <strong> </strong>
                                    </div>



                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <div id="Anthem_ctl00_ContentPlaceHolder1_rdbphysicallychallenged__">
                                        <table id="ctl00_ContentPlaceHolder1_rdbphysicallychallenged" class="radio w-100" border="0">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="physicallychallenged" id="physicallychallengedyes" value="yes" @if(!empty(auth()->user()->step1_updated_at)) {{auth()->user()->physicallychallenged == "yes" ? 'checked' : ''}} @endif>
                                                            <label class="form-check-label" for="physicallychallengedyes">Yes</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="physicallychallenged" id="physicallychallengedno" value="no" @if(!empty(auth()->user()->step1_updated_at)) {{auth()->user()->physicallychallenged == "no" ? 'checked' : ''}} @endif>
                                                            <label class="form-check-label" for="physicallychallengedno">No</label>
                                                        </div>
                                                        <div id="proofofdocuments" {{ !empty(auth()->user()->physicallychallenged == "yes") ? 'style="display: none;"' : ''}}>
                                                            <h3 class="hedingss">upload proof of documents</h3>

                                                            <form action="#">
                                                                <div class="input-group mb-3">
                                                                    <input type="file" class="form-control" id="physicallychallengedproof" name="physicallychallengedproof">
                                                                </div>
                                                            </form>

                                                            @if(!empty(auth()->user()->physicallychallenged == "yes"))
                                                            <div><img id="physicallychallengedproof_photo_perview" src="{{ asset('public/images/proofdoc/'.auth()->user()->physicallychallengedproof) }}" class="img-thumbnail mt-2" alt="..."></div>
                                                            @endif
                                                        </div>
                                                    </td>


                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="vtext">Select your Category <span style="color: red">*</span><br>
                                    <strong>अपनी श्रेणी का चयन करें</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_ddlCategory__">
                                        <select name="category" id="category" class="dropdownlong form-control">
                                            <option value="">Please Select</option>
                                            <option value="OBC" @if(!empty(auth()->user()->step1_updated_at)) {{auth()->user()->category == "OBC" ? 'selected' : ''}} @endif>OBC</option>
                                            <option value="General" @if(!empty(auth()->user()->step1_updated_at)) {{auth()->user()->category == "General" ? 'selected' : ''}} @endif>General</option>
                                            <option value="ST" @if(!empty(auth()->user()->step1_updated_at)) {{auth()->user()->category == "ST" ? 'selected' : ''}} @endif>ST</option>
                                            <option value="SC" @if(!empty(auth()->user()->step1_updated_at)) {{auth()->user()->category == "SC" ? 'selected' : ''}} @endif>SC</option>
                                        </select>
                                    </span>
                                    <br>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_lblSCBN__"></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="vtext">Details of Fee Deposited
                                    <br>
                                    <strong>शुल्क का विवरण जमा</strong>
                                </td>
                                <td class="colon">:</td><span style="color: red">*</span>


                                </td>
                            </tr>

                            <tr>
                                <td class="vtext"></td>
                                <td class="colon">&nbsp;</td>
                                <td>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_btnSave__"></span>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>


            </div>

        </div>


        <button type="submit" class="btn btn-warning">Save</button>
    </form>
</li>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script>
    $(document).ready(function()
    {
        $('#state-dropdown').on('change',function()
        {
            let stateCode = this.value;
            console.log(stateCode);
                $.ajax({
                    url: '/districtslist',
                    type:'POST',
                    data:'stateCode='+stateCode+
                    '&_token={{csrf_token()}}',
                    success:function(result){
                        $('#district-dropdown').html(result)
                    }
                });
        });
        
    });
</script>

