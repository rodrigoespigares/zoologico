<?php 

    namespace App\Repository;

use App\Models\Guia;
use App\Models\User;

    class GuiasRepository{
        protected Guia $model;
        public function __construct(Guia $model)
        {
            $this->model = $model;   
        }
        public function getActivo() {
            return Guia::join('users', 'guia.guia_id', '=', 'users.id')
                        ->where('guia.activo', true)
                        ->select('guia.*', 'users.*') // Selecciona todas las columnas de ambas tablas
                        ->get();
        }
        public function findId($id) {
            return Guia::where('guia_id',$id)->get();
        }

        public function create($id) {
            Guia::create([
                'guia_id'=>$id,
                'n_clientes' => 10,
                'activo' => true,
            ]);
        }
        public function insertar($pref) {
            Guia::create([
                'guia_id'=>$pref['guia_id'],
                'n_clientes' => $pref['n_clientes'],
                'activo' => $pref['activo'],
            ]);
            
        }
        public function detalle($id) {
            return Guia::where('guia_id',$id)->get();
        }
        public function edit($data) {
            Guia::where('guia_id', $data['guia_id'])->update([
                'n_clientes'=>$data['n_clientes'],
            ]);
        }
        public function getDatosID($id) {
            return User::find($id);
        }
    }

?>