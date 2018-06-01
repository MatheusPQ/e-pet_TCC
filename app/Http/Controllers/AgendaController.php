<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use App\Funcionario;
use App\Agenda;
use App\FuncionarioPetshop;
use App\PetshopServicoRaca;

class AgendaController extends Controller
{
    public function index(){
        $horarios =  Agenda::where(['status' => "MARCADO", 'user_id' => Auth::id()])->with('raca')->get();
        return view('minhaagenda', compact('horarios'));
    }

    public function buscarAgenda($petshop_id, Request $req){
        $where = [
            'data'           => $req->input('data'),
            'funcionario_id' => $req->input('funcionario_id')
        ];

        return Agenda::where($where)
                        ->with('funcionario')
                        ->with('user')
                        ->with('raca')
                        ->get();
    }

    public function buscarHorarios($petshop_id, Request $req){
        $petshop_id = $req->input('petshop_id');

        $funcionarios = FuncionarioPetshop::where('petshop_id', $petshop_id)->get();
        $ids_funcionarios = [];

        foreach($funcionarios as $funcionario){
            $ids_funcionarios[] = $funcionario->id;
        }

        $where = [
            'data'       => $req->input('data'),
            'status'     => "DISPONIVEL"
        ];

        $horarios = Agenda::where($where)
                        ->whereIn('funcionario_id', $ids_funcionarios)
                        ->with('funcionario')
                        ->orderBy('hora')
                        ->paginate(15);
        return view('horariosDisponiveis', ['horarios' => $horarios])->render();
    }

    public function marcarHorario($petshop_id, Request $req){

        $where = [
            'petshop_id'    => $petshop_id,
            'servico_id'    => $req->input('servico_id'),
            'raca_id'       => $req->input('raca_id')
        ];

        $petshopServicoRaca = PetshopServicoRaca::where($where)->first();

        $where2 = [
            'funcionario_id'    => $req->input('funcionario_id'),
            'data'              => $req->input('data'),
            'hora'              => $req->input('hora')
        ];

        $agenda = Agenda::where($where2)->first();

        $agenda->status = "MARCADO";
        $agenda->servico = $petshopServicoRaca->servico->servico;
        $agenda->user_id = Auth::id();
        $agenda->raca_id = $req->input('raca_id');
        $agenda->preco = $petshopServicoRaca->preco;
        $agenda->save();
        session()->flash('mensagem-horariosDisponiveis', 'Sucesso');
    }

    public function desmarcarHorario(Request $req){
        $where = [
            'funcionario_id'    => $req->input('funcionario_id'),
            'data'              => $req->input('data'),
            'hora'              => $req->input('hora')
        ];
        $agenda = Agenda::where($where)->first();
        $agenda->status = "DISPONIVEL";
        $agenda->servico = null;
        $agenda->user_id = null;
        $agenda->raca_id = null;
        $agenda->preco = null;
        $agenda->save();

        $horarios =  Agenda::where(['status' => "MARCADO", 'user_id' => Auth::id()])->with('raca')->get();
        session()->flash('mensagem-meusHorariosMarcados', 'Sucesso');
        return view('meusHorariosMarcados', ['horarios' => $horarios])->render();
    }

    public function buscarHorariosMarcados($petshop_id, Request $req){
        $petshop_id = $req->input('petshop_id');

        $where = [
            'data'              => $req->input('data'),
            // 'status'            => "MARCADO",
            'funcionario_id'    => $req->input('funcionario_id')
        ];

        $horarios = Agenda::where($where)
                        ->where('status', '<>', "DISPONIVEL")
                        ->with('funcionario')
                        ->orderBy('hora')
                        ->paginate(10);
        return view('horariosMarcados', ['horarios' => $horarios])->render();
    }

    public function alterarStatusHorario($petshop_id, Request $req){
        // dd($req->all());

        $where = [
            'funcionario_id'    => $req->input('funcionario'),
            'data'              => $req->input('dia'),
            'hora'              => $req->input('hora')
        ];

        $agenda = Agenda::where($where)->first();
        $agenda->status = $req->input('status');
        if($req->input('status') == "DISPONIVEL"){
            $agenda->servico = null;
            $agenda->user_id = null;
            $agenda->raca_id = null;
            $agenda->preco = null;
        }
        $agenda->save();
    }
}
