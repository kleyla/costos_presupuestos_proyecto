<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materia;
use DB;

class UserController extends Controller
{
    public function miPerfil(){
        //
    }
    
    public function start(){
        $host= $_SERVER["HTTP_HOST"];
        $url= $_SERVER["REQUEST_URI"];
        $link= "http://" . $host . $url;                
        $materias = DB::table('materias')->where('estado',true)->orderBy('created_at', 'DESC')->get();
        return view('start',compact('materias', 'link'));
    }

}
