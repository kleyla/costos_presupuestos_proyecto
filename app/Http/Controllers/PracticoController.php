<?php

namespace App\Http\Controllers;

use App\Practico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;

class PracticoController extends Controller
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
    public function create($idM){
        if(Auth::check()){
            return view('practico.newPractico', compact('idM'));
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
        $file =$request->file('archivo');
        if($file){
            $path = Storage::putFile('practicos', $request->file('archivo')); 
            $practico = new Practico;
            $practico->nombre = $request->input('nombre');
            $practico->descripcion = $request->input('descripcion');
            $practico->archivo= $path;
            $practico->id_materia = $idM;
            $practico->save();
            return redirect()->route('verMateria', $idM);                      
        }else{
            return redirect()->route('verMateria', $idM);
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Practico  $practico
     * @return \Illuminate\Http\Response
     */
    public function show(Practico $practico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Practico  $practico
     * @return \Illuminate\Http\Response
     */
    public function edit($idP){
        if(Auth::check()){
            $practico = Practico::find($idP);
            return view('practico.editPractico', compact('practico'));
        }else{
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Practico  $practico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idP){
        $practico = Practico::find($idP);
        $file =$request->file('archivo');
        if($file){
            $path = Storage::putFile('practicos', $request->file('archivo'));             
            $practico->archivo = $path;
        }
            $practico->nombre = $request->input('nombre');
            $practico->descripcion = $request->input('descripcion');                        
            $practico->save();
            $idM= $practico->id_materia;
            return redirect()->route('verMateria', $idM);                      
    }

    public function delPractico($idP){
        if(Auth::check()){
            $practico = Practico::find($idP);
            return view('practico.delPractico', compact('practico'));
        }else{
            return back();
        }
    }

    public function deletePractico($idP){
        
            $practico = Practico::find($idP);
            $practico->estado= false;
            $practico->save();
            $idM= $practico->id_materia;
            return redirect()->route('verMateria', $idM);
    }

    public function downloadPractico($idP){
        $archivo = Practico::find($idP);
        $file = $archivo->archivo;
        return Storage::download("$file");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Practico  $practico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Practico $practico)
    {
        //
    }
}
