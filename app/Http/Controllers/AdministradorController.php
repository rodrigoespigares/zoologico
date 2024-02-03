<?php

namespace App\Http\Controllers;
use App\Repository\AnimalesRepository;
use App\Repository\RutasRepository;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdministradorController extends Controller
{
    protected $user;
    protected $rAnimales;
    protected $repoRutas;
    public function __construct(AnimalesRepository $rAnimales, User $user, RutasRepository $repoRutas)
    {
        $this->rAnimales = $rAnimales;
        $this->user = $user;
        $this->repoRutas = $repoRutas;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $opciones = match (Auth::user()->rol) {
            "cuidador" => ["animales"=>"/verlistadoanimales"],
            "guia" => ["rutas"=>"/verlistadorutas"],
            "admin" => ["rutas"=>"/verlistadorutas","animales"=>"/verlistadoanimales","usuarios"=>"/verlistadousuarios"]
        };
        return view('admin.panel', ['opciones'=>$opciones]);
    }
    public function listaAnimales($id = null) {
        $result = $this->rAnimales->getAll();
        $rutas = $this->repoRutas->getAll();
        if(!isset($id)){
            return view('admin.animales', ['resultados'=>$result, 'rutas'=>$rutas]);
        }else{
            $animal = $this->rAnimales->detalle($id);
            return view('admin.animales', ['resultados'=>$result, 'rutas'=>$rutas, 'animal'=>$animal]);
        }
    }
    public function listaRutas($id = null){
        $result = $this->repoRutas->getAll();
        if(!isset($id)){
            return view('admin.rutas', ['resultados'=>$result]);
        }else{
            $ruta = $this->repoRutas->detalle($id);
            return view('admin.rutas', ['resultados'=>$result, 'ruta'=>$ruta]);
        }
    }
    public function listaUsuarios($id = null){
        $result = User::all();
        if(!isset($id)){
            return view('admin.user', ['resultados'=>$result]);
        }else{
            $user = User::where('id',$id)->get();
            return view('admin.user', ['resultados'=>$result, 'user'=>$user]);
        }
    }
}
