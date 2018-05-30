
@forelse($petshops as $petshop)
    <div class="card bg-light">
            {{-- <img class="card-img-top" src="/img/Imagem18.jpg" alt="Card image cap"> --}}
        <div class="card-body">
            <h4 class="pull-right"><i class="icon-star" style="color: #FFD119;"></i> {{ $petshop->media_avaliacoes }} <small class="text-muted">/ 5</small></h4>
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
    <div class="card border-danger mb-3">
        <div class="card-body text-danger">
            <h5 class="card-title mb-0">Não foi encontrado nenhum petshop!</h5>
            <p class="card-text">Tente novamente.</p>
        </div>
    </div>
@endforelse