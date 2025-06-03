<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comunidad extends Model
{
    use HasFactory;

     protected $table = 'comunidades';

    public $timestamps = false;

    protected $fillable = ['name'];

    public function motos(): HasMany // Relación uno a muchos con la tabla motos
    {
        return $this->hasMany(Moto::class);
    }

    public function ciudades(): HasMany // Relación uno a muchos con la tabla ciudades
    {
        return $this->hasMany(Ciudad::class);
    }
}
