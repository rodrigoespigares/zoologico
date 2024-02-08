<?php

namespace App\Repository;

use App\Models\User;

class UsuarioRepository
{
    protected User $user;

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function getAll(){
        return User::all();
    }
    public function insertar($usuario) {
        return User::create([
            'name' => $usuario['name'],
            'subname' => $usuario['descripcion'],
            'email' => $usuario['email'],
            'password' => $usuario['password'],
            'rol' => $usuario['rol'],
        ]);
    }
    public function edit($id,$data) {
        User::where('id', $id)->update([
            'name' => $data['name'],
            'subname' => $data['descripcion'],
            'email' => $data['email'],
            'password' => $data['password'],
            'rol' => $data['rol'],
        ]);
    }
    public function eliminar($id) {
        User::where('id', $id)->update([
            'rol'=>'cliente',
        ]);;
    }

}
