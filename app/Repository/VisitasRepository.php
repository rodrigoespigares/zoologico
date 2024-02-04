<?php 

    namespace App\Repository;

use App\Models\Visita;

    class VisitaRepository{
        protected Visita $model;
        public function __construct(Visita $model)
        {
            $this->model = $model;   
        }
    }

?>