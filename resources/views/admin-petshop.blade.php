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
            </div>
        </div>
    </nav>
</div>


{{--  @section('script')
    <script src="/js/fileinput2.js"></script>
@endsection  --}}

@stop