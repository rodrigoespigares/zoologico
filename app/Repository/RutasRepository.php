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
        /* public function insertar($animal) {
            Animal::create([
                'nombre' => $animal['nombre'],
                'n_cientifico' => $animal['n_cientifico'],
                'descripcion' => $animal['descripcion'],
                'foto' => $animal['foto'],
                'visitable' => $animal['visitable']=='true'?true:false,
                'cuidador_id' => $animal['cuidador_id'],
                'ruta_id' => $animal['ruta_id'],
            ]);
            
        } */
    }

?>