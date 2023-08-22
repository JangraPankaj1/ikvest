<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class SuperAdminController extends Controller
{
    //
    public function dashboard()
    {
        return view('super-admin.dashboard');
    }
    
    public function index(){

        $title = "Login";
        return view('super-admin.login', compact('title'));
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
                $credentials = $request->only('email', 'password');
                if (Auth::attempt($credentials)) {

                    $route = $this->redirectDash();
                     return redirect($route);

                    // $user = Auth::user();
                    // return redirect()->intended('dashboard');
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
           $redirect = 'admin/dashboard';
       }
       else{
           $redirect = 'admin/login';
       }

       return $redirect;
     }

}
