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
        $result = $this->repository->getAll();
        return view('animales.lista', ['resultados' => $result]);
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
            'visitable' => "required"
        ]);
        $validate['foto']=$nombreImagen;
        $validate['cuidador_id']=$this->user->obtenerIdUsuarioActual();
        $validate['ruta_id']=1;
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
        return view('animales.detalle',['animales'=>$result]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
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
        return redirect('/animales')->with('success','Se ha añadido un nuevo contacto');
    }
}
