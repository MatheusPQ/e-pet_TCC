<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PetshopServico extends Model
{
    public $incrementing = false;

    protected $fillable = [
        'petshop_id',
        'servico_id'
    ];

    public function servico(){
        return $this->belongsTo('App\Servicos');
    }
}
