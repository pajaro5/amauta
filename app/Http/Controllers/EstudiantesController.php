<?php

namespace Amauta\Http\Controllers;

use Illuminate\Http\Request;
use Amauta\Estudiante;

class EstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiantes = Estudiante::all();

        return view('estudiantes.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estudiantes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        
        $this->validate(request(),[
            'nombre' => 'required',
            'apellido' => 'required',
            'lat' => 'required',
            'lng' => 'required'
        ]);

        Estudiante::create(request(['nombre','apellido','lat','lng']));

        return redirect('/estudiantes/create');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {
        return view('estudiantes.show', compact('estudiante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Estudiante $estudiante)
    {        
        return view('estudiantes.edit',compact('estudiante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
                
        $this->validate(request(),[
            'nombre' => 'required',
            'apellido' => 'required',
            'lat' => 'required',
            'lng' => 'required'
        ]);
       $estudiante = Estudiante::find($id); 
       $estudiante->nombre = $request->get('nombre');
       $estudiante->apellido = $request->get('apellido');
       $estudiante->lat = $request->get('lat');
       $estudiante->lng = $request->get('lng');

       $estudiante->save();
       
       return redirect('/estudiantes');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estudiante = Estudiante::find($id);
        $estudiante->delete();
        return redirect('/estudiantes')->with('success','Estudiante eliminado');
        
    }
}
