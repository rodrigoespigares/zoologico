<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repository\UsuarioRepository;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Providers\RouteServiceProvider;
use App\Repository\GuiasRepository;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UsuarioController extends Controller
{
    protected UsuarioRepository $RepoUser;
    protected GuiasRepository $guiaRepository;
    /**
     * @param $user
     */
    public function __construct( UsuarioRepository $RepoUser, GuiasRepository $guiaRepository)
    {
        $this->RepoUser = $RepoUser;
        $this->guiaRepository = $guiaRepository;
    }

    public function index()
    {
        $result = $this->RepoUser->getAll();
        return view('usuario.lista', ['resultados' => $result]);
    }
    public function create()
    {
        $result = $this->RepoUser->getAll();
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

        $user = [
            'name' => $request->name,
            'subname' => $request->subname,
            'email' => $request->email,
            'rol'=> $request->rol,
            'password' => Hash::make($request->password),
        ];
        $user= $this->RepoUser->insertar($user);

        event(new Registered($user));

        if($user->toArray()['rol']=="guia" && !$this->guiaRepository->findId($user->toArray()['id'])){
            $this->guiaRepository->create($user->toArray()['id']);
        }

        return redirect("/verlistadousuarios");
    }

    public function edit(string $id,Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'subname' => ['required', 'string', 'max:255'],
            'rol'=>['required']
        ]);
        $this->RepoUser->edit($id,$request);
        if($request['rol']=="guia" && !$this->guiaRepository->findId($id)){
            $this->guiaRepository->create($id);
        }
        return redirect('/verlistadousuarios')->with('success','Se ha editado el usuario');
    }
    public function destroy(string $id)
    {
        $this->RepoUser->eliminar($id);
        return redirect('/verlistadousuarios')->with('success','Se cambiado el rol a cliente');
    }
}
