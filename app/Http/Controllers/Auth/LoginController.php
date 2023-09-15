<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect(route("login"))->with('error', 'Google login failed.');
        }

        // Check if the user exists in your database
        $existingUser = User::where('email', $user->getEmail())->first();

        if ($existingUser) {
            // If the user exists, log them in
            Auth::login($existingUser);
        } else {
            // If the user doesn't exist, create a new user in the database and log them in
            $newUser = User::create([
                'social_id' => $user->id,
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'social_type' => 'google',  // the social login is using google
                'password' => Hash::make('12345678'),
                // Add other necessary fields as per your user model
            ]);

            Auth::login($newUser);
        }

        return redirect(route("start")); // Redirect to your desired route after successful login
    }

    public function redirectFacebook()
    {

        return Socialite::driver('facebook')->redirect();
    }

    public function facebookCallback()
    {
        try
        {
            $user = Socialite::driver('facebook')->user();

            $finduser = User::where('social_id',$user->id)->orWhere('email',$user->email)->first();
            if($finduser)
            {
                Auth::login($finduser);
                return redirect(route("start"));
            }
            else
            {
                $newUser=User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id'=>$user->id,
                    'social_type' => 'facebook',
                    'password' => Hash::make('12345678'),
                ]);
                Auth::login($newUser);
            }
            return redirect(route("start"));
        }
        catch(Exception $e)
        {
            // dd($e->getMessage());
            return redirect(route("login"))->with('error', 'Google login failed.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->to(env("WORDPRESS_URL")."/login");
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" => "required|email|unique:users,email",
            "mobileno" => "required|regex:/^[0-9]{10}$/",
            "password" => "required|confirmed",
            ],
            [
                "required" => "This field is required.",
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
            User::create([
                "email" => $request['email'],
                "mobileno" => $request['mobileno'],
                "password" => Hash::make($request['password']),
            ]);

            $credentials = $request->only('email','password');
            if (Auth::attempt($credentials)) {
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

        if ($request->header('X-Requested-With') == 'XMLHttpRequest') {
            dd("test");
        }
        if($request->ajax())
        {
            $validator = Validator::make($request->all(), [
                "email" => "required|email",
                "password" => "required",
                ],
                [
                    "required" => "This field is required.",
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
                    return response()->json([
                        'message' => 'Login Successfully',
                        'redirecturl' => Auth::user()->role == "admin" ? route("admin.dashboard") : route("start"),
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
        else
        {
            $request->validate([
                "email" => "required|email",
                "password" => "required",
            ], [
                "email.required" => "The email field is required.",
                "email.email" => "Please enter a valid email address.",
                "password.required" => "The password field is required.",
            ]);
            
            $credentials = $request->only('email','password');
            $remember = $request->has('rememberme');
            if (Auth::attempt($credentials,$remember)) {
                return redirect()->intended('login');
            }
            else
            {
                $error = ["password"=>"Please enter valid credentials."];
            }
        }
    }
}
