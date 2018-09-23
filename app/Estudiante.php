<?php

namespace Amauta;

class Estudiante extends Model
{
    
    public static function getEstudiantesRuta($estudiantes)
    {
        $listaEstudiantes = [];

        foreach ($estudiantes as $estudiante) {            
            $e = Estudiante::find($estudiante->estudianteId);
            array_push($listaEstudiantes, $e);                     
        }        

        return $listaEstudiantes;

    }
    
}
 