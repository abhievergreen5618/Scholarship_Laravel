<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

<div class="sectiontopp">
<div class="container">
	<div class="row">
		<div class="col-md-12 mt-5">
  <table class="widthhh">
        <tr>
            <th class="thhh" colspan="3">FEE PAYMENT RECEIPT</th>
        </tr>
         <tr class="mm">
            <th colspan="3"><img src="images/line copy.png" class="rounded mx-auto d-block" alt="..."></th>
        </tr>
            <tr>
                <td colspan="3"></td>
            </tr>
            <tr>
                <td width="42%" class="vtext"><strong>Application Number</strong>
                </td>
                <td>
                    <span id="Anthem_ctl00_ContentPlaceHolder1_lblCoursName__"><span
                            id="ctl00_ContentPlaceHolder1_lblCoursName"><b>{{(!empty(auth()->user()->step5_updated_at))
                                ? auth()->user()->application_number :
                                ''}}</b></span></span>
                </td>
            </tr>
            <tr>
                <td width="42%" class="vtext"><strong>Transaction ID</strong>
                </td>
                <td>
                    <span id="Anthem_ctl00_ContentPlaceHolder1_lblCoursName__"><span
                            id="ctl00_ContentPlaceHolder1_lblCoursName"><b>{{(!empty(auth()->user()->step5_updated_at))
                                ? auth()->user()->transaction_id :
                                ''}}</b></span></span>
                </td>
            </tr>
            <tr>
                <td width="42%" class="vtext"><strong>Name</strong>
                </td>
                <td>
                    <span id="Anthem_ctl00_ContentPlaceHolder1_lblCoursName__"><span
                            id="ctl00_ContentPlaceHolder1_lblCoursName"><b>{{(!empty(auth()->user()->step5_updated_at))
                                ? auth()->user()->name :
                                ''}}</b></span></span>
                </td>
            </tr>
            <tr>
                <td width="42%" class="vtext"><strong>Mobile No.</strong>
                </td>
                <td>
                    <span id="Anthem_ctl00_ContentPlaceHolder1_lblCoursName__"><span
                            id="ctl00_ContentPlaceHolder1_lblCoursName"><b>{{(!empty(auth()->user()->step5_updated_at))
                                ? auth()->user()->mobileno :
                                ''}}</b></span></span>
                </td>
            </tr>
            <tr>
                <td width="42%" class="vtext"><strong>Email-ID</strong>
                </td>
                <td>
                    <span id="Anthem_ctl00_ContentPlaceHolder1_lblCoursName__"><span
                            id="ctl00_ContentPlaceHolder1_lblCoursName"><b>{{(!empty(auth()->user()->step5_updated_at))
                                ? auth()->user()->email :
                                ''}}</b></span></span>
                </td>
            </tr>
        </table>
        </div>
	</div>
</div>
</div>
</body>

</html>