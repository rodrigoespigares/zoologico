<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SubirFotos;
use App\Repository\RutasRepository;

class RutasController extends Controller
{
    protected $repoRutas;
    /**
     * @param $repoRutas
     */
    public function __construct( RutasRepository $repoRutas)
    {
        $this->repoRutas = $repoRutas;
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
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // ajusta las reglas según tus necesidades
        ]);

        if ($request->hasFile('foto')) {
            $imagen = $request->file('foto');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            try {
                $imagen->move(public_path('img/subidas/rutas'), $nombreImagen);
            } catch (\Exception $e) {
                return back()->withError('Error al almacenar la imagen: ' . $e->getMessage());
            }

            // Puedes almacenar el nombre de la imagen en tu base de datos si es necesario
        }
        $validate = $request->validate([
            'nombre' => "required | min:3 | max:25",
            'descripcion' => "required"
        ]);
        $validate['foto']=$nombreImagen;
        $this->repoRutas->insertar($validate);
        //return redirect()->action([AnimalController::class, 'index']);
        return redirect('/verlistadorutas')->with('success','Se ha añadido una nueva ruta');
    }
    public function edit(string $id,Request $request)
    {
        ##VALIDAR
        $this->repoRutas->edit($id,$request);
        return redirect('/verlistarutas')->with('success','Se ha añadido un nuevo contacto');
    }
    public function update(Request $request, string $id)
    {
        //
    }
    public function destroy(string $id)
    {
        $this->repoRutas->eliminar($id);
        return redirect('/rutas')->with('success','Se ha añadido un nuevo contacto');
    }
}
