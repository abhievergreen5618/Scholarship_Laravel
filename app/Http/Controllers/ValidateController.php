<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class ValidateController extends Controller
{
    //
    public function validateform(Request $req)
    {
        $validator = Validator::make($request->all(),[
            'class_passed' => 'required',
            'class_board' => 'required|string'
        ]);
        if($validator->passes())
        {
        return response()->json(['success' => 'Added new record.']);
    }
    else {
        return response()->json(['error'=>$validator->errors()->all()]);
    }
    }

}
