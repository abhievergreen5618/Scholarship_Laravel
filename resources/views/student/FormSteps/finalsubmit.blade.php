
<li class="tab-content tabend typography">
                                <div class="typography">
                                    <div class="tab-content">

                                        <div class="tab-pane active" id="tab_6">
                                            <h3><span>Step [5/5] :</span>Submit Reference Number &amp; Application Form
                                            </h3>
                                            <div class="box-body table-responsive">
                                                <table id="" class="table Eng_hindi_form" width="50%" border="0" cellspacing="5" cellpadding="0">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="3">
                                                                <span id=""><span style="color:Red;"></span></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">@include("student.FormSteps.pdffile")</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left">
                                                                <a class="btn btn-primary" style="color:white;" href="{{route('downloadpdf')}}">Download Receipt</a>
                                                            </td>
                                                            <td colspan="2" align="right">
                                                                <input type="submit" class="btn btn-primary" value="Finish" id="submitapplication" data-action="{{route('submitapplication')}}">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                            </li>
