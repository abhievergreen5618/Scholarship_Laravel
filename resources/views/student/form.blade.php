@extends("layouts.app")

@section("content")
<div class="secttionform mt-5" id="payment" data-username="{{auth()->user()->name}}"
    data-email="{{auth()->user()->email}}" data-contact="{{auth()->user()->mobileno}}"
    data-razorpaykey="{{env('RAZORPAY_KEY')}}" data-paymenturl="{{route('savepaymentdetails')}}">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="page">

                    <!-- tabs -->
                    <div class="pcss3t pcss3t-effect-scale pcss3t-theme-1">
                        <input type="radio" name="pcss3t" id="tab1"
                            class="{{!empty(auth()->user()->step3_updated_at) ? 'disabled' : ''}}tab-content-first"
                            {{empty(auth()->user()->step1_updated_at) ? 'checked' : ''}}
                        {{!empty(auth()->user()->step3_updated_at) ? 'disabled' : ''}}>
                        <label for="tab1"><i class="fas fa-hand-point-right"></i>Personal Information
                            @if(!empty(auth()->user()->step3_updated_at)) <i class="fa fa-lock" aria-hidden="true"></i>
                            @endif
                        </label>

                        <input type="radio" name="pcss3t" id="tab2" class="tab-content-2"
                            {{!empty(auth()->user()->step1_updated_at) && empty(auth()->user()->step2_updated_at) ?
                        'checked' : ''}} {{empty(auth()->user()->step1_updated_at) ||
                        !empty(auth()->user()->step3_updated_at)? 'disabled' : ''}}>
                        <label for="tab2"><i class="fas fa-hand-point-right"></i>Education & Document Details
                            @if(empty(auth()->user()->step1_updated_at) || !empty(auth()->user()->step3_updated_at)) <i
                                class="fa fa-lock" aria-hidden="true"></i> @endif
                        </label>

                        <input type="radio" name="pcss3t" id="tab3" class="tab-content-third"
                            {{!empty(auth()->user()->step2_updated_at) && empty(auth()->user()->step3_updated_at) ?
                        'checked' : ''}} {{empty(auth()->user()->step2_updated_at) ||
                        !empty(auth()->user()->step3_updated_at) ? 'disabled' : ''}}>
                        <label for="tab3"><i class="fas fa-hand-point-right"></i>Bank Details
                            @if(empty(auth()->user()->step2_updated_at) || !empty(auth()->user()->step3_updated_at))<i
                                class="fa fa-lock" aria-hidden="true"></i> @endif
                        </label>

                        <input type="radio" name="pcss3t" id="tab4" class="tab-content-fourth"
                            {{!empty(auth()->user()->step3_updated_at) && empty(auth()->user()->step4_updated_at) ?
                        'checked' : ''}} {{empty(auth()->user()->step3_updated_at) ||
                        !empty(auth()->user()->step4_updated_at) ? 'disabled' : ''}}>
                        <label for="tab4"><i class="fas fa-hand-point-right"></i>Application Summary
                            @if(empty(auth()->user()->step3_updated_at) || !empty(auth()->user()->step4_updated_at)) <i
                                class="fa fa-lock" aria-hidden="true"></i> @endif
                        </label>

                        <input type="radio" name="pcss3t" id="tab5" class="tab-content-last"
                            {{!empty(auth()->user()->step4_updated_at) && empty(auth()->user()->step5_updated_at) ?
                        'checked' : ''}} {{empty(auth()->user()->step4_updated_at) ||
                        !empty(auth()->user()->step5_updated_at) ? 'disabled' : ''}}>
                        <label for="tab5"><i class="fas fa-hand-point-right"></i>Payment
                            @if(empty(auth()->user()->step4_updated_at) || !empty(auth()->user()->step5_updated_at)) <i
                                class="fa fa-lock" aria-hidden="true"></i> @endif
                        </label>

                        <input type="radio" name="pcss3t" id="tab6" class="tabend"
                            {{!empty(auth()->user()->step4_updated_at) && empty(auth()->user()->step4_updated_at) ?
                        'checked' : ''}} {{empty(auth()->user()->step4_updated_at) ? 'disabled' : ''}}>
                        <label for="tab6"><i class="fas fa-hand-point-right"></i>Submit Application Form
                            @if(empty(auth()->user()->step5_updated_at)) <i class="fa fa-lock" aria-hidden="true"></i>
                            @endif
                        </label>

                        <ul>
                            @include("student.FormSteps.personalinfo")
                            @include("student.FormSteps.educationDocument")
                            @include("student.FormSteps.bankdetails")
                            @include("student.FormSteps.applicationsummary")
                            @include("student.FormSteps.payment")

                            <li class="tab-content tabend typography">
                                <div class="typography">
                                    <div class="tab-content">

                                        <div class="tab-pane active" id="tab_6">
                                            <h3><span>Step [5/5] :</span>Submit Reference Number &amp; Application Form
                                            </h3>
                                            <div class="box-body table-responsive">
                                                <table id="" class="table Eng_hindi_form" width="50%" border="0"
                                                    cellspacing="5" cellpadding="0">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="3">
                                                                <span id=""><span style="color:Red;"></span></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="42%" class="vtext"><strong>Reference
                                                                    Number</strong></td>
                                                            <td class="colon">:</td>
                                                            <td>
                                                                <span
                                                                    id="Anthem_ctl00_ContentPlaceHolder1_lblCoursName__"><span
                                                                        id="ctl00_ContentPlaceHolder1_lblCoursName"><b>{{(!empty(auth()->user()->step5_updated_at))
                                                                            ? auth()->user()->reference_number :
                                                                            ''}}</b></span></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="42%" class="vtext"><strong>Roll Number</strong>
                                                            </td>
                                                            <td class="colon">:</td>
                                                            <td>
                                                                <span
                                                                    id="Anthem_ctl00_ContentPlaceHolder1_lblCoursName__"><span
                                                                        id="ctl00_ContentPlaceHolder1_lblCoursName"><b>{{(!empty(auth()->user()->step5_updated_at))
                                                                            ? auth()->user()->roll_number :
                                                                            ''}}</b></span></span>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td colspan="3"></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3"></td>
                                                        </tr>
                                                    <form>
                                                        <tr>
                                                            <td colspan="3"></td>
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
                                                        <tr>
                                                            <td colspan="3">
                                                            <a class="btn btn-primary" href="downloadPdf,['download'=>'pdf']"><button>Download Receipt</button></a>
                                                            </td>
                                                        </tr>
                                                    </form>                
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
                                <a href="#" class="btn btn-success btn-block py-3 border-dark"
                                    id="personal_information_step">Personal Information</a>
                                <a href="#"
                                    class="btn {{!empty(auth()->user()->step1_updated_at) ? 'btn-success' : 'btn-secondary'}} btn-block py-3 border-dark"
                                    id="education_details_step">Education &amp; Document Details</a>
                                <a href="#"
                                    class="btn {{!empty(auth()->user()->step2_updated_at) ? 'btn-success' : 'btn-secondary'}} btn-block py-3 border-dark"
                                    id="bank_details_step">Bank Details</a>
                                <a href="#"
                                    class="btn {{!empty(auth()->user()->step3_updated_at) ? 'btn-success' : 'btn-secondary'}} btn-block py-3 border-dark"
                                    id="application_summary_step">Application Summary</a>
                                <a href="#"
                                    class="btn {{!empty(auth()->user()->step4_updated_at) ? 'btn-success' : 'btn-secondary'}} btn-block py-3 border-dark"
                                    id="payment_step">Payment</a>
                                <a href="#"
                                    class="btn {{!empty(auth()->user()->step5_updated_at) ? 'btn-success' : 'btn-secondary'}} btn-block py-3 border-dark"
                                    id="submit_information_form">Submit Application Form</a>
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
                <a class="navbar-brand" href="#"><img src="{{asset('images/footerlogo.png')}}" alt=""
                        class="d-inline-block align-text-top"></a>
                <br>
                <h5 class="textt"><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation
                        ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur
                        adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. sed do
                        eiusmod
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

@push("footer_extras")
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    var options = {
        "key": $("#payment").data("razorpaykey"), // Enter the Key ID generated from the Dashboard
        "amount": "10000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
        "currency": "INR",
        "name": "Scholarship", //your business name
        "description": "Test Transaction",
        "image": "https://example.com/your_logo",
        // Make sure this code is inside the script block or a JavaScript file.
        "handler": function (response) {
            if (response.hasOwnProperty("razorpay_payment_id")) {
                $.ajax({
                    type: 'POST',
                    url: $("#payment").data("paymenturl"),
                    dataType: "json",
                    data: JSON.stringify(response), // Convert the response object to JSON format
                    contentType: "application/json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (result) {
                        if (result.hasOwnProperty("message")) {
                            // Handle the success response from the server here
                            // For example, enable a tab, change button styles, etc.
                            $("#tab6").attr('disabled', false);
                            $("#tab6").trigger('click');
                            $('[for="tab6"]').find("[data-icon='lock']").remove();

                            $("#tab5").attr('disabled', true);
                            $('[for="tab5"]').append(`<i class="fa fa-lock" aria-hidden="true"></i>`);

                            $("#submit_information_form").removeClass("btn-secondary");
                            $("#submit_information_form").addClass("btn-success");
                        }
                    },
                    error: function (xhr, status, error) {
                        // Handle errors, if any, during the Ajax request
                        // You can display an error message or take appropriate action
                    }
                });
            }
        },
        "prefill": { //We recommend using the prefill parameter to auto-fill customer's contact information especially their phone number
            "name": $("#payment").data("username"), //your customer's name
            "email": $("#payment").data("email"),
            "contact": $("#payment").data("contact") //Provide the customer's phone number for better conversion rates
        },
        "theme": {
            "color": "#3399cc"
        }
    };
    var rzp1 = new Razorpay(options);
    document.getElementById('rzp-button1').onclick = function (e) {
        rzp1.open();
        e.preventDefault();
    }
</script>
@endpush