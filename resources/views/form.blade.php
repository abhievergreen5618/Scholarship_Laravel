@extends("layouts.app")

@section("content")
<div class="secttionform mt-5">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-10">
                <div class="page">


                    <!-- tabs -->
                    <div class="pcss3t pcss3t-effect-scale pcss3t-theme-1">
                        <input type="radio" name="pcss3t" checked id="tab1" class="tab-content-first">
                        <label for="tab1"><i class="fas fa-hand-point-right"></i>Personal Information</label>

                        <input type="radio" name="pcss3t" id="tab2" class="tab-content-2">
                        <label for="tab2"><i class="fas fa-hand-point-right"></i>Education & Document Details</label>

                        <input type="radio" name="pcss3t" id="tab3" class="tab-content-3">
                        <label for="tab3"><i class="fas fa-hand-point-right"></i>Application Summary</label>

                        <input type="radio" name="pcss3t" id="tab5" class="tab-content-last">
                        <label for="tab5"><i class="fas fa-hand-point-right"></i>Payment</label>

                        <input type="radio" name="pcss3t" id="tab6" class="tabend">
                        <label for="tab6"><i class="fas fa-hand-point-right"></i>Submit Application Form</label>

                        <ul>
                            <li class="tab-content tab-content-first typography">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <h3><span>Step [1/5] :</span> Personal Information &nbsp;
                                            <span id="Anthem_ctl00_ContentPlaceHolder1_lblPageMsg__"><span id="ctl00_ContentPlaceHolder1_lblPageMsg" style="color:Red;"></span></span>
                                        </h3>

                                        <div class="box-body table-responsive">

                                            <table id="ctl00_ContentPlaceHolder1_Table1" class="table Eng_hindi_form mobile_form" width="100%" border="0" cellspacing="5" cellpadding="0">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="3"></td>
                                                    </tr>
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
                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_ddlExamCenter__"><select name="ctl00$ContentPlaceHolder1$ddlExamCenter" id="ctl00_ContentPlaceHolder1_ddlExamCenter" class="dropdownlong">
                                                                    <option value="0"> Please Select </option>
                                                                    <option value="3">open scholarships </option>
                                                                    <option value="17"> vidyabharti scholarship</option>

                                                                </select></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="vtext">Name(IN CAPITAL LETTERS) as per Matric certificate<br>

                                                            <strong>नाम (मैट्रिक सर्टिफिकेट के अनुसार)</strong>
                                                        </td>
                                                        <td class="colon">:</td>
                                                        <td>
                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_txtName__"><input name="ctl00$ContentPlaceHolder1$txtName" type="text" value="" maxlength="50" id="ctl00_ContentPlaceHolder1_txtName" class="textboxlong" style="text-transform: uppercase"></span><span style="color: red">*</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="vtext">Father's Name (As per Matric certificate)
                                                            <br>
                                                            <strong>पिता का नाम (मैट्रिक सर्टिफिकेट के अनुसार)</strong>
                                                        </td>
                                                        <td class="colon">:</td>
                                                        <td>

                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_txtFatherName__"><input name="ctl00$ContentPlaceHolder1$txtFatherName" type="text" value="" maxlength="50" id="ctl00_ContentPlaceHolder1_txtFatherName" class="textboxlong" style="text-transform: uppercase"></span><span style="color: red">*</span>



                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="vtext">Mother's Name
                                                            <br>
                                                            <strong>मां का नाम</strong>
                                                        </td>
                                                        <td class="colon">:</td>
                                                        <td>
                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_txtMName__"><input name="ctl00$ContentPlaceHolder1$txtMName" type="text" value="" maxlength="50" id="ctl00_ContentPlaceHolder1_txtMName" class="textboxlong" style="text-transform: uppercase"></span><span style="color: red">*</span>
                                                        </td>
                                                    </tr>
                                                    <tr id="ctl00_ContentPlaceHolder1_trExamCenter">
                                                        <td class="vtext">Examination Centre for Entrance Test<br>
                                                            <strong>प्रवेश परीक्षा के लिए परीक्षा केन्द्र</strong>
                                                        </td>
                                                        <td class="colon">:</td>
                                                        <td>
                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_ddlExamCenter__"><select name="ctl00$ContentPlaceHolder1$ddlExamCenter" id="ctl00_ContentPlaceHolder1_ddlExamCenter" class="dropdownlong">
                                                                    <option value="0">-- Select Exam Center --</option>
                                                                    <option value="3">SOLAN</option>
                                                                    <option value="17">SHIMLA</option>
                                                                    <option value="18">DHARAMSHALA</option>
                                                                    <option value="19">UNA</option>
                                                                    <option value="20">HAMIRPUR</option>
                                                                    <option value="21">PALAMPUR</option>
                                                                    <option value="24">MANDI</option>
                                                                    <option value="33">AMB (UNA)</option>
                                                                    <option value="34">BILASPUR</option>
                                                                    <option value="35">CHAMBA</option>
                                                                    <option value="36">KANGRA</option>
                                                                    <option selected="selected" value="37">KULLU</option>
                                                                    <option value="38">NAHAN</option>
                                                                    <option value="39">RAMPUR</option>
                                                                    <option value="40">SUNDER NAGAR</option>

                                                                </select></span>
                                                            <span style="color: red">*</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="vtext">Address for Correspondence (IN CAPITAL LETTERS)
                                                            <br>
                                                            <strong>पत्रव्यवहार हेतु पता</strong>
                                                        </td>
                                                        <td class="colon">:</td>
                                                        <td>

                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_txtCAddress__"><textarea name="ctl00$ContentPlaceHolder1$txtCAddress" rows="5" cols="20" id="ctl00_ContentPlaceHolder1_txtCAddress" class="textboxmultiline" onkeypress="if (this.value.length > 199) { return false; }" style="width: 251px; text-transform: uppercase"></textarea></span><span style="color: red">*</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="vtext">Mobile No.
                                                            <br>
                                                            <strong>मोबाइल नंबर</strong>
                                                        </td>
                                                        <td class="colon">:</td>
                                                        <td>
                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_txtMobileNo__"><input name="ctl00$ContentPlaceHolder1$txtMobileNo" value="" maxlength="10" id="ctl00_ContentPlaceHolder1_txtMobileNo" type="text" class="textboxlong" ondrop="return false;" ondrag="return false;" onpaste="return false;" oncut="return false;" onkeydown="return AllownumberOnly(event,this);"></span><span style="color: red">*</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="vtext">Permanent Home Address (IN CAPITAL LETTERS)
                                                            <br>
                                                            <strong>स्थाई घर का पता</strong>
                                                        </td>
                                                        <td class="colon">:</td>
                                                        <td>
                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_chkboxCopyAddress__"><span class="chkbox" onchange="CopyAddress(this)" style="color: black;"><input id="ctl00_ContentPlaceHolder1_chkboxCopyAddress" type="checkbox" name="ctl00$ContentPlaceHolder1$chkboxCopyAddress"><label for="ctl00_ContentPlaceHolder1_chkboxCopyAddress">Same as Correspondence
                                                                        Address</label></span></span>
                                                            <br>
                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_txtPAddress__"><textarea name="ctl00$ContentPlaceHolder1$txtPAddress" rows="5" cols="20" id="ctl00_ContentPlaceHolder1_txtPAddress" class="textboxmultiline" onkeypress="if (this.value.length > 199) { return false; }" style="text-transform: uppercase; width: 251px;"></textarea></span><span style="color: red">*</span>


                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="vtext">Email-Id
                                                            <br>
                                                            <strong>ईमेल-आईडी</strong>
                                                        </td>
                                                        <td class="colon">:</td>
                                                        <td>
                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_txtEmail__"><input name="ctl00$ContentPlaceHolder1$txtEmail" type="text" value="" maxlength="50" id="ctl00_ContentPlaceHolder1_txtEmail" class="textboxlong" ondrop="return false;"></span><span style="color: red">*</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="vtext">Date of Birth
                                                            <br>
                                                            <strong>जन्म की तारीख</strong>
                                                        </td>
                                                        <td class="colon">:</td>
                                                        <td>
                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_txtDob__"><input type="date" id="date" name="date">
                                                                <img align="absMiddle" alt="" border="0" class="PopcalTrigger" height="20"></a>Awaited



                                                                <span id="Anthem_ctl00_ContentPlaceHolder1_hfvforyear__"><input type="hidden" name="ctl00$ContentPlaceHolder1$hfvforyear" id="ctl00_ContentPlaceHolder1_hfvforyear" value="21"></span>
                                                                <span id="Anthem_ctl00_ContentPlaceHolder1_hfvformonth__"><input type="hidden" name="ctl00$ContentPlaceHolder1$hfvformonth" id="ctl00_ContentPlaceHolder1_hfvformonth" value="6"></span>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="vtext">Aadhaar No.<br>
                                                            <strong>आधार संख्या</strong>
                                                        </td>
                                                        <td class="colon">:</td>
                                                        <td>
                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_txtAadhaarNo__"><input name="ctl00$ContentPlaceHolder1$txtAadhaarNo" type="text" value="" maxlength="12" id="ctl00_ContentPlaceHolder1_txtAadhaarNo" ondrop="return false;" ondrag="return false;" class="textboxlong" onkeypress="return isNumber(event)"></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="vtext">High School (Matric) Mark-Sheet No.<br>
                                                            <strong>हाई स्कूल (मैट्रिक) मार्क-शीट नं</strong>
                                                        </td>
                                                        <td class="colon">:</td>
                                                        <td>
                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_txtHSchoolCno__"><input name="ctl00$ContentPlaceHolder1$txtHSchoolCno" type="text" value="" maxlength="20" id="ctl00_ContentPlaceHolder1_txtHSchoolCno" class="textboxlong" ondrop="return false;" onpaste="return false;"></span><span style="color: red">*</span>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="vtext">High School (+2) Mark-Sheet No.<br>
                                                            <strong>हाई स्कूल (+2) मार्कशीट नं</strong>
                                                        </td>
                                                        <td class="colon">:</td>
                                                        <td>
                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_txtHSchoolCno__"><input name="ctl00$ContentPlaceHolder1$txtHSchoolCno" type="text" value="" maxlength="20" id="ctl00_ContentPlaceHolder1_txtHSchoolCno" class="textboxlong" ondrop="return false;" onpaste="return false;"></span><span style="color: red">*</span>
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
                                                                            <td><span><input id="ctl00_ContentPlaceHolder1_rdNationality_0" type="radio" name="ctl00$ContentPlaceHolder1$rdNationality" value="I" checked="checked"><label for="ctl00_ContentPlaceHolder1_rdNationality_0">Indian</label></span>
                                                                            </td>
                                                                            <td><span><input id="ctl00_ContentPlaceHolder1_rdNationality_1" type="radio" name="ctl00$ContentPlaceHolder1$rdNationality" value="O"><label for="ctl00_ContentPlaceHolder1_rdNationality_1">Other</label></span>
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
                                                                            <td><span><input id="ctl00_ContentPlaceHolder1_rdSex_0" type="radio" name="ctl00$ContentPlaceHolder1$rdSex" value="M"><label for="ctl00_ContentPlaceHolder1_rdSex_0">Male</label></span></td>
                                                                            <td><span><input id="ctl00_ContentPlaceHolder1_rdSex_1" type="radio" name="ctl00$ContentPlaceHolder1$rdSex" value="F" checked="checked"><label for="ctl00_ContentPlaceHolder1_rdSex_1">Female</label></span></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>

                                                        </td>
                                                    </tr>

                                                    <tr id="ctl00_ContentPlaceHolder1_trChildofHPBonafideNO">

                                                    </tr>
                                                    <tr id="ctl00_ContentPlaceHolder1_trChildofHPBonafideSubNO">

                                                    </tr>
                                                    <tr id="ctl00_ContentPlaceHolder1_trtrChildofHPBonafideYES">

                                                    </tr>
                                                    <tr id="ctl00_ContentPlaceHolder1_trtrtrChildofHPBonafideSubYES">

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
                                                            <div style="width: 18%">
                                                                <div id="Anthem_ctl00_ContentPlaceHolder1_rdbsinglegirlchild__">
                                                                    <table id="ctl00_ContentPlaceHolder1_rdbsinglegirlchild" class="radio" onclick="return confirmSinglegirlSelection();" border="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td><span><input id="ctl00_ContentPlaceHolder1_rdbsinglegirlchild_0" type="radio" name="ctl00$ContentPlaceHolder1$rdbsinglegirlchild" value="Y"><label for="ctl00_ContentPlaceHolder1_rdbsinglegirlchild_0">Yes</label></span>
                                                                                </td>
                                                                                <td><span><input id="ctl00_ContentPlaceHolder1_rdbsinglegirlchild_1" type="radio" name="ctl00$ContentPlaceHolder1$rdbsinglegirlchild" value="N" checked="checked"><label for="ctl00_ContentPlaceHolder1_rdbsinglegirlchild_1">No</label></span>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                            </div>
                                                        </td>
                                                    </tr>


                                                    <tr id="ctl00_ContentPlaceHolder1_tr1">

                                                    </tr>
                                                    <tr>

                                                    </tr>
                                                    <tr>

                                                    </tr>
                                                    <tr>

                                                    <tr id="ctl00_ContentPlaceHolder1_trSportCulturalBoth">
                                                        <td class="vtext">You are applying for?
                                                            <br>
                                                            <strong>आप आवेदन कर रहे हैं</strong>
                                                        </td>
                                                        <td class="colon">:</td>
                                                        <td>

                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_ddlSportCulturalBoth__"><select name="ctl00$ContentPlaceHolder1$ddlSportCulturalBoth" id="ctl00_ContentPlaceHolder1_ddlSportCulturalBoth" class="dropdownlong" onchange="javascript:Anthem_FireCallBackEvent(this,event,'ctl00$ContentPlaceHolder1$ddlSportCulturalBoth','',false,'','','',true,null,null,null,true,true);return false;">
                                                                    <option value="0">--Please Select --</option>
                                                                    <option value="S">Sport</option>
                                                                    <option selected="selected" value="C">Cultural</option>
                                                                    <option value="B">Both(Sport &amp; Cultural )</option>
                                                                    <option value="N">Not Applicable</option>

                                                                </select></span>
                                                            <span style="color: red">*</span>
                                                            <br>
                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_lblSCBN__"></span>
                                                        </td>
                                                    </tr>
                                                    <tr>

                                                    </tr>
                                                    <tr id="ctl00_ContentPlaceHolder1_trPhysicallChall">
                                                        <td class="vtext">
                                                            <div>
                                                                <span id="ctl00_ContentPlaceHolder1_spnPhysicallyChallnged">Are you Physically
                                                                    Challenged?</span>

                                                                <br>
                                                                <strong><span id="ctl00_ContentPlaceHolder1_spnPhysicallyChallngedHindi">क्या आप
                                                                        शारीरिक रूप से विकलांग हैं?</span> </strong>
                                                                <strong> </strong>
                                                            </div>



                                                        </td>
                                                        <td class="colon">:</td>
                                                        <td>
                                                            <div style="width: 50%">
                                                                <div style="float: left">
                                                                    <div id="Anthem_ctl00_ContentPlaceHolder1_rdbphysicallychallenged__">
                                                                        <table id="ctl00_ContentPlaceHolder1_rdbphysicallychallenged" class="radio" border="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <input type="radio" name="rad1" onclick="div(0)" checked> Yes
                                                                                        <input type="radio" name="rad1" onclick="div(1)"> No
                                                                                        <br />

                                                                                        <div id="mytext">
                                                                                            <h3 class="hedingss">upload proof of documents</h3>
                                                                                            <form action="#">
                                                                                                <label for="myfile">Select files:</label>
                                                                                                <input type="file" id="myfile" name="myfile" multiple><br><br>
                                                                                                <input type="submit">
                                                                                            </form>
                                                                                        </div>
                                                                                    </td>


                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>


                                                                </div>
                                                                <div style="float: right">
                                                                    <span id="Anthem_ctl00_ContentPlaceHolder1_txtPhysicallyChallengePer__"></span>
                                                                    <span id="Anthem_ctl00_ContentPlaceHolder1_lblPhysicalChallengePer__"></span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="vtext">Select your Category<br>
                                                            <strong>अपनी श्रेणी का चयन करें</strong>
                                                        </td>
                                                        <td class="colon">:</td>
                                                        <td>
                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_ddlSportCulturalBoth__"><select name="ctl00$ContentPlaceHolder1$ddlSportCulturalBoth" id="ctl00_ContentPlaceHolder1_ddlSportCulturalBoth" class="dropdownlong" onchange="javascript:Anthem_FireCallBackEvent(this,event,'ctl00$ContentPlaceHolder1$ddlSportCulturalBoth','',false,'','','',true,null,null,null,true,true);return false;">
                                                                    <option value="0">Please Select</option>
                                                                    <option value="S">OBC</option>
                                                                    <option selected="selected" value="C">General</option>
                                                                    <option value="B">ST</option>
                                                                    <option value="N">SC</option>

                                                                </select></span>
                                                            <span style="color: red">*</span>
                                                        </td>
                                                    </tr>
                                                    <tr id="ctl00_ContentPlaceHolder1_tr_UR_Economical_Weaker_Section">

                                                    </tr>
                                                    <tr id="ctl00_ContentPlaceHolder1_trSubCategory">

                                                    </tr>
                                                    <tr id="ctl00_ContentPlaceHolder1_trSub1Category">

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

                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_btnUpdate__"></span>
                                                            <br>
                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_lblMsg__"><span id="ctl00_ContentPlaceHolder1_lblMsg" style="color: red;"></span></span>

                                                        </td>
                                                    </tr>
                                                    <tr>

                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>


                                    </div>

                                </div>


                                <button type="button" class="btn btn-warning">Save</button>

                            </li>




                            <li class="tab-content tab-content-2 typography">
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
                                                <script type="text/javascript">
                                                    //<![CDATA[
                                                    Sys.WebForms.PageRequestManager._initialize('ctl00$ContentPlaceHolder1$ScriptManagerProxy1', 'aspnetForm', [], [], [], 90, 'ctl00');
                                                    //]]>
                                                </script>


                                                <div id="Anthem_ctl00_ContentPlaceHolder1_gvsubject__">
                                                    <div>
                                                        <table class="table" cellspacing="1" cellpadding="1" rules="all" border="1" id="ctl00_ContentPlaceHolder1_gvsubject" style="width:100%;border:1px solid #B0B0B0;border-collapse:collapse; margin:15px 0;">
                                                            <tbody>
                                                                <tr class="header-style">
                                                                    <th scope="col">S.No</th>
                                                                    <th scope="col">Result Status</th>
                                                                    <th scope="col">Examination Passed</th>
                                                                    <th scope="col">Name of The Board/University <span style="color:red">*</span>
                                                                    </th>
                                                                    <th scope="col">Passing Year <span style="color:red">*</span> </th>
                                                                    <th scope="col">Credits/Marks Obtained <span style="color:red">*</span></th>
                                                                    <th scope="col">Maximum Marks(not for the candidate with CGPA)</th>
                                                                    <th scope="col">% Marks <span style="color:red">*</span></th>
                                                                    <th scope="col">Exam. Roll No. <span style="color:red">*</span></th>
                                                                </tr>
                                                                <tr class="dgitem-style" style="background-color:White;">
                                                                    <td align="center" style="width:5%;">
                                                                        1
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_hfLowerToHigher_Edu_Order__"><input type="hidden" name="ctl00$ContentPlaceHolder1$gvsubject$ctl02$hfLowerToHigher_Edu_Order" id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_hfLowerToHigher_Edu_Order" value="1"></span>
                                                                    </td>
                                                                    <td align="center" style="width:100%;">

                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl04_ddlRStatus__"><select name="ctl00$ContentPlaceHolder1$gvsubject$ctl04$ddlRStatus" id="ctl00_ContentPlaceHolder1_gvsubject_ctl04_ddlRStatus" onchange="javascript:Anthem_FireCallBackEvent(this,event,'ctl00$ContentPlaceHolder1$gvsubject$ctl04$ddlRStatus','',false,'','','',true,null,null,null,true,true);return false;">
                                                                                <option value="P">Passed</option>
                                                                                <option value="A">Awaited</option>
                                                                                <option value="N">Not Applicable</option>


                                                                            </select></span>
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_ddlRStatus__"></span>
                                                                    </td>
                                                                    <td align="center" style="width:20%;">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblExamPassed__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblExamPassed">Class 5 to
                                                                                Class 12 or its Equivalent</span></span>


                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl04_ddlGraduateExam__"><select name="ctl00$ContentPlaceHolder1$gvsubject$ctl04$ddlGraduateExam" id="ctl00_ContentPlaceHolder1_gvsubject_ctl04_ddlGraduateExam" class="dropdown1 ">
                                                                                <option selected="selected" value="0">--Select Class--</option>
                                                                                <option value="3">Class 5</option>
                                                                                <option value="17">Class 6</option>
                                                                                <option value="18">Class 7</option>
                                                                                <option value="19">Class 8</option>
                                                                                <option value="20">Class 9</option>
                                                                                <option value="21">Class 10</option>
                                                                                <option value="24">Class 11</option>
                                                                                <option value="24">Class 12</option>

                                                                            </select></span>

                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_hdfExamPassId__"><input type="hidden" name="ctl00$ContentPlaceHolder1$gvsubject$ctl02$hdfExamPassId" id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_hdfExamPassId" value="2"></span>

                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_ddlGraduateExam__"></span><span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblGradMandatory__"></span>
                                                                    </td>
                                                                    <td align="center">

                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl03_txtNameofUniver__"><input name="ctl00$ContentPlaceHolder1$gvsubject$ctl03$txtNameofUniver" type="text" maxlength="50" id="ctl00_ContentPlaceHolder1_gvsubject_ctl03_txtNameofUniver" class="textbox" onpaste="return false" ondrop="return false"></span>





                                                                    </td>
                                                                    <td align="center">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_ddlYear__"><select name="ctl00$ContentPlaceHolder1$gvsubject$ctl02$ddlYear" id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_ddlYear">
                                                                                <option value="0">--Select --</option>
                                                                                <option value="1976">1976</option>

                                                                                <option value="2014">2014</option>
                                                                                <option value="2015">2015</option>
                                                                                <option value="2016">2016</option>
                                                                                <option value="2017">2017</option>
                                                                                <option value="2018">2018</option>
                                                                                <option value="2019">2019</option>
                                                                                <option selected="selected" value="2020">2020</option>
                                                                                <option value="2021">2021</option>
                                                                                <option value="2022">2022</option>
                                                                                <option value="2023">2023</option>

                                                                            </select></span>
                                                                    </td>
                                                                    <td align="center">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_txtCreditMarks__"><input name="ctl00$ContentPlaceHolder1$gvsubject$ctl02$txtCreditMarks" type="text" value="" maxlength="6" id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_txtCreditMarks" class="textbox" onpaste="return false" ondrop="return false" onkeydown="return NumberOnly(event,this);" style="width:55px;"></span>

                                                                    </td>
                                                                    <td align="center">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_txtMaxMarks__"><input name="ctl00$ContentPlaceHolder1$gvsubject$ctl02$txtMaxMarks" type="text" value="" maxlength="6" id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_txtMaxMarks" class="textbox" onkeydown="return NumberOnly(event,this);" onpaste="return false" ondrop="return false" style="width:55px;"></span>
                                                                    </td>
                                                                    <td align="center">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_txtCreMarkPercent__"><input name="ctl00$ContentPlaceHolder1$gvsubject$ctl02$txtCreMarkPercent" type="text" value="" maxlength="5" id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_txtCreMarkPercent" class="textbox" onpaste="return false" ondrop="return false" onkeydown="return NumberOnly(event,this);" style="width:55px;"></span>

                                                                    </td>
                                                                    <td align="center">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_txtExamRollNo__"><input name="ctl00$ContentPlaceHolder1$gvsubject$ctl02$txtExamRollNo" type="text" value="" maxlength="15" id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_txtExamRollNo" class="textbox" onpaste="return false" ondrop="return false"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr class="dgitem-style" style="background-color:#F8F8F8;">
                                                                    <td align="center" style="width:5%;">
                                                                        2
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl03_hfLowerToHigher_Edu_Order__"><input type="hidden" name="ctl00$ContentPlaceHolder1$gvsubject$ctl03$hfLowerToHigher_Edu_Order" id="ctl00_ContentPlaceHolder1_gvsubject_ctl03_hfLowerToHigher_Edu_Order" value="2"></span>
                                                                    </td>
                                                                    <td align="center" style="width:100%;">

                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl03_ddlRStatus__"><select name="ctl00$ContentPlaceHolder1$gvsubject$ctl03$ddlRStatus" id="ctl00_ContentPlaceHolder1_gvsubject_ctl03_ddlRStatus" onchange="javascript:Anthem_FireCallBackEvent(this,event,'ctl00$ContentPlaceHolder1$gvsubject$ctl03$ddlRStatus','',false,'','','',true,null,null,null,true,true);return false;">
                                                                                <option value="P">Passed</option>
                                                                                <option selected="selected" value="A">Awaited</option>
                                                                                <option value="N">Not Applicable</option>

                                                                            </select></span>
                                                                    </td>
                                                                    <td align="center" style="width:20%;">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl03_lblExamPassed__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl03_lblExamPassed">BA./B.Sc./B.Com
                                                                                or its Equivalent</span></span>
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl03_hdfExamPassId__"><input type="hidden" name="ctl00$ContentPlaceHolder1$gvsubject$ctl03$hdfExamPassId" id="ctl00_ContentPlaceHolder1_gvsubject_ctl03_hdfExamPassId" value="3"></span>

                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl03_ddlGraduateExam__"><select name="ctl00$ContentPlaceHolder1$gvsubject$ctl03$ddlGraduateExam" id="ctl00_ContentPlaceHolder1_gvsubject_ctl03_ddlGraduateExam" class="dropdown1 ">
                                                                                <option selected="selected" value="0">--Select Degree--</option>
                                                                                <option value="18">B.A</option>
                                                                                <option value="19">B.Com</option>
                                                                                <option value="20">B.Sc</option>
                                                                                <option value="21">Other</option>

                                                                            </select></span><span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl03_lblGradMandatory__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl03_lblGradMandatory" style="color:Red;font-size:Medium;">*</span></span>
                                                                    </td>
                                                                    <td align="center">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl03_txtNameofUniver__"><input name="ctl00$ContentPlaceHolder1$gvsubject$ctl03$txtNameofUniver" type="text" maxlength="50" id="ctl00_ContentPlaceHolder1_gvsubject_ctl03_txtNameofUniver" class="textbox" onpaste="return false" ondrop="return false"></span>

                                                                    </td>
                                                                    <td align="center">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl03_ddlYear__"><select name="ctl00$ContentPlaceHolder1$gvsubject$ctl03$ddlYear" id="ctl00_ContentPlaceHolder1_gvsubject_ctl03_ddlYear">
                                                                                <option selected="selected" value="0">--Select --</option>
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
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl03_txtCreditMarks__"><input name="ctl00$ContentPlaceHolder1$gvsubject$ctl03$txtCreditMarks" type="text" maxlength="6" id="ctl00_ContentPlaceHolder1_gvsubject_ctl03_txtCreditMarks" class="textbox" onpaste="return false" ondrop="return false" onkeydown="return NumberOnly(event,this);" style="width:55px;"></span>

                                                                    </td>
                                                                    <td align="center">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl03_txtMaxMarks__"><input name="ctl00$ContentPlaceHolder1$gvsubject$ctl03$txtMaxMarks" type="text" maxlength="6" id="ctl00_ContentPlaceHolder1_gvsubject_ctl03_txtMaxMarks" class="textbox" onkeydown="return NumberOnly(event,this);" onpaste="return false" ondrop="return false" style="width:55px;"></span>
                                                                    </td>
                                                                    <td align="center">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl03_txtCreMarkPercent__"><input name="ctl00$ContentPlaceHolder1$gvsubject$ctl03$txtCreMarkPercent" type="text" maxlength="5" id="ctl00_ContentPlaceHolder1_gvsubject_ctl03_txtCreMarkPercent" class="textbox" onpaste="return false" ondrop="return false" onkeydown="return NumberOnly(event,this);" style="width:55px;"></span>

                                                                    </td>
                                                                    <td align="center">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl03_txtExamRollNo__"><input name="ctl00$ContentPlaceHolder1$gvsubject$ctl03$txtExamRollNo" type="text" maxlength="15" id="ctl00_ContentPlaceHolder1_gvsubject_ctl03_txtExamRollNo" class="textbox" onpaste="return false" ondrop="return false"></span>
                                                                    </td>
                                                                </tr>
                                                                <tr class="dgitem-style" style="background-color:White;">
                                                                    <td align="center" style="width:5%;">
                                                                        3
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl04_hfLowerToHigher_Edu_Order__"><input type="hidden" name="ctl00$ContentPlaceHolder1$gvsubject$ctl04$hfLowerToHigher_Edu_Order" id="ctl00_ContentPlaceHolder1_gvsubject_ctl04_hfLowerToHigher_Edu_Order" value="3"></span>
                                                                    </td>
                                                                    <td align="center" style="width:100%;">

                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl04_ddlRStatus__"><select name="ctl00$ContentPlaceHolder1$gvsubject$ctl04$ddlRStatus" id="ctl00_ContentPlaceHolder1_gvsubject_ctl04_ddlRStatus" onchange="javascript:Anthem_FireCallBackEvent(this,event,'ctl00$ContentPlaceHolder1$gvsubject$ctl04$ddlRStatus','',false,'','','',true,null,null,null,true,true);return false;">
                                                                                <option value="P">Passed</option>
                                                                                <option value="A">Awaited</option>
                                                                                <option value="N">Not Applicable</option>
                                                                                <option selected="selected" value="N">Not Applicable</option>

                                                                            </select></span>
                                                                    </td>
                                                                    <td align="center" style="width:20%;">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl04_lblExamPassed__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl04_lblExamPassed">M.A./M.Sc./M.Com
                                                                                or its Equivalent</span></span>
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl04_hdfExamPassId__"><input type="hidden" name="ctl00$ContentPlaceHolder1$gvsubject$ctl04$hdfExamPassId" id="ctl00_ContentPlaceHolder1_gvsubject_ctl04_hdfExamPassId" value="4"></span>

                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl04_ddlGraduateExam__"><select name="ctl00$ContentPlaceHolder1$gvsubject$ctl04$ddlGraduateExam" id="ctl00_ContentPlaceHolder1_gvsubject_ctl04_ddlGraduateExam" class="dropdown1 ">
                                                                                <option selected="selected" value="0">--Select Degree--</option>
                                                                                <option value="22">M.A</option>
                                                                                <option value="23">M.Sc</option>
                                                                                <option value="24">M.Com</option>
                                                                                <option value="25">Others</option>

                                                                            </select></span><span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl04_lblGradMandatory__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl04_lblGradMandatory" style="color:Red;font-size:Medium;">*</span></span>
                                                                    </td>
                                                                    <td align="center">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl04_txtNameofUniver__"><input name="ctl00$ContentPlaceHolder1$gvsubject$ctl04$txtNameofUniver" type="text" maxlength="50" id="ctl00_ContentPlaceHolder1_gvsubject_ctl04_txtNameofUniver" class="textbox" onpaste="return false" ondrop="return false"></span>

                                                                    </td>
                                                                    <td align="center">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl04_ddlYear__"><select name="ctl00$ContentPlaceHolder1$gvsubject$ctl04$ddlYear" id="ctl00_ContentPlaceHolder1_gvsubject_ctl04_ddlYear">
                                                                                <option selected="selected" value="0">--Select --</option>

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
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl04_txtCreditMarks__"><input name="ctl00$ContentPlaceHolder1$gvsubject$ctl04$txtCreditMarks" type="text" maxlength="6" id="ctl00_ContentPlaceHolder1_gvsubject_ctl04_txtCreditMarks" class="textbox" onpaste="return false" ondrop="return false" onkeydown="return NumberOnly(event,this);" style="width:55px;"></span>

                                                                    </td>
                                                                    <td align="center">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl04_txtMaxMarks__"><input name="ctl00$ContentPlaceHolder1$gvsubject$ctl04$txtMaxMarks" type="text" maxlength="6" id="ctl00_ContentPlaceHolder1_gvsubject_ctl04_txtMaxMarks" class="textbox" onkeydown="return NumberOnly(event,this);" onpaste="return false" ondrop="return false" style="width:55px;"></span>
                                                                    </td>
                                                                    <td align="center">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl04_txtCreMarkPercent__"><input name="ctl00$ContentPlaceHolder1$gvsubject$ctl04$txtCreMarkPercent" type="text" maxlength="5" id="ctl00_ContentPlaceHolder1_gvsubject_ctl04_txtCreMarkPercent" class="textbox" onpaste="return false" ondrop="return false" onkeydown="return NumberOnly(event,this);" style="width:55px;"></span>

                                                                    </td>
                                                                    <td align="center">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl04_txtExamRollNo__"><input name="ctl00$ContentPlaceHolder1$gvsubject$ctl04$txtExamRollNo" type="text" maxlength="15" id="ctl00_ContentPlaceHolder1_gvsubject_ctl04_txtExamRollNo" class="textbox" onpaste="return false" ondrop="return false"></span>
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
                                                                            <td><span><input id="ctl00_ContentPlaceHolder1_rdListYesNo_0" type="radio" name="ctl00$ContentPlaceHolder1$rdListYesNo" value="N" checked="checked"><label for="ctl00_ContentPlaceHolder1_rdListYesNo_0">No</label></span></td>
                                                                            <td><span><input id="ctl00_ContentPlaceHolder1_rdListYesNo_1" type="radio" name="ctl00$ContentPlaceHolder1$rdListYesNo" value="Y" onclick="javascript:Anthem_FireCallBackEvent(this,event,'ctl00$ContentPlaceHolder1$rdListYesNo','1',false,'','','',true,null,null,null,true,true);"><label for="ctl00_ContentPlaceHolder1_rdListYesNo_1">Yes</label></span></td>
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
                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_txtDetails__"><textarea name="ctl00$ContentPlaceHolder1$txtDetails" rows="2" cols="20" id="ctl00_ContentPlaceHolder1_txtDetails" disabled="disabled" class="textboxmultiline" ondrop="return false;" onpaste="return false;"></textarea></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3"><strong>Note :<br>
                                                            </strong><strong><span id="ctl00_ContentPlaceHolder1_spn_FsignMsg">Photograph,Signature and
                                                                    Father/Guardian signature</span><br>
                                                                should be in <span style="color: red">.jpg or .Jpeg format</span> and max size
                                                                20KB allowed.


                                                                <br>

                                                                Filename<span style="color: red"> max 10 Characters</span> Allowed.</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Upload Your Photograph
                                                            <br>
                                                            <strong>अपना तस्वीर डाले
                                                            </strong>
                                                        </td>
                                                        <td class="colon">:</td>
                                                        <td>




                                                            <table>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>


                                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_ImgProfilePic__"><img id="ctl00_ContentPlaceHolder1_ImgProfilePic" src="{{asset('images/imguserr.png')}}" style="height:100px;width:100px;border-width:0px;"></span><span style="color: red">*</span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_UploadImg__"><input type="file" name="ctl00$ContentPlaceHolder1$UploadImg" id="ctl00_ContentPlaceHolder1_UploadImg" class="uploadfiles" onchange="previewFile()"></span>
                                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_hdPath__"><input name="ctl00$ContentPlaceHolder1$hdPath" type="text" id="ctl00_ContentPlaceHolder1_hdPath" style="border-width:0px;border-style:None;height:0px;width:0px;"></span><br>



                                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_lblPPMsg__"><span id="ctl00_ContentPlaceHolder1_lblPPMsg" style="color:Red;"></span></span>





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
                                                        </td>
                                                        <td class="colon">:</td>
                                                        <td>


                                                            <table>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>



                                                                            <div id="Anthem_ctl00_ContentPlaceHolder1_Panel3__">
                                                                                <div id="ctl00_ContentPlaceHolder1_Panel3">

                                                                                    <span id="Anthem_ctl00_ContentPlaceHolder1_ImgSignature__"><img id="ctl00_ContentPlaceHolder1_ImgSignature" src="{{asset('images/sgg.png')}}"></span><span style="color: red">*</span>

                                                                                </div>
                                                                            </div>


                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>
                                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_UploadSignature__"><input type="file" name="ctl00$ContentPlaceHolder1$UploadSignature" id="ctl00_ContentPlaceHolder1_UploadSignature" class="uploadfiles" onchange="previewFileSign()"></span>
                                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_hdSigPath__"><input name="ctl00$ContentPlaceHolder1$hdSigPath" type="text" id="ctl00_ContentPlaceHolder1_hdSigPath" style="border-width:0px;border-style:None;height:0px;width:0px;"></span><br>



                                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_lblSSMsg__"><span id="ctl00_ContentPlaceHolder1_lblSSMsg" style="color:Red;"></span></span>


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

                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_btnBack__"><input type="submit" name="ctl00$ContentPlaceHolder1$btnBack" value="BACK" onclick="javascript:Anthem_FireCallBackEvent(this,event,'ctl00$ContentPlaceHolder1$btnBack','',true,'','','',true,null,null,null,true,true);return false;" id="ctl00_ContentPlaceHolder1_btnBack" class="btn-primary"></span>
                                                        <td colspan="6" class="tdgap" width="42%" align="left">

                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_btnBackEdit__"><input type="submit" name="ctl00$ContentPlaceHolder1$btnBackEdit" value="SAVE " onclick="javascript:Anthem_FireCallBackEvent(this,event,'ctl00$ContentPlaceHolder1$btnBackEdit','',true,'','','wait..',true,null,null,null,true,true);return false;" id="ctl00_ContentPlaceHolder1_btnBackEdit" class="btn-primary"></span>&nbsp;&nbsp;
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
                            </li>

                            <li class="tab-content tab-content-3 typography ttt">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_3">
                                        <h3><span>Step [3/5] :</span> Application Summary &nbsp;
                                            <span id="Anthem_ctl00_ContentPlaceHolder1_lblPageMsg__"><span id="ctl00_ContentPlaceHolder1_lblPageMsg" style="color:Red;"></span></span>
                                        </h3>

                                        <div class="box-body table-responsive">

                                            <table id="ctl00_ContentPlaceHolder1_Table1" class="table Eng_hindi_form mobile_form" width="100%" border="0" cellspacing="5" cellpadding="0">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="3">
                                                            <script type="text/javascript">
                                                                //<![CDATA[
                                                                Sys.WebForms.PageRequestManager._initialize('ctl00$ContentPlaceHolder1$ScriptManagerProxy1', 'aspnetForm', [], [], [], 90, 'ctl00');
                                                                //]]>
                                                            </script>


                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="42%" class="vtext">Name of the Course
                                                            <br>
                                                            <strong>पाठ्यक्रम का नाम</strong>
                                                        </td>
                                                        <td class="colon">:</td>
                                                        <td>
                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_lblCoursName__"><span id="ctl00_ContentPlaceHolder1_lblCoursName"><b>B.Ed.</b></span></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="vtext">Name(IN CAPITAL LETTETRS)<br>
                                                            <strong>नाम</strong>
                                                        </td>
                                                        <td class="colon">:</td>
                                                        <td>
                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_lblName__"><span id="ctl00_ContentPlaceHolder1_lblName">RATNA SHARMA</span></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="vtext">Father's Name
                                                            <br>
                                                            <strong>पिता का नाम</strong>
                                                        </td>
                                                        <td class="colon">:</td>
                                                        <td>
                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_lblFName__"><span id="ctl00_ContentPlaceHolder1_lblFName">LEELA DHAR</span></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="vtext">Mother's Name
                                                            <br>
                                                            <strong>मां का नाम</strong>
                                                        </td>
                                                        <td class="colon">:</td>
                                                        <td>
                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_lblMName__"><span id="ctl00_ContentPlaceHolder1_lblMName">RAKSHA DEVI</span></span>
                                                        </td>
                                                    </tr>
                                                    <tr id="ctl00_ContentPlaceHolder1_trExamCenter">
                                                        <td class="vtext">Examination Centre for Entrance Test<br>
                                                            <strong>प्रवेश परीक्षा के लिए परीक्षा केन्द्र</strong>
                                                        </td>
                                                        <td class="colon">:</td>
                                                        <td>
                                                            &nbsp;<span id="Anthem_ctl00_ContentPlaceHolder1_lblExamCname__"><span id="ctl00_ContentPlaceHolder1_lblExamCname">KULLU</span></span>
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
                                                                <span id="Anthem_ctl00_ContentPlaceHolder1_lblCAddress__"><span id="ctl00_ContentPlaceHolder1_lblCAddress">VILLAGE PATAHRA POST BAZAHARA TEH
                                                                        SAINJ DISTT KULLU (HP) 175134</span></span>
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
                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_lblMobileNo__"><span id="ctl00_ContentPlaceHolder1_lblMobileNo">7876065989</span></span>
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
                                                                <span id="Anthem_ctl00_ContentPlaceHolder1_lblPAddress__"><span id="ctl00_ContentPlaceHolder1_lblPAddress">VILLAGE PATAHRA POST BAZAHARA TEH
                                                                        SAINJ DISTT KULLU (HP) 175134</span></span>
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
                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_lblEmailId__"><span id="ctl00_ContentPlaceHolder1_lblEmailId">ratnasharma928@gmail.com</span></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="vtext">Date of Birth
                                                            <br>
                                                            <strong>जन्म की तारीख</strong>
                                                        </td>
                                                        <td class="colon">:</td>
                                                        <td>
                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_lblDob__"><span id="ctl00_ContentPlaceHolder1_lblDob">24/01/2002</span></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="vtext">Aadhaar No.<br>
                                                            <strong>आधार संख्या</strong>
                                                        </td>
                                                        <td class="colon">:</td>
                                                        <td>
                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_lblAadhaarNo__"><span id="ctl00_ContentPlaceHolder1_lblAadhaarNo">416470942157</span></span>
                                                        </td>
                                                    </tr>
                                                    <tr id="ctl00_ContentPlaceHolder1_trhpumarkseetno">
                                                        <td class="vtext">High School (Matric) Mark-Sheet No.

                                                            <br>
                                                            <strong>हाई स्कूल (मैट्रिक) अंक तालिका संख्या</strong>
                                                        </td>
                                                        <td class="colon">:</td>
                                                        <td>
                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_lblhighschoolmarksheetno__"><span id="ctl00_ContentPlaceHolder1_lblhighschoolmarksheetno">1302143</span></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="vtext">Nationality<br>
                                                            <strong>राष्ट्रीयता</strong>
                                                        </td>
                                                        <td class="colon">:</td>
                                                        <td>
                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_lblNationality__"><span id="ctl00_ContentPlaceHolder1_lblNationality">Indian</span></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="vtext">Gender<br>
                                                            <strong>लिंग</strong>
                                                        </td>
                                                        <td class="colon">:</td>
                                                        <td>
                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_lblGender__"><span id="ctl00_ContentPlaceHolder1_lblGender">Female</span></span>
                                                        </td>
                                                    </tr>

                                                    <tr id="ctl00_ContentPlaceHolder1_trChildofHPBonafideNO">

                                                    </tr>
                                                    <tr id="ctl00_ContentPlaceHolder1_trChildofHPBonafideSubNO">

                                                    </tr>
                                                    <tr id="ctl00_ContentPlaceHolder1_trtrChildofHPBonafideYES">

                                                    </tr>
                                                    <tr id="ctl00_ContentPlaceHolder1_trtrtrChildofHPBonafideSubYES">

                                                    </tr>
                                                    <tr id="ctl00_ContentPlaceHolder1_trbonafied_mbbsbd">

                                                    </tr>
                                                    <tr id="ctl00_ContentPlaceHolder1_tr2">
                                                        <td class="vtext"><span id="ctl00_ContentPlaceHolder1_span51">You are applying
                                                                for?</span><br>
                                                            <strong><span id="ctl00_ContentPlaceHolder1_Span52">आप आवेदन कर रहे
                                                                    हैं</span></strong>
                                                        </td>
                                                        <td class="colon">:</td>
                                                        <td>
                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_Label1__"><span id="ctl00_ContentPlaceHolder1_Label1">C</span></span>
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
                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_lblsinglegirlchild__"><span id="ctl00_ContentPlaceHolder1_lblsinglegirlchild">No</span></span>
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

                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_lblphysicallychallenged__"><span id="ctl00_ContentPlaceHolder1_lblphysicallychallenged">No</span></span>
                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_lblphysicallychalleengePer__"></span>
                                                        </td>
                                                    </tr>

                                                    <tr id="ctl00_ContentPlaceHolder1_trStream">
                                                        <td class="vtext">Stream (As per norms)
                                                            <br>
                                                            <strong>स्ट्रीम (मानदंड के अनुसार)</strong>
                                                        </td>
                                                        <td class="colon">:</td>
                                                        <td>
                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_lblstream__"><span id="ctl00_ContentPlaceHolder1_lblstream">Commerce</span></span>
                                                        </td>
                                                    </tr>
                                                    <tr id="ctl00_ContentPlaceHolder1_trServiceCandidateDepartment">
                                                        <td class="vtext">Name of the department.
                                                            <br>
                                                            <strong>विभाग का नाम | </strong>
                                                        </td>
                                                        <td class="colon">:</td>
                                                        <td>
                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_lblServiceCandidateDepartment__"><span id="ctl00_ContentPlaceHolder1_lblServiceCandidateDepartment"></span></span>
                                                        </td>
                                                    </tr>
                                                    <tr id="ctl00_ContentPlaceHolder1_tr1">
                                                        <td colspan="4">
                                                            <div id="Anthem_ctl00_ContentPlaceHolder1_pnlmarksgrid__"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>

                                                    </tr>
                                                    <tr>

                                                    </tr>
                                                    <tr>

                                                    </tr>
                                                    <tr>
                                                        <td class="vtext">Select your Category<br>
                                                            <strong>अपनी श्रेणी का चयन करें</strong>
                                                        </td>
                                                        <td class="colon">:</td>
                                                        <td>
                                                            &nbsp;<span id="Anthem_ctl00_ContentPlaceHolder1_lblCategoryName__"><span id="ctl00_ContentPlaceHolder1_lblCategoryName">General-Open</span></span>
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
                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_lblFeeDeposited__"><span id="ctl00_ContentPlaceHolder1_lblFeeDeposited">1100.00</span></span>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>



                                            <table id="ctl00_ContentPlaceHolder1_Table2" class="table Eng_hindi_form" width="100%" border="0" cellspacing="5" cellpadding="0">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="6" class="tdgap" width="42%" align="left">

                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_btnBackEdit__"><input type="submit" name="ctl00$ContentPlaceHolder1$btnBackEdit" value="BACK &amp; EDIT" onclick="javascript:Anthem_FireCallBackEvent(this,event,'ctl00$ContentPlaceHolder1$btnBackEdit','',true,'','','wait..',true,null,null,null,true,true);return false;" id="ctl00_ContentPlaceHolder1_btnBackEdit" class="btn-primary"></span>&nbsp;&nbsp;
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">Academic Qualifications<br>
                                                            <strong>शैक्षणिक योग्यता</strong>
                                                        </td>
                                                        <td class="colon"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="6" class="vtext" width="42%" align="left"></td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div id="ctl00_ContentPlaceHolder1_divforacadmicdetails" class="gridiv">


                                                <div id="Anthem_ctl00_ContentPlaceHolder1_gvsubject__">
                                                    <div>
                                                        <table class="table" cellspacing="1" cellpadding="1" rules="all" border="1" id="ctl00_ContentPlaceHolder1_gvsubject" style="width:100%;border:1px solid #B0B0B0;border-collapse:collapse; margin:15px 0;">
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
                                                                    <td align="center" style="width:10%;">
                                                                        1
                                                                    </td>
                                                                    <td align="center">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblRStatus__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblRStatus">Passed</span></span>

                                                                    </td>
                                                                    <td align="center" style="width:20%;">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblExmPassed__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblExmPassed">+2 or its
                                                                                Equivalent</span></span>
                                                                        <br>
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblExmpassedDegree__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblExmpassedDegree" style="font-weight:bold;"></span></span>

                                                                    </td>
                                                                    <td align="center">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblUniversityName__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblUniversityName">CENTRAL
                                                                                BOARD OF SECONDARY EDUCATION</span></span>

                                                                    </td>
                                                                    <td align="center">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblYear__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblYear">2020</span></span>
                                                                    </td>
                                                                    <td align="center">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblCreditObtainMarks__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblCreditObtainMarks">307.00</span></span>

                                                                    </td>
                                                                    <td align="center">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblMaxMarks__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblMaxMarks">500.00</span></span>

                                                                    </td>
                                                                    <td align="center">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblCreditMarks__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblCreditMarks">61.40</span></span>

                                                                    </td>
                                                                    <td align="center">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblExamRollNo__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl02_lblExamRollNo">17707513</span></span>

                                                                    </td>
                                                                </tr>
                                                                <tr class="dgitem-style" style="background-color:#F8F8F8;">
                                                                    <td align="center" style="width:10%;">
                                                                        2
                                                                    </td>
                                                                    <td align="center">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl03_lblRStatus__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl03_lblRStatus"><b>Awaited</b></span></span>

                                                                    </td>
                                                                    <td align="center" style="width:20%;">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl03_lblExmPassed__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl03_lblExmPassed">BA./B.Sc./B.Com
                                                                                or its Equivalent</span></span>
                                                                        <br>
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl03_lblExmpassedDegree__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl03_lblExmpassedDegree" style="font-weight:bold;"></span></span>

                                                                    </td>
                                                                    <td align="center">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl03_lblUniversityName__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl03_lblUniversityName"></span></span>

                                                                    </td>
                                                                    <td align="center">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl03_lblYear__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl03_lblYear"></span></span>
                                                                    </td>
                                                                    <td align="center">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl03_lblCreditObtainMarks__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl03_lblCreditObtainMarks"></span></span>

                                                                    </td>
                                                                    <td align="center">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl03_lblMaxMarks__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl03_lblMaxMarks"></span></span>

                                                                    </td>
                                                                    <td align="center">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl03_lblCreditMarks__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl03_lblCreditMarks"></span></span>

                                                                    </td>
                                                                    <td align="center">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl03_lblExamRollNo__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl03_lblExamRollNo"></span></span>

                                                                    </td>
                                                                </tr>
                                                                <tr class="dgitem-style" style="background-color:White;">
                                                                    <td align="center" style="width:10%;">
                                                                        3
                                                                    </td>
                                                                    <td align="center">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl04_lblRStatus__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl04_lblRStatus"><b>Not
                                                                                    Applicable</b></span></span>

                                                                    </td>
                                                                    <td align="center" style="width:20%;">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl04_lblExmPassed__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl04_lblExmPassed">M.A./M.Sc./M.Com
                                                                                or its Equivalent</span></span>
                                                                        <br>
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl04_lblExmpassedDegree__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl04_lblExmpassedDegree" style="font-weight:bold;"></span></span>

                                                                    </td>
                                                                    <td align="center">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl04_lblUniversityName__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl04_lblUniversityName"></span></span>

                                                                    </td>
                                                                    <td align="center">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl04_lblYear__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl04_lblYear"></span></span>
                                                                    </td>
                                                                    <td align="center">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl04_lblCreditObtainMarks__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl04_lblCreditObtainMarks"></span></span>

                                                                    </td>
                                                                    <td align="center">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl04_lblMaxMarks__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl04_lblMaxMarks"></span></span>

                                                                    </td>
                                                                    <td align="center">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl04_lblCreditMarks__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl04_lblCreditMarks"></span></span>

                                                                    </td>
                                                                    <td align="center">
                                                                        <span id="Anthem_ctl00_ContentPlaceHolder1_gvsubject_ctl04_lblExamRollNo__"><span id="ctl00_ContentPlaceHolder1_gvsubject_ctl04_lblExamRollNo"></span></span>

                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>




                                            <table class="table Eng_hindi_form mobile_form" width="100%" border="0" cellspacing="5" cellpadding="0">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="3">&nbsp;</td>
                                                    </tr>
                                                </tbody>
                                            </table>



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
                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_lblDisqualiOrSus__"><span id="ctl00_ContentPlaceHolder1_lblDisqualiOrSus">No</span></span>
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
                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_lblDisqualifDtls__"><span id="ctl00_ContentPlaceHolder1_lblDisqualifDtls"></span></span>
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

                                                                                    <span id="Anthem_ctl00_ContentPlaceHolder1_ImgProfilePic__"><img id="ctl00_ContentPlaceHolder1_ImgProfilePic" src="{{asset('images/sgg.png')}}" style="height:100px;width:100px;border-width:0px;"></span>


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

                                                                                    <span id="Anthem_ctl00_ContentPlaceHolder1_ImgSignature__"><img id="ctl00_ContentPlaceHolder1_ImgSignature" src="{{asset('images/sgg.png')}}" style="height:50px;width:200px;border-width:0px;"></span>

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
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="vtext"></td>
                                                        <td class="colon">&nbsp;</td>
                                                        <td>

                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_btnSave__"></span>&nbsp;&nbsp;

                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_lblMsg__"><span id="ctl00_ContentPlaceHolder1_lblMsg" style="color:Red;"></span></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left">

                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_btnBack__"><input type="submit" name="ctl00$ContentPlaceHolder1$btnBack" value="BACK &amp; EDIT" onclick="javascript:Anthem_FireCallBackEvent(this,event,'ctl00$ContentPlaceHolder1$btnBack','',true,'','','',true,null,null,null,true,true);return false;" id="ctl00_ContentPlaceHolder1_btnBack" class="btn-primary"></span>
                                                        </td>
                                                        <td colspan="2" align="right">

                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_btnSaveNext__"><input type="submit" name="ctl00$ContentPlaceHolder1$btnSaveNext" value="NEXT" onclick="javascript:Anthem_FireCallBackEvent(this,event,'ctl00$ContentPlaceHolder1$btnSaveNext','',true,'','','',true,null,null,null,true,true);return false;" id="ctl00_ContentPlaceHolder1_btnSaveNext" class="btn-primary"></span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="tab-content tab-content-last typography">
                                <div class="typography">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_4">
                                            <h3><span>Step [4/5] :</span>Payment &nbsp; <span id="Anthem_ctl00_ContentPlaceHolder1_lblPageMsg__"><span id="ctl00_ContentPlaceHolder1_lblPageMsg" style="color:Red;"></span></span></h3>
                                            <div class="box-body table-responsive">
                                                <table id="ctl00_ContentPlaceHolder1_Table1" class="table Eng_hindi_form" width="100%" border="0" cellspacing="5" cellpadding="0">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="3"></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="42%" class="vtext">Choose Payment Mode
                                                                <br>
                                                                <strong>भुगतान विकल्प चुनें</strong>
                                                            </td>
                                                            <td class="colon">:</td>
                                                            <td>

                                                                <div id="Anthem_ctl00_ContentPlaceHolder1_rdPaymentOption__">
                                                                    <table id="ctl00_ContentPlaceHolder1_rdPaymentOption" class="radio" border="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td><span><input id="ctl00_ContentPlaceHolder1_rdPaymentOption_0" type="radio" name="ctl00$ContentPlaceHolder1$rdPaymentOption" value="O" onclick="javascript:Anthem_FireCallBackEvent(this,event,'ctl00$ContentPlaceHolder1$rdPaymentOption','0',false,'','','',true,null,null,null,true,true);"><label for="ctl00_ContentPlaceHolder1_rdPaymentOption_0">Online</label></span>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>


                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>





                                                <div id="Anthem_ctl00_ContentPlaceHolder1_pnlOnlinePayment__" style="display: none;">
                                                </div>


                                                <div id="Anthem_ctl00_ContentPlaceHolder1_pnlChallan__" style="display: none;"></div>
                                            </div>

                                            <div class="box-body  table-responsive">
                                                <div class="gridiv">


                                                    <div id="Anthem_ctl00_ContentPlaceHolder1_gvChallDtls__">
                                                        <div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <table class="table Eng_hindi_form" width="100%" border="0" cellspacing="5" cellpadding="0">
                                                <tbody>
                                                    <tr>
                                                        <td align="left">

                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_btnBack__"><input type="submit" name="ctl00$ContentPlaceHolder1$btnBack" value="BACK" onclick="javascript:Anthem_FireCallBackEvent(this,event,'ctl00$ContentPlaceHolder1$btnBack','',true,'','','',true,null,null,null,true,true);return false;" id="ctl00_ContentPlaceHolder1_btnBack" class="btn-primary"></span>
                                                        </td>
                                                        <td colspan="2" align="right">

                                                            <span id="Anthem_ctl00_ContentPlaceHolder1_btnSaveNext__"><input type="submit" name="ctl00$ContentPlaceHolder1$btnSaveNext" value="NEXT" onclick="javascript:Anthem_FireCallBackEvent(this,event,'ctl00$ContentPlaceHolder1$btnSaveNext','',true,'','','',true,null,null,null,true,true);return false;" id="ctl00_ContentPlaceHolder1_btnSaveNext" class="btn-primary"></span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </li>










                            <li class="tab-content tabend typography">
                                <div class="typography">
                                    <div class="tab-content">

                                        <div class="tab-pane active" id="tab_6">
                                            <h3><span>Step [5/5] :</span>Submit Reference Number &amp; Application Form</h3>
                                            <div class="box-body table-responsive">
                                                <table id="ctl00_ContentPlaceHolder1_Table1" class="table Eng_hindi_form" width="50%" border="0" cellspacing="5" cellpadding="0">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="3">
                                                                <span id="Anthem_ctl00_ContentPlaceHolder1_lblAlertMsg__"><span id="ctl00_ContentPlaceHolder1_lblAlertMsg" style="color:Red;"></span></span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                            </li>


                        </ul>
                    </div>
                    <!--/ tabs -->
                </div>
            </div>



            <div class="col-md-2">
                <div class="sidebar">
                    <div class="wr-right" style="display: block">
                        <div>
                            <h4>Steps for Registration</h4>

                            <div class="btn-group-vertical">

                                <a href="PA_Comm_PG_UG_Registration_Personalinfo.aspx" class="btn btn-warning btn-block"> Personal
                                    Information</a>
                                <a href="PA_Comm_PG_UG_Registration_Education_Doc.aspx" class="btn btn-warning btn-block">
                                    Education &amp; Document Details</a>
                                <a href="PA_Comm_PG_UG_ApplicationSummery.aspx" class="btn btn-warning btn-block"> Application
                                    Summary</a>
                                <a href="PA_Comm_PG_UG_Registration_Payment.aspx" id="ctl00_paymentid" class="btn btn-warning btn-block"> Payment</a>
                                <a href="PA_Comm_PG_UG_Registration_SubmitFormAndApp.aspx" class="btn btn-warning btn-block">
                                    Submit Application Form</a>
                            </div>
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>











<div class="secttionlstf mt-5">
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <a class="navbar-brand" href="#"><img src="{{asset('images/footerlogo.png')}}" alt="" class="d-inline-block align-text-top"></a>
                <br>
                <h5 class="textt"><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur
                        adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua dolore magna aliqua. </a></h5>
            </div>



            <div class="col-md-3">
                <h3> BASED SCHOLARSHIPS</h3>
                <h5><a href="#">Top Scholarships for Girls/Women</a></h5>
                <h5><a href="#">Top Scholarships based on Merit</a></h5>
                <h5><a href="#">Top Scholarships based on Means</a></h5>
                <h5><a href="#">Top Scholarships for Minorities</a></h5>
                <h5><a href="#">Top Scholarships based on Talent</a></h5>
                <h5><a href="#">Top Scholarships based on Disability</a></h5>
                <h5><a href="#">Top Government Scholarships</a></h5>
                <h5><a href="#">Top Scholarships for MBBS Students</a></h5>
                <h5><a href="#">Top Scholarships for Engineering Students</a></h5>
                <h5><a href="#">Top Scholarships for Study Abroad</a></h5>
            </div>


            <div class="col-md-3">
                <h3>STATE SCHOLARSHIPS</h3>
                <h5><a href="#">Top Scholarships of Uttar Pradesh</a></h5>
                <h5><a href="#">Top Scholarships of Maharashtra</a></h5>
                <h5><a href="#">Top Scholarships of Bihar</a></h5>
                <h5><a href="#">Top Scholarships of West Bengal</a></h5>
                <h5><a href="#">Top Scholarships of Madhya Pradesh</a></h5>
                <h5><a href="#">Top Scholarships of Tamil Nadu</a></h5>
                <h5><a href="#">Top Scholarships of Rajasthan</a></h5>
                <h5><a href="#">Top Scholarships of Karnataka</a></h5>
                <h5><a href="#">Top Scholarships of Gujarat</a></h5>
                <h5><a href="#">Top Scholarships of Andhra Pradesh</a></h5>
            </div>



            <div class="col-md-3">
                <h3>CLASS SCHOLARSHIPS</h3>
                <h5><a href="#">Top Scholarships for Class 1 to 10</a></h5>
                <h5><a href="#">Top Scholarships for Class 11, 12</a></h5>
                <h5><a href="#">Top Scholarships for Class 12 passed</a></h5>
                <h5><a href="#">Top Scholarships for Graduation</a></h5>
                <h5><a href="#">Top Scholarships for Post-Graduation</a></h5>
                <h5><a href="#">Top Scholarships for Management</a></h5>
                <h5><a href="#">Top Scholarships for Diploma/Polytechnic</a></h5>
                <h5><a href="#">Top Scholarships for ITI</a></h5>
            </div>


        </div>
    </div>
</div>
@endsection
