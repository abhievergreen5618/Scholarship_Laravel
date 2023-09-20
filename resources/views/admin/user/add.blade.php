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
                        <h3 class="card-title">Add User</h3>
                    </div>
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                <form id="class-add-form" action="{{route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                @isset($data)
                                    <input type="hidden" name="id" value="{{encrypt($data->id)}}">
                                @endisset
                                <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <h3><span>Step [1/6] :</span> Personal Information &nbsp;
                    <span id="Anthem_ctl00_ContentPlaceHolder1_lblPageMsg__"><span
                            id="ctl00_ContentPlaceHolder1_lblPageMsg" style="color:Red;"></span></span>
                </h3>
                <div class="box-body table-responsive">
                                <table id="ctl00_ContentPlaceHolder1_Table1" class="table Eng_hindi_form mobile_form" width="100%"
                        border="0" cellspacing="5" cellpadding="0">
                        <tbody>
                            <tr>
                                <td colspan="3"><b><u>Fields marked <span style="color: red">*</span> are
                                            mandatory.</u></b></td>
                            </tr>
                            <tr>
                                <td width="42%" class="vtext">Name of Scholarship
                                    <br>
                                    <strong>छात्रवृत्ति का नाम</strong>
                                </td>
                                <td class="colon">:</td>

                                <td>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_ddlExamCenter__">
                                        <select name="scholarshipname" id="scholarshipname"
                                            class="dropdownlong form-select">
                                            <option value=""> Please Select </option>
                                            @foreach(json_decode($scholarshipSelect) as $scholarshipname)
                                            <option value="{{ $scholarshipname }}">
                                                {{ $scholarshipname }}
                                            </option>
                                            @endforeach
                                      
                                            
                                            </select>
                                    </span>
                                </td>

</tr>
                            <tr>
                                <td class="vtext">Name(IN CAPITAL LETTERS) as per Matric certificate <span
                                        style="color: red">*</span><br>
                                    <strong>नाम (मैट्रिक सर्टिफिकेट के अनुसार)</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_txtName__"><input name="name" type="text"
                                            value="{{isset(auth()->user()->step1_updated_at) ? auth()->user()->name : ''}}"
                                            maxlength="50" id="name" class="textboxlong form-control"
                                            style="text-transform: uppercase"></span>
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
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_txtFatherName__"><input name="fathername"
                                            type="text"
                                            value="@if(!empty(auth()->user()->step1_updated_at)) {{auth()->user()->fathername}} @endif"
                                            maxlength="50" id="fathername" class="textboxlong form-control"
                                            style="text-transform: uppercase"></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="vtext">Mother's Name <span style="color: red">*</span>
                                    <br>
                                    <strong>मां का नाम</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_txtMName__"><input name="mothername"
                                            type="text"
                                            value="@if(!empty(auth()->user()->step1_updated_at)) {{auth()->user()->mothername}} @endif"
                                            maxlength="50" id="mothername" class="textboxlong form-control"
                                            style="text-transform: uppercase"></span>
                                </td>
                            </tr>

                            <!------------------------------------------------->
                            <tr id="ctl00_ContentPlaceHolder1_trExamCenter">
                                <td class="vtext">Examination State for Entrance Test <span
                                        style="color: red">*</span><br>
                                    <strong>प्रवेश परीक्षा के लिए परीक्षा केन्द्र</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>

                                    <div class="form-group mb-3">
                                        <select id="state-dropdown" name="examcentre" class="form-control">
                                            <option value="">-- Select State --</option>
                                            @if(!empty($states))
                                            @foreach ($states as $state)
                                            <option value="{{ $state->code }}">
                                                {{ $state->name }}
                                            </option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </td>
                            </tr>

                            <tr id="ctl00_ContentPlaceHolder1_trExamCenter">
                                <td class="vtext">Examination Centre for Entrance Test <span
                                        style="color: red">*</span><br>
                                    <strong>प्रवेश परीक्षा के लिए परीक्षा केन्द्र</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>

                                    <div class="form-group mb-3">
                                        <select id="district-dropdown" name="districtDropdown" class="form-control">
                                            <option value="">-- Select District --</option>
                                        </select>
                                    </div>

                                </td>
                            </tr>

                            <!-------------------------------------------------->

                            <tr>
                                <td class="vtext">Address for Correspondence (IN CAPITAL LETTERS) <span
                                        style="color: red">*</span>
                                    <br>
                                    <strong>पत्रव्यवहार हेतु पता</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>

                                    <span id="Anthem_ctl00_ContentPlaceHolder1_txtCAddress__"><textarea name="caddress"
                                            rows="5" cols="20" id="caddress" class="textboxmultiline form-control"
                                            onkeypress="if (this.value.length > 199) { return false; }"
                                            style="text-transform: uppercase">{{!empty(auth()->user()->step1_updated_at) ? auth()->user()->caddress : ''}}</textarea></span>
                                </td>
                            </tr>
                            <tr> 
                                <td class="vtext">Mobile No. <span style="color: red">*</span>
                                    <br>
                                    <strong>मोबाइल नंबर</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_txtMobileNo__"><input name="mobileno"
                                            value="@if(!empty(auth()->user()->step1_updated_at)) {{auth()->user()->mobileno}} @endif"
                                            maxlength="10" id="mobileno" type="number" class="textboxlong form-control"
                                            ondrop="return false;" ondrag="return false;" onpaste="return false;"
                                            oncut="return false;"
                                            onkeydown="return AllownumberOnly(event,this);"></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="vtext">Permanent Home Address (IN CAPITAL LETTERS) <span
                                        style="color: red">*</span>
                                    <br>
                                    <strong>स्थाई घर का पता</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_chkboxCopyAddress__"><span class="chkbox"
                                            style="color: black;"><input
                                                id="ctl00_ContentPlaceHolder1_chkboxCopyAddress" type="checkbox"
                                                name="ctl00$ContentPlaceHolder1$chkboxCopyAddress"
                                                class="form-check-input"><label
                                                for="ctl00_ContentPlaceHolder1_chkboxCopyAddress">Same as Correspondence
                                                Address</label></span></span>
                                    <br>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_txtPAddress__"><textarea name="paddress"
                                            rows="5" cols="20" id="paddress" class="textboxmultiline form-control"
                                            onkeypress="if (this.value.length > 199) { return false; }"
                                            style="text-transform: uppercase;">{{!empty(auth()->user()->step1_updated_at) ? auth()->user()->paddress : ''}}</textarea></span>


                                </td>
                            </tr>
                            <tr>
                                <td class="vtext">Email-Id <span style="color: red">*</span>
                                    <br>
                                    <strong>ईमेल-आईडी</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_txtEmail__"><input name="email"
                                            type="text"  
                                            value="{{!empty(auth()->user()->step1_updated_at) ? auth()->user()->email : ''}}" maxlength="50"
                                            id="email" class="textboxlong form-control" ondrop="return false;"></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="vtext">Date of Birth
                                    <br>
                                    <strong>जन्म की तारीख</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_txtDob__"><input type="date"
                                            value="{{!empty(auth()->user()->step1_updated_at) ? date('Y-m-d',strtotime((auth()->user()->dob))) : ''}}"
                                            id="dob" name="dob" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td class="vtext">Aadhaar No.<br>
                                    <strong>आधार संख्या</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_txtAadhaarNo__"><input name="aadhaarno"
                                            id="aadhaarno" class="form-control" type="number"
                                            value="{{!empty(auth()->user()->step1_updated_at) ? auth()->user()->aadhaarno : ''}}"
                                            maxlength="12" ondrop="return false;" ondrag="return false;"
                                            class="textboxlong"></span>
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
                                                            <input class="form-check-input" type="radio"
                                                                name="nationality" id="Nationality1" value="I"
                                                                @if(!empty(auth()->user()->step1_updated_at))
                                                            {{auth()->user()->nationality == "I" ? 'checked' : ''}}
                                                            @endif>
                                                            <label class="form-check-label"
                                                                for="Nationality1">Indian</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="nationality" id="Nationality2" value="O"
                                                                @if(!empty(auth()->user()->step1_updated_at))
                                                            {{auth()->user()->nationality == "O" ? 'checked' : ''}}
                                                            @endif>
                                                            <label class="form-check-label"
                                                                for="Nationality2">Other</label>
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
                                                            <input class="form-check-input" type="radio" name="gender"
                                                                id="gender1" value="M"
                                                                @if(!empty(auth()->user()->step1_updated_at))
                                                            {{auth()->user()->gender == "M" ? 'checked' : ''}} @endif>
                                                            <label class="form-check-label" for="gender1">Male</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gender"
                                                                id="gender2" value="F"
                                                                @if(!empty(auth()->user()->step1_updated_at))
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
                                        <input class="form-check-input" type="radio" name="singlegirlchild"
                                            id="singlegirlchildyes" value="yes"
                                            @if(!empty(auth()->user()->step1_updated_at))
                                        {{auth()->user()->singlegirlchild == "yes" ? 'checked' : ''}} @endif>
                                        <label class="form-check-label" for="yes">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="singlegirlchild"
                                            id="singlegirlchildno" value="no"
                                            @if(!empty(auth()->user()->step1_updated_at))
                                        {{auth()->user()->singlegirlchild == "no" ? 'checked' : ''}} @endif>
                                        <label class="form-check-label" for="no">No</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>



                            <!-----------------------SUBJECT------------------->


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
                                            @foreach(json_decode($subjectSelect) as $subject)
                                            <option value="{{ $subject }}">
                                                {{ $subject }}
                                            </option>
                                            @endforeach
                                        </select>

                                    </span>
                                    <br>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_lblSCBN__"></span>
                                </td>
                            </tr>

                            <!------------------------------------------------->


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
                                        <table id="ctl00_ContentPlaceHolder1_rdbphysicallychallenged"
                                            class="radio w-100" border="0">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="physicallychallenged" id="physicallychallengedyes"
                                                                value="yes"
                                                                @if(!empty(auth()->user()->step1_updated_at))
                                                            {{auth()->user()->physicallychallenged == "yes" ? 'checked'
                                                            : ''}} @endif>
                                                            <label class="form-check-label"
                                                                for="physicallychallengedyes">Yes</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="physicallychallenged" id="physicallychallengedno"
                                                                value="no" @if(!empty(auth()->user()->step1_updated_at))
                                                            {{auth()->user()->physicallychallenged == "no" ? 'checked' :
                                                            ''}} @endif>
                                                            <label class="form-check-label"
                                                                for="physicallychallengedno">No</label>
                                                        </div>
                                                        <div id="proofofdocuments" {{ !empty(auth()->
                                                            user()->physicallychallenged == "yes") ? 'style="display:
                                                            none;"' : ''}}>
                                                            <h3 class="hedingss">upload proof of documents</h3>

                                                            <form action="#">
                                                                <div class="input-group mb-3">
                                                                    <input type="file" class="form-control"
                                                                        id="physicallychallengedproof"
                                                                        name="physicallychallengedproof">
                                                                </div>
                                                            </form>

                                                            @if(!empty(auth()->user()->physicallychallenged == "yes"))
                                                            <div><img id="physicallychallengedproof_photo_perview"
                                                                    src="{{ asset('public/images/proofdoc/'.auth()->user()->physicallychallengedproof) }}"
                                                                    class="img-thumbnail mt-2" alt="..."></div>
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
                                                @endif>General</option>
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

                                    <div id="categorycertificate" {{ !empty
                                        (in_array(auth()->user()->categorycertificate, ["OBC", "SC", "ST"])) ? 'style="display: none;"' : ''}}>

                                                            <h3 class="hedingss">upload category certificate</h3>

                                                            <form action="#">
                                                                <div class="input-group mb-3">
                                                                    <input type="file" class="form-control"
                                                                        id="categorycertificate"
                                                                       name="categorycertificate">
                                                                </div>
                                                            </form>

                                                            @if(!empty((in_array(auth()->user()->categorycertificate, ["OBC", "SC", "ST"])) ? 'style="display: none;"' : ''))
                                                            <div><img id="categorycertificate_photo_perview"
                                                                    src="{{ asset('public/images/proofdoc/'.auth()->user()->categorycertificate) }}"
                                                                    class="img-thumbnail mt-2" alt="..."></div>
                                                            @endif
                                                        </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="vtext">Details of Fee Deposited
                                    <br>
                                    <strong>शुल्क का विवरण जमा</strong>
                                </td>
                                <td class="colon">:</td><span style="color: red">*</span>
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

        </div>


        <button type="submit" class="btn btn-warning">Save</button>
    </form>

  <!-------------------------------------------------SECOND STEP------------------------------------------>  


  <form id="docform" method="POST" action="{{route('admin.user.storedocument')}}" enctype="multipart/form-data">
        @csrf 
        <input type="hidden" value="{{ encrypt(auth()->user()->id) }}" name="id">
        <div class="tab-content"> 
            <div class="tab-pane active" id="tab_2">

                <h3><span>Step [2/5] :</span>Education &amp; Document Details &nbsp;
                    <span id="Anthem_ctl00_ContentPlaceHolder1_lblPageMsg__"><span id="ctl00_ContentPlaceHolder1_lblPageMsg" style="color:Red;"></span></span>
                </h3>

                <!-- <table id="ctl00_ContentPlaceHolder1_tblInstruction" class="table Eng_hindi_form" width="100%" border="0" cellspacing="5" cellpadding="0">
                    <tbody>
                        <tr>
                            <td colspan="6" class="tdgap" width="42%" align="left"></td>
                        </tr>
                        <tr>
                            <td colspan="6" align="center">
                                <div style="border: solid 1px #ccc; border-radius: 5px; padding: 5px; background-color: #ff6000">
                                    <div style="font-size: 14px; color: #fff"><b>INSTRUCTION :</b> once <b>'result
                                            status'</b> of education qualification is saved as <b>'passed'</b> by the
                                        candidate, then he/she can not change the status further. </div>

                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table> -->


                <table id="ctl00_ContentPlaceHolder1_tblEducationInstrucation" class="table Eng_hindi_form mobile_form" width="100%" border="0" cellspacing="5" cellpadding="0">
                    <tbody>
                        <tr>
                            <td colspan="3"><strong>Note :</strong> &nbsp;* Correct upto two decimal places.<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><u>Fields
                                        marked <span style="color: red">*</span> are mandatory.</u></b><br>

                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" align="center"><strong><span style="color: #009e0c">Document Name max 10
                                        characters allowed.</span></strong></td>
                        </tr>
                        <tr>
                            <td colspan="3" align="center"><strong><span style="color: #009e0c">if any Problem in
                                        Uploading document then go through microsoft internet explorer and mozilla web
                                        browsers.</span></strong></td>
                        </tr>

                        <tr>
                            <td colspan="3"><b>Academic Qualifications</b><br>
                                <strong><b>शैक्षणिक योग्यता</b></strong>
                            </td>
                            <td class="colon"></td>
                        </tr>
                    </tbody>
                </table>

                <div id="ctl00_ContentPlaceHolder1_divEducationGrid" class="box-body  table-responsive">
                    <span id="Anthem_ctl00_ContentPlaceHolder1_lbl_UploadDocDtls__"><span id="ctl00_ContentPlaceHolder1_lbl_UploadDocDtls" style="color:Red;margin-left: 80%"></span></span>
                    <div class="gridiv">
                        <div id="Anthem_ctl00_ContentPlaceHolder1_gvsubject__">
                            <div>
                                <table class="table" cellspacing="1" cellpadding="1" rules="all" border="1" id="ctl00_ContentPlaceHolder1_gvsubject" style="width:100%;border:1px solid #B0B0B0;border-collapse:collapse; margin:15px 0;">
                                    <tbody>
                                        <tr class="header-style">
                                            <th scope="col">S.No</th>
                                            <th scope="col">Result Status <span style="color:red">*</span></th>
                                            <th scope="col">Examination Passed <span style="color:red">*</span></th>
                                            <th scope="col">Name of The Board/University <span style="color:red">*</span>
                                            </th>
                                            <th scope="col">Passing Year <span style="color:red">*</span> </th>
                                            <th scope="col">Credits/Marks Obtained <span style="color:red">*</span></th>
                                            <th scope="col">Maximum Marks(not for the candidate with CGPA) <span style="color:red">*</span></th>
                                            <th scope="col">% Marks <span style="color:red">*</span></th>
                                            <th scope="col">Exam. Roll No. <span style="color:red">*</span></th>
                                        </tr>
                                        <tr class="dgitem-style" style="background-color:White;">
                                            <td align="center" style="width:5%;">
                                                1
                                            </td>
                                            <td align="center" style="width:12%;">
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl04_ddlRStatus__"><select name="class_status" id="class_status" class="form-select">
                                                        <option value="P" {{(isset($step2schooldata['resultstatus']) && $step2schooldata['resultstatus'] == 'P') ? 'selected' : ''}}>Passed</option>
                                                        <option value="A" {{(isset($step2schooldata['resultstatus']) && $step2schooldata['resultstatus'] == 'A') ? 'selected' : ''}}>Awaited</option>
                                                        <option value="N" {{(isset($step2schooldata['resultstatus']) && $step2schooldata['resultstatus'] == 'N') ? 'selected' : ''}}>Not Applicable</option>


                                                    </select></span>
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_ddlRStatus__"></span>
                                            </td>


                                            
                                            <!------------------------------CLASS---------------------------->

                                            <td align="center" style="width:12%;">
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblExamPassed__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblExamPassed">Class 5 to
                                                        Class 12 or its Equivalent</span></span>


                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl04_ddlGraduateExam__"><select name="classes" id="classes" class="dropdown1 form-select">
                                                        <option selected="selected" value="">--Select Class--</option>
                                                        @if(!empty($classes))
                                                        @foreach($classes as $class)
                                                        <option value="{{ $class->class }}">{{ $class->class }}</option>
                                                        @endforeach
                                                        @else
                                                        <option value=""disabled>No class found</option>
                                                        @endif
                                                    </select></span>

                                            </td>

                                            <!---------------------------------------------------------->
                                          
  <td align="center">

                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl03_txtNameofUniver__"><input name="class_board" type="text" maxlength="50" id="class_board" class="textbox form-control" onpaste="return false" ondrop="return false" value="{{isset($step2schooldata['name_of_the_board_university']) ? $step2schooldata['name_of_the_board_university'] : '' }}"></span>





                                            </td>
                                            <td align="center" style="width:10%;>
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_ddlYear__"><select name="class_passing_year" id="class_passing_year" class="form-select">
                                                        <option value="">--Select --</option>
                                                        <option value="1976" {{isset($step2schooldata['passing_year']) && $step2schooldata['passing_year'] == '1976' ? 'selected' : ''}}>1976</option>
                                                        <option value="2014" {{isset($step2schooldata['passing_year']) && $step2schooldata['passing_year'] == '2014' ? 'selected' : ''}}>2014</option>
                                                        <option value="2015" {{isset($step2schooldata['passing_year']) && $step2schooldata['passing_year'] == '2015' ? 'selected' : ''}}>2015</option>
                                                        <option value="2016" {{isset($step2schooldata['passing_year']) && $step2schooldata['passing_year'] == '2016' ? 'selected' : ''}}>2016</option>
                                                        <option value="2017" {{isset($step2schooldata['passing_year']) && $step2schooldata['passing_year'] == '2017' ? 'selected' : ''}}>2017</option>
                                                        <option value="2018" {{isset($step2schooldata['passing_year']) && $step2schooldata['passing_year'] == '2018' ? 'selected' : ''}}>2018</option>
                                                        <option value="2019" {{isset($step2schooldata['passing_year']) && $step2schooldata['passing_year'] == '2019' ? 'selected' : ''}}>2019</option>
                                                        <option value="2020" {{isset($step2schooldata['passing_year']) && $step2schooldata['passing_year'] == '2020' ? 'selected' : ''}}>2020</option>
                                                        <option value="2021" {{isset($step2schooldata['passing_year']) && $step2schooldata['passing_year'] == '2021' ? 'selected' : ''}}>2021</option>
                                                        <option value="2022" {{isset($step2schooldata['passing_year']) && $step2schooldata['passing_year'] == '2022' ? 'selected' : ''}}>2022</option>
                                                        <option value="2023" {{isset($step2schooldata['passing_year']) && $step2schooldata['passing_year'] == '2023' ? 'selected' : ''}}>2023</option>

                                                    </select></span>
                                            </td>
                                            <td align="center" >
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_txtCreditMarks__"><input name="class_marks" type="number" maxlength="6" id="class_marks" class="textbox form-control" onpaste="return false" ondrop="return false" onkeydown="return NumberOnly(event,this);" style="width:85px;" value="{{isset($step2schooldata['credits_marks_Obtained']) ? $step2schooldata['credits_marks_Obtained'] : '' }}"></span>

                                            </td>
                                            <td align="center">
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_txtMaxMarks__"><input name="class_max_marks" type="number" maxlength="6" id="class_max_marks" class="textbox form-control" onkeydown="return NumberOnly(event,this);" onpaste="return false" ondrop="return false" style="width:85px;" value="{{isset($step2schooldata['maximum_marks']) ? $step2schooldata['maximum_marks'] : '' }}"></span>
                                            </td>
                                            <td align="center">
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_txtCreMarkPercent__"><input name="class_percentage" type="number" maxlength="5" id="class_percentage" class="textbox form-control" onpaste="return false" ondrop="return false" onkeydown="return NumberOnly(event,this);" style="width:65px;" value="{{isset($step2schooldata['percentage_marks']) ? $step2schooldata['percentage_marks'] : '' }}"></span>

                                            </td>
                                            <td align="center">
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_txtExamRollNo__"><input name="class_rollno" type="number" maxlength="15" id="class_rollno" class="textbox form-control" onpaste="return false" ondrop="return false"  value="{{isset($step2schooldata['exam_roll_no']) ? $step2schooldata['exam_roll_no'] : '' }}"></span>
                                            </td>

                                        </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="box-body table-responsive">

                    <table id="ctl00_ContentPlaceHolder1_Table2" class="table Eng_hindi_form mobile_form" width="100%" border="0" cellspacing="5" cellpadding="0">
                        <tbody>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3">Were you ever disqualified/suspended by the School or any other
                                    institution from attending classes or appearing in any exam? if yes give Details:
                                    <br>
                                    <strong>तुम कभी विश्वविद्यालय या किसी अन्य संस्था द्वारा कक्षाओं में भाग लेने या
                                        किसी भी परीक्षा में प्रदर्शित होने से निलंबित कर दिया गए? यदि हाँ जानकारी दे
                                    </strong>
                                    <span style="color:red">*</span>
                                </td>
                            </tr>
                            <tr>
                                <td width="48%">Yes/No
                                    <br>
                                    <strong>हाॅ/ नही </strong>
                                </td>
                                <td class="colon">:</td>
                                <td width="48%">
                                    <div id="Anthem_ctl00_ContentPlaceHolder1_rdListYesNo__">
                                        <table id="ctl00_ContentPlaceHolder1_rdListYesNo" class="radio" border="0">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="disqualified/suspended" id="disqualified/suspendedyes" value="yes" {{isset($step2graduationdata['disqualified/suspended']) && $step2graduationdata['disqualified/suspended'] == "yes" ? 'checked' : ''}}>
                                                            <label class="form-check-label" for="disqualified/suspendedyes">Yes</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="disqualified/suspended" id="disqualified/suspendedno" value="no" {{isset($step2graduationdata['disqualified/suspended']) && $step2graduationdata['disqualified/suspended'] == "no" ? 'checked' : ''}}>
                                                            <label class="form-check-label" for="disqualified/suspendedno">No</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Details
                                    <br>
                                    <strong>विवरण
                                    </strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_txtDetails__"><textarea name="details" rows="2" cols="20" id="details" class="textboxmultiline form-control" ondrop="return false;" onpaste="return false;" disabled>{{isset($step2graduationdata['disqualified/suspended']) && $step2postgraduationdata['disqualified/suspended'] == "Y" ? $step2graduationdata['disqualified/suspended_details'] : ''}}</textarea></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3"><strong>Note :<br>
                                    </strong><strong><span id="ctl00_ContentPlaceHolder1_spn_FsignMsg">Photograph,Signature and
                                            Father/Guardian signature</span><br>
                                        should be in <span style="color: red">.jpg or .Jpeg format</span> and max size
                                        20KB allowed.


                                        <br>

                                        Filename<span style="color: red"> max 10 Characters</span> Allowed.</strong>
                                    </td>
                            </tr>
                            <tr>
                                <td>Upload Your Photograph
                                    <br>
                                    <strong>अपना तस्वीर डाले
                                    </strong>
                                    <span style="color:red">*</span>
                                </td>
                                <td class="colon">:</td>
                                <td>




                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <span id="Anthem_ctl00_ContentPlaceHolder1_UploadImg__"><input type="file" name="profile_photo" id="profile_photo" class="uploadfiles" accept="image/jpeg,image/jpg"></span>
                                                    <div><img id="profile_photo_perview" src="{{ (!empty(auth()->user()->photo)) ? asset('public/images/proofdoc/'.auth()->user()->photo) : 'http://placehold.it/180'}}" class="img-thumbnail mt-2" alt="..."></div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>


                                </td>
                            </tr>
                            <tr>
                                <td>Upload Your Signature
                                    <br>
                                    <strong>अपना हस्ताक्षर डाले
                                    </strong>
                                    <span style="color:red">*</span>
                                </td>
                                <td class="colon">:</td>
                                <td>


                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <span id="Anthem_ctl00_ContentPlaceHolder1_UploadSignature__"><input type="file" name="sign_photo" id="sign_photo" class="uploadfiles" accept="image/jpeg,image/jpg"></span>
                                                    <div><img id="sign_photo_perview" src="{{ (!empty(auth()->user()->signature)) ? asset('public/images/proofdoc/'.auth()->user()->signature) : 'http://placehold.it/180'}}" class="img-thumbnail mt-2" alt="..."></div>
                                                </td>
                                            </tr>


                                        </tbody>
                                    </table>


                                </td>
                            </tr>
                
                            <tr>

                            </tr>
                            <tr>
                                <td class="vtext"></td>
                                <td class="colon">&nbsp;</td>
                                <td>

                                    <span id="Anthem_ctl00_ContentPlaceHolder1_btnSave__"></span>&nbsp;&nbsp;

                                    <span id="Anthem_ctl00_ContentPlaceHolder1_btnReset__"></span>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_lblMsg__"><span id="ctl00_ContentPlaceHolder1_lblMsg" style="color:Red;"></span></span>
                                </td>
                            </tr>
                             <tr>
                                <!-- <td align="left">

                                    <span id="Anthem_ctl00_ContentPlaceHolder1_btnBack__"><input type="submit" name="ctl00$ContentPlaceHolder1$btnBack" value="BACK" id="ctl00_ContentPlaceHolder1_btnBack" class="btn-primary"></span> -->
                                <td colspan="6" class="tdgap" width="42%" align="left">

                                    <span id="Anthem_ctl00_ContentPlaceHolder1_btnBackEdit__"><input type="submit" name="ctl00$ContentPlaceHolder1$btnBackEdit" value="SAVE " id="ctl00_ContentPlaceHolder1_btnBackEdit" class="btn-primary"></span>&nbsp;&nbsp;
                                
                                </td>
                                <td colspan="2" align="right">
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_btnSaveNext__"></span>
                                </td>
                            </tr> 
                            </form>
                            </tbody>
                                    </table>
                          

        <form id="bankform" method="POST" action="{{route('admin.user.storebankdata')}}" enctype="multipart/form-data">
        @csrf 
        @if(session('msg'))
    <div class="alert alert-success">
        {{ session('msg') }}
    </div>
@endif
             
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
                <span id="Anthem_ctl00_ContentPlaceHolder1_txtAccountNo__"><input name="accountno"  maxlength="15" id="accountno" value="{{!empty(auth()->user()->step3_updated_at) ? auth()->user()->accountno : ''}}" type="number" class="textboxlong form-control" ondrop="return false;" ondrag="return false;" onpaste="return false;" oncut="return false;" onkeydown="return AllownumberOnly(event,this);"></span>
            </td>
    </tr>
    <tr>
        <td class="text">Confirm Account No. <span style="color: red">*</span>
        <br>
            <strong>खाता संख्या</strong>
        </td>
        <td class="colon">:</td>
            <td>
                <span id="Anthem_ctl00_ContentPlaceHolder1_txtAccountNo__"><input name="cnfrmaccountno"  maxlength="15" id="cnfrmaccountno" value="{{!empty(auth()->user()->step3_updated_at) ? auth()->user()->cnfrmaccountno : ''}}" type="number" class="textboxlong form-control" ondrop="return false;" ondrag="return false;" onpaste="return false;" oncut="return false;"></span>
            </td>
    </tr>
    <tr>
        <td class="vtext">Account Holder Name<span style="color: red">*</span><br>
            <strong>बैंकिंग खाता नाम</strong>
        </td>
        <td class="colon">:</td>
            <td>
                <span id="Anthem_ctl00_ContentPlaceHolder1_txtName__"><input name="holdername" type="text" value="{{!empty(auth()->user()->step3_updated_at) ? auth()->user()->holdername : ''}}" maxlength="50" id="name" class="textboxlong form-control" style="text-transform: uppercase"></span>
            </td>
    </tr>
        <tr>
            <td class="vtext">IFSC Code<span style="color: red">*</span><br>
                <strong>आईएफएससी कोड</strong>
            </td>
            <td class="colon">:</td>
                <td>
                    <span id="Anthem_ctl00_ContentPlaceHolder1_txtName__"><input name="ifsccode" type="text"  maxlength="50" value="{{!empty(auth()->user()->step3_updated_at) ? auth()->user()->ifsccode : ''}}" id="name" class="textboxlong form-control" style="text-transform: uppercase"></span>
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
                                                    <span id="Anthem_ctl00_ContentPlaceHolder1_Uploadpassbook__"><input type="file" name="passbook_photo" value="{{!empty(auth()->user()->step3_updated_at) ? auth()->user()->passbook_photo : ''}}" id="passbook_photo" class="uploadfiles" accept="image/jpeg,image/jpg"></span>
                                                    </td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="submit" class="btn btn-warning">Save</button>
                                </td>
                            </tr>
                            </div> 

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    </form>

</section>


<script src="{{ asset('js/jquery.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#state-dropdown').on('change', function () {
            let stateCode = this.value;
            console.log(stateCode);
            $.ajax({
                url: 'districtslist',
                type: 'POST',
                data: 'stateCode=' + stateCode +
                    '&_token={{csrf_token()}}',
                success: function (result) {
                    $('#district-dropdown').html(result)
                }
            });
        });

    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#subjects").select2({
        multiple: true
        });
    });
</script>

<script>
    $(document).ready(function() {
    $('input[name="physicallychallenged"]').on('change', function() {
        var physicallyChallenged = $(this).val();
        if (physicallyChallenged === "yes") {
        updateFee(physicallyChallenged);
    }else {
        $('#fee').html('');
    }
    });

    $('#category').on('change', function() {
        var category = $(this).val();
        updateFee(category);
    });

    function updateFee(feetype) {
        $.ajax({
            url: 'get-fee/' + feetype, 
            method: 'GET',
            success: function(response) {
                if (response.fee) {
                    $('#fee').html('Rs.' + response.fee);
                } 
            },
            error: function() {
                // Handle errors if needed
            }
        });
    }

    // Initialize the fee display when the page loads
    var selectedOption = $('input[name="physicallychallenged"]:checked').val();
    updateFee(selectedOption);
});


</script>
@endsection