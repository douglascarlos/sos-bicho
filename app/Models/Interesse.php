<?php

namespace SOSBicho\Models;

use Illuminate\Database\Eloquent\Model;

class Interesse extends Model
{
    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

    public function pessoa()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
