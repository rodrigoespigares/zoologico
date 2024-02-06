<?php 

    namespace App\Repository;

use App\Models\Visita;
use App\Models\Guia;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use DateTime;

    class VisitaRepository{
        protected Visita $model;
        protected User $modelUser;
        public function __construct(Visita $model, User $modelUser)
        {
            $this->model = $model;   
            $this->modelUser = $modelUser;
        }
        public function getActivo($fecha, $n_entradas)
        {
            return User::select(
                'users.id',
                DB::raw('IFNULL(SUM(visitas.n_entradas), 0) as total_entradas'),
                'guia.n_clientes'
            )
            ->leftJoin('guia', 'users.id', '=', 'guia.guia_id')
            ->leftJoin('visitas', function ($join) use ($fecha) {
                $join->on('users.id', '=', 'visitas.guia_id')
                    ->whereDate('visitas.fecha_visita', $fecha)
                    ->where('visitas.cancelado', false);
            })
            ->groupBy('users.id', 'guia.n_clientes')
            ->havingRaw('guia.n_clientes >= IFNULL(SUM(visitas.n_entradas) + ?, 0)', [$n_entradas])
            ->get();
        }
        public function insertar($visita) {

            // Añadir ceros para formar un formato válido 'H-m-s'
            $string = str_pad($visita['hora'], 8, '00', STR_PAD_RIGHT);
            $horas = substr($string, 0, 2);
            $minutos = substr($string, 2, 2);
            $segundos = substr($string, 4, 2);

            // Crear un objeto DateTime
            $dateTime = DateTime::createFromFormat('H-i-s', "$horas-$minutos-$segundos");

            // Formatear según el formato deseado
            $horaFormateada = $dateTime->format('H:i:s');
            
            
            Visita::create([
                'user_id' => $visita['user_id'],
                'guia_id' => $visita['guia'],
                'fecha_visita' => $visita['fecha_visita'],
                'hora' => $horaFormateada,
                'precio' => 15,
                'n_entradas' => $visita['n_entradas'],
                'ruta_id' => $visita['ruta'],
            ]);
            
        }
        public function getVisitas($id) {
            return Visita::select('*')->where('user_id', '=', $id)->get();
            
        }
        public function cancelar($id) {
            Visita::where('id',$id)->update(['cancelado'=>true]);
            
        }
    }

?>