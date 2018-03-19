<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Petshop;
use App\PetshopServico;

class PetshopServicoController extends Controller
{
    public function create($id){
        $petshop = Petshop::find($id);
        return view('cadastro-servico', compact('petshop'));
    }

    public function store(Request $req){
        $petshop_id = $req->id;

        foreach($req->servicos as $servico){
            PetshopServico::create(['petshop_id' => $petshop_id, 'servico_id' => $servico]);
        }

        return redirect('/');
    }
}
