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

    public function moto(): BelongsTo
    {
        return $this->belongsTo(Moto::class);
    }

    public function getUrl(){
        if(str_starts_with($this->imagen_path, 'http')){
            return $this->imagen_path;
        }
        return Storage::url($this->imagen_path);
    }
}
