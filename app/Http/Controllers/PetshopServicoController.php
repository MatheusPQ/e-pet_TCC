<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Petshop;
use App\PetshopServico;

class PetshopServicoController extends Controller
{
    public function create($id){
        $petshop = Petshop::find($id);
        $petshop_servicos = PetshopServico::where('petshop_id', $id)->get();

        $petshop_servicos_ids = [];

        foreach($petshop_servicos as $ps){
            array_push($petshop_servicos_ids, $ps->servico_id);
        }

        return view('admin-petshop-servicos', compact('petshop', 'petshop_servicos_ids'));
    }

    public function store(Request $req){
        $petshop_id = $req->id;
        $servico_id = $req->servico_id;

        $dadosQuery = [
            'petshop_id' => $petshop_id,
            'servico_id' => $servico_id
        ];

        $petshop_servico = PetshopServico::where($dadosQuery)->first();

        if(isset($petshop_servico)){
            PetshopServico::where($dadosQuery)->delete();
        } else {
            PetshopServico::create($dadosQuery);
        }
    }
}
