
@if(session()->has('mensagem-horariosDisponiveis'))

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Horário marcado! <a href="/agenda" class="alert-link">Clique aqui para acessar sua agenda.</a>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

@endif

@if($horarios->count() > 0)
    <table class="table table-hover" id="tabela_marcarHorario">
        <thead class="thead-dark">
            <tr>
                <th></th>
                <th scope="col">Data/Horário</th>
                <th scope="col">Funcionário</th>
            </tr>
        </thead>
        <tbody>
            @foreach($horarios as $horario)
                <tr>
                    <td><input type="radio" name="radio" id="btn_radioHorario" data-dia="{{$horario->data}}" data-hora="{{$horario->hora}}" data-funcionario="{{$horario->funcionario_id}}"></td>
                    <td>{{ date('d/m/Y', strtotime($horario->data) ) }} - {{date('H:i', strtotime($horario->hora) )}} </td>
                    <td>{{$horario->funcionario->nome}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <div class="card border-danger mb-3">
        <div class="card-body text-danger">
            <h5 class="card-title">Não há nenhum horário disponível para o dia selecionado!</h5>
            <p class="card-text">Selecione outra data.</p>
        </div>
    </div>
@endif
    
{{ $horarios->links() }}