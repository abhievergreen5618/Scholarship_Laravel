<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form>
    <h3><span>Step [3/6] :</span> Bank Details &nbsp;
                    <span><span id="ctl00_ContentPlaceHolder1_lblPageMsg" style="color:Red;"></span></span>
                </h3>
        <table>
            <tbody>
    <tr>
        <td class="text">Account No. <span style="color: red">*</span>
        <br>
            <strong>खाता संख्या</strong>
        </td>
        <td class="colon">:</td>
            <td>
                <span id="Anthem_ctl00_ContentPlaceHolder1_txtAccountNo__"><input name="accountno"  maxlength="15" id="accountno" type="number" class="textboxlong form-control" ondrop="return false;" ondrag="return false;" onpaste="return false;" oncut="return false;" onkeydown="return AllownumberOnly(event,this);"></span>
            </td>
    </tr>
    <tr>
        <td class="text">Confirm Account No. <span style="color: red">*</span>
        <br>
            <strong>खाता संख्या</strong>
        </td>
        <td class="colon">:</td>
            <td>
                <span id="Anthem_ctl00_ContentPlaceHolder1_txtAccountNo__"><input name="accountno"  maxlength="15" id="accountno" type="number" class="textboxlong form-control" ondrop="return false;" ondrag="return false;" onpaste="return false;" oncut="return false;" onkeydown="return AllownumberOnly(event,this);"></span>
            </td>
    </tr>
    <tr>
                                <td class="vtext">Banking Account Name<span style="color: red">*</span><br>
                                    <strong>बैंकिंग खाता नाम</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_txtName__"><input name="name" type="text" value="{{isset(auth()->user()->name) ? auth()->user()->name : ''}}" maxlength="50" id="name" class="textboxlong form-control" style="text-transform: uppercase"></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="vtext">IFSC Code<span style="color: red">*</span><br>
                                    <strong>आईएफएससी कोड</strong>
                                </td>
                                <td class="colon">:</td>
                                <td>
                                    <span id="Anthem_ctl00_ContentPlaceHolder1_txtName__"><input name="name" type="text" value="{{isset(auth()->user()->name) ? auth()->user()->name : ''}}" maxlength="50" id="name" class="textboxlong form-control" style="text-transform: uppercase"></span>
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


                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <span id="Anthem_ctl00_ContentPlaceHolder1_Uploadpassbook__"><input type="file" name="passbook_photo" id="passbook_photo" class="uploadfiles" accept="image/jpeg,image/jpg"></span>
                                                    <div><img id="passbook_photo_perview" src="{{ (!empty(auth()->user()->passbook)) ? asset('public/images/proofdoc/'.auth()->user()->signature) : 'http://placehold.it/180'}}" class="img-thumbnail mt-2" alt="..."></div>
                                                </td>
                                            </tr>


                                        </tbody>
                                    </table>


                                </td>
                            </tr>
                            <tr>

                            <button type="submit" class="btn btn-warning">Save</button>

                            </tr>
</tbody>
</table>
</form>
</body>
</html>