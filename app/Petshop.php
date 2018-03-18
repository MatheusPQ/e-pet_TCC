<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petshop extends Model
{
    protected $fillable = [
        'nomeFantasia',
        'razaoSocial',
        'cnpj',
        'cep',
        'endereco',
        'uf',
        'cidade',
        'bairro',
        'telefone',
        'informacao',
        'horarioAbertura',
        'horarioFechamento'
    ];
}
