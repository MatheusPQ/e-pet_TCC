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
                <a class="nav-item nav-link" href="{{route('admin.editar', ['id' => $petshop->id])}}">Dados cadastrais </a>
            </div>
        </div>
    </nav>

    <div class="card mb-2">
        {{-- <div class="card-header">
            FUNCIONÁRIOS
        </div> --}}
        <div class="card-body">
            {{-- <form method="POST" id="salvarFuncionario" action="{{ route('admin.funcionarios.store', ['id' => $petshop->id]) }}"> --}}
                <form method="POST" id="salvarFuncionario" action="">
                @csrf
                <h5 class="card-title">Adicionar funcionário</h5>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="nome">Nome</label>

                        <input id="nome" type="text" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" required> 
                        
                        @if ($errors->has('nome'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('nome') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        {{-- <a href="#" id="btn_salvarFuncionario" class="btn btn-success btn-block" name="btn_salvarFuncionario">Adicionar funcionário</a> --}}
                        <button type="submit" id="btn_salvarFuncionario" class="btn btn-success btn-block" name="btn_salvarFuncionario">Adicionar funcionário</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        {{-- <div class="card-header">
            FUNCIONÁRIOS
        </div> --}}
        <div class="card-body">

            <div class="form-row">
                <div class="form-group col">
                    <label for="select_funcionario">Selecione o funcionário</label>
                    <select name="select_funcionario" id="select_funcionario" class="form-control"></select>
                </div>
            </div>
            <hr>
            <h5 class="card-title">Definir horários</h5>
            <div class="form-row">
                <div class="form-group col">
                    <label for="data">Dias de atendimento</label>
                    <input id="data" type="text" class="form-control" name="data" required>
                    <small class="text-muted">Entre {{date( 'H:i', strtotime($petshop->horarioAbertura) )}} e {{date( 'H:i', strtotime($petshop->horarioFechamento) )}} </small>
                    
                    
                    <div class="custom-control custom-checkbox pull-right">
                        <input type="checkbox" class="custom-control-input" id="check_domingos">
                        <label class="custom-control-label" for="check_domingos">Atende aos domingos?</label>
                    </div>
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col">
                    <button type="button" id="btn_definirHorarios" class="btn btn-success btn-block" name="btn_definirHorarios">Definir horários</button>
                </div>
            </div>

            <hr>
            <h5 class="card-title">Consultar agenda</h5>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="data_agenda">Data</label>
                    <input type="date" class="form-control" name="data_agenda" id="data_agenda">
                </div>
            </div>

            <div class="form-row">
                <table class="table table-sm table-hover" id="tabela_agenda">
                    <thead>
                        <tr>
                            <th scope="col">Funcionário</th>
                            <th scope="col">Data/Hora</th>
                            {{-- <th scope="col">Hora</th> --}}
                            <th scope="col">Status</th>
                            <th scope="col">Serviço</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Raça</th>
                            <th scope="col">Preço</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div> <!-- card-body -->
    </div> <!-- card -->
</div>


@section('script')
    <script src="/js/funcionarios.js"></script>
@endsection

@stop