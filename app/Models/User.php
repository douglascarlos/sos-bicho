<?php

namespace SOSBicho\Models;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeSearch($query, Request $request){
        if(!empty($request->get('name'))){
            $query->where('name', 'like', "%{$request->get('name')}%");
        }

        return $query->get();
    }
}
