<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Funcionario;
use App\FuncionarioPetshop;
use App\Petshop;

class FuncionarioController extends Controller
{
    function __construct(){
        //Verificar se user está logado
        $this->middleware('auth');
    }

    //Abre a tela de funcionários.
    public function create($id){
        $petshop = Petshop::find($id);
        return view('admin-petshop-funcionarios', compact('petshop'));
    }

    //Vai salvar o funcionário na tabela de funcionários.
    public function store($id, Request $req){
        $nome = $req->input('nome');
        $petshop_id = $id;

        $petshop = Petshop::find($petshop_id);

        $funcionario = Funcionario::create(['nome' => $nome]);
        FuncionarioPetshop::create(['funcionario_id' => $funcionario->id, 'petshop_id' => $petshop_id]);
        // return response()->json($datasComHorarios);
    }

    public function buscarFuncionarios($petshop_id){
        return FuncionarioPetshop::with('funcionario')->where('petshop_id', $petshop_id)->get();
    }

}
