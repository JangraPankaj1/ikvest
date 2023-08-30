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

    // ********** for login page *********

   public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request)
      {

         try {

            $user = Socialite::driver('google')->user();
            $finduser = User::where('social_id', $user->id)->first();

            if ($finduser !== null && $finduser->is_verified == '1'){

                Auth::login($finduser, true);
                    return redirect('family-member/dashboard');
            }

           else{
              // Access additional values from the query parameters
            //   $value1 = $request->query('value1');

                $newUser = new User();
                $newUser->f_name = $user->name;
                $newUser->email = $user->email;
                $newUser->social_id = $user->id;
                $newUser->role = '3';

                $newUser->social_type ='google';
                $newUser->is_verified ='1';
                $newUser->save();
                Auth::login($newUser, true);
                return redirect('family-member/dashboard');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }

  }

    // ********** for register page *********

//   public function redirectToGoogleRegister()
//    {
//       return Socialite::driver('google')->redirect();
//    }

//   public function handleGoogleCallbackRegister(Request $request)
//     {

//        try {

//           $user = Socialite::driver('google')->user();
//           $finduser = User::where('social_id', $user->id)->first();

//           if ($finduser !== null && $finduser->is_verified == '1')   {

//                   return redirect('family-member/dashboard');
//           }

//           if($finduser){
//               Auth::login($finduser, true);
//                  return redirect('family-member/dashboard');

//           }else{
//             // Access additional values from the query parameters
//           //   $value1 = $request->query('value1');

//               $newUser = new User();
//               $newUser->f_name = $user->name;
//               $newUser->email = $user->email;
//               $newUser->social_id = $user->id;
//               $newUser->role = '3';

//               $newUser->social_type ='google';
//               $newUser->is_verified ='1';


//               $newUser->save();
//               Auth::login($newUser, true);

//               return redirect('family-member/dashboard');
//           }

//       } catch (Exception $e) {
//           dd($e->getMessage());
//       }

// }


}
