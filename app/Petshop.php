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
        'numero',
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

    public function petshopservicoracas(){
        return $this->hasMany('App\PetshopServicoRaca');
    }

    public function avaliacoes(){
        return $this->hasMany('App\Avaliacao');
    }

    public function recalcularMedia()
    {
      $avaliacoes = $this->avaliacoes();
      $mediaAvaliacoes = $avaliacoes->avg('avaliacao');
      $this->media_avaliacoes = round($mediaAvaliacoes,1);
      $this->total_avaliacoes = $avaliacoes->count();
      $this->save();
    }
}
