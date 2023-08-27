<?php
  
namespace App\Http\Controllers;
  
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
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

    public function handleGoogleCallback()
     {
        try {
            
            $user = Socialite::driver('google')->user();
            $finduser = User::where('social_id', $user->id)->first();
      
            if($finduser){
      
                Auth::login($finduser, true);
     
                 return redirect('/testing');
      
            }else{
              
                $newUser = new User();
                $newUser->name = $user->name;
                $newUser->email = $user->email;
                $newUser->social_id = $user->id;
                $newUser->social_type ='google';
    
                $newUser->save();
                Auth::login($newUser, true);

                return redirect('/testing');
            }
     
        } catch (Exception $e) {
            dd($e->getMessage());
        }

}



}
