<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function petshop()
    {
        return $this->belongsTo('App\Petshop');
    }

    public function salvarAvaliacaoDoPetshop($petshop_id, $avaliacao, $user_id)
    {
        $petshop = Petshop::find($petshop_id);

        $this->avaliacao = $avaliacao;
        $this->user_id = $user_id;
        $petshop->avaliacoes()->save($this);
        
        // Recalcular média de avaliações
        $petshop->recalcularMedia();
    }
}
