<?php

namespace App\Http\Controllers;

use App\Repository\AnimalesRepository;
use Illuminate\Http\Request;
use App\Http\Requests\SubirFotos;
use App\Repository\RutasRepository;

class RutasController extends Controller
{
    protected $repoRutas;
    protected $repoAnimales;
    /**
     * @param $repoRutas
     */
    public function __construct( RutasRepository $repoRutas,AnimalesRepository $repoAnimales)
    {
        $this->repoRutas = $repoRutas;
        $this->repoAnimales = $repoAnimales;
    }

    public function index()
    {
        $result = $this->repoRutas->getAll();
        return view('rutas.lista', ['resultados' => $result]);
    }
    public function create()
    {
        $result = $this->repoRutas->getAll();
        return view('rutas.create', ['rutas'=>$result]);
    }
    public function store(Request $request)
    {


        $validate = $request->validate([
            'nombre' => "required | min:3 | max:25",
            'descripcion' => "required"
        ]);
        if ($request->hasFile('foto')) {
            $imagen = $request->file('foto');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            try {
                $imagen->move(public_path('img/subidas/rutas'), $nombreImagen);
            } catch (\Exception $e) {
                return back()->withError('Error al almacenar la imagen: ' . $e->getMessage());
            }
            $validate['foto']=$nombreImagen;
            // Puedes almacenar el nombre de la imagen en tu base de datos si es necesario
        }


        $this->repoRutas->insertar($validate);
        //return redirect()->action([AnimalController::class, 'index']);
        return redirect('/verlistadorutas')->with('success','Se ha añadido una nueva ruta');
    }

    public function show(string $id)
    {
        $animales=$this->repoAnimales->getAll();
        $result2=[];
        foreach ($animales as $animale){
            if ($animale->ruta_id){
                array_push($result2,$animale);
            }
        }
        $result = $this->repoRutas->detalle($id);
        return view('rutas.detalle',['rutas'=>$result, 'animales'=>$result2]);
    }
    public function edit(string $id,Request $request)
    {
        ##VALIDAR
        $this->repoRutas->edit($id,$request);
        return redirect('/verlistadorutas')->with('success','Se ha añadido un nuevo contacto');
    }
    public function destroy(string $id)
    {
        $this->repoRutas->eliminar($id);
        return redirect('/verlistadorutas')->with('success','Se ha añadido un nuevo contacto');
    }
}
