<form>
                                                        <tr>
                                                            <td colspan="3"></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3"><h3>PDF File</h3></td>
                                                        </tr>
                                                        <tr>
                                                        <td width="42%" class="vtext"><strong>Application Number</strong>
                                                            </td>
                                                            <td class="colon">:</td>
                                                            <td>
                                                                <span
                                                                    id="Anthem_ctl00_ContentPlaceHolder1_lblCoursName__"><span
                                                                        id="ctl00_ContentPlaceHolder1_lblCoursName"><b>{{(!empty(auth()->user()->step5_updated_at))
                                                                            ? auth()->user()->application_number :
                                                                            ''}}</b></span></span>
                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                            <td width="42%" class="vtext"><strong>Transaction ID</strong>
                                                            </td>
                                                            <td class="colon">:</td>
                                                            <td>
                                                                <span
                                                                    id="Anthem_ctl00_ContentPlaceHolder1_lblCoursName__"><span
                                                                        id="ctl00_ContentPlaceHolder1_lblCoursName"><b>{{(!empty(auth()->user()->step5_updated_at))
                                                                            ? auth()->user()->transaction_id :
                                                                            ''}}</b></span></span>
                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                            <td width="42%" class="vtext"><strong>Name</strong>
                                                            </td>
                                                            <td class="colon">:</td>
                                                            <td>
                                                                <span
                                                                    id="Anthem_ctl00_ContentPlaceHolder1_lblCoursName__"><span
                                                                        id="ctl00_ContentPlaceHolder1_lblCoursName"><b>{{(!empty(auth()->user()->step5_updated_at))
                                                                            ? auth()->user()->name :
                                                                            ''}}</b></span></span>
                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                            <td width="42%" class="vtext"><strong>Mobile No.</strong>
                                                            </td>
                                                            <td class="colon">:</td>
                                                            <td>
                                                                <span
                                                                    id="Anthem_ctl00_ContentPlaceHolder1_lblCoursName__"><span
                                                                        id="ctl00_ContentPlaceHolder1_lblCoursName"><b>{{(!empty(auth()->user()->step5_updated_at))
                                                                            ? auth()->user()->mobileno :
                                                                            ''}}</b></span></span>
                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                            <td width="42%" class="vtext"><strong>Email-ID</strong>
                                                            </td>
                                                            <td class="colon">:</td>
                                                            <td>
                                                                <span
                                                                    id="Anthem_ctl00_ContentPlaceHolder1_lblCoursName__"><span
                                                                        id="ctl00_ContentPlaceHolder1_lblCoursName"><b>{{(!empty(auth()->user()->step5_updated_at))
                                                                            ? auth()->user()->email :
                                                                            ''}}</b></span></span>
                                                            </td>
                                                        </tr>
                                                        
                                                    </form>         