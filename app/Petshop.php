<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petshop extends Model
{
    protected $fillable = [
        'nomeFantasia',
        'razaoSocial',
        'cpf',
        'cnpj',
        'cep',
        'endereco',
        'uf',
        'cidade',
        'bairro',
        'telefone',
        'email',
        'informacao',
        'imagem',
        'horarioAbertura',
        'horarioFechamento'
    ];

    public function petshopservicos(){
        return $this->hasMany('App\PetshopServico');
    }
}
