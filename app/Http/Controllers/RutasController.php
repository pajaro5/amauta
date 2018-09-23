<?php

namespace Amauta\Http\Controllers;

use Illuminate\Http\Request;
use Amauta\Estudiante;
use Amauta\Escuela;
use Amauta\Vehiculo;
use Amauta\TSPSolverHandler;

class RutasController extends Controller
{
    //Llamar al Solver y recupera las rutas
    public function create()
    {
        $resultadoTSP = [];
        //Recupero los datos
        $escuela = Escuela::all()->first();        
        $estudiantes = Estudiante::all();

        //Ejecuto el solver
        $solver = TSPSolverHandler::getTSPSolution($escuela,$estudiantes);        
        
        //Valido si recibió respuesta del API
        if ($solver->getStatusCode() == 200 ) {  
            //Recupero los resultados de la ruta calculada
            $rutaTSP = json_decode($solver->getBody()->getContents());                               
            //recuperar de base de datos a los estudiantes
            $estudiantesTSP = Estudiante::getEstudiantesRuta($rutaTSP);
            
            //recupero los vehiculos
            $flota = Vehiculo::all();

            //preparo datos para la vista
            $resultadoTSP['escuela'] = $escuela;
            $resultadoTSP['estudiantesTSP'] = $estudiantesTSP;
            $resultadoTSP['flota'] = $flota;            

            //dibujar en mapa solucion TSP            
            return view('rutas.tspviewer',compact('resultadoTSP'));
            
        }

        

    }
}
