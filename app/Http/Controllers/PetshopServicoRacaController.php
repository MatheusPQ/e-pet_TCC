<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Petshop;
use App\PetshopServico;
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

    }
}
