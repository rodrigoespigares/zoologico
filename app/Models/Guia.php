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
        "visitable",
    ];
    protected $primaryKey = "id";
    protected $guarded = ['id'];
    public function user() {
        return $this->belongsTo(User::class, 'guia_id', 'id');
    }
}
