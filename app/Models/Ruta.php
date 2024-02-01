<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    use HasFactory;
    protected $table = 'ruta';
    protected $fillable = [
        "nombre",
        "descripcion",
        "foto",
    ];
    protected $primaryKey = "id";
    protected $guarded = ['id'];
}
