<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use App\Funcionario;
use App\Agenda;

class AgendaController extends Controller
{
    public function buscarAgenda($petshop_id, Request $req){
        // dd($req->all());

        $where = [
            'data'           => $req->input('data'),
            'funcionario_id' => $req->input('funcionario_id')
        ];

        // $funcionario = Funcionario::where($where)->first();
        return Agenda::where($where)
                        ->with('funcionario')
                        ->with('user')
                        ->with('raca')
                        ->get();
    }
}
