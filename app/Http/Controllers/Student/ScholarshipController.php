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

class ScholarshipController extends Controller
{
    public function index()
    {
        if(!empty(Auth::user()->step2_updated_at))
        {
            $step2schooldata = EducationDetails::where(['user_id' =>Auth::user()->id,'type' => 'school'])->first();
            $step2graduationdata = EducationDetails::where(['user_id' =>Auth::user()->id,'type' => 'graduation'])->first();
            $step2postgraduationdata = EducationDetails::where(['user_id' =>Auth::user()->id,'type' => 'post_graduation'])->first();
            return view('student.form')->with([
                "step2schooldata" => $step2schooldata,
                "step2graduationdata" => $step2graduationdata,
                "step2postgraduationdata" => $step2postgraduationdata
            ]);
        }
        else
        {
            return view('student.form');
        }
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
            "statedropdown" => "required",
            "caddress" => "required",
            "mobileno" => "required",
            "paddress" => "required",
            // "dob" => "required",
            // "aadhaarno" => "required",
            "hsmarksheetmatric" => "required",
            "hsmarksheet" => "required",
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
                "statedropdown" => $request['statedropdown'],
                "caddress" => $request['caddress'],
                "paddress" => $request['paddress'],
                "dob" => $request['dob'] ?? "",
                "aadhaarno" => $request['aadhaarno'] ?? "",
                "hsmarksheetmatric" => $request['hsmarksheetmatric'],
                "hsmarksheet" => $request['hsmarksheet'],
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
            
            $states = DB::table('state_model')->orderBy('name','ASC')->get();
                $data['state_model'] = $states;

                return view($data);
            return response()->json([
                'message' => 'Saved successfully',
            ],200);
        }
    }


    // public function state()
    // {
    //     $data['states']=StateModel::get(["name","id"]);
    //     return ($data);
    // }

    // public function fetchDistrict(Request $request)
    // {
    //     $data['district']=DistrictModel::where("statecode",$request->statecode)->get(["name","id"]);
    //     return response()->json($data);
    // }


    /**Store education data */
    public function educationInfoStore(Request $request){
        $validator = Validator::make($request->all(), [
            "grad_passed" => "required",
            "grad_board" => "required",
            "grad_passing_year" => "required",
            "grad_marks" => "required",
            "grad_max_marks" => "required",
            "grad_percentage" => "required",
            "grad_rollno" => "required",
            "post_grad_passed" => "required",
            "post_grad_board" => "required",
            "post_grad_passing_year" => "required",
            "post_grad_marks" => "required",
            "post_grad_max_marks" => "required",
            "post_grad_percentage" => "required",
            "post_grad_rollno" => "required",
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

                 $matchThese = ['user_id'=>decrypt($request['id']),'type'=>'graduation'];
                 EducationDetails::updateOrCreate($matchThese,[
                    'user_id'=> decrypt($request['id']),
                    'resultstatus'=>$request['grad_status'],
                    'examination_passed'=>$request['grad_passed'],
                    'name_of_the_board_university'=>$request['grad_board'],
                    'passing_year'=>$request['grad_passing_year'],
                    'credits_marks_Obtained'=>$request['grad_marks'],
                    'maximum_marks'=>$request['grad_max_marks'],
                    'percentage_marks'=>$request['grad_percentage'],
                    'exam_roll_no'=>$request['grad_rollno'],
                    'disqualified/suspended'=>$request['disqualified/suspended'],
                    'disqualified/suspended_details'=>$request['details'] ?? "",
                    'type'=>'graduation',
                 ]);

                 $matchThese = ['user_id'=>decrypt($request['id']),'type'=>'post_graduation'];
                 EducationDetails::updateOrCreate($matchThese,[
                    'user_id'=> decrypt($request['id']),
                    'resultstatus'=>$request['post_grad_status'],
                    'examination_passed'=>$request['post_grad_passed'],
                    'name_of_the_board_university'=>$request['post_grad_board'],
                    'passing_year'=>$request['post_grad_passing_year'],
                    'credits_marks_Obtained'=>$request['post_grad_marks'],
                    'maximum_marks'=>$request['post_grad_max_marks'],
                    'percentage_marks'=>$request['post_grad_percentage'],
                    'exam_roll_no'=>$request['post_grad_rollno'],
                    'disqualified/suspended'=>$request['disqualified/suspended'],
                    'disqualified/suspended_details'=>$request['details'] ?? "",
                    'type'=>'post_graduation',
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
