<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Petshop;
use App\PetshopServico;

class ServicosController extends Controller
{
    //Tela de seleção de serviços
    public function addServicos($id){
        // $petshop = Petshop::find($id);
        // return view('cadastro-servico', compact('petshop'));
    }

    //Salva os serviços selecionados no banco
    public function save(Request $req){
        // $petshop_id = $req->id;
        // // dd($petshop_id);

        // foreach($req->servicos as $servico){
        //     // dd($servico);
        //     PetshopServico::create(['petshop_id' => $petshop_id, 'servico_id' => $servico]);
        // }

        // return redirect('/petshop');
    }

    public function store(Request $req){

    }
}
