<?php

namespace App\Repository;

use App\Models\User;
use App\Repository\GuiasRepository;

class UsuarioRepository
{
    protected User $user;
    protected GuiasRepository $guiasRepo;

    /**
     * @param User $user
     */
    public function __construct(User $user, GuiasRepository $guiasRepo)
    {
        $this->user = $user;
        $this->guiasRepo = $guiasRepo;
    }
    public function getAll(){
        return User::all();
    }
    public function insertar($usuario) {
        return User::create([
            'name' => $usuario['name'],
            'subname' => $usuario['subname'],
            'email' => $usuario['email'],
            'password' => $usuario['password'],
            'rol' => $usuario['rol'],
        ]);
    }
    public function edit($id,$data) {
        User::where('id', $id)->update([
            'name' => $data['name'],
            'subname' => $data['subname'],
            'rol' => $data['rol'],
        ]);
    }
    public function eliminar($id) {
        User::where('id', $id)->update([
            'rol'=>'cliente',
        ]);;
        $this->guiasRepo->desactivar($id);
    }

}
