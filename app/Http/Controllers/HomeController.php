<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Cake;
use Debugbar;
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
        $banner1 = Banner::where('type','=',1)->take(5)->get();
        $banner3 = Banner::where('type','=',3)->take(5)->get();
        for ($i=1; $i < 6; $i++) { 
            $banner2[] = Banner::where(['type'=>2,'type_con'=>$i])->take(3)->get();
        }
        return view('index',['b1'=>$banner1,'b2'=>$banner2,'b3'=>$banner3]);
    }
}
