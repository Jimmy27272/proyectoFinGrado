<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'google_id',
        'facebook_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function favouriteMotos(): BelongsToMany{ // Relación muchos a muchos con la tabla motos_favoritas
        return $this->belongsToMany(Moto::class, 'motos_favoritas', 'user_id', 'moto_id') // usa la tabla pivote motos_favoritas
        ->withPivot('id') // incluye el campo id de la tabla pivote
        ->orderBy('motos_favoritas.id', 'desc'); // ordena por el campo id de la tabla pivote
    }

    public function motos(): HasMany // Relación uno a muchos con la tabla motos
    {
        return $this->hasMany(Moto::class);
    }

    public function isAdmin(): bool // Método para verificar si el usuario es administrador
    {
        return $this->role === 'admin'; // Verifica si el rol del usuario es 'admin'
    }


}
