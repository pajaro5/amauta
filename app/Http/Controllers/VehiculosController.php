<?php

namespace Amauta\Http\Controllers;

use Amauta\Vehiculo;
use Illuminate\Http\Request;

class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculos = Vehiculo::all();

        return view('vehiculos.index', compact('vehiculos'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculos.create');
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
            'placa' => 'required',
            'capacidad' => 'required|digits_between:1,2' 
        ]);

        $vehiculo = new Vehiculo;
        $vehiculo->placa = strtoupper(request('placa'));
        $vehiculo->capacidad = request('capacidad');
        $vehiculo->save();
        
        return redirect('/vehiculos/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Amauta\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function show(Vehiculo $vehiculo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Amauta\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehiculo $vehiculo)
    {
        return view('vehiculos.edit', compact('vehiculo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Amauta\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(),[
            'placa' => 'required',
            'capacidad' => 'required|digits_between:1,2' 
        ]);

        $vehiculo = Vehiculo::find($id);
        $vehiculo->placa = $request->get('placa');
        $vehiculo->capacidad = $request->get('capacidad');

        $vehiculo->save();

        return redirect('/vehiculos');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Amauta\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehiculo $vehiculo)
    {
        //
    }
}
