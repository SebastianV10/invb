<?php

namespace App\Http\Controllers;

use App\Equipo;
use App\Salon;
use App\tipo_equipo;
use App\Tipo_marca;
use App\Edificio;
use App\User;
use App;

use Illuminate\Http\Request;

class EquipoController extends Controller
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
        $equipoAgregar=new Equipo;
        $request->validate([
            'serie' => 'required',
            'descripcion' => 'required',
            'estado' => 'required',
            'tipo_marca_id' => 'required',
            'salon_id' => 'required',
            'tipo_equipo_id' => 'required',
            'user_id' => 'required'
        ]); 				

        $equipoAgregar->serie= $request->serie; 
        $equipoAgregar->descripcion= $request->descripcion;
        $equipoAgregar->estado= $request->estado;
        $equipoAgregar->tipo_marca_id= $request->tipo_marca_id;
        $equipoAgregar->salon_id= $request->salon_id;
        $equipoAgregar->tipo_equipo_id= $request->tipo_equipo_id;
        $equipoAgregar->user_id= $request->user_id;
        $equipoAgregar->save();
        $salon_id=$request->salon_id;
        $equipoSalon=App\Equipo::where("salon_id","=",$salon_id)->paginate(10);
        return back()->with('agregarequipo','equipo creado correctamente',compact('equipoSalon'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function show($id_salon)
    {
        $equipoSalon=App\Equipo::where("salon_id","=",$id_salon)->paginate(10);
        $salonconsulta=App\Salon::findOrfail($id_salon);

        $consultatipo_equipo=App\tipo_equipo::all();
        $consultaTipo_marca=App\Tipo_marca::all();
        return view('equipo',compact('equipoSalon','salonconsulta','consultatipo_equipo','consultaTipo_marca')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipoActualizar=App\Equipo::findOrfail($id);

        $consultatipo_equipo=App\tipo_equipo::all();
        $consultaTipo_marca=App\Tipo_marca::all();

        return view('editar_equipo',compact('equipoActualizar','consultatipo_equipo','consultaTipo_marca'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $equipoUpdate=App\Equipo::findOrfail($id);
        $equipoUpdate->serie=$request->serie;
        $equipoUpdate->descripcion=$request->descripcion;
        $equipoUpdate->estado=$request->estado;
        $equipoUpdate->tipo_marca_id=$request->tipo_marca_id;
        $equipoUpdate->salon_id=$request->salon_id;
        $equipoUpdate->tipo_equipo_id=$request->tipo_equipo_id;
        $equipoUpdate->save();
        return back()->with('update_equipo','El equipo ha sido actualizado Exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipoEliminar=App\Equipo::findOrfail($id);
        $equipoEliminar->delete();
        return back()->with('eliminar_equipo','Equipo eliminado Exitosamente');
    }
}
