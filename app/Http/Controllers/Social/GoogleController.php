<?php
  
namespace App\Http\Controllers\Social;
  
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

use Exception;
 
class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
 

   public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request)
     {
         try {

            $user = Socialite::driver('google')->user();
            $finduser = User::where('social_id', $user->id)->first();
            
            if ($finduser !== null && $finduser->is_verified == '1')   {   
                    return redirect('/register')->with('success', 'You have already signup.');
            }

            if($finduser){
                Auth::login($finduser, true);
                 return redirect('/login');
      
            }else{
              // Access additional values from the query parameters
            //   $value1 = $request->query('value1');

                $newUser = new User();
                $newUser->f_name = $user->name;
                $newUser->email = $user->email;
                $newUser->social_id = $user->id;
                $newUser->social_type ='google';
                $newUser->is_verified ='1';


                $newUser->save();
                Auth::login($newUser, true);

                return view('super-admin.dashboard');
                // return redirect('/super-admin.dashboard');
            }
     
        } catch (Exception $e) {
            dd($e->getMessage());
        }

}



}
