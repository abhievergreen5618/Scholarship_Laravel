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
                                            <div class="container text-center">
                                                <div class="row align-items-start">
                                                    <div class="col">
                                                        <td><b> Name :</b></td>
                                                    </div>
                                                <td>{{(!empty(auth()->user()->step2_updated_at))
                                                    ? strtoupper(auth()->user()->name) : ''}}</td>
                                                <td rowspan="2"><img src="{{ (!empty(auth()->user()->step2_updated_at)) ? asset('public/images/proofdoc/'.auth()->user()->photo) : ''}}" class="rounded float-end" style="width:150px;" alt="..."></td>
                                            </tr>
                                                </div>
                                            </div>
                                            <tr>
                                                <td ><b>E-mail ID :</b></td>
                                                <td>{{(!empty(auth()->user()->step2_updated_at))
                                                ? auth()->user()->email : ''}}</td></tr>
                                            <tr>
                                                <td ><b>Mobile No :</b></td>
                                                <td>{{(!empty(auth()->user()->step2_updated_at))
                                                ? auth()->user()->mobileno : ''}}</td>
                                                <td rowspan="2"><img src="{{ (!empty(auth()->user()->step2_updated_at)) ? asset('public/images/proofdoc/'.auth()->user()->signature) : ''}}"
                                                style="height:50px;width:150px;border-width:0px;" class="rounded float-end" style="width:150px;" alt="..."></td>
                                            </tr>
                                            <tr>
                                                <td ><b>Date of Birth :</b></td>
                                                <td>{{(!empty(auth()->user()->step2_updated_at))
                                                ? auth()->user()->dob : ''}}</td>
                                            </tr>
                                            <tr>
                                                <td ><b>Name of the Course :</b></td>
                                                <td>{{(!empty(auth()->user()->step2_updated_at))
                                                ? auth()->user()->scholarshipnamesummary : ''}}</td>
                                            </tr>
                                            <tr>
                                                <td ><b>Address for Correspondence:</b></td>
                                                <td>{{(!empty(auth()->user()->step2_updated_at))
                                                ? auth()->user()->caddress : ''}}</td>
                                            </tr>
                                            <tr>
                                                <td ><b>Address Home Addres :</b></td>
                                                <td>{{(!empty(auth()->user()->step2_updated_at))
                                                ? auth()->user()->paddress : ''}}</td>
                                            </tr>
                                            <tr>
                                                <td ><b>Father's Name :</b></td>
                                                <td>{{(!empty(auth()->user()->step2_updated_at))
                                                ? auth()->user()->fathername : ''}}</td>
                                            </tr>
                                            <tr>
                                                <td ><b>Mother's Name :</b></td>
                                                <td>{{(!empty(auth()->user()->step2_updated_at))
                                                ? auth()->user()->mothername : ''}}</td>
                                            </tr>
                                            <tr>
                                                <td ><b>Examination Centre for Entrance Test :</b></td>
                                                <td>{{(!empty(auth()->user()->step2_updated_at))
                                                ? auth()->user()->examCenterName : ''}}</td>
                                            </tr>
                                            <tr>
                                                <td ><b>Aadhaar No. :</b></td>
                                                <td>{{(!empty(auth()->user()->step2_updated_at))
                                                ? auth()->user()->aadhaarno : ''}}</td>
                                            </tr>
                                            <tr>
                                                <td ><b>Nationality :</b></td>
                                                <td>{{(!empty(auth()->user()->step2_updated_at))
                                                ? auth()->user()->nationalitySummary : ''}}</td>
                                            </tr>
                                            <tr>
                                                <td ><b>Gender :</b></td>
                                                <td>{{(!empty(auth()->user()->step2_updated_at))
                                                ? auth()->user()->gender : ''}}</td>
                                            </tr>
                                            <tr>
                                                <td ><b>Applying for subject ? :</b></td>
                                                <td>{{(!empty(auth()->user()->step2_updated_at))
                                                ? auth()->user()->subjects : ''}}</td>
                                            </tr>
                                            <tr>
                                                <td ><b>Are you only the single girl child of your parent? :</b></td>
                                                <td>{{(!empty(auth()->user()->step2_updated_at))
                                                ? auth()->user()->singlegirlchild : ''}}</td>
                                            </tr>
                                            <tr>
                                                <td ><b>Are you Physically Challenged? :</b></td>
                                                <td>{{(!empty(auth()->user()->step2_updated_at))
                                                ? auth()->user()->physicallychallenged : ''}}</td>
                                            </tr>
                                            <tr>
                                                <td ><b>Select your Category :</b></td>
                                                <td>{{(!empty(auth()->user()->step2_updated_at))
                                                ? auth()->user()->category : ''}}</td>
                                            </tr>
                                            <tr>
                                                <td ><b>Detail of Form Fee :</b></td>
                                                <td>{{(!empty(auth()->user()->step2_updated_at))
                                                ? auth()->user()->fee : ''}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3"></td>
                                            </tr>
                                            <tr>
                                                <td ><b>Academic Qualifications :</b></td>
                                            </tr>
                                            <table class="table" cellspacing="1" cellpadding="1" rules="all" border="1"
                id="ctl00_ContentPlaceHolder1_gvsubject"
                style="width:100%;border:1px solid #B0B0B0;border-collapse:collapse; margin:15px 0;">
                <tbody>
                    <tr class="header-style">
                        <th scope="col">S.No</th>
                        <th scope="col">Result Status</th>
                        <th scope="col">Examination Passed</th>
                        <th scope="col">Name of The Board/University</th>
                        <th scope="col">Passing Year</th>
                        <th scope="col">Credits/Marks Obtained </th>
                        <th scope="col">Maximum Marks(not for the candidate with CGPA)</th>
                        <th scope="col">Credits/% Marks</th>
                        <th scope="col">Exam Roll No.</th>
                    </tr>
                    <tr class="dgitem-style" style="background-color:White;">
                        <td align="center">
                            <span
                                id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblRStatus__"><span
                                    id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblRStatus">{{(isset($step2schooldata['resultStatusSummary']))
                                    ? $step2schooldata['resultStatusSummary'] : ''}}</span></span>

                        </td>
                        <td align="center" style="width:20%;">
                            <span
                                id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblExmPassed__"><span
                                    id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblExmPassed">{{(isset($step2schooldata['examinationPassedSummary']))
                                    ? $step2schooldata['examinationPassedSummary'] : ''}}</span></span>
                            <br>
                            <span
                                id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblExmpassedDegree__"><span
                                    id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblExmpassedDegree"
                                    style="font-weight:bold;"></span></span>

                        </td>
                        <td align="center">
                            <span
                                id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblUniversityName__"><span
                                    id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblUniversityName">{{(isset($step2schooldata['name_of_the_board_university']))
                                    ? $step2schooldata['name_of_the_board_university'] :
                                    ''}}</span></span>

                        </td>
                        <td align="center">
                            <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblYear__"><span
                                    id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblYear">{{(isset($step2schooldata['passing_year']))
                                    ? $step2schooldata['passing_year'] : ''}}</span></span>
                        </td>
                        <td align="center">
                            <span
                                id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblCreditObtainMarks__"><span
                                    id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblCreditObtainMarks">{{(isset($step2schooldata['credits_marks_Obtained']))
                                    ? $step2schooldata['credits_marks_Obtained'] : ''}}</span></span>

                        </td>
                        <td align="center">
                            <span
                                id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblMaxMarks__"><span
                                    id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblMaxMarks">{{(isset($step2schooldata['maximum_marks']))
                                    ? $step2schooldata['maximum_marks'] : ''}}</span></span>

                        </td>
                        <td align="center">
                            <span
                                id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblCreditMarks__"><span
                                    id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblCreditMarks">{{(isset($step2schooldata['percentage_marks']))
                                    ? $step2schooldata['percentage_marks'] : ''}}</span></span>

                        </td>
                        <td align="center">
                            <span
                                id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblExamRollNo__"><span
                                    id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblExamRollNo">{{(isset($step2schooldata['exam_roll_no']))
                                    ? $step2schooldata['exam_roll_no'] : ''}}</span></span>

                        </td>
                    </tr>
                    <tr>
                                                <td colspan="3"></td>
                                            </tr>
                                            <tr>
                                                <td ><b>Bank Account Details :</b></td>
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
                <span id="Anthem_ctl00_ContentPlaceHolder1_lblDisqualiOrSus__"><span
                        id="ctl00_ContentPlaceHolder1_lblDisqualiOrSus">{{isset($step2graduationdata['disqualified/suspended'])
                        ? ucFirst($step2graduationdata['disqualified/suspended']) : ''}}</span></span>
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
                <span id="Anthem_ctl00_ContentPlaceHolder1_lblDisqualifDtls__"><span
                        id="ctl00_ContentPlaceHolder1_lblDisqualifDtls">{{isset($step2graduationdata['disqualified/suspended_details'])
                        ? $step2graduationdata['disqualified/suspended_details'] : ''}}</span></span>
            </td>
        </tr>

        <tr>
            <td>&nbsp;</td>
            <td colspan="3">&nbsp;</td>
        <tr>
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
                    <span
                        id="Anthem_ctl00_ContentPlaceHolder1_txtName__">{{(!empty(auth()->user()->step3_updated_at))
                        ? auth()->user()->accountno : ''}}</span>
                </td>
            </tr>
            <tr>
                <td class="text">Confirm Account No. <span style="color: red">*</span>
                    <br>
                    <strong>खाता संख्या की पुष्टि करें</strong>
                </td>
                <td class="colon">:</td>
                <td>
                    <span
                        id="Anthem_ctl00_ContentPlaceHolder1_txtName__">{{(!empty(auth()->user()->step3_updated_at))
                        ? auth()->user()->cnfrmaccountno : ''}}</span>
                </td>
            </tr>
            <tr>
                <td class="vtext">Account Holder Name<span style="color: red">*</span><br>
                    <strong>बैंकिंग खाता नाम</strong>
                </td>
                <td class="colon">:</td>
                <td>
                    <span
                        id="Anthem_ctl00_ContentPlaceHolder1_txtName__">{{(!empty(auth()->user()->step3_updated_at))
                        ? auth()->user()->holdername : ''}}</span>
                </td>
            </tr>
            <tr>
                <td class="vtext">IFSC Code<span style="color: red">*</span><br>
                    <strong>आईएफएससी कोड</strong>
                </td>
                <td class="colon">:</td>
                <td>
                    <span
                        id="Anthem_ctl00_ContentPlaceHolder1_txtName__">{{(!empty(auth()->user()->step3_updated_at))
                        ? auth()->user()->ifsccode : ''}}</span>
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
                    <span
                        id="Anthem_ctl00_ContentPlaceHolder1_txtName__">{{(!empty(auth()->user()->step3_updated_at))
                        ? auth()->user()->passbook_photo : ''}}</span>
                </td>
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