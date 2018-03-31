<?php

namespace SOSBicho\Models;

use Illuminate\Database\Eloquent\Model;

class Raca extends Model
{
    public function especie()
    {
        return $this->belongsTo(Especie::class);
    }

    public function animais()
    {
        return $this->hasMany(Animal::class);
    }
}
