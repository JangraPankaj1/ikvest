<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $title = "Home";
        return view('index', compact('title'));
    }
    public function aboutUsPage(){
        $title = "About-Us";
        return view('about-us', compact('title'));
    }
    public function familyTreePage(){
        $title = "Family-tree";
        return view('family-tree', compact('title'));
    }
    public function investingPage(){
        $title = "Investing";
        return view('investing', compact('title'));
    }
    
    public function myInvestPage(){
        $title = "My-Invest";
        return view('my-invest', compact('title'));
    }

   
    
}