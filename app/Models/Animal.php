<?php

namespace SOSBicho\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{

    public function porte()
    {
        return $this->belongsTo(Porte::class);
    }

    public function raca()
    {
        return $this->belongsTo(Raca::class);
    }
}
