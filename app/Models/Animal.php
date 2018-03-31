<?php

namespace SOSBicho\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Animal extends Model
{

    protected $dates = ['nascimento'];

//    public function setNascimentoAttribute($value)
//    {
//        if($value instanceof Carbon){
//            $this->attributes['nascimento'] = $value;
//        }
//        $this->attributes['nascimento'] = Carbon::createFromFormat('d/m/Y', $value);
//    }

    public function porte()
    {
        return $this->belongsTo(Porte::class);
    }

    public function raca()
    {
        return $this->belongsTo(Raca::class);
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

        return $query->get();
    }
}
