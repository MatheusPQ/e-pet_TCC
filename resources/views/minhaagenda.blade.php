@extends('principal')
@section('conteudo')

<div class="container">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><b>Minha agenda</b></h5>
            <hr>
            {{-- <p class="card-text mb-0"> <b>Endereço: </b> {{ $petshop->endereco }}, nº 123 </p>
            <p class="card-text mb-0"> <b>Localização: </b> {{ $petshop->bairro }} - {{ $petshop->cidade }} - {{ $petshop->uf }} </p>
            <p class="card-text mb-0"> <b>Telefone: </b> {{ $petshop->telefone }} </p>
            <p class="card-text mb-0"> <b>E-mail: </b> {{ $petshop->email }} </p> --}}

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
        </div>
    </div>
</div>

@section('script')
    <script src="/js/minhaAgenda.js"></script>
@endsection

@stop