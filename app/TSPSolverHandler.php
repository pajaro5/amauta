<?php

namespace Amauta;

use Illuminate\Database\Eloquent\Model;
use Amauta\Estudiante;
use Amauta\Escuela;
use GuzzleHttp\Client;

class TSPSolverHandler extends Model
{    
    private $params = [];
    private $request;
    private $url;

    public static function getTSPSolution($escuela,$estudiantes)
    {
        $client = new Client([
            'headers' => [ 'Content-Type' => 'application/json' ]
        ]);

        $url = 'http://192.168.100.102:8080/solver';
                
        //Armo el array
        $params['escuela'] = $escuela;
        $params['estudiantes'] = $estudiantes;

        //Empaco como Json
        $data = json_encode($params);                        
        
        //Ejecuto el solver en el servicio Java
        $request = $client->post($url,  [ 'body'=> $data]);

        return $request;

    }
}
