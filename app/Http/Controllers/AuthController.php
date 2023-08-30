<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\EmailVerification;
use Mail;


use App\Models\VerifyUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
// use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\UserToken;
use Exception;
use App\Models\PasswordReset;
use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(){
        $title = "Login Ho Gya";
        return view('auth.login', compact('title'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */


     public function postLogin(Request $request)
     {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (DB::table('users')->where('email', $request->email)->doesntExist()) {
            return back()->withInput()->withErrors([
                'message' => 'Email id is not registered.',
            ]);
        } else {
            $user = User::where('email', $request->email)->first();
            if ($user->is_verified =='1') { // verified user
                $email = $request->email;
                $password = $request->password;
                $remember = $request->has('remember_me') ? true : false;

                // $credentials = $request->only('email', 'password',$remember_me);
                if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {

                // if (Auth::attempt($credentials)) {

                    $route = $this->redirectDash();
                     return redirect($route);

                } else {
                    return back()->withInput()->withErrors([
                        'message' => 'The provided credentials do not match with our records.',
                    ]);
                }
             }

        }
    }


    public function redirectDash()
     {

        $redirect = '';

        if(Auth::user() && Auth::user()->role == 1){
            $redirect = '/super-admin/dashboard';
        }
        else if(Auth::user() && Auth::user()->role == 2){
            $redirect = '/head-family/dashboard';
        }
        else if(Auth::user() && Auth::user()->role == 3){
            $redirect = '/family-member/dashboard';
        }
        else{
            $redirect = '/login';
        }

        return $redirect;
    }


    /**
     * Write code on Method
     *
     * @return response()
     */

    public function register()
    {
        $title = "Register";
        return view('auth.register', compact('title'));
    }

    // routes from verification page

    // public function headFamilyDashboard()
    // {
    //     return view('head-family.dashboard');
    // }
    // public function familyMemberDashboard()
    // {

    //     return view('family-member.dashboard');
    // }
    // public function adminDashboard()
    // {

    //     return view('super-admin.dashboard');
    // }

   //end


    public function emailVerifyPage()
    {
        return view('emails.otp_verify');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegister(Request $request)
     {

        $request->validate(
            [
                'first_name'          => 'required|max:255',
                'last_name'          => 'required|max:255',
                'email' => 'required|email|unique:users|max:255|ends_with:.com',
                'role'           => 'required',
                'password'       => 'required|min:6',
                'confirm_password' => 'required|same:password',
            ]
        );

        try {

            $user = new User;
            $user->f_name     = $request->first_name;
            $user->l_name     = $request->last_name;

            $user->email    = $request->email;
            $user->role     = $request->role;

            $user->password =  Hash::make($request->password);
            $user->save();

            return redirect("/verification/".$user->id)->with('message', 'Enter the code from the email we send to' .'  '  .$user->email  );

        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect("register")->withErrors($e->getMessage());
        }
    }

    public function sendOtp($user)
     {
        $otp = rand(100000,999999);
        $time = time();

        EmailVerification::updateOrCreate(
            ['email' => $user->email],
            [
            'email' => $user->email,
            'otp' => $otp,
            'created_at' => $time
            ]
        );

          $f_name =$user->f_name;
          $l_name =$user->l_name;
          $full_name = $f_name . ' ' . $l_name;


        $data['email'] = $user->email;
        $data['title'] = 'Email Verification';


        $data['body'] = 'Hi, '. $full_name.', Your OTP is:- '.$otp;

        Mail::send('mailVerification',['data'=>$data],function($message) use ($data){
            $message->to($data['email'])->subject($data['title']);
        });
    }

    public function verification($id)
     {

        $user = User::where('id',$id)->first();
        if(!$user || $user->is_verified == 1){
            return redirect('/');
        }
        $email = $user->email;

        $this->sendOtp($user);//OTP SEND

        return view('verification',compact('email'));
    }

    public function verifiedOtp(Request $request)
     {


        $otp = implode("", $request->otp);

        $user = User::where('email',$request->email)->first();
        $otpData = EmailVerification::where('otp',$otp)->first();
        if(!$otpData){
            return response()->json(['success' => false,'msg'=> 'You entered wrong OTP']);
        }

        else{

            $currentTime = time();
            $time = $otpData->created_at;

            if($currentTime >= $time && $time >= $currentTime - (90+5)){//90 seconds
                User::where('id',$user->id)->update([
                    'is_verified' => 1
                ]);

                Auth::loginUsingId($user->id);
                return response()->json(['success' => true,'msg'=> 'Mail has been verified','role'=>$user->role]);
            }
            else{
                return response()->json(['success' => false,'msg'=> 'Your OTP has been Expired']);
            }

        }
    }

    public function resendOtp(Request $request)
    {
       $user = User::where('email',$request->email)->first();
       $otpData = EmailVerification::where('email',$request->email)->first();

       $currentTime = time();
       $time = $otpData->created_at;

       if($currentTime >= $time && $time >= $currentTime - (90+5)){//90 seconds
           return response()->json(['success' => false,'msg'=> 'Please try after some time']);
       }
       else{

           $this->sendOtp($user);//OTP SEND
           return response()->json(['success' => true,'msg'=> 'OTP has been sent']);
       }
   }

    public function forgetPasswordForm()
    {
        $title = "Forgot Password";
        return view('auth.forget_password', compact('title'));
    }

    public function forgetPasswordPost(Request $request)
     {

        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        PasswordReset::updateOrCreate([
            'email' => $request->email,
            ],
            [
            'token' => $token,
            ]);

        Mail::send('emails.forget_password', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'We have e-mailed your password reset link!');

    }

    public function resetPasswordForm($token)
    {

        $title = "Reset Password";
        return view('auth.reset_password_form', ['token' => $token], compact('title'));
    }

    public function resetPasswordPost(Request $request)
     {

        $request->validate([
            // 'email' => 'required|email|exists:users',
            'new_password'      => 'required|min:6',
            'confirm_password' => 'required|same:new_password|min:6',
        ]);

        $verifyToken = DB::table('password_resets')
            ->where([
                // 'email' => $request->email,
                'token' => $request->token
            ])
            ->first();
//  dd($verifyToken->email);

        if (!$verifyToken) {
            return back()->withInput()->with('error', 'Invalid Token!');
        }

        User::where('email', $verifyToken->email)
            ->update(['password' => Hash::make($request->new_password)]);

        DB::table('password_resets')->where(['email' => $verifyToken->email])->delete();

        return redirect('login')->with('message', 'Your password is Reset. Please login with new password!');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}
