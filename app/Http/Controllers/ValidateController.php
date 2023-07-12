<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ValidateController extends Controller
{
    //
    public function validateform(Request $req)
    {
        $validatedData = $request->validate([
            'class_passed' => 'required'
        ]);
        return response()->json(['success' => true]);
    }

}
