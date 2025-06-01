<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cilindrada extends Model
{

    use hasFactory;

    public $timestamps = false; // Indica que no se usan timestamps en esta tabla

    protected $fillable = ['name']; // Atributos que se pueden asignar masivamente

    public function motos(): HasMany // Relación uno a muchos con la tabla motos
    {
        return $this->hasMany(Moto::class); 
    }
}
