<li class="tab-content tab-content-2 typography">
    <form id="docform" action="{{ route('educationinfosubmit') }}" method="POST">
        @csrf
        <input type="hidden" value="{{ encrypt(auth()->user()->id) }}" name="id">
        <div class="tab-content">
            <div class="tab-pane active" id="tab_2">

                <h3><span>Step [2/5] :</span>Education &amp; Document Details &nbsp;
                    <span id="Anthem_ctl00_ContentPlaceHolder1_lblPageMsg__"><span id="ctl00_ContentPlaceHolder1_lblPageMsg" style="color:Red;"></span></span>
                </h3>

                <table id="ctl00_ContentPlaceHolder1_tblInstruction" class="table Eng_hindi_form" width="100%" border="0" cellspacing="5" cellpadding="0">
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
                </table>


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
                                                        <option value="P" {{isset(auth()->user()->load('educationDetails')->educationDetails->resultstatus) && auth()->user()->load('educationDetails')->educationDetails->resultstatus == 'P' ? 'selected' : ''}}>Passed</option>
                                                        <option value="A" {{isset(auth()->user()->load('educationDetails')->educationDetails->resultstatus) &&  auth()->user()->load('educationDetails')->educationDetails->resultstatus == 'A' ? 'selected' : ''}}>Awaited</option>
                                                        <option value="N" {{isset(auth()->user()->load('educationDetails')->educationDetails->resultstatus) &&  auth()->user()->load('educationDetails')->educationDetails->resultstatus == 'N' ? 'selected' : ''}}>Not Applicable</option>


                                                    </select></span>
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_ddlRStatus__"></span>
                                            </td>



                                            <!------------------------------CLASS---------------------------->

                                            <td align="center" style="width:12%;">
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblExamPassed__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblExamPassed">Class 5 to
                                                        Class 12 or its Equivalent</span></span>


                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl04_ddlGraduateExam__"><select name="classes" id="classes" class="dropdown1 form-select">
                                                        <option selected="selected" value="">--Select Class--</option>
                                                        @forelse($classes as $key=>$class)
                                                        <option value="{{ $key }}" {{ isset(auth()->user()->educationDetails->classes) && auth()->user()->educationDetails->classes == $key ? 'selected' : '' }}>{{ $class }}</option>
                                                        @empty
                                                        <option value="" disabled>No class found</option>
                                                        @endforelse
                                                    </select></span>

                                            </td>

                                            <!---------------------------------------------------------->

                                            <td align="center">
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl03_txtNameofUniver__"><input name="class_board" type="text" maxlength="50" id="class_board" class="textbox form-control" onpaste="return false" ondrop="return false" value="{{isset($step2schooldata['name_of_the_board_university']) ? $step2schooldata['name_of_the_board_university'] : '' }}"></span>
                                            </td>
                                            <td align="center" style="width:10%;">
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_ddlYear__"><select name="class_passing_year" id="class_passing_year" class="form-select">
                                                        <option value="">--Select --</option>
                                                        @for ($i = date('Y'); $i >= 2010; $i--)
                                                        <option value="{{ $i }}" {{ isset(auth()->user()->educationDetails->passing_year) && auth()->user()->educationDetails->passing_year == $i ? 'selected' : '' }}>{{ $i }}</option>
                                                        @endfor

                                                    </select></span>
                                            </td>
                                            <td align="center">
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_txtCreditMarks__"><input name="class_marks" type="number" maxlength="6" id="class_marks" class="textbox form-control marks-input" style="width:85px;" value="{{(!empty(auth()->user()->step2_updated_at)) ? auth()->user()->load('educationDetails')->educationDetails->credits_marks_Obtained : ''}}"></span>
                                            </td>
                                            <td align="center">
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_txtMaxMarks__"><input name="class_max_marks" type="number" maxlength="6" id="class_max_marks" class="textbox form-control marks-input" style="width:85px;" value="{{(!empty(auth()->user()->step2_updated_at)) ? auth()->user()->load('educationDetails')->educationDetails->maximum_marks : ''}}"></span>
                                            </td>
                                            <td align="center">
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_txtCreMarkPercent__"><input name="class_percentage" type="text" id="class_percentage" class="textbox form-control" readonly style="width:65px;" value="{{(!empty(auth()->user()->step2_updated_at)) ? auth()->user()->load('educationDetails')->educationDetails->percentage_marks : ''}}"></span>

                                            </td>
                                            <td align="center">
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_txtExamRollNo__"><input name="class_rollno" type="number" maxlength="15" id="class_rollno" class="textbox form-control" value="{{(!empty(auth()->user()->step2_updated_at)) ? auth()->user()->load('educationDetails')->educationDetails->exam_roll_no : ''}}"></span>
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
                                                            <input class="form-check-input" type="radio" name="disqualified/suspended" id="disqualified/suspendedyes" value="yes" {{isset(auth()->user()->step2_updated_at) && auth()->user()->load('educationDetails')->educationDetails['disqualified/suspended'] == "yes" ? 'checked' : ''}}>
                                                            <label class="form-check-label" for="disqualified/suspendedyes">Yes</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="disqualified/suspended" id="disqualified/suspendedno" value="no" {{isset(auth()->user()->step2_updated_at) && auth()->user()->load('educationDetails')->educationDetails['disqualified/suspended'] == "no" ? 'checked' : ''}}>
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
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_txtDetails__"><textarea name="details" rows="2" cols="20" id="details" class="textboxmultiline form-control" ondrop="return false;" onpaste="return false;" disabled>{{(!empty(auth()->user()->step2_updated_at)) ? auth()->user()->load('educationDetails')->educationDetails['disqualified/suspended_details'] : ''}}</textarea></span>
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
                                                    <div><img id="profile_photo_perview" src="{{ (!empty(auth()->user()->photo)) ? asset('images/proofdoc/'.auth()->user()->photo) : 'http://placehold.it/180'}}" class="img-thumbnail mt-2" alt="..."></div>
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
                                                    <div><img id="sign_photo_perview" src="{{ (!empty(auth()->user()->signature)) ? asset('images/proofdoc/'.auth()->user()->signature) : 'http://placehold.it/180'}}" class="img-thumbnail mt-2" alt="..."></div>
                                                </td>
                                            </tr>


                                        </tbody>
                                    </table>


                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
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
                                <td align="left">

                                    <span id="Anthem_ctl00_ContentPlaceHolder1_btnBack__"><input type="submit" name="ctl00$ContentPlaceHolder1$btnBack" value="BACK" id="ctl00_ContentPlaceHolder1_btnBack" class="btn-primary"></span>
                                <td colspan="6" class="tdgap" width="42%" align="left">

                                    <span id="Anthem_ctl00_ContentPlaceHolder1_btnBackEdit__"><input type="submit" name="ctl00$ContentPlaceHolder1$btnBackEdit" value="SAVE " id="ctl00_ContentPlaceHolder1_btnBackEdit" class="btn-primary"></span>&nbsp;&nbsp;
                                </td>
                                </td>
                                <td colspan="2" align="right">
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_btnSaveNext__"></span>
                                </td>
                            </tr>
                        </tbody>
                    </table>


                </div>


            </div>

        </div>
    </form>
</li>
