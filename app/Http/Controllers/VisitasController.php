<?php

namespace App\Http\Controllers;

use App\Mail\CompraMailable;
use App\Repository\GuiasRepository;
use App\Repository\RutasRepository;
use App\Repository\VisitaRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
            'hora' => 'required',
        ]);
        $sol = $this->repoVisitas->getActivo($validate['fecha_visita'],$validate['hora'],$validate['n_entradas']);
        $guias = [];
        foreach ($sol->toArray() as $value) {
            $result = $this->repoGuias->getDatosID($value['id']);
            array_push($guias, $result->toArray());
            
        }
        if(count($guias)<=0){
            return back()->withErrors(['Parece que no quedan guías para esa fecha']);
        }else{
            return view('cliente.entradas_dos', ['guias' => $guias, 'rutas' => $rutas, 'validate' => $validate]);
        }
    }
    public function comprasDos(Request $request){
        $validate = $request->validate([
            'n_entradas' => "required",
            'fecha_visita' => 'required',
            'ruta' => 'required',
            'guia' => 'required',
            'hora' => 'required',
        ]);

        $total = 15*(integer)$validate['n_entradas'];

        $validate['total']=$total;
        return view('cliente.entradas_tres', ['validate' => $validate]);
        
    }
    public function comprasTres(Request $request) {
        $validate = $request->validate([
            'n_entradas' => "required",
            'fecha_visita' => 'required',
            'ruta' => 'required',
            'guia' => 'required',
            'hora' => 'required',
            'total' => 'required',
        ]);
        $validate['user_id']=Auth::user()->id;
        $this->repoVisitas->insertar($validate);
        Mail::to(Auth::user()->email)
            ->send(new CompraMailable($validate));
        return redirect('/')->with('success',"Compra realizada con éxito");
    }
    public function misVisitas(){
        $result = $this->repoVisitas->getVisitas(Auth::user()->id);
        return view('cliente.misVisitas', ['rutas'=>$result]);
    }
    public function cancelar($id) {
        $this->repoVisitas->cancelar($id);
        return redirect('/mis_visitas');
    }
}
