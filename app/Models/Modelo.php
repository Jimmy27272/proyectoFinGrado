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

    public function fabricante(): BelongsTo
    {
        return $this->belongsTo(Fabricante::class);
    }

    public function motos(): HasMany
    {
        return $this->hasMany(Moto::class);
    }

}

    
