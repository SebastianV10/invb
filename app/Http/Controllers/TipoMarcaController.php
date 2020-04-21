<?php

namespace App\Http\Controllers;

use App\Tipo_marca;
use Illuminate\Http\Request;
use App;
class TipoMarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo_marcas=APP\Tipo_marca::paginate(8);
        return view('tipo_marca',compact('tipo_marcas'));
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
        $tipo_marcaAgregar=new Tipo_marca;
        $request->validate([
            'nombre' => 'required'
        ]);
        $tipo_marcaAgregar->nombre= $request->nombre;
        $tipo_marcaAgregar->save();
        return back()->with('agregarTipo_marca','Marca creada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tipo_marca  $tipo_marca
     * @return \Illuminate\Http\Response
     */
    public function show(tipo_marca $tipo_marca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tipo_marca  $tipo_marca
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo_marcaActualizar=App\Tipo_marca::findOrfail($id);
        return view('editar_tipo_marca',compact('tipo_marcaActualizar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tipo_marca  $tipo_marca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tipo_marcaUpdate=App\Tipo_marca::findOrfail($id);
        $tipo_marcaUpdate->nombre=$request->nombre;
        $tipo_marcaUpdate->save();
        return back()->with('update_tipo_marca','El tipo_marca ha sido actualizado Exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tipo_marca  $tipo_marca
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo_marcaEliminar=App\Tipo_marca::findOrfail($id);
        $tipo_marcaEliminar->delete();
        return back()->with('eliminar_tipo_marca','marca eliminado Exitosamente');
    }
}
