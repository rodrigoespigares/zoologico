<?php

    namespace App\Repository;

use App\Models\Ruta;

    class RutasRepository{
        protected Ruta $model;
        public function __construct(Ruta $model)
        {
            $this->model = $model;
        }
        public function getAll(){
            return Ruta::all();
        }
         public function insertar($ruta) {
            Ruta::create([
                'nombre' => $ruta['nombre'],
                'descripcion' => $ruta['descripcion'],
                'foto' => $ruta['foto'],
            ]);
        }
        public function detalle($id) {
            return Ruta::where('id',$id)->get();
        }
        public function edit($id,$data) {
            Ruta::where('id', $id)->update([
                'nombre'=>$data['nombre'],
                'descripcion' => $data['descripcion']
            ]);
        }
        public function eliminar($id) {
            Ruta::where('id', $id)->delete();
        }
    }

?>
