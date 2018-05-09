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
                <a class="nav-item nav-link" href="{{route('admin.servicoRaca', ['id' => $petshop->id])}}">Animais</a>
                <a class="nav-item nav-link active" href="{{route('admin.funcionarios', ['id' => $petshop->id])}}">Funcionários <span class="sr-only">(current)</span></a>
            </div>
        </div>
    </nav>

    <div class="card">
        <div class="card-header">
            FUNCIONÁRIOS
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.funcionarios.store', ['id' => $petshop->id]) }}">
                    @csrf
                    <h5 class="card-title">Adicionar funcionário</h5>
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="nome">Nome</label>

                             <input id="nome" type="text" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" value="{{ old('nome') }}" required autofocus> 
                            
                            @if ($errors->has('nome'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('nome') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="data">Dias de atendimento</label>
                                <input id="data" type="text" class="form-control" name="data" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <a href="#" id="btn_salvarFuncionario" class="btn btn-success btn-block" name="btn_salvarFuncionario">Adicionar funcionário</a>
                        </div>

                    </div>
                    {{-- <div class="form-row"> --}}
                    {{-- </div> --}}

                    <hr>
                    <h5 class="card-title">Funcionários cadastrados</h5>

                    <div class="form-row">
                    </div>
                
            </form>
        </div>
    </div>
</div>


@section('script')
    <script src="/js/funcionarios.js"></script>
@endsection

@stop