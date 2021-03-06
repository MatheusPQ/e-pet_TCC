<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PetshopServicoRaca extends Model
{
    public $incrementing = false;

    protected $fillable = [
        'petshop_id',
        'servico_id',
        'raca_id',
        'preco',
    ];

    protected $table = 'petshopservicoracas';

    public function servico(){
        return $this->belongsTo('App\Servicos');
    }

    public function raca(){
        return $this->belongsTo('App\Raca');
    }
}
