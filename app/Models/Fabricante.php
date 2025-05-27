<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Fabricante extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name'];

    public function motos(): HasMany
    {
        return $this->hasMany(Moto::class);
    }

    public function modelos(): HasMany
    {
        return $this->hasMany(\App\Models\Modelo::class);
    }

    
}
