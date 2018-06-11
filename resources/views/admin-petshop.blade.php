@extends('principal')
@section('conteudo')

<input type="hidden" id="petshop_id" value="{{$petshop->id}}">

<div class="container">
    <nav id="navbar-admin" class="navbar navbar-expand navbar-dark bg-dark mt-2">
        <a class="navbar-brand" href="#">Área administrativa</a>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="{{route('admin', ['id' => $petshop->id])}}">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="{{route('admin.servicos', ['id' => $petshop->id])}}">Serviços</a>
                <a class="nav-item nav-link" href="{{route('admin.servicoRaca', ['id' => $petshop->id])}}">Animais</a>
                <a class="nav-item nav-link" href="{{route('admin.funcionarios', ['id' => $petshop->id])}}">Funcionários</a>
                <a class="nav-item nav-link" href="{{route('admin.editar', ['id' => $petshop->id])}}">Dados cadastrais </a>
            </div>
        </div>
    </nav>
</div>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Agenda</h4>
                    <hr>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Agenda do funcionário</h5>
                                    <hr>
                                    {{-- <div class="form-group col-sm-6 col-md-4"> --}}
                                    <div class="form-group">
                                        <label for="select_funcionario">Selecione o funcionário</label>
                                        <select name="select_funcionario" id="select_funcionario" class="form-control"></select>
                                    </div>
            
                                    {{-- <div class="form-group col-sm-6 col-md-4"> --}}
                                    <div class="form-group">
                                        <label for="data_agenda">Data</label>
                                        <input type="date" class="form-control" name="data_agenda" id="data_agenda">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Estatísticas do dia</h5>
                                    <hr>
                                    <table id="tabela_estatisticas" class="table-sm table-hover">
                                        <tr>
                                            <td>Ganhos:</td>
                                            <td>
                                                <span class="preco"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Cancelamentos:</td>
                                            <td>
                                                <span class="indisponivel"></span> 
                                            </td>
                                        </tr>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="tabela_horarios_marcados" class="table-responsive"></div>
                </div>
            </div>
        </div>
        <!-- <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Configurações</h4>
                    <hr>
                    <a href="#" class="btn btn-danger btn-block">Apagar petshop</a>
                    {{-- <a href="{{route('petshop.show', ['id' => $petshop->petshop->id]) }}" class="btn btn-success btn-block">Página do petshop</a> --}}
                </div>
            </div>
        </div> -->
    </div>
</div>

 @section('script')
    <script src="/js/petshopAdmin.js"></script>
@endsection 

@stop