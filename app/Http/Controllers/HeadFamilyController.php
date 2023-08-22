<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class HeadFamilyController extends Controller
{
    //
    public function dashboard()
    {
        return view('head-family.dashboard');
    }

   

}
