<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ScholarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('form');
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
                "name" => $request['scholarshipname'] ?? "",
                "email" => $request['email'] ?? "",
                "scholarshipname" => $request['scholarshipname'] ?? "",
                "fathername" => $request['fathername'],
                "mothername" => $request['mothername'],
                "examcentre" => $request['examcentre'],
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
                "physicallychallengedproof" => $request['physicallychallengedproof'] ?? "",
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
        ],
        [
             "required" => "This field is required.",
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
            return response()->json([
                'responseid' => "1",
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
