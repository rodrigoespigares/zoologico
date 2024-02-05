<?php

namespace App\Http\Controllers;
use App\Repository\AnimalesRepository;
use App\Repository\RutasRepository;
use App\Repository\GuiasRepository;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdministradorController extends Controller
{
    protected $user;
    protected $rAnimales;
    protected $repoRutas;
    protected $rGuias;
    public function __construct(AnimalesRepository $rAnimales, User $user, RutasRepository $repoRutas, GuiasRepository $rGuias)
    {
        $this->rAnimales = $rAnimales;
        $this->user = $user;
        $this->rGuias = $rGuias;
        $this->repoRutas = $repoRutas;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $opciones = match (Auth::user()->rol) {
            "cuidador" => ["animales"=>"/verlistadoanimales"],
            "guia" => ["rutas"=>"/verlistadorutas","preferencias"=>"/guia/preferencias"],
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
    public function cargaPreferencias(){
        $result = $this->rGuias->detalle(Auth::user()->id);
        if(count($result)>0){
            return view('admin.preferencias', ['result'=>$result[0]]);
        }else{
            return view('admin.preferencias');
        }
    }
    public function crearPreferencias(Request $request) {
        
        $request['n_clientes']= (integer) $request['n_clientes'];
        $validate = $request->validate([
            'n_clientes' => "required|integer"
        ]);
        $validate['guia_id']=Auth::user()->id;
        $validate['activo']=true;
        $this->rGuias->insertar($validate);

        return redirect('/guia/preferencias');
    }

    public function modificarPreferencias(Request $request) {
        $result = $this->rGuias->detalle(Auth::user()->id);
        $min = $result[0]->ocupadas;
        
        $validate = $request->validate([
            'n_clientes' => ['required', 'numeric', function ($attribute, $value, $fail) use ($min) {
                if ($value <= $min) {
                    $fail("$attribute debe ser mayor que $min.");
                }
            }],
        ]);

        $validate['n_clientes']= (integer) $validate['n_clientes'];
        $validate['guia_id']=Auth::user()->id;
        $this->rGuias->edit($validate);

        return redirect('/guia/preferencias');
    }
}
