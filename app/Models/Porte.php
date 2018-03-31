<?php

namespace SOSBicho\Models;

use Illuminate\Database\Eloquent\Model;

class Porte extends Model
{
    public function animais()
    {
        return $this->hasMany(Animal::class);
    }
}
