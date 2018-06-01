
@if(session()->has('mensagem-meusHorariosMarcados'))

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Horário desmarcado!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

@endif

@if($horarios->count() > 0)
    <table class="table table-hover" id="tabela_minhaagenda">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Data/Horário</th>
                <th scope="col">Petshop</th>
                <th scope="col">Serviço</th>
                <th scope="col">Raça</th>
                <th scope="col">Preço</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($horarios as $horario)
                <tr>
                    <td>{{ date('d/m/Y', strtotime($horario->data) ) }} - {{date('H:i', strtotime($horario->hora) )}} </td>
                    <td>{{$horario->funcionario->funcionariopetshop->petshop->nomeFantasia}}</td>
                    <td>{{$horario->servico}}</td>
                    <td>{{$horario->raca->raca}}</td>
                    <td>R$ {{$horario->preco}}</td>
                    <td>
                        <a name="btn-desmarcarHorario" href="#" class="btn btn-danger btn-sm" 
                            data-funcionario="{{ $horario->funcionario_id }}"
                            data-dia="{{$horario->data}}"
                            data-hora="{{$horario->hora}}"> <b>X</b>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <div class="card border-primary mb-3">
        <div class="card-body text-primary">
            <h5 class="card-title mb-0">Você não tem nenhum horário marcado!</h5>
            {{-- <p class="card-text">Volte mais tarde.</p> --}}
        </div>
    </div>
@endif