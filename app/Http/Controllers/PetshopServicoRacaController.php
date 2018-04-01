<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Petshop;
use App\PetshopServico;
use App\PetshopServicoRaca;
use App\Raca;

class PetshopServicoRacaController extends Controller
{
    public function create($id){
        $petshop = Petshop::find($id);
        $racas = Raca::all();
        $petshop_servicos = PetshopServico::where('petshop_id', $id)->get();
        // dd($petshop_servicos[0]);
        return view('admin-petshop-precos', compact('petshop', 'racas', 'petshop_servicos'));
    }

    public function store(Request $req){

        $petshopservicoraca = [
            "petshop_id" => $req->petshop_id,
            "servico_id" => $req->servico_id,
            "raca_id"    => $req->raca_id,
            "preco"      => $req->preco
        ];
        
        PetshopServicoRaca::create($petshopservicoraca);
    }

    public function buscarPrecos($id){
        // dd($id);
        $psr = PetshopServicoRaca::where('petshop_id', $id)->get();
        return $psr;
    }
}
