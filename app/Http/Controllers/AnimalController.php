<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubirFotos;
use App\Models\User;
use App\Repository\AnimalesRepository;
use App\Repository\RutasRepository;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    protected $user;
    protected $repository;
    protected $repoRutas;
    public function __construct(AnimalesRepository $repository, User $user, RutasRepository $repoRutas)
    {
        $this->repository = $repository;
        $this->user = $user;
        $this->repoRutas = $repoRutas;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rutas = $this->repoRutas->getVisitables();
        $result = $this->repository->getAll();
        return view('animales.lista', ['resultados' => $result,'rutas' => $rutas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $result = $this->repoRutas->getAll();
        return view('animales.create', ['rutas'=>$result]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // ajusta las reglas según tus necesidades
        ]);

        if ($request->hasFile('foto')) {
            $imagen = $request->file('foto');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            try {
                $imagen->move(public_path('img/subidas/animales'), $nombreImagen);
            } catch (\Exception $e) {
                return back()->withError('Error al almacenar la imagen: ' . $e->getMessage());
            }

            // Puedes almacenar el nombre de la imagen en tu base de datos si es necesario
        }
        $validate = $request->validate([
            'nombre' => "required | min:3 | max:25",
            'n_cientifico' => "required | min:3 | max:25",
            'descripcion' => "required",
            'visitable' => "required",
            'ruta_id'=>"required"
        ]);
        $validate['foto']=$nombreImagen;
        $validate['cuidador_id']=$this->user->obtenerIdUsuarioActual();

        $this->repository->insertar($validate);
        //return redirect()->action([AnimalController::class, 'index']);
        return redirect('/verlistadoanimales')->with('success','Se ha añadido un nuevo animal');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $result = $this->repository->detalle($id);
        $result2 = [];
        /*
        foreach ($result as $prueba){
            var_dump($prueba);

            // $result2 = $this->repoRutas->detalle($prueba->rute_id);
        }
        */
        $result2= $this->repoRutas->detalle($result[0]->ruta_id);
        return view('animales.detalle',['animales'=>$result,'rutas'=>$result2]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id,Request $request)
    {
        $validate = $request->validate([
            'nombre' => "required | min:3 | max:25",
            'n_cientifico' => "required | min:3 | max:25",
            'descripcion' => "required",
            'visitable' => "required",
            'ruta_id'=>"required"
        ]);
        $this->repository->edit($id,$validate);
        return redirect('/verlistadoanimales')->with('success','Se ha añadido un nuevo contacto');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->repository->noVisitable($id);
        return redirect('/verlistadoanimales')->with('success','Se ha añadido un nuevo contacto');
    }
}
