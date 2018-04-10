@extends('principal')
@section('conteudo')

{{--  <div id="bg">
    <img id="img-fundo" src="/img/main2.jpg" alt="">
</div>

<section class="topo">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">E-Pet</h1>
            <p class="lead">A maior 'rede social' de petshops do mundo!</p>
            <hr>
            <p class="lead">
                <a class="btn btn-outline-primary btn-lg" href="#" role="button">Cadastrar meu petshop!</a>
            </p>
        </div>
    </div>
</section>  --}}

{{--  <section class="topo2">
    <div class="background-image" style="background-image: url(img/main2.jpg)"></div>
    <div class="topo2-conteudo">
        <h1>E-Pet</h1>
        <h3>A maior rede social de petshops do mundo!</h3>

        <a href="" class="btn btn-outline-light">Cadastrar meu petshop!</a>
        <a href="" class="btn btn-outline-light">Ler mais!</a>
    </div>
</section>  --}}

<div class="container">

    <section class="topo3">
        <div class="form-group">
          <label for="exampleInputEmail1">Buscar petshop:</label>
          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Buscar...">
        </div>
    </section>

    <section class="conteudo">
        {{-- <div class="card-columns"> --}}
        {{-- <div class="card-group"> --}}
            @forelse($petshops as $petshop)

                <div class="card">
                        {{-- <img class="card-img-top" src="/img/Imagem18.jpg" alt="Card image cap"> --}}
                    <div class="card-body">
                        <h4 class="card-title">{{ $petshop->nomeFantasia }}</h4>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $petshop->cidade }} - {{ $petshop->uf }} | <span class="card-text avaliacao">Avaliação: 4.3/5</span></h6>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $petshop->endereco }}, nº 000</h6>
                        <hr>
                        <p class="card-text"> <b>Serviços oferecidos: </b>
                            @forelse($petshop->petshopservicos as $petshopservico)
                                {{ $loop->last ? $petshopservico->servico->servico : $petshopservico->servico->servico.', ' }}
                            @empty
                                Nenhum serviço disponível.
                            @endforelse
                        </p>
                        {{-- <p class="card-text">Banho: <span class="preco"> R$15,00</span></p>
                        <p class="card-text">Tosa: <span class="preco"> R$15,00</span></p> --}}
                        <hr>
                        <a href="#" class="btn btn-success btn-block">Marcar horário</a>
                    </div>
                </div>

            @empty
                <p>Oops! Houve um erro ao carregar os petshops! Tente novamente!</p>
            @endforelse
            {{-- <div class="card">
                <img class="card-img-top" src="/img/Imagem18.jpg" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">TESTE</h4>
                    <h6 class="card-subtitle mb-2 text-muted">CIDADE - UF</h6>
                    <hr>
                    <p class="card-text avaliacao">Avaliação: 4.3/5</p>
                    <hr>
                    <p class="card-text">
                        UM, DOIS, TRÊS, UM, DOIS, TRÊS, UM, DOIS, TRÊS, UM, DOIS, TRÊS, UM, DOIS, TRÊS, UM, DOIS, TRÊS, UM, DOIS, TRÊS, UM, DOIS, TRÊS, UM, DOIS, TRÊS, 
                    </p>
                    <hr>
                    <a href="#" class="btn btn-success btn-block">Marcar horário</a>
                </div>
            </div> --}}
        {{-- </div> --}}
        {{-- </div> --}}
    </section>

</div>

@section('script')
    <script src="/js/index.js"></script>
@endsection


@stop
