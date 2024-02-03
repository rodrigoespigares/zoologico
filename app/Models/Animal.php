<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    protected $table = 'animales';
    protected $fillable = [
        "nombre",
        "n_cientifico",
        "descripcion",
        "foto",
        "visitable",
        "cuidador_id",
        "ruta_id",
    ];
    protected $primaryKey = "id";
    protected $guarded = ['id'];
}
