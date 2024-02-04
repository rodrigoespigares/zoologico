<?php

namespace App\Http\Controllers;

use App\Repository\GuiasRepository;
use App\Repository\RutasRepository;
use Illuminate\Http\Request;

class VisitasController extends Controller
{
    private RutasRepository $repoRutas;
    private GuiasRepository $repoGuias;

    public function __construct(RutasRepository $repoRutas, GuiasRepository $repoGuias)
    {
        $this->repoRutas = $repoRutas;   
        $this->repoGuias = $repoGuias;
    }  
    
    public function index()
    {
        $rutas = $this->repoRutas->todoDatosVisitable();
        $guias = $this->repoGuias->getActivo();
        
        return view('cliente.entradas', ['guias' => $guias, 'rutas' => $rutas]);
    }
}
