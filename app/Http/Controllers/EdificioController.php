<?php

namespace App\Http\Controllers;

use App\Edificio;
use Illuminate\Http\Request;
use App;
class EdificioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $edificios=APP\Edificio::all();
        return $edificios;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $edificioAgregar=new Edificio;
        $request->validate([
            'nombre' => 'required'
        ]);
        $edificioAgregar->nombre= $request->nombre;
        $edificioAgregar->save();
        return back()->with('agregarEdificio','edificio creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Edificio  $edificio
     * @return \Illuminate\Http\Response
     */
    public function show(Edificio $edificio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Edificio  $edificio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edificioActualizar=App\Edificio::findOrfail($id);
        return view('editaredificio',compact('edificioActualizar'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Edificio  $edificio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $edificioUpdate=App\Edificio::findOrfail($id);
        $edificioUpdate->nombre=$request->nombre;
        $edificioUpdate->save();
        return back()->with('actualizaredificio','El edificio ha sido actualizado Exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Edificio  $edificio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $edificioEliminar=App\Edificio::findOrfail($id);
       $edificioEliminar->delete();
       return back()->with('eliminaredificio','Edificio eliminado Exitosamente');
    }
}
