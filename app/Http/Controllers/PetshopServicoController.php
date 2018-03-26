<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Petshop;
use App\PetshopServico;

class PetshopServicoController extends Controller
{
    public function create($id){
        $petshop = Petshop::find($id);
        $petshop_servico = PetshopServico::where('petshop_id', $id);
        return view('admin-petshop-servicos', compact('petshop', 'petshop_servico'));
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
