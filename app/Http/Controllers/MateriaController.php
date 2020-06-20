<?php

namespace App\Http\Controllers;

use App\Materia;
use Illuminate\Http\Request;
use DB;
use Auth;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   if(Auth::check()){
            return view('materia.newMateria');
        }else{
            return back();
        }
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $file =$request->file('photo');
        if($file){
            $path = public_path() . '/img/materias'; 
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);    	            
            $materia = new Materia;
            $materia->nombre = $request->input('nombre');
            $materia->imagen= $fileName;
            $materia->descripcion = $request->input('descripcion');
            $materia->sigla = $request->input('sigla');
            $materia->id_user = auth()->user()->id;
            $materia->save();
            return redirect('home');
        }else{
            $materia = new Materia;
            $materia->nombre = $request->input('nombre');
            $materia->imagen= 'default.png';
            $materia->descripcion = $request->input('descripcion');
            $materia->sigla = $request->input('sigla');
            $materia->id_user = auth()->user()->id;
            $materia->save();
            return redirect('home');
        }        
    }

    public function verMateria($idM){
        $host= $_SERVER["HTTP_HOST"];
        $url= $_SERVER["REQUEST_URI"];
        $link= "http://" . $host . $url;       
        $materia = DB::table('materias')->where('id',"$idM")->first(); 
        $avisos = DB::table('avisos')->where('id_materia',"$idM")->where('estado',true)->orderBy('created_at', 'DESC')->get();
        $temas = DB::table('temas')->where('id_materia',"$idM")->where('estado',true)->orderBy('created_at', 'DESC')->get();
        $practicos = DB::table('practicos')->where('id_materia',"$idM")->where('estado',true)->orderBy('created_at', 'DESC')->get();
        return view ('materia.verMateria', compact('materia','avisos', 'temas','practicos','link'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function show(Materia $materia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function editMateria($idM){
        if(Auth::check()){
            $materia = DB::table('materias')->where('id',"$idM")->first(); 
            return view('materia.editMateria',compact('materia'));
        }else{
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idM){
        $materia = Materia::find($idM);
        $file =$request->file('photo');
        if($file){
            $path = public_path() . '/img/materias'; 
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $materia->nombre = $request->input('nombre');
            $materia->imagen= $fileName;
            $materia->descripcion = $request->input('descripcion');
            $materia->sigla = $request->input('sigla');
            $materia->id_user = auth()->user()->id;
            $materia->save();
            return redirect('home');
        }else{
            $materia->nombre = $request->input('nombre');
            $materia->descripcion = $request->input('descripcion');
            $materia->sigla = $request->input('sigla');
            $materia->id_user = auth()->user()->id;
            $materia->save();
            return redirect('home');
        }
    }

    public function delMateria($idM){
        if(Auth::check()){
            $materia = Materia::find($idM);
            return view('materia.delmateria',compact('materia'));
        }else{
            return back();
        }
    }

    public function deleteMateria($idM){
        if(Auth::check()){
            $materia = Materia::find($idM);
            $materia->estado = false;
            $materia->save();
            return redirect('home');
        }else{
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materia $materia)
    {
        //
    }
}
