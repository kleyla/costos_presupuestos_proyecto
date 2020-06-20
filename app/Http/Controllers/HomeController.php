<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Materia;

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
    public function index(){
        $host= $_SERVER["HTTP_HOST"];
        $url= $_SERVER["REQUEST_URI"];
        $link= "http://" . $host . $url;        
        $materias = DB::table('materias')->where('id_user',auth()->user()->id)->where('estado',true)->orderBy('created_at', 'DESC')->get();
        return view('home', compact('materias', 'link'));
    }

}
