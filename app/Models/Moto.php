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
use Illuminate\Support\Carbon; // Carbon is used for date formatting



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

    public function MotoTipo(): BelongsTo{
        return $this->belongsTo(MotoTipo::class);
    }

    public function cilindrada(): BelongsTo{
        return $this->belongsTo(Cilindrada::class);
    }
    

    public function fabricante(): BelongsTo{
        return $this->belongsTo(Fabricante::class);
    }

      public function modelo(): BelongsTo{
        return $this->belongsTo(\App\Models\Modelo::class);
    }

    public function owner(): BelongsTo{
        return $this->belongsTo(User::class, 'user_id');
    }

    public function ciudad(): BelongsTo{
        return $this->belongsTo(Ciudad::class);
    }


    public function features(): HasOne{
        return $this->hasOne(MotoFeatures::class);
    }

  
    public function primaryImage(): HasOne{
        return $this->hasOne(MotoImagen::class, 'moto_id')->oldestOfMany('position');
    }

    public function images(): HasMany{
        return $this->hasMany(MotoImagen::class)->orderBy('position');
    }

    

    public function favouredUsers(): BelongsToMany{
        return $this->belongsToMany(User::class, 'motos_favoritas', 'moto_id', 'user_id');
    }

    public function getCreatedDate(): string{
        return (new Carbon($this->created_at))->format('Y-m-d');  
    }

    public function getTitle(){
        return $this->year . ' - ' . $this->fabricante->name . ' ' . $this->modelo->name;
    }


    
}
