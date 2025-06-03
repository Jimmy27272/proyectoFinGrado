<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Modelo extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $fillable = ['name', 'fabricante_id'];

    public function fabricante(): BelongsTo // Relación de pertenencia a un fabricante
    {
        return $this->belongsTo(Fabricante::class);
    }

    public function motos(): HasMany // Relación uno a muchos con la tabla motos
    {
        return $this->hasMany(Moto::class);
    }

}

    
