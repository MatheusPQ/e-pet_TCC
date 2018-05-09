@extends('principal')
@section('conteudo')

<div class="container">
    <nav id="navbar-admin" class="navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Área administrativa</a>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="{{route('admin', ['id' => $petshop->id])}}">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="{{route('admin.servicos', ['id' => $petshop->id])}}">Serviços</a>
                <a class="nav-item nav-link" href="{{route('admin.servicoRaca', ['id' => $petshop->id])}}">Animais</a>
                <a class="nav-item nav-link" href="{{route('admin.funcionarios', ['id' => $petshop->id])}}">Funcionários</a>
            </div>
        </div>
    </nav>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-9" style="background: red;">
            <p>Gráficos aqui?</p>
        </div>
        <div class="col-md-3">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Configurações</h4>
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    {{-- <p class="card-text"><b>Serviços oferecidos: </b></p> --}}
                    <hr>
                    <a href="#" class="btn btn-danger btn-block">Apagar petshop</a>
                    {{-- <a href="{{route('petshop.show', ['id' => $petshop->petshop->id]) }}" class="btn btn-success btn-block">Página do petshop</a> --}}
                </div>
            </div>
        </div>
    </div>
</div>


{{--  @section('script')
    <script src="/js/fileinput2.js"></script>
@endsection  --}}

@stop