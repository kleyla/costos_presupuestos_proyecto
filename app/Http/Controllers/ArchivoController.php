<?php

namespace App\Http\Controllers;

use App\Archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;

class ArchivoController extends Controller
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
    public function create($idT){
        if(Auth::check()){
            return view('archivo.newArchivo', compact('idT'));
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
    public function store(Request $request, $idT){
        $file =$request->file('archivo');
        if($file){
            $path = Storage::putFile('archivos', $request->file('archivo')); 
            $archivo = new Archivo;
            $archivo->nombre = $request->input('nombre');
            $archivo->path= $path;
            $archivo->id_tema = $idT;
            $archivo->save();
            return redirect()->route('verTema', $idT);                      
        }else{
            return redirect()->route('verTema', $idT);
        }

    }

    public function delArchivo($idA){
        if(Auth::check()){
            $archivo = Archivo::find($idA);
            return view('archivo.delArchivo', compact('archivo'));
        }else{
            return back();
        }
    }

    public function deleteArchivo($idA){
        if(Auth::check()){
            $archivo = Archivo::find($idA);
            $archivo->estado = false;
            $archivo->save();
            $idT= $archivo->id_tema;
            return redirect()->route('verTema', $idT);
        }else{
            return back();
        }
    }

    public function downloadArchivo($idA){
        $archivo = Archivo::find($idA);
        $file = $archivo->path;
        return Storage::download("$file");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function show(Archivo $archivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function edit(Archivo $archivo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Archivo $archivo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Archivo $archivo)
    {
        //
    }
}
