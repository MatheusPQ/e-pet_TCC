<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $fillable = [
        'nome'
    ];

    public function funcionariopetshop(){
        return $this->hasOne('App\FuncionarioPetshop');
    }
}
