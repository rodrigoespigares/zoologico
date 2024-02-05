<?php 

    namespace App\Repository;

use App\Models\Visita;
use App\Models\User;
use Illuminate\Support\Facades\DB;

    class VisitaRepository{
        protected Visita $model;
        protected User $modelUser;
        public function __construct(Visita $model, User $modelUser)
        {
            $this->model = $model;   
            $this->modelUser = $modelUser;
        }
        public function getActivo($fecha)
        {
            return User::join('visitas', 'users.id', '=', 'visitas.guia_id')
                        ->join('guia', 'users.id', '=', 'guia.guia_id')
                        ->select(
                            'users.id',
                            DB::raw('sum(visitas.n_entradas) as total_entradas'),
                            'guia.n_clientes'
                        )
                        ->whereDate('visitas.fecha_visita', $fecha)
                        ->groupBy('users.id', 'guia.n_clientes')
                        ->havingRaw('sum(visitas.n_entradas) < guia.n_clientes')
                        ->get();
        }
        public function insertar($visita) {
            Visita::create([
                'user_id' => $visita['user_id'],
                'guia_id' => $visita['guia'],
                'fecha_visita' => $visita['fecha_visita'],
                'n_entradas' => $visita['n_entradas'],
                'ruta_id' => $visita['ruta'],
            ]);
            
        }
    }

?>