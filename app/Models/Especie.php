<?php

namespace SOSBicho\Models;

use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
    public function racas()
    {
        return $this->hasMany(Raca::class);
    }

    public function animais()
    {
        return $this->hasManyThrough(Animal::class, Raca::class);
    }
}
