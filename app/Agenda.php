<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    
    public function funcionario(){
        return $this->belongsTo('App\Funcionario');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function raca(){
        return $this->belongsTo('App\Raca');
    }
}
