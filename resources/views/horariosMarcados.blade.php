@if($horarios->count() > 0)
    <table class="table table-hover" id="tabela_marcarHorario">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Data/Horário</th>
                <th scope="col">Funcionário</th>
                <th scope="col">Status</th>
                <th scope="col">Serviço</th>
                <th scope="col">Cliente</th>
                <th scope="col">Raça</th>
                <th scope="col">Preço</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($horarios as $horario)
            @php
                if($horario->status == "DISPONIVEL"){
                    $span = "primary";
                } elseif($horario->status == "MARCADO") {
                    $span = "warning";
                } elseif($horario->status == "ATENDIDO") {
                    $span = "success";                    
                } elseif($horario->status == "CANCELADO") {
                    $span = "danger";                    
                }
            @endphp
                <tr>
                    <td>{{ date('d/m/Y', strtotime($horario->data) ) }} - {{date('H:i', strtotime($horario->hora) )}} </td>
                    <td>{{$horario->funcionario->nome}}</td>
                    <td>
                        <span class="badge badge-{{$span}}">{{$horario->status}}</span>
                    </td>
                    <td>{{$horario->servico}}</td>
                    <td>{{$horario->user->name}}</td>
                    <td>{{$horario->raca->raca}}</td>
                    <td>R$ {{$horario->preco}}</td>
                    <td>
                        <a href="#" id="btn-atendido" class="btn btn-success btn-sm" data-dia="{{$horario->data}}" data-hora="{{$horario->hora}}" data-funcionario="{{$horario->funcionario_id}}">Atendido</a>
                        <a href="#" id="btn-cancelado" class="btn btn-danger btn-sm" data-dia="{{$horario->data}}" data-hora="{{$horario->hora}}" data-funcionario="{{$horario->funcionario_id}}">Cancelado</a>
                        <a href="#" id="btn-desmarcar" class="btn btn-primary btn-sm" data-dia="{{$horario->data}}" data-hora="{{$horario->hora}}" data-funcionario="{{$horario->funcionario_id}}">Desmarcar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <div class="card border-primary">
        <div class="card-body text-primary">
            <h5 class="card-title mb-0">Não há nenhum horário marcado para a data selecionada!</h5>
        </div>
    </div>
@endif
    
{{ $horarios->links() }}