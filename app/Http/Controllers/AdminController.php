<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Cookie\CookieJar;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Firebase\JWT\JWT;
use JWTAuth;
use App\Mail\VerifyUserEmail;
use App\User;

class AdminController extends Controller
{
    protected $user;

    public function __construct(User $user) 
    {
        $this->middleware('auth');
        $this->user = $user;
    }

    public function show(Request $request){
        $token = $request->cookie('token');
        JWTAuth::setToken($token);
        $user = JWTAuth::payload();
        if ($user['role'] === 'admin') {
            return \view('admin');
        } else {
            return \response()->redirectTo('/');
        }
    }

    /**
     * create a new user
     * @var email:string 
     * @var password:string
     * @return Response
     */

    public function createUser(Request $request)
    {
        try {
            $token = $request->cookie('token');
            JWTAuth::setToken($token);
            $user = JWTAuth::payload();
            if ($user['role'] === 'admin') {
                $validatedData = $request->validate([
                    'email' => 'required|email|unique:users',
                    'password' => 'required|min:6',
                    'role' => 'required|min:3'
                ]);
                
                $this->user->email = $request->email;
                $this->user->password = Hash::make($request->password);
                $this->user->role = $request->role;
                $this->user->save();
                // create a token for email verification
                $payload = array(
                    "iat" => time(),
                    "exp" => time() + 3600000,
                    "sub" => $this->user->email,
                    "iss" => 'localhost',
                    "aud" => 'localhost',
                );
                $verificationToken = JWT::encode($payload,env('JWT_SECRET'),'HS256');
                $verificationLink = env('APP_URL')."/verify-email?token=".$verificationToken;
                Mail::to($this->user->email)->send(
                    new VerifyUserEmail([
                        'link' => $verificationLink, 
                        'email' => $this->user->email
                    ]));
                return \redirect('/dashboard');
            }
        } catch (\Throwable $error) {
           if (isset($error->{'errors'})) { 
               $errors = $error->errors();
               $errorMessage = array_key_first($errors);
               if (isset($errorMessage)) {
                   return response()->json(['message' => 'something wrong happened', 'error' => $errors[$errorMessage]],400);                 
               }
           }
           return response()->json(['message' => 'something wrong happened', 'errors' => $error],400);
        }
        
    }
}
