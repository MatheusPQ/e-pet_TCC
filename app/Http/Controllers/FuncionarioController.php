<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

use App\Funcionario;
use App\FuncionarioPetshop;
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

    public function store($id, Request $req){
        $data_inicio = Carbon::parse($req->input('start'));
        $data_fim = Carbon::parse($req->input('end'));
        $atende_aos_domingos = $req->input('domingos'); //Se 1, atende aos domingos. Se 0, não atende aos domingos.
        $nome = $req->input('nome');
        $petshop_id = $id;

        $petshop = Petshop::find($petshop_id);

        $datas = $this->buscarDatasEntreInicioEFim($data_inicio, $data_fim, $atende_aos_domingos);

        // dd($datas[0]);

        $horarioAbertura = Carbon::parse($petshop->horarioAbertura);
        $horarioFechamento = Carbon::parse($petshop->horarioFechamento);

        // $datasComHorarios = $this->denifirHorariosParaCadaData($horarioAbertura, $horarioFechamento, $datas);
        $horarios = $this->denifirHorariosParaCadaData($horarioAbertura, $horarioFechamento);
        // dd($horarios);

        // dd( $datasComHorarios[$datas[0]] );
        // dd(array_keys($datasComHorarios));
        // $keys = array_keys($datasComHorarios);

        // for($i = 0; $i < count($datas); $i++){

        // return response()->json($datasComHorarios);

        $funcionario = Funcionario::create(['nome' => $nome]);

        foreach($datas as $data){

            foreach($horarios as $hora) {
                $funcionarioPetshop = new FuncionarioPetshop;
                $funcionarioPetshop->funcionario_id = $funcionario->id;
                $funcionarioPetshop->petshop_id = $petshop_id;
                $funcionarioPetshop->data = $data;
                $funcionarioPetshop->hora = $hora;
                $funcionarioPetshop->save();
            }
        }

        // $funcionarioPetshop = new FuncionarioPetshop;

        // foreach($datasComHorarios as $data){
            
        // }

        // return redirect()->route('admin.funcionariopetshops.store', [$petshop])->with(['funcionario' => $funcionario]);
        // dd($datasComHorarios);
    }

    //Vai definir os horários que o funcionário está disponível para atender um cliente.
    //Aqui no caso os horários de atendimento estão 'chumbados' com um intervalo de trinta minutos por atendimento...
    //Aí, os horários aqui definidos serão os horários que os usuários poderão marcar um atendimento!
    public function denifirHorariosParaCadaData(Carbon $abertura, Carbon $fechamento){
        // $datasComHorarios = [];
        $horarios = [];

        for($horario = $abertura; $horario->lt($fechamento); $horario->addMinutes(30)){
            // foreach($datas as $data){
                // $datasComHorarios[$data][] = $horario->toTimeString();
                $horarios[] = $horario->toTimeString();
            // }
        }

        return $horarios;
    }

    //Busca todas as datas entre as variáveis $inicio e $fim.
    //Se $domingos for 1, inclui os domingos. Senão, não inclui os domingos!
    public function buscarDatasEntreInicioEFim(Carbon $inicio, Carbon $fim, $domingos){
        $datas = [];

        for($data = $inicio; $data->lte($fim); $data->addDay()) {

            if($domingos == 0){
                if($data->dayOfWeek != Carbon::SUNDAY){
                    $datas[] = $data->format('Y-m-d');
                }
            } else {
                $datas[] = $data->format('Y-m-d');
            }

        }

        return $datas;
    }
}
