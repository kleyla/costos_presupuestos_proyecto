<?php

namespace App\Http\Controllers;

use App\Tema;
use Illuminate\Http\Request;
use DB;
use Auth;

class TemaController extends Controller
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
    public function create($idM)
    {   if(Auth::check()){
            $idMa= $idM;
            return view('tema.newTema', compact('idMa'));
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
    public function store(Request $request, $idM){   
        //dd("$idM");
        $tema = new Tema;
        $tema->nombre = $request->input('nombre');
        $tema->descripcion = $request->input('descripcion');
        $tema->id_materia = $idM;
        $tema->save();
        return redirect()->route('verMateria', $idM);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function show(Tema $tema)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function edit($idT){
        if(Auth::check()){
            $tema = Tema::find($idT);
            return view ('tema.editTema', compact('tema'));
        }else{
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idT){
        $tema = Tema::find($idT);
        $tema->nombre = $request->input('nombre');
        $tema->descripcion = $request->input('descripcion');
        $tema->save();
        $idM = $tema->id_materia;
        return redirect()->route('verMateria', $idM);
    }

    public function delTema($idT){
        if(Auth::check()){
            $tema = Tema::find($idT);
            return view('tema.delTema',compact('tema'));
        }else{
            return back();
        }
    }

    public function deleteTema($idT){
        $tema = Tema::find($idT);
        $tema->estado = false;
        $tema->save();
        $idM = $tema->id_materia;
        return redirect()->route('verMateria', $idM);
    }

    public function verTema($idT){
        $host= $_SERVER["HTTP_HOST"];
        $url= $_SERVER["REQUEST_URI"];
        $link= "http://" . $host . $url;
        $tema = DB::table('temas')->where('id',"$idT")->where('estado',true)->orderBy('created_at', 'DESC')->first();
        $archivos = DB::table('archivos')->where('id_tema',"$idT")->where('estado',true)->orderBy('created_at', 'DESC')->get();
        return view('tema.verTema', compact('archivos', 'tema', 'link'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tema $tema)
    {
        //
    }
}
