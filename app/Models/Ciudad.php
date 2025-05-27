<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ciudad extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $table = 'ciudades'; 

    protected $fillable = ['name', 'comunidad_id'];

    public function comunidad(): BelongsTo{
        return $this->belongsTo(Comunidad::class);
    }

    public function motos(): HasMany
    {
        return $this->hasMany(Moto::class);
    }
}
