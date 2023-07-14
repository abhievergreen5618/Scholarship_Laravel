<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class ValidateController extends Controller
{
    //
    public function myformPost(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'class_passed' => 'required',
            'class_board' => 'required',
            'class_passing_year' => 'required',
            'class_marks' => 'required|integer',
            'class_max_marks' => 'required|integer',
            'class_percentage' => 'required|integer',
            'class_rollno' => 'required|integer',

            'grad_passed' => "required",
            'grad_board' => "required",
            'grad_passing_year' => "required",
            'grad_marks' => "required|integer",
            'grad_max_marks' => "required|integer",
            'grad_percentage' => "required|integer",
           ' grad_rollno' => "required|integer",
            
            'post_grad_passed' => "required",
            'post_grad_board' => "required",
            'post_grad_passing_year' => "required",
            'post_grad_marks' => "required|integer",
            'post_grad_max_marks' => "required|integer",
            'post_grad_percentage' => "required|integer",
            'post_grad_rollno' => "required|integer",

            'profile_photo'=>'required',
            'sign_photo'=>'required'
            
        ]);
    
        if ($validator->passes()) {
            return response()->json(['success' => 'Added new records.']);
        }
    
        return response()->json(['error' => $validator->errors()->all()]);
    }
    

}
