<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cilindrada extends Model
{

    use hasFactory;

    public $timestamps = false;

    protected $fillable = ['name'];

    public function motos(): HasMany
    {
        return $this->hasMany(Moto::class);
    }
}
