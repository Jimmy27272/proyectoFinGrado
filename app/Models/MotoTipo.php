<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MotoTipo extends Model
{

    use HasFactory;
    
    public $timestamps = false;

    protected $fillable = ['name'];

   public function motos(): HasMany{ // Relación uno a muchos con la tabla motos
        return $this->hasMany(Moto::class);
    }
   }
