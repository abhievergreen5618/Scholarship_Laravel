<li class="tab-content tab-content-2 typography">
    <form id="docform">
        @csrf
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
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_hfLowerToHigher_Edu_Order__"><input type="hidden" name="ctl00$ContentPlaceHolder1$gvsubject$ctl02$hfLowerToHigher_Edu_Order" id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_hfLowerToHigher_Edu_Order" value="1"></span>
                                            </td>
                                            <td align="center" style="width:100%;">

                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl04_ddlRStatus__"><select name="class_status" id="class_status" class="form-select">
                                                        <option value="P">Passed</option>
                                                        <option value="A">Awaited</option>
                                                        <option value="N">Not Applicable</option>


                                                    </select></span>
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_ddlRStatus__"></span>
                                            </td>
                                            <td align="center" style="width:20%;">
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblExamPassed__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblExamPassed">Class 5 to
                                                        Class 12 or its Equivalent</span></span>


                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl04_ddlGraduateExam__"><select name="class_passed" id="class_passed" class="dropdown1 form-select">
                                                        <option selected="selected" value="">--Select Class--</option>
                                                        <option value="3">Class 5</option>
                                                        <option value="17">Class 6</option>
                                                        <option value="18">Class 7</option>
                                                        <option value="19">Class 8</option>
                                                        <option value="20">Class 9</option>
                                                        <option value="21">Class 10</option>
                                                        <option value="24">Class 11</option>
                                                        <option value="24">Class 12</option>

                                                    </select></span>

                                            </td>
                                            <td align="center">

                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl03_txtNameofUniver__"><input name="class_board" type="text" maxlength="50" id="class_board" class="textbox form-control" onpaste="return false" ondrop="return false"></span>





                                            </td>
                                            <td align="center">
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_ddlYear__"><select name="class_passing_year" id="class_passing_year" class="form-select">
                                                        <option value="">--Select --</option>
                                                        <option value="1976">1976</option>

                                                        <option value="2014">2014</option>
                                                        <option value="2015">2015</option>
                                                        <option value="2016">2016</option>
                                                        <option value="2017">2017</option>
                                                        <option value="2018">2018</option>
                                                        <option value="2019">2019</option>
                                                        <option value="2020">2020</option>
                                                        <option value="2021">2021</option>
                                                        <option value="2022">2022</option>
                                                        <option value="2023">2023</option>

                                                    </select></span>
                                            </td>
                                            <td align="center">
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_txtCreditMarks__"><input name="class_marks" type="text" value="" maxlength="6" id="class_marks" class="textbox form-control" onpaste="return false" ondrop="return false" onkeydown="return NumberOnly(event,this);" style="width:55px;"></span>

                                            </td>
                                            <td align="center">
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_txtMaxMarks__"><input name="class_max_marks" type="text" value="" maxlength="6" id="class_max_marks" class="textbox form-control" onkeydown="return NumberOnly(event,this);" onpaste="return false" ondrop="return false" style="width:55px;"></span>
                                            </td>
                                            <td align="center">
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_txtCreMarkPercent__"><input name="class_percentage" type="text" value="" maxlength="5" id="class_percentage" class="textbox form-control" onpaste="return false" ondrop="return false" onkeydown="return NumberOnly(event,this);" style="width:55px;"></span>

                                            </td>
                                            <td align="center">
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_txtExamRollNo__"><input name="class_rollno" type="text" value="" maxlength="15" id="class_rollno" class="textbox form-control" onpaste="return false" ondrop="return false"></span>
                                            </td>


                                        <tr class="dgitem-style" style="background-color:#F8F8F8;">
                                            <td align="center" style="width:5%;">
                                                2
                                            </td>
                                            <td align="center" style="width:100%;">

                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl03_ddlRStatus__"><select name="grad_status" id="grad_status" class="form-select">
                                                        <option value="P">Passed</option>
                                                        <option selected="selected" value="A">Awaited</option>
                                                        <option value="N">Not Applicable</option>
                                                    </select></span>
                                            </td>
                                            <td align="center" style="width:20%;">
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl03_lblExamPassed__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl03_lblExamPassed">BA./B.Sc./B.Com or its Equivalent <span style="color:red">*</span></span></span>

                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl03_ddlGraduateExam__"><select name="grad_passed" id="grad_passed" class="dropdown1 form-select">
                                                        <option selected="selected" value="">--Select Degree--</option>
                                                        <option value="18">B.A</option>
                                                        <option value="19">B.Com</option>
                                                        <option value="20">B.Sc</option>
                                                        <option value="21">Other</option>

                                                    </select></span>
                                            </td>
                                            <td align="center">
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl03_txtNameofUniver__"><input name="grad_board" type="text" maxlength="50" id="grad_board" class="textbox form-select" onpaste="return false" ondrop="return false"></span>

                                            </td>
                                            <td align="center">
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl03_ddlYear__"><select name="grad_passing_year" id="grad_passing_year" class="form-select">
                                                        <option selected="selected" value="">--Select --</option>
                                                        <option value="1976">1976</option>

                                                        <option value="2013">2013</option>
                                                        <option value="2014">2014</option>
                                                        <option value="2015">2015</option>
                                                        <option value="2016">2016</option>
                                                        <option value="2017">2017</option>
                                                        <option value="2018">2018</option>
                                                        <option value="2019">2019</option>
                                                        <option value="2020">2020</option>
                                                        <option value="2021">2021</option>
                                                        <option value="2022">2022</option>
                                                        <option value="2023">2023</option>

                                                    </select></span>
                                            </td>
                                            <td align="center">
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl03_txtCreditMarks__"><input name="grad_marks" type="text" maxlength="6" id="grad_marks" class="textbox form-control" onpaste="return false" ondrop="return false" onkeydown="return NumberOnly(event,this);" style="width:55px;"></span>

                                            </td>
                                            <td align="center">
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl03_txtMaxMarks__"><input name="grad_max_marks" type="text" maxlength="6" id="grad_max_marks" class="textbox form-control" onkeydown="return NumberOnly(event,this);" onpaste="return false" ondrop="return false" style="width:55px;"></span>
                                            </td>
                                            <td align="center">
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl03_txtCreMarkPercent__"><input name="grad_percentage" type="text" maxlength="5" id="grad_percentage" class="textbox form-control" onpaste="return false" ondrop="return false" onkeydown="return NumberOnly(event,this);" style="width:55px;"></span>

                                            </td>
                                            <td align="center">
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl03_txtExamRollNo__"><input name="grad_rollno" type="text" maxlength="15" id="grad_rollno" class="textbox form-control" onpaste="return false" ondrop="return false"></span>
                                            </td>
                                        </tr>
                                        <tr class="dgitem-style" style="background-color:White;">
                                            <td align="center" style="width:5%;">
                                                3
                                            </td>
                                            <td align="center" style="width:100%;">

                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl04_ddlRStatus__"><select name="post_grad_status" id="post_grad_status" class="form-select">
                                                        <option value="P">Passed</option>
                                                        <option value="A">Awaited</option>
                                                        <option value="N">Not Applicable</option>
                                                    </select></span>
                                            </td>
                                            <td align="center" style="width:20%;">
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl04_lblExamPassed__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl04_lblExamPassed">M.A./M.Sc./M.Com
                                                        or its Equivalent <span style="color:red">*</span></span></span>
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl04_ddlGraduateExam__"><select name="post_grad_passed" id="post_grad_passed" class="dropdown1 form-control">
                                                        <option selected="selected" value="">--Select Degree--</option>
                                                        <option value="22">M.A</option>
                                                        <option value="23">M.Sc</option>
                                                        <option value="24">M.Com</option>
                                                        <option value="25">Others</option>

                                                    </select></span>
                                            </td>
                                            <td align="center">
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl04_txtNameofUniver__"><input name="post_grad_board" type="text" maxlength="50" id="post_grad_board" class="textbox form-control" onpaste="return false" ondrop="return false"></span>

                                            </td>
                                            <td align="center">
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl04_ddlYear__"><select name="post_grad_passing_year" id="post_grad_passing_year" class="form-select">
                                                        <option selected="selected" value="">--Select --</option>

                                                        <option value="2013">2013</option>
                                                        <option value="2014">2014</option>
                                                        <option value="2015">2015</option>
                                                        <option value="2016">2016</option>
                                                        <option value="2017">2017</option>
                                                        <option value="2018">2018</option>
                                                        <option value="2019">2019</option>
                                                        <option value="2020">2020</option>
                                                        <option value="2021">2021</option>
                                                        <option value="2022">2022</option>
                                                        <option value="2023">2023</option>

                                                    </select></span>
                                            </td>
                                            <td align="center">
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl04_txtCreditMarks__"><input name="post_grad_marks" type="text" maxlength="6" id="post_grad_marks" class="textbox form-control" onpaste="return false" ondrop="return false" onkeydown="return NumberOnly(event,this);" style="width:55px;"></span>

                                            </td>
                                            <td align="center">
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl04_txtMaxMarks__"><input name="post_grad_max_marks" type="text" maxlength="6" id="post_grad_max_marks" class="textbox form-control" onkeydown="return NumberOnly(event,this);" onpaste="return false" ondrop="return false" style="width:55px;"></span>
                                            </td>
                                            <td align="center">
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl04_txtCreMarkPercent__"><input name="post_grad_percentage" type="text" maxlength="5" id="post_grad_percentage" class="textbox form-control" onpaste="return false" ondrop="return false" onkeydown="return NumberOnly(event,this);" style="width:55px;"></span>

                                            </td>
                                            <td align="center">
                                                <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl04_txtExamRollNo__"><input name="post_grad_rollno" type="text" maxlength="15" id="post_grad_rollno" class="textbox form-control" onpaste="return false" ondrop="return false"></span>
                                            </td>
                                        </tr>
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
                                                            <input class="form-check-input" type="radio" name="nationality" id="Nationality1" value="I">
                                                            <label class="form-check-label" for="Nationality1">Yes</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="nationality" id="Nationality2" value="O">
                                                            <label class="form-check-label" for="Nationality2">No</label>
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
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_txtDetails__"><textarea name="ctl00$ContentPlaceHolder1$txtDetails" rows="2" cols="20" id="ctl00_ContentPlaceHolder1_txtDetails" disabled="disabled" class="textboxmultiline form-control" ondrop="return false;" onpaste="return false;"></textarea></span>
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
                                                    <div><img id="profile_photo_perview" src="http://placehold.it/180" class="img-thumbnail mt-2" alt="..."></div>
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
                                                    <div><img id="sign_photo_perview" src="http://placehold.it/180" class="img-thumbnail mt-2" alt="..."></div>
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
