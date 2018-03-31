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

    public function interesses()
    {
        return $this->hasMany(Interesse::class);
    }

    public function animaisInteressados()
    {
        return $this->belongsToMany(Animal::class, 'interesses');
    }

    public function hasInteresse(Animal $animal)
    {
        return !$this->interesses()->where('animal_id', $animal->id)->get()->isEmpty();
    }

    public function animaisCadastrados()
    {
        return $this->hasMany(Animal::class, 'user_cadastro_id');
    }

    public function isUserCadastro(Animal $animal)
    {
        return !$this->animaisCadastrados()->where('animals.id', $animal->id)->get()->isEmpty();
    }

    public function animaisAdotados()
    {
        return $this->hasMany(Animal::class, 'user_adocao_id');
    }

    public function scopeSearch($query, Request $request){
        if(!empty($request->get('name'))){
            $query->where('name', 'like', "%{$request->get('name')}%");
        }

        return $query->get();
    }
}
