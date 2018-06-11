<?php

namespace App\Http\Controllers;

use App\User;
use App\Agenda;
use App\Petshop;
use App\FuncionarioPetshop;

use App\PetshopServicoRaca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
                        ->orderBy('hora')
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

    public function buscarServicosMaisUtilizados(){
        $results = DB::table('agendas')
                     ->select(DB::raw('count(servico) as total, servico'))
                     ->where('servico', '<>', NULL) //COLOCAR OUTRO WHERE PARA APENAS STATUS ATENDIDO
                     ->groupBy('servico')
                     ->get();

        $servicos = [];

        foreach ($results as $result) {
            $servicos['servicos'][] = $result->servico;
            $servicos['total'][] = $result->total;
        }
        
        return $servicos;
    }

    public function buscarRacasEmDestaque(){
        // $results = DB::table('agendas')
        $results = Agenda::select(DB::raw('count(raca_id) as total, raca_id'))
                     ->where('raca_id', '<>', NULL)
                     ->with('raca')
                     ->groupBy('raca_id')
                     ->get();

        // dd($results[0]);
        $racas = [];

        foreach ($results as $result) {
            $racas['racas'][] = $result->raca->raca;
            $racas['total'][] = $result->total;
        }
        // dd($servicos);
        return $racas;
    }

    public function buscarEstatisticasAdmin(){
        $valores            = Agenda::where('preco', '<>', NULL)->where('status', "ATENDIDO")->sum("preco");
        $total_petshops     = Petshop::count();
        $num_atendimentos   = Agenda::where("status", "ATENDIDO")->count();
        $proprietarios      = User::where("nivel", 2)->count();
        $usuarios           = User::where("nivel", 3)->count();
        $usuarios_total     = User::where("nivel", "<>", 1)->count();

        $results = [
            "valores" => $valores,
            "total_petshops" => $total_petshops,
            "atendimentos" => $num_atendimentos,
            "proprietarios" => $proprietarios,
            "usuarios" => $usuarios,
            "usuarios_total" => $usuarios_total
        ];

        return $results;
    }

    public function buscarNumeroPetshopsPorCidade(){
        $results = Petshop::select(DB::raw('count(cidade) as total_cidade, cidade'))
                     ->groupBy('cidade')
                     ->get();
        // dd($cidades);
        $cidades = [];
        foreach ($results as $result) {
            $cidades['cidades'][] = $result->cidade;
            $cidades['total'][] = $result->total_cidade;          
        }
        return $cidades;
    }
}