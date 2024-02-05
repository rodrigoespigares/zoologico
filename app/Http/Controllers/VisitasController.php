<?php

namespace App\Http\Controllers;

use App\Repository\GuiasRepository;
use App\Repository\RutasRepository;
use App\Repository\VisitaRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class VisitasController extends Controller
{
    private RutasRepository $repoRutas;
    private GuiasRepository $repoGuias;
    private VisitaRepository $repoVisitas;

    public function __construct(RutasRepository $repoRutas, GuiasRepository $repoGuias, VisitaRepository $repoVisitas)
    {
        $this->repoRutas = $repoRutas;   
        $this->repoGuias = $repoGuias;
        $this->repoVisitas = $repoVisitas;
    }  
    
    public function index()
    {
        
        return view('cliente.entradas');
    }
    public function comprasUno(Request $request){
        $rutas = $this->repoRutas->todoDatosVisitable();
        $validate = $request->validate([
            'n_entradas' => "required",
            'fecha_visita' => 'required',
        ]);
        $sol = $this->repoVisitas->getActivo($validate['fecha_visita'],$validate['n_entradas']);
        $guias = [];
        foreach ($sol->toArray() as $value) {
            $result = $this->repoGuias->getDatosID($value['id']);
            array_push($guias, $result->toArray());
            
        }
        return view('cliente.entradas_dos', ['guias' => $guias, 'rutas' => $rutas, 'validate' => $validate]);
    }
    public function comprasDos(Request $request){
        $validate = $request->validate([
            'n_entradas' => "required",
            'fecha_visita' => 'required',
            'ruta' => 'required',
            'guia' => 'required'
        ]);
        $validate['user_id']=Auth::user()->id;
        $this->repoVisitas->insertar($validate);
        return redirect('/');
    }
}
