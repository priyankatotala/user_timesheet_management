<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use App\Product;

use Illuminate\Http\Request;

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
        //return view('home');
        //return view('home');

        // $rows = DB::table('products')->get();
        // $count = count($rows);
        // $products = Product::latest()->paginate($count);
        // return view('home',compact('products'))
        // ->with('i', (request()->input('page', 1) - 1) * 5);

        $user1 =  Auth::user()->id ;
        $rows1 = DB::table('products')->where('user_id', 'LIKE', $user1 )->get();
        $count1 = count($rows1);
        $products = Product::latest()->where('user_id', 'LIKE', $user1 )->paginate($count1);
        return view('products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
            

    }

  
}
