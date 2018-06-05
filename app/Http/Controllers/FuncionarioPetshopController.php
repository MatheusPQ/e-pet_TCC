<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\FuncionarioPetshop;
use App\Petshop;
use App\Agenda;

class FuncionarioPetshopController extends Controller
{
    public function store($petshop_id, Request $req){
        $data_inicio            = Carbon::parse($req->input('start'));
        $data_fim               = Carbon::parse($req->input('end'));
        $atende_aos_domingos    = $req->input('domingos'); //Se 1, atende aos domingos. Se 0, não atende aos domingos.
        $funcionario_id         = $req->input('funcionario_id');
        $petshop = Petshop::find($petshop_id);

        $datas = $this->buscarDatasEntreInicioEFim($data_inicio, $data_fim, $atende_aos_domingos);

        $horarioAbertura = Carbon::parse($petshop->horarioAbertura);
        $horarioFechamento = Carbon::parse($petshop->horarioFechamento);

        $horarios = $this->definirHorariosEntreAberturaEFechamento($horarioAbertura, $horarioFechamento);

        foreach($datas as $data){
            foreach($horarios as $hora) {
                $agenda = Agenda::where("funcionario_id", $funcionario_id)
                                ->where("data", $data)
                                ->where("hora", $hora)
                                ->first();
                if(!$agenda){ //Verificando se horário já existe, pra evitar dados duplicados
                    $agenda = new Agenda;
                    $agenda->funcionario_id = $funcionario_id;
                    // $agenda->petshop_id = $petshop_id;
                    $agenda->data = $data;
                    $agenda->hora = $hora;
                    $agenda->save();
                }
            }
        }
        
        // return response()->json($datasComHorarios);
    }

    //Vai definir os horários que o funcionário está disponível para atender um cliente.
    //Aqui no caso os horários de atendimento estão 'chumbados' com um intervalo de trinta minutos por atendimento...
    //Aí, os horários aqui definidos serão os horários que os usuários poderão marcar um atendimento!
    public function definirHorariosEntreAberturaEFechamento(Carbon $abertura, Carbon $fechamento){
        $horarios = [];
        for($horario = $abertura; $horario->lt($fechamento); $horario->addMinutes(30)){
            $horarios[] = $horario->toTimeString();
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

    public function delete(Request $req){
        
        $where = [
            "funcionario_id" => $req->input('funcionario_id'),
            "data" => $req->input('data'),
            "hora" => $req->input('hora')
        ];

        $agenda = Agenda::where($where)->first()->delete();//->delete();
        // dd($agenda);
        // return true;

    }
}
