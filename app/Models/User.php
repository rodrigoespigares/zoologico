<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'subname',
        'email',
        'password',
        'rol',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function obtenerIdUsuarioActual()
    {
        // Verifica si hay un usuario autenticado
        if (Auth::check()) {
            // Obtiene el ID del usuario autenticado
            $idUsuario = Auth::id();
            
            // Puedes usar $idUsuario según tus necesidades
            return $idUsuario;
        } else {
            // No hay usuario autenticado
            return "No hay usuario autenticado";
        }
    }
    public function obtenerRol ()
    {
        // Verifica si hay un usuario autenticado
        if (Auth::check()) {
            return $this->attributes['rol'];
        } else {
            // No hay usuario autenticado
            return false;
        }
    }
}
