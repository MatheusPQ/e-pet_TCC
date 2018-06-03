@extends('principal')
@section('conteudo')

<input type="hidden" id="petshop_id" value="{{$petshop->id}}">

<div class="container">
    <nav id="navbar-admin" class="navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Área administrativa</a>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="{{route('admin', ['id' => $petshop->id])}}">Home</a>
                <a class="nav-item nav-link" href="{{route('admin.servicos', ['id' => $petshop->id])}}">Serviços</a>
                <a class="nav-item nav-link active" href="{{route('admin.servicoRaca', ['id' => $petshop->id])}}">Animais <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="{{route('admin.funcionarios', ['id' => $petshop->id])}}">Funcionários</a>
                <a class="nav-item nav-link" href="{{route('admin.editar', ['id' => $petshop->id])}}">Dados cadastrais </a>
            </div>
        </div>
    </nav>

    <div class="card">
        <div class="card-header">
            ADICIONAR ANIMAL
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.servicoRaca.novo', ['id' => $petshop->id]) }}">
                    @csrf
                    <h5 class="card-title">Selecionar raça</h5>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="raca">Raça</label>

                            {{--  <input id="raca" type="text" class="form-control{{ $errors->has('raca') ? ' is-invalid' : '' }}" name="raca" value="{{ old('raca') }}" required autofocus>  --}}
                            <select name="raca" id="raca" class="form-control{{ $errors->has('raca') ? ' is-invalid' : '' }}">
                                @foreach($racas as $raca)
                                    <option value="{{ $raca['id'] }}">{{ $raca['raca'] }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('raca'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('raca') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <hr>
                    <h5 class="card-title">Definir preços</h5>

                    <div class="form-row">
                        @foreach($petshop_servicos as $petshop_servico)
                            <div class="form-group col-md-4 col-sm-6">
                                <label for="preco">{{$petshop_servico->servico->servico}}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">R$</span>
                                    </div>
                                    <input id="{{ $petshop_servico->servico->id }}" type="text" class="form-control input-preco" name="preco[]">
                                    <div class="input-group-append">
                                        {{--  <button class="btn btn-success" type="button"><i class="material-icons">check</i></button>
                                        <button class="btn btn-danger" type="button">X</button>  --}}
                                        <a name="btn-salvarPreco" data-servicoid="{{ $petshop_servico->servico->id }}" href="#" class="btn btn-success btn-salvarPreco">
                                            <i class="material-icons">check</i>
                                        </a>
                                        {{-- <a name="btn-zerarPreco"  data-servicoid="{{ $petshop_servico->servico->id }}" href="#" class="btn btn-danger btn-zerarPreco">
                                            <i class="material-icons">clear</i>
                                        </a> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                
            </form>
        </div>
    </div>
</div>


@section('script')
    <script src="/js/racas.js"></script>
@endsection

@stop