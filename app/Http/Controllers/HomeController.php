<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); 
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        
        return view('home');
    }


public function product()
    {

       $products = DB::table('products')->where('user_id' , Auth::user()->id)->get();
//dd(Auth::user()->id);
  










 return view('product' , compact('products'));
        
    }




    
}
