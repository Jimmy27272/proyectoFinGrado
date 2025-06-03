<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class MotoFeatures extends Model
{

    use HasFactory;
    
    public $timestamps = false;

    protected $primaryKey = 'moto_id';

    protected $fillable = [
    'moto_id',	
    'garantia',	
    'unico_propietario',	
    'limitable',
    'abs',	
    'control_crucero',	
    'bluetooth',	
    'puños',	
    'gps',	
    'alforjas',	
    'control_traccion',	
    'led',	
    'usb'	
    ];

    public function moto(): BelongsTo // Relación de pertenencia a una moto
    {
        return $this->belongsTo(Moto::class);
    }

}
