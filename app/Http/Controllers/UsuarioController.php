<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


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
    public function almacenar(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'subname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'rol'=>['required']
        ]);

        $user = User::create([
            'name' => $request->name,
            'subname' => $request->subname,
            'email' => $request->email,
            'rol'=> $request->rol,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));


        return redirect("/verlistadousuarios");
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
            'rol'=>'cliente',
        ]);;
        return redirect('/verlistadousuarios')->with('success','Se ha añadido un nuevo contacto');
    }
}
