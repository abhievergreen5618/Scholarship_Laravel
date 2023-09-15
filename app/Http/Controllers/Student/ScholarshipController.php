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
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;

class ScholarshipController extends Controller
{


    public function index()
    {
        $states = StateModel::orderBy('name','asc')->orderBy('code','asc')->get();

         
        $subjects = Subject::where('status','active')
        ->orderBy('name', 'asc')->get();
        $subjectSelect = $subjects->pluck('name')->toArray();
        $subjectSelect = json_encode($subjectSelect);

        $scholarshipname = ScholarshipList::where('status','active')
        ->orderBy('name','asc')->get();
        $scholarshipSelect = $scholarshipname->pluck('name')->toArray();
        $scholarshipSelect = json_encode($scholarshipSelect);

        $classes = ClassModel::where('status','active')
        ->orderBy('class','asc')->get();

      

        if(!empty(Auth::user()->step2_updated_at))
        {
            $step2schooldata = EducationDetails::where(['user_id' =>Auth::user()->id,'type' => 'school'])->first();

            return view('student.form')->with([
                "step2schooldata" => $step2schooldata,
                "states" => $states,
                "subjectSelect" => $subjectSelect,
                "classes" => $classes,
                "scholarshipSelect" => $scholarshipSelect
            ]);
        }
        else
        {
            return view('student.form')->with([
                'states' => $states,
                'subjectSelect' => $subjectSelect,
                'classes' => $classes,
                'scholarshipSelect' => $scholarshipSelect
            ]);
        }
    }

   public function getDistricts(Request $request)
   {
        $stateCode=$request->post('stateCode');
        $districts=DistrictModel::where('statecode',$stateCode)
        ->orderBy('name','asc')->get();
        echo $districts;
        $html='<option value="">-- Select District --</option>';
        foreach($districts as $districtlist){
            $html.='<option value="'.$districtlist->id.'">'.$districtlist->name.'</option>';
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

        $validator = Validator::make($request->all(), [
            // "scholarshipname" => "required",
            "name" => "required",
            "fathername" => "required",
            "mothername" => "required",
            "examcentre" => "required",
            "districtDropdown" =>"required",
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
            // 'categorycertificate' => 'required',
            // 'fee' => "required",
            "email" => "required|email",
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
            ],422);
        }
        else
        {
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
            
            User::where('id',decrypt($request['id']))->update([
                "scholarshipname" => $request['scholarshipname'] ?? "",
                "name" => $request['name'] ?? "",
                "fathername" => $request['fathername'],
                "mothername" => $request['mothername'],
                "examcentre" => $request['examcentre'],
                "districtDropdown" =>$request['districtDropdown'],
                "caddress" => $request['caddress'],
                "paddress" => $request['paddress'],
                "dob" => $request['dob'] ?? "",
                "aadhaarno" => $request['aadhaarno'] ?? "",
                "nationality" =>  $request['nationality'] ?? "",
                "mobileno" => $request['mobileno'],
                "gender" => $request['gender'] ?? "",
                "singlegirlchild" => $request['singlegirlchild'] ?? "",
                "subjects" => $request['subjects'],
                "physicallychallenged" => $request['physicallychallenged'],
                "category" => $request['category'],
                "fee" => $request['fee'],
                "physicallychallengedproof" => $imageName ?? "",
                "categorycertificate" => $certificateName ??"",
                "step1_updated_at" => now(),
            ]);
            return response()->json([
                'message' => 'Saved successfully',
            ],200);
        }
    }


    public function getFee($feetype)
{
    if ($feetype === "no") {
        return response()->json(['fee' => null]);
    }

    $fee = FeeDetail::where('feetype', $feetype)->value('fee');
    
    return response()->json(['fee' => $fee]);
}

    


    /**Store education data */
    public function educationInfoStore(Request $request){

        $classmarks = $request['class_marks'];
        $maximummarks = $request['class_max_marks'];
        $percentage = $classmarks/$maximummarks*100 ;


        $validator = Validator::make($request->all(), [
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
            ],422);
        }
        else
        {


                $matchThese = ['user_id'=>decrypt($request['id']),'type'=>'school'];
                EducationDetails::updateOrCreate($matchThese,[
                    'user_id'=> decrypt($request['id']),
                    'resultstatus'=>$request['class_status'],
                    'classes'=>$request['classes'],
                    'name_of_the_board_university'=>$request['class_board'],
                    'passing_year'=>$request['class_passing_year'],
                    'credits_marks_Obtained'=>$classmarks,
                    'maximum_marks'=>$maximummarks,
                    'percentage_marks'=>$percentage,
                    'exam_roll_no'=>$request['class_rollno'],
                    'disqualified/suspended'=>$request['disqualified/suspended'],
                    'disqualified/suspended_details'=>$request['details'] ?? "",
                    'type'=>'school',
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
            User::where('id',decrypt($request['id']))->update([
                "photo"=>$imageName,
                "signature"=>$sign_photo,
                "step2_updated_at" => now(),
            ]);


            return response()->json([
                'message' => 'Saved successfully',
            ],200);
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
        $validator=Validator::make($request->all(),[
            "accountno" => "required",
            "cnfrmaccountno" => "required_with:accountno|same:accountno",
            "holdername" => "required",
            "ifsccode" => "required",
            "passbook_photo" => "required",
        ]);
        if ($validator->fails()) {
            $errors = [];
            foreach ($validator->errors()->getMessages() as $index => $error) {
                $errors[$index] = $error[0];
            }
            return response()->json([
                'message'  => "!OOPs Something went wrong",
                'error' => $errors
            ],422);
        }
        else
        {
            if ($request->hasFile('passbook_photo')) {
                $image = $request->file('passbook_photo');
                $passbook_photo = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/proofdoc'), $passbook_photo);
            }
            $matchThese = ['user_id'=>decrypt($request['id'])];
            BankDetails::updateOrCreate($matchThese,[
            'user_id'=> decrypt($request['id']),
            "accountno" => $request['accountno'],
            "cnfrmaccountno" => $request['cnfrmaccountno'],
            "holdername" => $request['holdername'],
            "ifsccode" => $request['ifsccode'],
            "passbook_photo" =>$passbook_photo,
            "step3_updated_at" => now(),
        ]);
        return response()->json ([
            'message' => "Saved Data Successfully",
        ],200);
    }
    }

    public function applicationsummarysubmit(Request $request)
    {
        User::where('id',Auth::id())->update([
            "step4_updated_at" => now(),
        ]);
        return response()->json([
            'message' => 'Saved successfully',
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $rollno =  $currentYear . $currentMonth .$currentDate. $mobilenoDigit;
        $application_number = $currentYear . $currentMonth .$nameFirstCharacter. $mobilenoDigit;
        $transaction_id = $request['razorpay_payment_id'];

        // The reference number will be the auto-incrementing primary key (id)
        $referenceNumber = 'REF-' . str_pad(Auth::id(), 6, '0', STR_PAD_LEFT);

        User::where('id',Auth::id())->update([
            "step5_updated_at" => now(),
            "reference_number" => $referenceNumber,
            "roll_number" => $rollno,
            "application_number" => $application_number,
            "transaction_id" => $transaction_id,
        ]);
        PaymentsDetails::create([
            "razorpay_id" => $request['razorpay_payment_id'],
            "user_id" => Auth::id(),
        ]);
        return response()->json([
            'message' => 'Saved successfully',
        ],200);
    }

    public function downloadpdf(Request $request)
    {

	    $data = [
	            'title' => 'Receipt',
	            'date' => date('d/m/Y')
	    ];
	    $pdf = PDF::loadView('student.FormSteps.pdffile',$data);
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
}
