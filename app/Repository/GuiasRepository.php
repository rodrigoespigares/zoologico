<?php 

    namespace App\Repository;

use App\Models\Guia;

    class GuiasRepository{
        protected Guia $model;
        public function __construct(Guia $model)
        {
            $this->model = $model;   
        }
        public function insertar($pref) {
            Guia::create([
                'guia_id'=>$pref['guia_id'],
                'n_clientes' => $pref['n_clientes'],
                'ocupadas' => $pref['ocupadas'],
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
    }

?>