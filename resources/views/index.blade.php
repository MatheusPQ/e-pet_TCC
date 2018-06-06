@extends('principal')
@section('conteudo')

@if(session()->has('erro'))

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong> {{session('erro')}} </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

@endif

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
<section class="topo pt-0">
    <div class="background-image"></div>
    <div class="jumbotron jumbotron-fluid text-light">
        <div class="container">
            <h1 class="display-4">E-Pet</h1>
            <p class="lead">Encontre o petshop ideal para seu cãozinho!</p>
            <hr class="bg-light">
            <p class="lead">
                {{-- <a class="btn btn-outline-primary btn-lg" href="#" role="button">Cadastrar meu petshop!</a> --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Buscar petshop:</label>
                    <input type="text" class="form-control" id="txt_buscarPetshop" placeholder="Buscar...">
                </div>
                <div class="form-row">
                    {{-- <label>Filtrar por:</label> --}}
                    <button id="btn_buscarNomePetshop" class="btn btn-primary col-md ml-1 mr-1 mb-1">Nome do petshop</button>
                    <button id="btn_buscarAvaliacaoPetshop" class="btn btn-primary col-md ml-1 mr-1 mb-1">Avaliação</button>
                    {{-- <button class="btn btn-primary col-md ml-1 mr-1 mb-1">Serviço</button> --}}
                    
                    <div class="btn-group col-md pl-0 pr-0" role="group">
                        <button id="btn_buscarServico" type="button" class="btn btn-primary dropdown-toggle ml-1 mr-1 mb-1 col-md " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Serviço
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btn_buscarServico">
                            @foreach($servicos as $servico)
                                <a class="dropdown-item" href="#" id=" {{$servico->id}} "> {{$servico->servico}} </a>                   
                            @endforeach
                        </div>
                    </div>
                    {{-- @if(Auth::check())
                        <button id="btn_buscarCidadePetshop" class="btn btn-primary col-md ml-1 mr-1 mb-1">Mesma cidade</button>
                    @endif --}}
                </div>
                <div class="form-row">
                    <div class="btn-group col-md">
                        <div class="custom-control custom-checkbox pull-right">
                            <input type="checkbox" class="custom-control-input" id="check_buscarCidadePetshop" {{Auth::check() ?:"disabled"}} >
                            <label class="custom-control-label" for="check_buscarCidadePetshop">Buscar na minha cidade</label>
                        </div>

                    </div>
                </div>
            </p>
        </div>
    </div>
</section>

<div class="container">

    {{-- <section class="topo3">
        <div class="form-group">
          <label for="exampleInputEmail1">Buscar petshop:</label>
          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Buscar...">
        </div>
    </section> --}}

    <section class="conteudo">
        <div class="card">
            {{-- <h5 class="card-header"><strong>Petshops</strong></h5> --}}
            <div class="card-body">
                <h5 class="card-title"><b>Petshops</b></h5>
                <hr>
                <div id="lista_petshops">                
                    @forelse($petshops as $petshop)
                        <div class="card bg-light">
                                {{-- <img class="card-img-top" src="/img/Imagem18.jpg" alt="Card image cap"> --}}
                            <div class="card-body">
                                {{-- <h4 class="pull-right"><i class="icon-star" style="color: #FFD119;"></i> {{ $petshop->media_avaliacoes }} <small class="text-muted">/ 5</small></h4> --}}
                                <h4 class="pull-right">
                                    @for($i = 1; $i <= $petshop->media_avaliacoes; $i++)
                                        <i class="icon-star" style="color: #FFD119;"></i>
                                    @endfor
                                </h4>
                                <h4 class="card-title">{{ $petshop->nomeFantasia }}</h4>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $petshop->cidade }} - {{ $petshop->uf }} </h6>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $petshop->endereco }}, nº {{ $petshop->numero }}</h6>
                                <hr>
                                <p class="card-text"> <b>Serviços oferecidos: </b>
                                    @forelse($petshop->petshopservicos as $petshopservico)
                                        {{ $loop->last ? $petshopservico->servico->servico : $petshopservico->servico->servico.', ' }}
                                    @empty
                                        Nenhum serviço disponível.
                                    @endforelse
                                </p>
                                <hr>
                                <a href="{{route('petshop.show', ['id' => $petshop->id]) }}" class="btn btn-success btn-block">Marcar horário</a>
                            </div>
                        </div>
                    @empty
                        <p>Oops! Houve um erro ao carregar os petshops! Tente novamente!</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

</div>

@section('script')
    <script src="/js/index.js"></script>
@endsection


@stop
