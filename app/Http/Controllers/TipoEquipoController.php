<?php

namespace App\Http\Controllers;

use App\tipo_equipo;
use Illuminate\Http\Request;
use App;
class TipoEquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo_equipos=APP\tipo_equipo::all();
        return $tipo_equipos;
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
        $tipo_equipoAgregar=new tipo_equipo;
        $request->validate([
            'nombre' => 'required'
        ]);
        $tipo_equipoAgregar->nombre= $request->nombre;
        $tipo_equipoAgregar->save();
        return back()->with('agregartipo_equipo','Marca creada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tipo_equipo  $tipo_equipo
     * @return \Illuminate\Http\Response
     */
    public function show(tipo_equipo $tipo_equipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tipo_equipo  $tipo_equipo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo_equipoActualizar=App\tipo_equipo::findOrfail($id);
        return view('editar_tipo_equipo',compact('tipo_equipoActualizar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tipo_equipo  $tipo_equipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $tipo_equipoUpdate=App\tipo_equipo::findOrfail($id);
        $tipo_equipoUpdate->nombre=$request->nombre;
        $tipo_equipoUpdate->save();
        return back()->with('update_tipo_equipo','El tipo de equipo ha sido actualizado Exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tipo_equipo  $tipo_equipo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo_equipoEliminar=App\tipo_equipo::findOrfail($id);
        $tipo_equipoEliminar->delete();
        return back()->with('eliminar_tipo_equipo','equipo eliminado Exitosamente');
    }
}
