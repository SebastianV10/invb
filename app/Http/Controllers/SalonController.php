<?php

namespace App\Http\Controllers;

use App\Salon;
use App\Edificio;
use Illuminate\Http\Request;
use App;
class SalonController extends Controller
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
        $salonAgregar=new Salon;
        $request->validate([
            'numero' => 'required',
            'edificio_id' => 'required'
        ]);
        $salonAgregar->numero= $request->numero;
        $salonAgregar->edificio_id=$request->edificio_id;
        $salonAgregar->save();
        $id_edificio=$request->edificio_id;
        $salonEdificio=App\Salon::where("edificio_id","=",$id_edificio)->paginate(10);
        return back()->with('agregarsalon','edificio creado correctamente',compact('salonEdificio'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\salon  $salon
     * @return \Illuminate\Http\Response
     */
    public function show($id_edificio)
    {
        $salonEdificio=App\Salon::where("edificio_id","=",$id_edificio)->paginate(10);
        $edificioconsulta=App\Edificio::findOrfail($id_edificio);
        return view('salon',['salonEdificio' => $salonEdificio,'edificioconsulta' => $edificioconsulta]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\salon  $salon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $salonActualizar=App\Salon::findOrfail($id);
        return view('editar_salon',compact('salonActualizar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\salon  $salon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $salonUpdate=App\Salon::findOrfail($id);
        $salonUpdate->numero=$request->numero;
        $salonUpdate->save();
        return back()->with('actualizar_salon','El salon ha sido actualizado Exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\salon  $salon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $edificioEliminar=App\Salon::findOrfail($id);
        $edificioEliminar->delete();
        return back()->with('eliminar_salon','Salon eliminado Exitosamente');
    }
}
