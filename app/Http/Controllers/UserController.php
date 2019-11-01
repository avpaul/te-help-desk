<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Cookie\CookieJar;

class UserController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    /**
     * create a new user
     * @var email:string 
     * @var password:string
     * @return Response
     */

     public function register(Request $request) 
     {
         try {
            $validatedData = $request->validate([
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
            ]);

            $this->user->email = $request->email;
            $this->user->password = Hash::make($request->password);
            $this->user->role = isset($request->role) ? $request->role : 'user';
            $this->user->save();
            return response()->json(['message' => 'user created successfully'],201);
         } catch (\Throwable $error) {
            if (isset($error->{'errors'})) { 
                $errors = $error->errors();
                $errorMessage = array_key_first($errors);
                if (isset($errorMessage)) {
                    return response()->json(['message' => 'something wrong happened', 'error' => $errors[$errorMessage]],400);                 
                }
            }
            return response()->json(['message' => 'something wrong happened', 'error' => $error],400);
         }
         
     }

     public function login(Request $request)
     {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:6'
            ]);
            // TODO: increase the token duration
            $token = JWTAuth::attempt($request->only('email','password'));
            if ($token) {
                // create token cookie
                // $authCookie = cookie('token',$token,10080,'/',$request->getHttpHost(),false,false,false);
                $authCookie = cookie('token',$token,10080,'/','localhost',false,false,false);
                return response()->json(['message' => 'user authenticated'],200)->withCookie($authCookie);

            } else {
                return response()->json(['message' => 'email or password incorrect'],400);
            }
            
        } catch (\Throwable $error) {
            echo $error;
            if (isset($error->{'errors'})) {            
            $errors = $error->errors();
             $errorMessage = array_key_first($errors);
             if (isset($errorMessage)) {
                return \response()->json(['message' => 'something wrong happened', 'error' => $errors[$errorMessage]],400);                 
             }}
             echo $error->getMessage();
            return \response()->json(['message' => 'something wrong happened', 'error' => $error],400);
        }
     }

     public function logout(Request $request)
     {
        try {
            $token = $request->cookie('token');
            JWTAuth::setToken($token);
            JWTAuth::invalidate();
            return \response()->json(['message' => 'logout successful'],200)->withCookie(Cookie::forget('token'));
        } catch (\Throwable $error) {
            echo $error;
            return \response()->json(['message' => 'try again'],400);
        }
     }
}
