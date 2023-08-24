<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\EducationDetails;
use App\Models\PaymentsDetails;
use App\Models\User;
use App\Models\StateModel;
use App\Models\DistrictModel;
use App\Models\BankDetails;
use Illuminate\Support\Facades\DB;

class ScholarshipController extends Controller
{
    public function index()
    {
        $states = StateModel::orderBy('name','asc')->orderBy('code','asc')->get();
        if(!empty(Auth::user()->step2_updated_at))
        {
            $step2schooldata = EducationDetails::where(['user_id' =>Auth::user()->id,'type' => 'school'])->first();
            $step2graduationdata = EducationDetails::where(['user_id' =>Auth::user()->id,'type' => 'graduation'])->first();
            $step2postgraduationdata = EducationDetails::where(['user_id' =>Auth::user()->id,'type' => 'post_graduation'])->first();
            
            return view('student.form')->with([
                "step2schooldata" => $step2schooldata,
                "step2graduationdata" => $step2graduationdata,
                "step2postgraduationdata" => $step2postgraduationdata,
                "states" => $states
            ]);
        }
        else
        {
            return view('student.form')->with(['states'=>$states]);
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
            "applyingfor" => "required",
            "physicallychallenged" => "required",
            'physicallychallengedproof' => 'required_if:physicallychallenged,yes',
            "category" => "required",
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
                "applyingfor" => $request['applyingfor'],
                "physicallychallenged" => $request['physicallychallenged'],
                "category" => $request['category'],
                "physicallychallengedproof" => $imageName ?? "",
                "step1_updated_at" => now(),
            ]);
            return response()->json([
                'message' => 'Saved successfully',
            ],200);
        }
    }

    /**Store education data */
    public function educationInfoStore(Request $request){
        $validator = Validator::make($request->all(), [
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
                    'examination_passed'=>$request['class_passed'],
                    'name_of_the_board_university'=>$request['class_board'],
                    'passing_year'=>$request['class_passing_year'],
                    'credits_marks_Obtained'=>$request['class_marks'],
                    'maximum_marks'=>$request['class_max_marks'],
                    'percentage_marks'=>$request['class_percentage'],
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
             BankDetails::where('id', ($request['id']))->update([
            "accountno" => $request['accountno'],
            "cnfrmaccountno" => $request['cnfrmaccountno'],
            "holdername" => $request['holdername'],
            "ifsccode" => $request['ifsccode'],
            "passbook_photo" => $request['passbook_photo'],
        ]);
        return response()->json ([
            'message' => "Saved Data Successfully",
        ],200);
    }
    }
    
    public function applicationsummarysubmit(Request $request)
    {
        User::where('id',Auth::id())->update([
            "step3_updated_at" => now(),
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
        // The reference number will be the auto-incrementing primary key (id)
        $referenceNumber = 'REF-' . str_pad(Auth::id(), 6, '0', STR_PAD_LEFT);

        User::where('id',Auth::id())->update([
            "step4_updated_at" => now(),
            "reference_number" => $referenceNumber,
        ]);
        PaymentsDetails::create([
            "razorpay_id" => $request['razorpay_payment_id'],
            "user_id" => Auth::id(),
        ]);
        return response()->json([
            'message' => 'Saved successfully',
        ],200);
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
