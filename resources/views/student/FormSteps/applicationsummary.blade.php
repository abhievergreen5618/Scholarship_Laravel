<li class="tab-content tab-content-fourth typography" id="payment" data-username="{{auth()->user()->name}}" data-email="{{auth()->user()->email}}" data-contact="{{auth()->user()->mobileno}}" data-razorpaykey="{{env('RAZORPAY_KEY')}}" data-fee="{{auth()->user()->razorpayfee}}" data-paymenturl="{{route('savepaymentdetails')}}" data-failurepaymenturl="{{route('savefailurepaymentdetails')}}">
    <div class="typography">
        <div class="tab-content">
            <div class="tab-pane active" id="tab_4">
                <h3><span>Step [4/6] :</span> Application Summary &nbsp;
                    <span id="Anthem_ctl00_ContentPlaceHolder1_lblPageMsg__"><span id="ctl00_ContentPlaceHolder1_lblPageMsg" style="color:Red;"></span></span>
                </h3>

                <div class="box-body table-responsive">

                    <table id="ctl00_ContentPlaceHolder1_Table1" class="table Eng_hindi_form mobile_form" width="100%" border="0" cellspacing="5" cellpadding="0">
                        <tbody>
                            <tr>
                                <td colspan="3">
                                </td>
                            </tr>
                            <tr>
                                <td width="42%" class="vtext">Name of the Course
                                    <br>
                                    <strong>पाठ्यक्रम का नाम</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_lblCoursName__"><span id="ctl00_ContentPlaceHolder1_lblCoursName"><b>{{(!empty(auth()->user()->step2_updated_at))
                            ? auth()->user()->scholarshipnamesummary : ''}}</b></span></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="vtext">Name(IN CAPITAL LETTETRS)<br>
                                    <strong>नाम</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_lblName__"><span id="ctl00_ContentPlaceHolder1_lblName">{{(!empty(auth()->user()->step2_updated_at))
                        ? strtoupper(auth()->user()->name) : ''}}</span></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="vtext">Father's Name
                                    <br>
                                    <strong>पिता का नाम</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_lblFName__"><span id="ctl00_ContentPlaceHolder1_lblFName">{{(!empty(auth()->user()->step2_updated_at))
                        ? auth()->user()->fathername : ''}}</span></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="vtext">Mother's Name
                                    <br>
                                    <strong>मां का नाम</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_lblMName__"><span id="ctl00_ContentPlaceHolder1_lblMName">{{(!empty(auth()->user()->step2_updated_at))
                        ? auth()->user()->mothername : ''}}</span></span>
                                </td>
                            </tr>
                            <tr id="ctl00_ContentPlaceHolder1_trExamCenter">
                                <td class="vtext">Examination Centre for Entrance Test<br>
                                    <strong>प्रवेश परीक्षा के लिए परीक्षा केन्द्र</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    &nbsp;<span id="Anthem_ctl00_ContentPlaceHolder1_lblExamCname__"><span id="ctl00_ContentPlaceHolder1_lblExamCname">{{(!empty(auth()->user()->step2_updated_at))
                        ? auth()->user()->examCenterName : ''}}</span></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="vtext">Address for Correspondence (IN CAPITAL LETTERS)
                                    <br>
                                    <strong>पत्रव्यवहार हेतु पता</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <div style="width: 350px; word-wrap: break-word;">
                                        <span id="Anthem_ctl00_ContentPlaceHolder1_lblCAddress__"><span id="ctl00_ContentPlaceHolder1_lblCAddress">{{(!empty(auth()->user()->step2_updated_at))
                            ? auth()->user()->caddress : ''}}</span></span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="vtext">Mobile No.
                                    <br>
                                    <strong>मोबाइल नंबर</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_lblMobileNo__"><span id="ctl00_ContentPlaceHolder1_lblMobileNo">{{(!empty(auth()->user()->step2_updated_at))
                        ? auth()->user()->mobileno : ''}}</span></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="vtext">Permanent Home Address (IN CAPITAL LETTERS)
                                    <br>
                                    <strong>स्थाई घर का पता</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <div style="width: 350px; word-wrap: break-word;">
                                        <span id="Anthem_ctl00_ContentPlaceHolder1_lblPAddress__"><span id="ctl00_ContentPlaceHolder1_lblPAddress">{{(!empty(auth()->user()->step2_updated_at))
                            ? auth()->user()->paddress : ''}}</span></span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="vtext">Email-Id
                                    <br>
                                    <strong>ईमेल-आईडी</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_lblEmailId__"><span id="ctl00_ContentPlaceHolder1_lblEmailId">{{(!empty(auth()->user()->step2_updated_at))
                        ? auth()->user()->email : ''}}</span></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="vtext">Date of Birth
                                    <br>
                                    <strong>जन्म की तारीख</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_lblDob__"><span id="ctl00_ContentPlaceHolder1_lblDob">{{(!empty(auth()->user()->step2_updated_at))
                        ? auth()->user()->dob : ''}}</span></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="vtext">Aadhaar No.<br>
                                    <strong>आधार संख्या</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_lblAadhaarNo__"><span id="ctl00_ContentPlaceHolder1_lblAadhaarNo">{{(!empty(auth()->user()->step2_updated_at))
                        ? auth()->user()->aadhaarno : ''}}</span></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="vtext">Nationality<br>
                                    <strong>राष्ट्रीयता</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_lblNationality__"><span id="ctl00_ContentPlaceHolder1_lblNationality">{{(!empty(auth()->user()->step2_updated_at))
                        ? auth()->user()->nationalitySummary : ''}}</span></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="vtext">Gender<br>
                                    <strong>लिंग</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_lblGender__"><span id="ctl00_ContentPlaceHolder1_lblGender">{{(!empty(auth()->user()->step2_updated_at))
                        ? auth()->user()->genderSummary : ''}}</span></span>
                                </td>
                            </tr>


                            <tr id="ctl00_ContentPlaceHolder1_tr2">
                                <td class="vtext"><span id="ctl00_ContentPlaceHolder1_span51">Applying for subject
                                        ?</span><br>
                                    <strong><span id="ctl00_ContentPlaceHolder1_Span52">आप आवेदन कर रहे
                                            हैं</span></strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_Label1__"><span id="ctl00_ContentPlaceHolder1_Label1">{{(!empty(auth()->user()->step2_updated_at)) ? auth()->user()->subjectsname : ''}}</span></span>
                                </td>
                            </tr>
                            <tr id="ctl00_ContentPlaceHolder1_trsinglegirlchil">
                                <td class="vtext"><span id="ctl00_ContentPlaceHolder1_TrIfGirlsEng">Are you only the
                                        single girl child of your parent?</span>
                                    <br>
                                    <strong><span id="ctl00_ContentPlaceHolder1_TrIfGirlsHindi">क्या आप अपने माता-पिता
                                            के केवल एक लड़की हैं?</span></strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_lblsinglegirlchild__"><span id="ctl00_ContentPlaceHolder1_lblsinglegirlchild">{{(!empty(auth()->user()->step2_updated_at))
                        ? ucFirst(auth()->user()->singlegirlchild) : ''}}</span></span>
                                </td>
                            </tr>
                            <tr id="ctl00_ContentPlaceHolder1_trphysicallychallnged">
                                <td class="vtext">
                                    <span id="ctl00_ContentPlaceHolder1_spnPhysicallyChallanged">Are you Physically
                                        Challenged?</span>


                                    <br>
                                    <strong><span id="ctl00_ContentPlaceHolder1_spnPhysicallyChallangedHindi">क्या आप
                                            शारीरिक रूप से विकलांग हैं?</span></strong>
                                    <strong></strong>
                                </td>
                                <td class="colon">:</td>
                                <td>

                                    <span id="Anthem_ctl00_ContentPlaceHolder1_lblphysicallychallenged__"><span id="ctl00_ContentPlaceHolder1_lblphysicallychallenged">{{(!empty(auth()->user()->step2_updated_at))
                        ? ucFirst(auth()->user()->physicallychallenged) : ''}}</span></span>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_lblphysicallychalleengePer__"></span>
                                </td>
                            </tr>

                            <tr>
                                <td class="vtext">Select your Category<br>
                                    <strong>अपनी श्रेणी का चयन करें</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    &nbsp;<span id="Anthem_ctl00_ContentPlaceHolder1_lblCategoryName__"><span id="ctl00_ContentPlaceHolder1_lblCategoryName">{{(!empty(auth()->user()->step2_updated_at))
                        ? auth()->user()->category : ''}}</span></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="vtext">Detail of Form Fee
                                    <br>
                                    <strong>शुल्क का विवरण जमा</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <input type="hidden" id="hiddenSid">
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_lblFeeDeposited__"><span id="ctl00_ContentPlaceHolder1_lblFeeDeposited">{{(!empty(auth()->user()->step2_updated_at))
                        ? auth()->user()->fee : ''}}</span></span>

                                </td>
                            </tr>
                        </tbody>
                    </table>



                    <table id="ctl00_ContentPlaceHolder1_Table2" class="table Eng_hindi_form" width="100%" border="0" cellspacing="5" cellpadding="0">
                        <tbody>
                            <tr>
                                <td colspan="6" class="tdgap" width="42%" align="left">

                                    <span id="Anthem_ctl00_ContentPlaceHolder1_btnBackEdit__"><input type="submit" name="ctl00$ContentPlaceHolder1$btnBackEdit" value="BACK &amp; EDIT" style="float: right!important;" id="backstep1" class="btn-primary"></span>&nbsp;&nbsp;
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">Academic Qualifications<br>
                                    <strong>शैक्षणिक योग्यता</strong>
                                </td>
                                <td class="colon"></td>
                            </tr>
                        </tbody>
                    </table>

                    <div id="ctl00_ContentPlaceHolder1_divforacadmicdetails" class="gridiv">
                        <div id="Anthem_ctl00_ContentPlaceHolder1_gvsubject__">
                                <table class="table" cellspacing="1" cellpadding="1" rules="all" border="1" id="ctl00_ContentPlaceHolder1_gvsubject" style="width:100%;border:1px solid #B0B0B0;border-collapse:collapse; margin:15px 0;">
                                    <tbody>
                                        <tr class="header-style">
                                            <th scope="col" class="text-center">S.No</th>
                                            <th scope="col" class="text-center">Result Status</th>
                                            <th scope="col" class="text-center">Examination Passed</th>
                                            <th scope="col" class="text-center">Name of The Board/University</th>
                                            <th scope="col" class="text-center">Passing Year</th>
                                            <th scope="col" class="text-center">Credits/Marks Obtained </th>
                                            <th scope="col" class="text-center">Maximum Marks(not for the candidate with CGPA)</th>
                                            <th scope="col" class="text-center">Credits/% Marks</th>
                                            <th scope="col" class="text-center">Exam Roll No.</th>
                                        </tr>
                                        <tr class="dgitem-style" style="background-color:White;">
                                            <td align="center">
                                                1
                                            </td>
                                            <td align="center">
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblRStatus__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblRStatus">{{(!empty(auth()->user()->step2_updated_at))
                        ? auth()->user()->load('educationDetails')->educationDetails->resultStatusSummary : ''}}</span></span>

                                            </td>
                                            <td align="center">
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblExmPassed__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblExmPassed">{{(!empty(auth()->user()->step2_updated_at))
                        ? auth()->user()->load('educationDetails')->educationDetails->classes : ''}}</span></span>
                                                <br>
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblExmpassedDegree__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblExmpassedDegree" style="font-weight:bold;"></span></span>

                                            </td>
                                            <td align="center">
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblUniversityName__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblUniversityName">
                                                        {{(!empty(auth()->user()->step2_updated_at)) ? auth()->user()->load('educationDetails')->educationDetails->name_of_the_board_university : ''}}
                                                    </span></span>

                                            </td>
                                            <td align="center">
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblYear__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblYear">
                                                        {{(!empty(auth()->user()->step2_updated_at)) ? auth()->user()->load('educationDetails')->educationDetails->passing_year : ''}}
                                                    </span></span>
                                            </td>
                                            <td align="center">
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblCreditObtainMarks__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblCreditObtainMarks">
                                                        {{(!empty(auth()->user()->step2_updated_at)) ? auth()->user()->load('educationDetails')->educationDetails->credits_marks_Obtained : ''}}
                                                    </span></span>

                                            </td>
                                            <td align="center">
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblMaxMarks__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblMaxMarks">
                                                        {{(!empty(auth()->user()->step2_updated_at)) ? auth()->user()->load('educationDetails')->educationDetails->maximum_marks : ''}}
                                                    </span></span>

                                            </td>
                                            <td align="center">
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblCreditMarks__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblCreditMarks">
                                                        {{ (!empty(auth()->user()->step2_updated_at)) ? number_format(auth()->user()->load('educationDetails')->educationDetails->percentage_marks, 2) : '' }}
                                                    </span></span>

                                            </td>
                                            <td align="center">
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblExamRollNo__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblExamRollNo">
                                                        {{(!empty(auth()->user()->step2_updated_at)) ? auth()->user()->load('educationDetails')->educationDetails->exam_roll_no : ''}}
                                                    </span></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                        </div>
                    </div>



                    <table id="ctl00_ContentPlaceHolder1_Table3" class="table Eng_hindi_form mobile_form" width="100%" border="0" cellspacing="5" cellpadding="0">
                        <tbody>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td colspan="3">Were you ever disqualified/suspended by the School or any other
                                    institution from attending classes or appearing in any exam? if yes give Details:
                                    <br>
                                    <strong>तुम कभी
                                        विश्वविद्यालय या किसी अन्य संस्था द्वारा कक्षाओं में भाग लेने या किसी भी परीक्षा
                                        में प्रदर्शित होने से निलंबित कर दिया गए? यदि हाँ जानकारी दे
                                    </strong>
                                </td>
                            </tr>
                            <tr>
                                <td width="48%">Yes/No
                                    <br>
                                    <strong>हाॅ/ नही </strong>
                                </td>
                                <td class="colon">:</td>
                                <td width="48%">
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_lblDisqualiOrSus__"><span id="ctl00_ContentPlaceHolder1_lblDisqualiOrSus">{{(!empty(auth()->user()->step2_updated_at)) ? auth()->user()->load('educationDetails')->educationDetails['disqualified/suspended'] : ''}}</span></span>
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
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_lblDisqualifDtls__"><span id="ctl00_ContentPlaceHolder1_lblDisqualifDtls">{{(!empty(auth()->user()->step2_updated_at)) ? auth()->user()->load('educationDetails')->educationDetails['disqualified/suspended_details'] : ''}}</span></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Your Photograph
                                    <br>
                                    <strong>आपके तस्वीर
                                    </strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div id="Anthem_ctl00_ContentPlaceHolder1_pnl2__">
                                                        <div id="ctl00_ContentPlaceHolder1_pnl2">
                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_ImgProfilePic__"><img id="ctl00_ContentPlaceHolder1_ImgProfilePic" src="{{ (!empty(auth()->user()->step2_updated_at)) ? asset('images/proofdoc/'.auth()->user()->photo) : ''}}" style="height:100px;width:100px;border-width:0px;"></span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>Your Signature
                                    <br>
                                    <strong>आपके हस्ताक्षर</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div id="Anthem_ctl00_ContentPlaceHolder1_Panel3__">
                                                        <div id="ctl00_ContentPlaceHolder1_Panel3">

                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_ImgSignature__"><img id="ctl00_ContentPlaceHolder1_ImgSignature" src="{{ (!empty(auth()->user()->step2_updated_at)) ? asset('images/proofdoc/'.auth()->user()->signature) : ''}}" style="height:50px;width:200px;border-width:0px;"></span>

                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6" class="tdgap" width="42%" align="left">
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_btnBack__"><input type="button" name="ctl00$ContentPlaceHolder1$btnBack" value="BACK &amp; EDIT" id="backstep2" class="btn-primary"></span>
                                </td>
                            </tr>
                            <td colspan="3">Bank Account Details<br>
                                <strong>बैंक के खाते का विवरण</strong>
                            </td>
                            <td class="colon"></td>
                            </tr>
                            <td colspan="3">&nbsp;</td>
                            <td>&nbsp;
                                <tr>
                                    <td class="text">Account No. <span style="color: red">*</span>
                                        <br>
                                        <strong>खाता संख्या</strong>
                                    </td>
                                    <td class="colon">:</td>
                                    <td>
                                        <span id="Anthem_ctl00_ContentPlaceHolder1_txtName__"> {{(!empty(auth()->user()->step3_updated_at)) ? auth()->user()->load('bankDetails')->bankDetails->accountno : ''}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="vtext">Account Holder Name<span style="color: red">*</span><br>
                                        <strong>बैंकिंग खाता नाम</strong>
                                    </td>
                                    <td class="colon">:</td>
                                    <td>
                                        <span id="Anthem_ctl00_ContentPlaceHolder1_txtName__">{{!empty(auth()->user()->step3_updated_at) ? auth()->user()->load('bankDetails')->bankDetails->holdername : ''}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="vtext">IFSC Code<span style="color: red">*</span><br>
                                        <strong>आईएफएससी कोड</strong>
                                    </td>
                                    <td class="colon">:</td>
                                    <td>
                                        <span id="Anthem_ctl00_ContentPlaceHolder1_txtName__">{{!empty(auth()->user()->step3_updated_at) ? auth()->user()->load('bankDetails')->bankDetails->ifsccode : ''}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Upload Passbook Front Page Image
                                        <br>
                                        <strong>पासबुक का फ्रंट पेज
                                        </strong>
                                        <span style="color:red">*</span>
                                    </td>
                                    <td class="colon">:</td>
                                    <td>
                                        <span id="Anthem_ctl00_ContentPlaceHolder1_txtName__"><img id="ctl00_ContentPlaceHolder1_ImgProfilePic" src="{{ !empty(auth()->user()->step3_updated_at) ? asset('images/proofdoc/'.auth()->user()->load('bankDetails')->bankDetails->passbook_photo) : ''}}" style="height:100px;width:100px;border-width:0px;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="tdgap" width="42%" align="left">
                                        <span id="Anthem_ctl00_ContentPlaceHolder1_btnBackEdit__"><input type="button" name="ctl00$ContentPlaceHolder1$btnBackEdit" value="BACK &amp; EDIT" id="backstep3" class="btn-primary"></span>&nbsp;&nbsp;
                                    </td>
                                    <td colspan="3" align="right">

                                        <span id="Anthem_ctl00_ContentPlaceHolder1_btnSaveNext__"><input type="submit" name="ctl00$ContentPlaceHolder1$btnSaveNext" value="NEXT" data-action="{{route('applicationsummarysubmit')}}" id="savestep3" class="btn-primary"></span>
                                    </td>
                                </tr>
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
</li>
