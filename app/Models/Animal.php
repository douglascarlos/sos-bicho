<?php

namespace SOSBicho\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Animal extends Model
{

    protected $dates = ['nascimento'];

    protected $fillable = [
        'nome',
        'raca_id',
        'porte_id',
        'nascimento',
        'user_adocao_id',
    ];

    public function porte()
    {
        return $this->belongsTo(Porte::class);
    }

    public function raca()
    {
        return $this->belongsTo(Raca::class);
    }

    public function interesses()
    {
        return $this->hasMany(Interesse::class);
    }

    public function pessoasInteressadas()
    {
        return $this->belongsToMany(User::class, 'interesses');
    }

    public function userCadastro()
    {
        return $this->belongsTo(User::class, 'user_cadastro_id');
    }

    public function userAdocao()
    {
        return $this->belongsTo(User::class, 'user_adocao_id');
    }

    public function adotado()
    {
        return $this->userAdocao instanceof User;
    }

    public function scopeSearch($query, Request $request){
        if(!empty($request->get('porte_id'))){
            $query->where('porte_id', $request->get('porte_id'));
        }

        if(!empty($request->get('especie_id'))){
            $query->whereHas('raca', function($query) use ($request){
                $query->where('especie_id', $request->get('especie_id'));
            });
        }

        return $query->orderBy('nome')->get();
    }
}
