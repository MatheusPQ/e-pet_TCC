@extends('principal')
@section('conteudo')

<div class="container">
    <nav id="navbar-admin" class="navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Área administrativa</a>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="{{route('admin', ['id' => $petshop->id])}}">Home</a>
                <a class="nav-item nav-link" href="{{route('admin.servicos', ['id' => $petshop->id])}}">Serviços</a>
                <a class="nav-item nav-link active" href="{{route('admin.animais', ['id' => $petshop->id])}}">Animais <span class="sr-only">(current)</span></a>
            </div>
        </div>
    </nav>

    <div class="card">
        <div class="card-header">
            ADICIONAR ANIMAL
        </div>
        <div class="card-body">
            {{--  <h5 class="card-title">Special title treatment</h5>  --}}
            <form method="POST" action="{{ route('admin.animais.novo', ['id' => $petshop->id]) }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="raca">Raça</label>

                            <input id="raca" type="text" class="form-control{{ $errors->has('raca') ? ' is-invalid' : '' }}" name="raca" value="{{ old('raca') }}" required autofocus>

                            @if ($errors->has('raca'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('raca') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group col-md-4">
                            <label for="servico">Serviço</label>

                            <input id="servico" type="text" class="form-control{{ $errors->has('servico') ? ' is-invalid' : '' }}" name="servico" required>

                            @if ($errors->has('servico'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('servico') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group col-md-4">
                            <label for="preco">Preço (R$)</label>

                            <input id="preco" type="number" class="form-control{{ $errors->has('preco') ? ' is-invalid' : '' }}" name="preco" required>

                            @if ($errors->has('preco'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('preco') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                
            </form>
        </div>
        <div class="card-footer text-muted">
            2 days ago
        </div>
    </div>
{{--  
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Adicionar novo animal</h5>

                    <form method="POST" action="{{ route('admin.animais.novo', ['id' => $petshop->id]) }}" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="raca">Raça</label>
                        
                                <input id="raca" type="text" class="form-control{{ $errors->has('raca') ? ' is-invalid' : '' }}" name="raca" value="{{ old('raca') }}" required autofocus>
                
                                @if ($errors->has('raca'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('raca') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-block">Adicionar!</button>
                </div>
            </div>
        </div>
    </div>  --}}
</div>


{{--  @section('script')
    <script src="/js/fileinput2.js"></script>
@endsection  --}}

@stop