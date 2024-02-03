<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
    use HasFactory;
    protected $table = 'visitas';
    

    protected $fillable = [
        "user_id",
        "guia_id",
        "fecha_visita",
        "cancelado",
        "n_entradas",
        "ruta_id",

    ];
    protected $primaryKey = "id";
    protected $guarded = ['id'];
}
