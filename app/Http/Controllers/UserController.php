<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" => "required|email|unique:users,email",
            "mobileno" => "required|regex:/^[0-9]{10}$/",
            "password" => "required|confirmed",
            ],
            [
                "required" => "Field is required.",
                "email.email" => "Please enter a valid email address.",
                "mobileno.regex" => "Please enter a valid 10-digit mobile number.",
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
            $user = User::create([
                "email" => $request['email'],
                "mobileno" => $request['mobileno'],
                "password" => Hash::make($request['password']),
            ]);

            $credentials = $request->only('email','password');
            if (Auth::attempt($credentials)) {
                Auth::loginUsingId($user->id, TRUE);
                return response()->json([
                    'message' => 'Registered Successfully',
                    'redirecturl' => route("start"),
                ],200);
            }
            else
            {
                return response()->json([
                    'message'  => "!OOPs Something went wrong"
                ],422);
            }
        }
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" => "required|email",
            "password" => "required",
            ],
            [
                "required" => "Field is required.",
                "email.email" => "Please enter a valid email address.",
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
            $credentials = $request->only('email','password');
            $remember = $request->has('rememberme');
            if (Auth::attempt($credentials,$remember)) {
                $user = User::where('email',$request['email'])->first();
                Auth::loginUsingId($user->id, TRUE);
                return response()->json([
                    'message' => 'Login Successfully',
                    'redirecturl' => route("start"),
                ],200);
            }
            else
            {
                $error = ["password"=>"Please enter valid credentials."];
                return response()->json([
                    'error' => $error,
                    'message'  => "!OOPs Something went wrong"
                ],422);
            }
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
