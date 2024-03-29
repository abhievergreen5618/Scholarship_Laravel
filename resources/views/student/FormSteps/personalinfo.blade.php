<li class="tab-content tab-content-first typography">
    <form id="frm" action="{{route('personalinfosubmit')}}" enctype="multipart/form-data" method="POST">
        @csrf
        <input type="hidden" value="{{ encrypt(auth()->user()->id) }}" name="id">
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <h3><span>Step [1/6] :</span> Personal Information</span></h3>
            </div>
            <div class="box-body table-responsive">
                <table id="ctl00_ContentPlaceHolder1_Table1" class="table Eng_hindi_form mobile_form" width="100%" border="0" cellspacing="5" cellpadding="0">
                    <tbody>
                        <tr>
                            <td colspan="3"><b><u>Fields marked <span style="color: red">*</span>are mandatory.</u></b></td>
                        </tr>
                        <tr>
                            <td width="42%" class="vtext">Session
                                <br>
                                <strong>सत्र</strong>
                            </td>
                            <td class="colon">:</td>
                            <td>
                                <span id="Anthem_ctl00_ContentPlaceHolder1_ddlExamCenter__">
                                    <select name="session" id="session" class="dropdownlong form-select">
                                        <option value=""> Please Select </option>
                                        @foreach($sessions as $key=>$session)
                                            <option value="{{ $key }}" {{isset(auth()->user()->session) && $key == auth()->user()->session ? 'selected' : '' }}>
                                                {{ $session }}
                                            </option>
                                        @endforeach
                                    </select>
                                </span>
                            </td>
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
                                        @foreach($scholarship as $key=>$scholarshipname)
                                        <option value="{{ $key }}" {{isset(auth()->user()->scholarshipname) && $key == auth()->user()->scholarshipname ? 'selected' : '' }}>
                                            {{ $scholarshipname }}
                                        </option>
                                        @endforeach
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
                            <td class="vtext">Mother's Name<span style="color: red">*</span>
                                <br>
                                <strong>मां का नाम</strong>
                            </td>
                            <td class="colon">:</td>
                            <td>
                                <span id="Anthem_ctl00_ContentPlaceHolder1_txtMName__"><input name="mothername" type="text" value="@if(!empty(auth()->user()->step1_updated_at)) {{auth()->user()->mothername}} @endif" maxlength="50" id="mothername" class="textboxlong form-control" style="text-transform: uppercase"></span>
                            </td>
                        </tr>

                        <tr id="ctl00_ContentPlaceHolder1_trExamCenter">
                            <td class="vtext">Examination State for Entrance Test<span style="color: red">*</span><br>
                                <strong>प्रवेश परीक्षा के लिए परीक्षा केन्द्र</strong>
                            </td>
                            <td class="colon">:</td>
                            <td>

                                <div class="form-group mb-3">
                                    <select id="state-dropdown" name="examcentre" class="form-control">
                                        <option value="">-- Select State --</option>
                                        @forelse($states as $key=>$state)
                                        <option value="{{ $key }}" {{isset(auth()->user()->examcentre) && $key == auth()->user()->examcentre ? 'selected' : '' }}>
                                            {{ $state }}
                                        </option>
                                        @empty
                                        <option value="">
                                            No option founded
                                        </option>
                                        @endforelse
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr id="ctl00_ContentPlaceHolder1_trExamCenter">
                            <td class="vtext">Examination Centre for Entrance Test <span style="color: red">*</span><br>
                                <strong>प्रवेश परीक्षा के लिए परीक्षा केन्द्र</strong>
                            </td>
                            <td class="colon">:</td>
                            <td>

                                <div class="form-group mb-3">
                                    <select id="district-dropdown" name="examdistrict" class="form-control">
                                        <option value="">-- Select District --</option>
                                    </select>
                                </div>

                            </td>
                        </tr>

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
                                <span id="Anthem_ctl00_ContentPlaceHolder1_txtMobileNo__"><input name="mobileno" value="{{ !empty(auth()->user()->step1_updated_at) ? auth()->user()->mobileno : '' }}" maxlength="10" id="mobileno" type="number" class="textboxlong form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"></span>
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
                                <span id="Anthem_ctl00_ContentPlaceHolder1_txtAadhaarNo__"><input name="aadhaarno" id="aadhaarno" class="form-control" type="number" value="{{!empty(auth()->user()->step1_updated_at) ? auth()->user()->aadhaarno : ''}}" maxlength="12" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="textboxlong"></span>
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
                                                        <input class="form-check-input" type="radio" name="nationality" id="Nationality1" value="I" @if(!empty(auth()->user()->step1_updated_at))
                                                        {{auth()->user()->nationality == "I" ? 'checked' : ''}}
                                                        @endif>
                                                        <label class="form-check-label" for="Nationality1">Indian</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="nationality" id="Nationality2" value="O" @if(!empty(auth()->user()->step1_updated_at))
                                                        {{auth()->user()->nationality == "O" ? 'checked' : ''}}
                                                        @endif>
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
                                                        <input class="form-check-input" type="radio" name="gender" id="gender1" value="M" @if(!empty(auth()->user()->step1_updated_at))
                                                        {{auth()->user()->gender == "M" ? 'checked' : ''}} @endif>
                                                        <label class="form-check-label" for="gender1">Male</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender" id="gender2" value="F" @if(!empty(auth()->user()->step1_updated_at))
                                                        {{auth()->user()->gender == "F" ? 'checked' : ''}} @endif>
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
                                    <strong><span id="ctl00_ContentPlaceHolder1_TrIfGirlsHindi">क्या आप अपने
                                            माता-पिता
                                            के केवल एक लड़की हैं?</span></strong>
                                </div>

                            </td>
                            <td class="colon">:</td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="singlegirlchild" id="singlegirlchildyes" value="yes" @if(!empty(auth()->user()->step1_updated_at))
                                    {{auth()->user()->singlegirlchild == "yes" ? 'checked' : ''}} @endif>
                                    <label class="form-check-label" for="yes">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="singlegirlchild" id="singlegirlchildno" value="no" @if(!empty(auth()->user()->step1_updated_at))
                                    {{auth()->user()->singlegirlchild == "no" ? 'checked' : ''}} @endif>
                                    <label class="form-check-label" for="no">No</label>
                                </div>
                            </td>
                        </tr>
                        <tr id="ctl00_ContentPlaceHolder1_trSportCulturalBoth">
                            <td class="vtext">Applying for subject ?<span style="color: red">*</span>
                                <br>
                                <strong>विषय के लिए आवेदन करना ?</strong>
                            </td>
                            <td class="colon">:</td>
                            <td>
                                <span id="Anthem_ctl00_ContentPlaceHolder1_ddlSportCulturalBoth__">
                                    <select name="subjects[]" id="subjects" class="form-control" multiple="multiple" data-placeholder="Select Subjects" data-dropdown-css-class="select2-purple">
                                        <option value="">--Please Select--</option>
                                        @forelse($subjects as $key=>$subject)
                                        <option value="{{ $key }}" {{!empty(auth()->user()->subjects) && in_array($key,auth()->user()->subjects) ? 'selected' : ''}}>
                                            {{ $subject }}
                                        </option>
                                        @empty
                                        <option value="">
                                            No Subjects
                                        </option>
                                        @endforelse
                                    </select>

                                </span>
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
                                                        <input class="form-check-input" type="radio" name="physicallychallenged" id="physicallychallengedyes" value="yes" @if(!empty(auth()->user()->step1_updated_at))
                                                        {{auth()->user()->physicallychallenged == "yes" ? 'checked'
                                                            : ''}} @endif>
                                                        <label class="form-check-label" for="physicallychallengedyes">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="physicallychallenged" id="physicallychallengedno" value="no" @if(!empty(auth()->user()->step1_updated_at))
                                                        {{auth()->user()->physicallychallenged == "no" ? 'checked' : ''}} @else {{'checked'}} @endif>
                                                        <label class="form-check-label" for="physicallychallengedno">No</label>
                                                    </div>
                                                    <div id="proofofdocuments" style="{{ (empty(auth()->user()->physicallychallenged) || (auth()->user()->physicallychallenged == 'no')) ? 'display:none;' : '' }}">
                                                        <h3 class="hedingss">upload proof of documents</h3>
                                                        <form action="#">
                                                            <div class="input-group mb-3">
                                                                <input type="file" class="form-control" id="physicallychallengedproof" name="physicallychallengedproof" accept="image/png, image/jpg, image/jpeg">
                                                            </div>
                                                        </form>
                                                        @if(!empty(auth()->user()->physicallychallenged && auth()->user()->physicallychallenged == "yes"))
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
                                        <option value="OBC" @if(!empty(auth()->user()->step1_updated_at))
                                            {{auth()->user()->category == "OBC" ? 'selected' : ''}} @endif>OBC
                                        </option>
                                        <option value="General" @if(!empty(auth()->user()->step1_updated_at))
                                            {{auth()->user()->category == "General" ? 'selected' : ''}}
                                            @endif>General
                                        </option>
                                        <option value="ST" @if(!empty(auth()->user()->step1_updated_at))
                                            {{auth()->user()->category == "ST" ? 'selected' : ''}} @endif>ST
                                        </option>
                                        <option value="SC" @if(!empty(auth()->user()->step1_updated_at))
                                            {{auth()->user()->category == "SC" ? 'selected' : ''}} @endif>SC
                                        </option>
                                    </select>
                                </span>
                                <br>
                                <span id="Anthem_ctl00_ContentPlaceHolder1_lblSCBN__"></span>

                                <div id="categorycertificate" {{ !empty(in_array(auth()->user()->categorycertificate, ["OBC", "SC", "ST"])) ? 'style="display: none;"' : ''}}>
                                    <h3 class="hedingss">upload category certificate</h3>

                                    <form action="#">
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" id="categorycertificateproof" name="categorycertificate" accept="image/png, image/jpg, image/jpeg">
                                        </div>
                                    </form>

                                    @if(!empty((in_array(auth()->user()->categorycertificate, ["OBC", "SC", "ST"])) ? 'style="display: none;"' : ''))
                                    <div><img id="categorycertificate_photo_perview" src="{{ asset('public/images/proofdoc/'.auth()->user()->categorycertificate) }}" class="img-thumbnail mt-2" alt="..."></div>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="vtext">Details of Fee Deposited
                                <span style="color: red">*</span><br>
                                <strong>शुल्क का विवरण जमा</strong>
                            </td>
                            <td class="colon">:</td>
                            <td>
                                <div id="fee">
                                </div>
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
        <button type="submit" class="btn btn-warning">Save</button>
    </form>
</li>
