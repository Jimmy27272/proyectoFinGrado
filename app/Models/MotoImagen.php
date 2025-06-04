<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;



class MotoImagen extends Model
{
    use HasFactory;
    
    protected $table = 'moto_imagenes';
    
    public $timestamps = false;

    protected $fillable = [
    'imagen_path',
    'position'
    ];

    public function moto(): BelongsTo // Relación uno a muchos con la tabla motos
    {
        return $this->belongsTo(Moto::class);
    }

    public function getUrl(){
        if(str_starts_with($this->imagen_path, 'http')){ // si la ruta de la imagen empieza por http se retorna tal cual
            return $this->imagen_path;
        }
         return asset('storage/' . $this->imagen_path);// si no, se usa el Storage local para obtener la URL de la imagen
    }
}
