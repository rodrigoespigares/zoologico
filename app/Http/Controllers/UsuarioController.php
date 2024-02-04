<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    protected User $user;
    /**
     * @param $user
     */
    public function __construct( User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $result = User::all();
        return view('usuario.lista', ['resultados' => $result]);
    }
    public function create()
    {
        $result = User::all();
        return view('usuario.create', ['usuarios'=>$result]);
    }

    public function edit(string $id,Request $request)
    {
        ##VALIDAR
        User::where('id', $id)->update([
            'name'=>$request['name'],
            'subname' => $request['subname'],
            'email'=>$request['email'],
            'rol'=>$request['rol']
        ]);
        return redirect('/verlistadousuarios')->with('success','Se ha añadido un nuevo contacto');
    }
    public function destroy(string $id)
    {
        User::where('id', $id)->update([
            'rol'=>'user',
        ]);;
        return redirect('/verlistadousuarios')->with('success','Se ha añadido un nuevo contacto');
    }
}
