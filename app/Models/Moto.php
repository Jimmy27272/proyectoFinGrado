<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\MotoTipo;
use App\Models\Cilindrada;
use App\Models\Fabricante;
use App\Models\User;
use App\Models\Ciudad;
use App\Models\Modelo;
use App\Models\MotoImagen;
use App\Models\MotoFeatures;
use Illuminate\Support\Carbon; // Carbon se usa para manejar fechas y horas de manera más sencilla



class Moto extends Model
{
    use SoftDeletes; 
    use HasFactory;

   protected $fillable = [
        'fabricante_id',
        'modelo_id',
        'year',
        'precio',
        'vin',
        'kilometros',
        'moto_tipo_id',
        'cilindrada_id',
        'user_id',
        'ciudad_id',
        'direccion',
        'phone',
        'descripcion',
        'published_at'
    ];

    public function MotoTipo(): BelongsTo{ // Relación de pertenencia a un tipo de moto
        return $this->belongsTo(MotoTipo::class);
    }

    public function cilindrada(): BelongsTo{ // Relación de pertenencia a una cilindrada
        return $this->belongsTo(Cilindrada::class);
    }
    

    public function fabricante(): BelongsTo{ // Relación de pertenencia a un fabricante
        return $this->belongsTo(Fabricante::class);
    }

      public function modelo(): BelongsTo{ // Relación de pertenencia a un modelo
        return $this->belongsTo(\App\Models\Modelo::class);
    }

    public function owner(): BelongsTo{ // Relación de pertenencia a un usuario (dueño de la moto)
        return $this->belongsTo(User::class, 'user_id');
    }

    public function ciudad(): BelongsTo{ // Relación de pertenencia a una ciudad
        return $this->belongsTo(Ciudad::class);
    }


    public function features(): HasOne{ // Relación uno a uno con la tabla moto_features
        return $this->hasOne(MotoFeatures::class);
    }

  
    public function primaryImage(): HasOne{ // Relación uno a uno con la tabla moto_imagenes, obteniendo la imagen con el valor más bajo de position
        return $this->hasOne(MotoImagen::class, 'moto_id')->oldestOfMany('position');
    }

    public function images(): HasMany{ // Relación uno a muchos con la tabla moto_imagenes, obteniendo todas las imágenes ordenadas por position
        return $this->hasMany(MotoImagen::class)->orderBy('position');
    }

    

    public function favouredUsers(): BelongsToMany{ // Relación muchos a muchos con la tabla motos_favoritas, obteniendo los usuarios que han marcado la moto como favorita
        return $this->belongsToMany(User::class, 'motos_favoritas', 'moto_id', 'user_id');
    }

    public function getCreatedDate(): string{ // Método para obtener la fecha de creación de la moto en formato 'Y-m-d'
        return (new Carbon($this->created_at))->format('Y-m-d');  
    }

    public function getTitle(){ // Método para obtener el título de la moto, que incluye el año, fabricante y modelo
        return $this->year . ' - ' . $this->fabricante->name . ' ' . $this->modelo->name;
    }


    
}
