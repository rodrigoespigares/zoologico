<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guia extends Model
{
    use HasFactory;
    protected $table = 'guia';
    protected $fillable = [
        "guia_id",
        "n_clientes",
        "disponibles",
    ];
    protected $primaryKey = "id";
    protected $guarded = ['id'];
}
