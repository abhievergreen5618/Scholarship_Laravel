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
                                                                                <td> <button id="rzp-button1">Pay</button>


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
                            <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "rzp_test_DAKCbY6lLkH4z8", // Enter the Key ID generated from the Dashboard
    "amount": "1000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Acme Corp", //your business name
    "description": "Test Transaction",
    "image": "https://example.com/your_logo",

    "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
    "prefill": { //We recommend using the prefill parameter to auto-fill customer's contact information especially their phone number
        "name": "name", //your customer's name
        "email": "email",
        "contact": "contact" //Provide the customer's phone number for better conversion rates
    },

    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>
