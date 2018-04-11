@extends('principal')
@section('conteudo')

<div class="container">
    <section class="petshop-servicos-topo">
        {{-- <div class="row"> --}}
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><b>{{ $petshop->nomeFantasia }}</b></h5>
                    {{-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> --}}
                    <hr>
                    {{-- <p class="card-text mb-0"> <b>Endereço: </b> {{ $petshop->endereco }}, nº 123 </p>
                    <p class="card-text mb-0"> <b>Localização: </b> {{ $petshop->bairro }} - {{ $petshop->cidade }} - {{ $petshop->uf }} </p>
                    <p class="card-text mb-0"> <b>Telefone: </b> {{ $petshop->telefone }} </p>
                    <p class="card-text mb-0"> <b>E-mail: </b> {{ $petshop->email }} </p> --}}
                    <table class="table-sm">
                        <tr>
                            <td> <b>Endereço: </b></td>
                            <td> {{ $petshop->endereco }}, nº 123</td>
                        </tr>
                        <tr>
                            <td> <b>Localização: </b></td>
                            <td> {{ $petshop->bairro }} - {{ $petshop->cidade }} - {{ $petshop->uf }}</td>
                        </tr>
                        <tr>
                            <td> <b>Telefone: </b></td>
                            <td> {{ $petshop->telefone }}</td>
                        </tr>
                        <tr>
                            <td> <b>E-mail: </b></td>
                            <td> {{ $petshop->email }}</td>
                        </tr>

                    </table>
                </div>
            </div>
        {{-- </div> --}}
    </section>

    <section class="petshop-servicos-precos">
        @if($petshop->petshopservicos->count() > 0)
            <div class="row">
                @foreach($petshop->petshopservicos as $petshopservico)
                    <div class="col-md-4">
                        <div class="card">
                            <h5 class="card-header"><b>{{ $petshopservico->servico->servico }}</b></h5>
                            <div class="card-body">
                                @foreach($petshop->petshopservicoracas as $petshopservicoraca)
                                    @if($petshopservicoraca->servico_id == $petshopservico->servico_id)
                                        <p class="card-text mb-0">{{ $petshopservicoraca->raca->raca}}:
                                            @if(!isset($petshopservicoraca->preco) || empty($petshopservicoraca->preco))
                                                <span class="indisponivel">Não definido</span>
                                            @else
                                                <span class="preco"> R${{$petshopservicoraca->preco}}</span>
                                            @endif
                                        </p>
                                        
                                {{-- <p class="card-text">Banho: <span class="preco"> R$15,00</span></p>
                                <p class="card-text">Tosa: <span class="preco"> R$15,00</span></p> --}}
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="card border-danger mb-3">
                <div class="card-body text-danger">
                    <h5 class="card-title">Este petshop ainda não publicou nenhum serviço!</h5>
                    <p class="card-text">Volte mais tarde.</p>
                </div>
            </div>
        @endif
    </section>

    <section class="petshop-servicos-selecionar">
        <div class="row">
                <div class="col-md-4">
                    @foreach($petshop->petshopservicos as $petshopservico)
                        <a class="card btn btn-light">
                            <div class="card-body">
                                <h4 class="mb-0"> {{$petshopservico->servico->servico}} </h4>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <h5 class="card-header"> <b>Marcar horário</b> </h5>
                        <div class="card-body">
                            <h5 class="card-title">Special title treatment</h5>
                            <input type="time" name="" class="form-control">
                            {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                        </div>
                    </div>
                </div>

        </div>

    </section>

</div>




{{-- @section('script')
    <script src="/js/index.js"></script>
@endsection --}}
@stop