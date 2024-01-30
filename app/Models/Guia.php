<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guia extends Model
{
    use HasFactory;
    protected $table = 'guia';
    protected $primaryKey = "user_id, guia_id";
    protected $hidden = ["user_id", "guia_id"];
}
