<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\EducationDetails;
use App\Models\PaymentsDetails;
use App\Models\User;
use App\Models\Subject;
use App\Models\StateModel;
use App\Models\ClassModel;
use App\Models\DistrictModel;
use App\Models\BankDetails;
use App\Models\FeeDetail;
use App\Models\ScholarshipList;
use App\Models\ScholarshipSession;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
use Illuminate\Support\Facades\View;
use Razorpay\Api\Api;

class ScholarshipController extends Controller
{

    public function index(ScholarshipSession $session)
    {
        $states = StateModel::orderBy('name', 'asc')->orderBy('code', 'asc')->pluck('name', 'code');

        $subjects = Subject::where('status', 'active')->orderBy('name', 'asc')->pluck('name', 'id');

        $scholarship = ScholarshipList::where('status', 'active')->orderBy('name', 'asc')->pluck('name', 'id');

        $classes = ClassModel::where('status', 'active')->orderBy('id', 'asc')->pluck('class', 'id');

        $sessions = $session->latestSessionNameList();

        return view('student.form')->with([
            'states' => $states,
            'subjects' => $subjects,
            'classes' => $classes,
            'scholarship' => $scholarship,
            'sessions' => $sessions,
        ]);
    }

    public function getDistricts(Request $request)
    {
        $stateCode = $request->post('stateCode');
        $districts = DistrictModel::where('statecode', $stateCode)->orderBy('name', 'asc')->pluck('name', 'id');
        $html = '<option value="">Select District</option>';
        if ($districts->isEmpty()) {
            $districts = StateModel::where('code', $stateCode)->pluck('name', 'code');


            foreach ($districts as $key => $district) {
                $selected = isset(Auth::user()->examdistrict) && $key == Auth::user()->examdistrict ? 'selected' : '';
                $html .= '<option value="' . $key . '" ' . $selected . '>' . $district . '</option>';
            }
        } else {
            foreach ($districts as $key => $district) {
                $selected = isset(Auth::user()->examdistrict) && $key == Auth::user()->examdistrict ? 'selected' : '';
                $html .= '<option value="' . $key . '" ' . $selected . '>' . $district . '</option>';
            }
        }
        echo $html;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                // "scholarshipname" => "required",
                "name" => "required",
                "fathername" => "required",
                "mothername" => "required",
                "examcentre" => "required",
                "examdistrict" => "required",
                "caddress" => "required",
                "mobileno" => "required",
                "paddress" => "required",
                // "dob" => "required",
                // "aadhaarno" => "required",
                // "nationality" => "required",
                // "singlegirlchild" => "required",
                // "subjects" => "required",
                "physicallychallenged" => "required",
                'physicallychallengedproof' => 'required_if:physicallychallenged,yes',
                "category" => "required",
                'categorycertificate' => 'required_unless:category,General',
                // 'fee' => "required",
                "email" => "required|email",
            ],
            [
                "required" => "This field is required.",
                "required_if" => "This field is required.",
                "required_unless" => "This field is required.",
            ]
        );

        if ($validator->fails()) {
            $errors = [];
            foreach ($validator->errors()->getMessages() as $index => $error) {
                $errors[$index] = $error[0];
            }
            return response()->json([
                'message'  => "!OOPs Something went wrong",
                'error' => $errors
            ], 422);
        } else {
            if ($request->hasFile('physicallychallengedproof')) {
                $image = $request->file('physicallychallengedproof');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/proofdoc'), $imageName);
                $request['physicallychallengedproof'] = $imageName;
            }

            if ($request->hasFile('categorycertificate')) {
                $image = $request->file('categorycertificate');
                $certificateName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/proofdoc'), $certificateName);
                $request['categorycertificate'] = $certificateName;
            }

            $user = User::find(decrypt($request['id']));

            $user->update([
                "session" => $request->input('session', $user->session),
                "scholarshipname" => $request->input('scholarshipname', $user->scholarshipname),
                "name" => $request->input('name', $user->name),
                "fathername" => $request->input('fathername', $user->fathername),
                "mothername" => $request->input('mothername', $user->mothername),
                "examcentre" => $request->input('examcentre', $user->examcentre),
                "examdistrict" => $request->input('examdistrict', $user->examdistrict),
                "caddress" => $request->input('caddress', $user->caddress),
                "paddress" => $request->input('paddress', $user->paddress),
                "dob" => $request->input('dob', $user->dob),
                "aadhaarno" => $request->input('aadhaarno', $user->aadhaarno),
                "nationality" => $request->input('nationality', $user->nationality),
                "mobileno" => $request->input('mobileno', $user->mobileno),
                "gender" => $request->input('gender', $user->gender),
                "singlegirlchild" => $request->input('singlegirlchild', $user->singlegirlchild),
                "physicallychallenged" => $request->input('physicallychallenged', $user->physicallychallenged),
                "category" => $request->input('category', $user->category),
                "physicallychallengedproof" => $imageName ?? $user->physicallychallengedproof,
                "categorycertificate" => $certificateName ?? $user->categorycertificate,
                "step1_updated_at" => now(),
            ]);

            // Update the subjects using the sync method
            $user->subjects()->sync($request->input('subjects', []));


            // Refresh the authenticated user's data
            Auth::user()->refresh();

            // Load the Blade view
            $html = View::make('student.FormSteps.applicationsummary')->render();

            return response()->json([
                'message' => "Saved Data Successfully",
                'html' => $html
            ], 200);
        }
    }


    public function getFee($feecode)
    {
        $fee = FeeDetail::where('feecode', $feecode)->value('fee');

        return response()->json(['fee' => $fee]);
    }




    /**Store education data */
    public function educationInfoStore(Request $request)
    {

        $classmarks = $request['class_marks'];
        $maximummarks = $request['class_max_marks'];
        $percentage = $classmarks / $maximummarks * 100;


        $validator = Validator::make(
            $request->all(),
            [
                // "classes" => "classes",
                // "class_board"=>"required",
                // "class_passing_year"=>"required",
                // "class_marks"=>"required",
                // "class_max_marks"=>"required",
                // "class_percentage"=>"required",
                // "class_rollno"=>"required",
                "profile_photo" => "required",
                "sign_photo" => "required",
                "disqualified/suspended" => "required",
                'details' => 'required_if:disqualified/suspended,yes',
            ],
            [
                "required" => "This field is required.",
                "required_if" => "This field is required.",
            ]
        );


        if ($validator->fails()) {
            $errors = [];
            foreach ($validator->errors()->getMessages() as $index => $error) {
                $errors[$index] = $error[0];
            }
            return response()->json([
                'message'  => "!OOPs Something went wrong",
                'error' => $errors
            ], 422);
        } else {


            $matchThese = ['user_id' => decrypt($request['id']), 'type' => 'school'];
            EducationDetails::updateOrCreate($matchThese, [
                'user_id' => decrypt($request['id']),
                'resultstatus' => $request['class_status'],
                'classes' => $request['classes'],
                'name_of_the_board_university' => $request['class_board'],
                'passing_year' => $request['class_passing_year'],
                'credits_marks_Obtained' => $classmarks,
                'maximum_marks' => $maximummarks,
                'percentage_marks' => $percentage,
                'exam_roll_no' => $request['class_rollno'],
                'disqualified/suspended' => $request['disqualified/suspended'],
                'disqualified/suspended_details' => $request['details'] ?? "",
                'type' => 'school',
            ]);


            if ($request->hasFile('profile_photo')) {
                $image = $request->file('profile_photo');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/proofdoc'), $imageName);
            }
            if ($request->hasFile('sign_photo')) {
                $image = $request->file('sign_photo');
                $sign_photo = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/proofdoc'), $sign_photo);
            }
            User::where('id', decrypt($request['id']))->update([
                "photo" => $imageName,
                "signature" => $sign_photo,
                "step2_updated_at" => now(),
            ]);


            // Refresh the authenticated user's data
            Auth::user()->refresh();

            // Load the Blade view
            $html = View::make('student.FormSteps.applicationsummary')->render();

            return response()->json([
                'message' => "Saved Data Successfully",
                'html' => $html
            ], 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function bankinfo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "accountno" => "required",
            "cnfrmaccountno" => "required_with:accountno|same:accountno",
            "holdername" => "required",
            "ifsccode" => "required",
            "passbook_photo" => "required",
        ], [
            "required" => "This field is required.",
            "required_if" => "This field is required.",
            "cnfrmaccountno.same" => "The confirmation account number must match the account number field.",
        ]);
        if ($validator->fails()) {
            $errors = [];
            foreach ($validator->errors()->getMessages() as $index => $error) {
                $errors[$index] = $error[0];
            }
            return response()->json([
                'message'  => "!OOPs Something went wrong",
                'error' => $errors
            ], 422);
        } else {
            if ($request->hasFile('passbook_photo')) {
                $image = $request->file('passbook_photo');
                $passbook_photo = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/proofdoc'), $passbook_photo);
            }
            $matchThese = ['user_id' => decrypt($request['id'])];
            BankDetails::updateOrCreate($matchThese, [
                'user_id' => decrypt($request['id']),
                "accountno" => $request['accountno'],
                "cnfrmaccountno" => $request['cnfrmaccountno'],
                "holdername" => $request['holdername'],
                "ifsccode" => $request['ifsccode'],
                "passbook_photo" => $passbook_photo,
                "step3_updated_at" => now(),
            ]);

            User::where('id', decrypt($request['id']))->update([
                "step3_updated_at" => now(),
            ]);

            // Refresh the authenticated user's data
            Auth::user()->refresh();

            // Load the Blade view
            $html = View::make('student.FormSteps.applicationsummary')->render();

            return response()->json([
                'message' => "Saved Data Successfully",
                'html' => $html
            ], 200);
        }
    }

    public function applicationsummarysubmit(Request $request)
    {
        User::where('id', Auth::id())->update([
            "step4_updated_at" => now(),
        ]);
        return response()->json([
            'message' => 'Saved successfully',
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function savefailurepaymentdetails(Request $request)
    {
        $razorpay = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $payment = $razorpay->payment->fetch($request['error']['metadata']['payment_id']);

        PaymentsDetails::create([
            "razorpay_id" => $payment['id'],
            "amount" => $payment['amount'] / 100,
            "status" => $payment['status'],
            "method" => $payment['method'],
            "description" => $payment['description'],
            "vpa" => $payment['vpa'],
            "bank" => $payment['bank'],
            "card_id" => $payment['card_id'],
            "wallet" => $payment['wallet'],
            "status" => $payment['status'],
            "error_code" => $payment['error_code'],
            "error_description" => $payment['error_description'],
            "error_source" => $payment['error_source'],
            "error_step" => $payment['error_step'],
            "error_reason" => $payment['error_reason'],
            "payment_created_at" => Carbon::createFromTimestamp($payment['created_at'])->toDateTimeString(),
            "user_id" => Auth::id(),
        ]);
        return response()->json([
            'message' => 'Payment Failed',
        ], 200);
    }

    public function savepaymentdetails(Request $request)
    {
        $currentYear = Carbon::now()->format('Y');
        $currentMonth = Carbon::now()->format('m');
        $currentDate = Carbon::now()->format('d');
        $userName = auth()->user();
        $nameFirstCharacter = substr($userName->name, 0, 3);
        $userMobileno = auth()->user();
        $mobilenoDigit = substr($userMobileno->mobileno, -4);

        $lastNumberYear = null;
        $lastNumberMonth = null;
        $lastNumberCounter = 0;

        // Generate Roll Number Application Number and Transaction ID
        $rollno =  $currentYear . $currentMonth . $currentDate . $mobilenoDigit;
        $application_number = $currentYear . $currentMonth . $nameFirstCharacter . $mobilenoDigit;
        $transaction_id = $request['razorpay_payment_id'];

        $razorpay = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $payment = $razorpay->payment->fetch($transaction_id);
        // The reference number will be the auto-incrementing primary key (id)
        $referenceNumber = 'REF-' . str_pad(Auth::id(), 6, '0', STR_PAD_LEFT);

        User::where('id', Auth::id())->update([
            "step5_updated_at" => now(),
            "reference_number" => $referenceNumber,
            "roll_number" => $rollno,
            "application_number" => $application_number,
            "transaction_id" => $transaction_id,
            "amount" => $payment['amount'] / 100,
        ]);
        PaymentsDetails::create([
            "razorpay_id" => $payment['id'],
            "amount" => $payment['amount'] / 100,
            "status" => $payment['status'],
            "method" => $payment['method'],
            "description" => $payment['description'],
            "vpa" => $payment['vpa'],
            "bank" => $payment['bank'],
            "card_id" => $payment['card_id'],
            "wallet" => $payment['wallet'],
            "status" => $payment['status'],
            "error_code" => $payment['error_code'],
            "error_description" => $payment['error_description'],
            "error_source" => $payment['error_source'],
            "error_step" => $payment['error_step'],
            "error_reason" => $payment['error_reason'],
            "payment_created_at" => Carbon::createFromTimestamp($payment['created_at'])->toDateTimeString(),
            "user_id" => Auth::id(),
        ]);

        // Refresh the authenticated user's data
        Auth::user()->refresh();

        // Load the Blade view
        $html = View::make('student.FormSteps.finalsubmit')->render();

        return response()->json([
            'message' => 'Your payment was successful.',
            'html' => $html,
        ], 200);
    }

    public function downloadpdf(Request $request)
    {
        $data = [
            'title' => 'Receipt',
            'date' => date('d/m/Y')
        ];
        $pdf = PDF::loadView('student.FormSteps.pdffile', $data);
        return $pdf->download('mypdf.pdf');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function submitapplication(Request $request)
    {
        User::where('id', Auth::id())->update([
            "step6_updated_at" => now(),
        ]);
        return response()->json([
            'message' => 'Saved successfully',
        ], 200);
    }
}
