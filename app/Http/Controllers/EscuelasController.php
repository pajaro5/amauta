<?php

namespace Amauta\Http\Controllers;

use Amauta\Escuela;
use Illuminate\Http\Request;

class EscuelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $escuela = Escuela::all()->first();         

        return view('escuelas.index', compact('escuela'));
    }

}
