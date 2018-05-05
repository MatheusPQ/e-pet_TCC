@extends('principal')
@section('conteudo')

<div class="container">

    {{-- <section class="topo3">
        <div class="form-group">
          <label for="exampleInputEmail1">Buscar petshop:</label>
          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Buscar...">
        </div>
    </section> --}}

    <section class="conteudo">
            @forelse($petshops as $petshop)

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $petshop->petshop->nomeFantasia }}</h4>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $petshop->petshop->cidade }} - {{ $petshop->petshop->uf }} | <span class="card-text avaliacao">Avaliação: 4.3/5</span></h6>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $petshop->petshop->endereco }}, nº {{ $petshop->petshop->numero }} </h6>
                        <hr>
                        <p class="card-text"> <b>Serviços oferecidos: </b>
                            @forelse($petshop->petshop->petshopservicos as $petshopservico)
                                {{ $loop->last ? $petshopservico->servico->servico : $petshopservico->servico->servico.', ' }}
                            @empty
                                Nenhum serviço disponível.
                            @endforelse
                        </p>
                        <hr>
                        <a href="{{route('admin', ['id' => $petshop->petshop->id]) }}" class="btn btn-dark btn-block">Área administrativa</a>
                        <a href="{{route('petshop.show', ['id' => $petshop->petshop->id]) }}" class="btn btn-success btn-block">Página do petshop</a>
                    </div>
                </div>

            @empty
                <p>Você não tem nenhum petshop cadastrado! Clique no seu nome no canto superior direito e selecione "Cadastrar um petshop"!</p>
            @endforelse
    </section>

</div>

@section('script')
    <script src="/js/index.js"></script>
@endsection


@stop
