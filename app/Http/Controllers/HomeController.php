<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Cake;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function us()
    {
        return view('us');
    }
    public function index(){
        return view('index',['banner'=>Banner::all(),'hot'=>Cake::where('flag','=',1)->limit(4)->get()]);
    }
}
