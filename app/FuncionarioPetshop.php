<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FuncionarioPetshop extends Model
{
    protected $fillable = [
        'petshop_id',
        'funcionario_id'
    ];

    public function funcionario(){
        return $this->belongsTo('App\Funcionario');
    }
}
