@extends("layouts.app")

@section("content")
<div class="secttionform mt-5">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-10">
                <div class="page">


                    <!-- tabs -->
                    <div class="pcss3t pcss3t-effect-scale pcss3t-theme-1">
                        <input type="radio" name="pcss3t" id="tab1" class="tab-content-first">
                        <label for="tab1"><i class="fas fa-hand-point-right"></i>Personal Information</label>

                        <input type="radio" name="pcss3t" id="tab2" class="tab-content-2" checked>
                        <label for="tab2"><i class="fas fa-hand-point-right"></i>Education & Document Details</label>

                        <input type="radio" name="pcss3t" id="tab3" class="tab-content-3">
                        <label for="tab3"><i class="fas fa-hand-point-right"></i>Application Summary</label>

                        <input type="radio" name="pcss3t" id="tab5" class="tab-content-last">
                        <label for="tab5"><i class="fas fa-hand-point-right"></i>Payment</label>

                        <input type="radio" name="pcss3t" id="tab6" class="tabend">
                        <label for="tab6"><i class="fas fa-hand-point-right"></i>Submit Application Form</label>

                        <ul>
                            @include("ScholarshipFormSteps.personalinfo")
                            @include("ScholarshipFormSteps.educationDocument")
                            @include("ScholarshipFormSteps.applicationsummary")
                            @include("ScholarshipFormSteps.payment")

                            <li class="tab-content tabend typography">
                                <div class="typography">
                                    <div class="tab-content">

                                        <div class="tab-pane active" id="tab_6">
                                            <h3><span>Step [5/5] :</span>Submit Reference Number &amp; Application Form</h3>
                                            <div class="box-body table-responsive">
                                                <table id="" class="table Eng_hindi_form" width="50%" border="0" cellspacing="5" cellpadding="0">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="3">
                                                                <span id=""><span style="color:Red;"></span></span>
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
                                <a href="#" class="btn btn-success btn-block py-3 border-dark" id="personal_information_step">Personal Information</a>
                                <a href="#" class="btn btn-secondary btn-block py-3 border-dark" id="education_details_step">Education &amp; Document Details</a>
                                <a href="#" class="btn btn-secondary btn-block py-3 border-dark" id="application_summary_step">Application Summary</a>
                                <a href="#" class="btn btn-secondary btn-block py-3 border-dark" id="payment_step">Payment</a>
                                <a href="#" class="btn btn-secondary btn-block py-3 border-dark" id="submit_information_form">Submit Application Form</a>
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
