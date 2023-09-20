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
                                                    <td>{{ $viewdata->name }}</td>
                                                <!-- <td>{{(!empty(auth()->user()->step2_updated_at))
                                                    ? strtoupper(auth()->user()->name) : ''}}</td> -->
                                                <td rowspan="2"><img src="{{ (!empty(auth()->user()->step2_updated_at)) ? asset('public/images/proofdoc/'.auth()->user()->photo) : ''}}" class="rounded float-end" style="width:150px;" alt="..."></td>
                                            </tr>
                                                </div>
                                            </div>
                                            <tr>
                                                <td ><b>E-mail ID :</b></td>
                                                    <td>{{ $viewdata->email }}</td>
                                            </tr>
                                            <tr>
                                                <td ><b>Mobile No :</b></td>
                                                    <td>{{ $viewdata->mobileno }}</td>
                                                <td rowspan="2"><img src="{{ (!empty(auth()->user()->step2_updated_at)) ? asset('public/images/proofdoc/'.auth()->user()->signature) : ''}}"
                                                style="height:50px;width:150px;border-width:0px;" class="rounded float-end" alt="..."></td>
                                            </tr>
                                            <tr>
                                                <td ><b>Date of Birth :</b></td>
                                                    <td>{{ $viewdata->dob }}</td>
                                            </tr>
                                            <tr>
                                                <td ><b>Name of the Course :</b></td>
                                                    <td>{{ $viewdata->scholarshipname }}</td>
                                            </tr>
                                            <tr>
                                                <td ><b>Address for Correspondence:</b></td>
                                                    <td>{{ $viewdata->caddress }}</td>
                                            </tr>
                                            <tr>
                                                <td ><b>Address Home Addres :</b></td>
                                                    <td>{{ $viewdata->paddress }}</td>
                                            </tr>
                                            <tr>
                                                <td ><b>Father's Name :</b></td>
                                                    <td>{{ $viewdata->fathername }}</td>
                                            </tr>
                                            <tr>
                                                <td ><b>Mother's Name :</b></td>
                                                    <td>{{ $viewdata->mothername }}</td>
                                            </tr>
                                            <tr>
                                                <td ><b>Examination Centre for Entrance Test :</b></td>
                                                    <td>{{ $viewdata->examcentre }}</td>
                                            </tr>
                                            <tr>
                                                <td ><b>Aadhaar No. :</b></td>
                                                    <td>{{ $viewdata->aadhaarno }}</td>
                                            </tr>
                                            <tr>
                                                <td ><b>Nationality :</b></td>
                                                    <td>{{ $viewdata->naionality }}</td>
                                            </tr>
                                            <tr>
                                                <td ><b>Gender :</b></td>
                                                    <td>{{ $viewdata->gender }}</td>
                                            </tr>
                                            <tr>
                                                <td ><b>Applying for subject ? :</b></td>
                                                    <td>{{ $viewdata->subjects }}</td>
                                            </tr>
                                            <tr>
                                                <td ><b>Are you only the single girl child of your parent? :</b></td>
                                                
                                                <td>{{ $viewdata->singlegirlchild }}</td>
                                            </tr>
                                            <tr>
                                                <td ><b>Are you Physically Challenged? :</b></td>
                                                    <td>{{ $viewdata->physicallychallenged }}</td>
                                            </tr>
                                            <tr>
                                                <td ><b>Select your Category :</b></td>
                                                    <td>{{ $viewdata->category }}</td>
                                            </tr>
                                            <tr>
                                                <td ><b>Detail of Form Fee :</b></td>
                                                    <td>{{ $viewdata->fee }}</td>
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
                    <td align="center" style="width:5%;">
                                                1
                                            </td>
                        <td align="center">
                            <span
                                id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblRStatus__"><span
                                    id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblRStatus">
                                                    {{ $viewdata->resultstatus }}</span></span>

                        </td>
                        <td align="center" style="width:20%;">
                            <span
                                id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblExmPassed__"><span
                                    id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblExmPassed">
                                                    {{ $viewdata->classes }}</span></span>
                            <br>
                            <span
                                id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblExmpassedDegree__"><span
                                    id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblExmpassedDegree"
                                    style="font-weight:bold;"></span></span>

                        </td>
                        <td align="center">
                            <span
                                id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblUniversityName__"><span
                                    id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblUniversityName">
                                                    {{ $viewdata->name_of_the_board_university }}</span></span>

                        </td>
                        <td align="center">
                            <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblYear__"><span
                                    id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblYear">
                                                    {{ $viewdata->passing_year }}</span></span>
                        </td>
                        <td align="center">
                            <span
                                id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblCreditObtainMarks__"><span
                                    id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblCreditObtainMarks">
                                                {{ $viewdata->credits_marks_Obtained }}</span></span>

                        </td>
                        <td align="center">
                            <span
                                id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblMaxMarks__"><span
                                    id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblMaxMarks">
                                                {{ $viewdata->maximum_marks }}</span></span>

                        </td>
                        <td align="center">
                            <span
                                id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblCreditMarks__"><span
                                    id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblCreditMarks">
                                                {{ $viewdata->percentage_marks }}</span></span>

                        </td>
                        <td align="center">
                            <span
                                id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblExamRollNo__"><span
                                    id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblExamRollNo">
                                                    {{ $viewdata->exam_roll_no }}</span></span>

                        </td>
                    </tr>
                                                </tbody>
                                                </table>
                    <tr>
                                                <td colspan="3"></td>
                                            </tr>
                                           
                                            <tr>
            <th colspan="3"><strong>Were you ever disqualified/suspended by the School or any other
                institution from attending classes or appearing in any exam? if yes give Details:
                </strong><br>
                </th>
        </tr>
        <tr>
            <th colspan="3" width="48%"><strong>Yes/No</strong>
                
                <strong>हाॅ/ नही </strong>
                
            </th>
            <td class="colon">:</td>
            <br>
            <td width="48%">
                <span id="Anthem_ctl00_ContentPlaceHolder1_lblDisqualiOrSus__"><span
                        id="ctl00_ContentPlaceHolder1_lblDisqualiOrSus">
                    </span></span>
            </td>
        </tr>
        <tr>
            <th><strong>Details</strong>
                <br>
                <strong>विवरण
                </strong>
            </th>
            <td class="colon">:</td>
            <td>
                <span id="Anthem_ctl00_ContentPlaceHolder1_lblDisqualifDtls__"><span
                        id="ctl00_ContentPlaceHolder1_lblDisqualifDtls">
                    </span></span>
            </td>
        </tr>

        <table>
            <tbody>
        <tr>
            <td>&nbsp;</td>
            <td colspan="3">&nbsp;</td>
                        </tr>
            
        <tr>
            <th colspan="3">Bank Account Details<br>
            </th>
            <td class="colon"></td>
        </tr>
        <tr>
        <td colspan="3">&nbsp;</td>
        <td>&nbsp;</td></tr>
            <tr>
                <th class="text">Account No. <span style="color: red">*</span>
                    <br>
                </th>
                <td class="colon">:</td>
                <td>
                    <span
                        id="Anthem_ctl00_ContentPlaceHolder1_txtName__">
                        <td>{{ $viewdata->accountno }}</td></span>
                </td>
            </tr>
            <tr>
                <th class="text">Confirm Account No. <span style="color: red">*</span>
                    <br>
                </th>
                <td class="colon">:</td>
                <td>
                    <span
                        id="Anthem_ctl00_ContentPlaceHolder1_txtName__">
                        <td>{{ $viewdata->cnfrmaccountno }}</td></span>
                </td>
            </tr>
            <tr>
                <th class="vtext">Account Holder Name<span style="color: red">*</span><br>
                </th>
                <td class="colon">:</td>
                <td>
                    <span
                        id="Anthem_ctl00_ContentPlaceHolder1_txtName__">
                        <td>{{ $viewdata->holdername }}</td></span>
                </td>
            </tr>
            <tr>
                <th class="vtext">IFSC Code<span style="color: red">*</span><br>
                </th>
                <td class="colon">:</td>
                <td>
                    <span
                        id="Anthem_ctl00_ContentPlaceHolder1_txtName__">
                        <td>{{ $viewdata->ifsccode }}</td></span>
                </td>
            </tr>
            <tr>
                <th>Upload Passbook Front Page Image
                    <br>
                    <span style="color:red">*</span>
                </th>
                <td class="colon">:</td>
                <td>
                    <span
                        id="Anthem_ctl00_ContentPlaceHolder1_txtName__">
                        <td>{{ $viewdata->passbook_photo }}</td></span>
                </td>
            </tr>
                        </tbody>
                        </table>
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