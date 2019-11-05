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
            // create a token for email verification
            $payload = array(
                "iat" => time(),
                "exp" => time() + 7200000,
                "sub" => $this->user->email,
                "iss" => env('APP_URL'),
                "aud" => env('APP_URL'),
            );
            $verificationToken = JWT::encode($payload,env('JWT_SECRET'),'HS256');
            $verificationLink = config('app.url')."/verify-email?token=".$verificationToken;
            Mail::to($this->user->email)->send(
                new VerifyUserEmail([
                    'link' => $verificationLink, 
                    'email' => $this->user->email
                ]));
            return response()->json(['message' => 'Check your inbox to verify email!'],201);
         } catch (\Throwable $error) {
            if ($error instanceof ValidationException) { 
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
            $isVerified =  User::where([['email', '=', $request->email], ['email_verified_at', '!=', null]])->exists();
            if (!$isVerified) {
                return response()->json(['error' => 'Verify email to login!'],400);
            }

            // TODO JWTAuth::setTTL(86400);
            $token = JWTAuth::attempt($request->only('email','password'));
            if ($token) {
                // create token cookie
                $authCookie = cookie('token',$token,10080,'/',env('APP_URL'));
                return response()->json(['message' => 'user authenticated'],200)->withCookie($authCookie);

            } else {
                return response()->json(['message' => 'email or password incorrect'],400);
            }
            
        } catch (\Throwable $error) {
            if ($error instanceof ValidationException) {          
            $errors = $error->errors();
             $errorMessage = array_key_first($errors);
             if (is_array($errors[$errorMessage])) {             
                return \response()->json(['error' => $errors[$errorMessage][0]]);                
            }
                return \response()->json(['message' => 'something wrong happened', 'error' => $errors[$errorMessage]],400);                 
             }
            return \response()->json(['message' => 'something wrong happened', 'error' => $error->getMessage()],400);
        }
     }

     public function verifyEmail(Request $request)
     {
        try {
            $token = $request->query('token');
            $tokenPayload = JWT::decode($token,env('JWT_SECRET'),array('HS256'));
            if (isset($tokenPayload->sub)) {
                $this->user = User::where([['email', '=', $tokenPayload->sub], ['email_verified_at','=', null]])->first();
                $this->user->email_verified_at = time();
                $this->user->save();
                return \redirect('/verify-success');
            }
        } catch (\Throwable $error) {
            // TODO: if the token is expired resend token and inform
            return \view('auth.verify',['error' => 'error!']);
        }
     }
        
     public function logout(Request $request)
     {
        try {
            $token = $request->cookie('token');
            JWTAuth::setToken($token);
            JWTAuth::invalidate();
            return \response()->json(['message' => 'logout successful'],200)->withCookie(\Cookie::forget('token'));
        } catch (\Throwable $error) {
            return \response()->json(['message' => 'try again'],400);
        }
     }
}
