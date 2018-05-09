<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Funcionario;
use App\Petshop;

class FuncionarioController extends Controller
{
    function __construct(){
        //Verificar se user está logado
        $this->middleware('auth');
    }

    public function create($id){
        $petshop = Petshop::find($id);
        return view('admin-petshop-funcionarios', compact('petshop'));
    }
}
