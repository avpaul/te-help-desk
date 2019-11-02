<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Cookie\CookieJar;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
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
                    "iss" => env('APP_URL'),
                    "aud" => env('APP_URL'),
                );
                $verificationToken = JWT::encode($payload,env('JWT_SECRET'),'HS256');
                $verificationLink = env('APP_URL')."/verify-email?token=".$verificationToken;
                Mail::to($this->user->email)->send(
                    new VerifyUserEmail([
                        'link' => $verificationLink, 
                        'email' => $this->user->email
                    ]));
                return \redirect('/dashboard', ['message' => 'User created!']);
            }
        } catch (\Throwable $error) {
           if ($error instanceof ValidationException) 
           { 
               $errors = $error->errors();
               $errorMessage = array_key_first($errors);
               if (is_array($errors[$errorMessage])) {             
                    return \view('admin', ['error' => $errors[$errorMessage][0]]);                
                }
                return \view('admin', ['error' => $errors[$errorMessage]]);                
            } else{
            return \view('admin', ['error' => $error]);
        }}
        
    }
}
