@extends('principal')
@section('conteudo')

<div class="container">
    <nav id="navbar-admin" class="navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Área administrativa</a>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="{{route('admin', ['id' => $petshop->id])}}">Home</a>
                <a class="nav-item nav-link active" href="{{route('admin.servicos', ['id' => $petshop->id])}}">Serviços <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="{{route('admin.servicoRaca', ['id' => $petshop->id])}}">Animais</a>
                <a class="nav-item nav-link" href="{{route('admin.funcionarios', ['id' => $petshop->id])}}">Funcionários</a>
            </div>
        </div>
    </nav>
    <form method="POST" action="{{ route('admin.servicos.store', ['id' => $petshop->id]) }}">
        @csrf
        <input type="hidden" name="id" value="{{ $petshop->id }}">
        <section class="servicos">
            <div class="card text-center">
                <h4 class="card-header">
                    <b>SERVIÇOS</b>
                </h4>
                <div class="card-body">
                    {{--  <h5 class="card-title">SERVIÇOS</h5>  --}}
                    <p class="card-text">Selecione os serviços oferecidos pelo seu petshop!</p>
                    <div class="row">
                        <div class="col-md-6">
    
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Estética/Higiene</h4>
                                    <hr>
                                    <div class="form-group btn-group-toggle">
                                        <label class="btn {{ in_array(1 , $petshop_servicos_ids) ? 'btn-success' : 'btn-secondary' }} btn-block">
                                            <input name="servico" type="checkbox" data-petshopid="{{$petshop->id}}" autocomplete="off" value="1"> Banho
                                        </label>
                                        <label class="btn {{ in_array(2 , $petshop_servicos_ids) ? 'btn-success' : 'btn-secondary' }} btn-block">
                                            <input name="servico" type="checkbox" data-petshopid="{{$petshop->id}}" autocomplete="off" value="2"> Tosa
                                        </label>
                                        <label class="btn {{ in_array(3 , $petshop_servicos_ids) ? 'btn-success' : 'btn-secondary' }} btn-block">
                                            <input name="servico" type="checkbox" data-petshopid="{{$petshop->id}}" autocomplete="off" value="3"> Tosa Higiênica
                                        </label>
                                        <label class="btn {{ in_array(6 , $petshop_servicos_ids) ? 'btn-success' : 'btn-secondary' }} btn-block">
                                            <input name="servico" type="checkbox" data-petshopid="{{$petshop->id}}" autocomplete="off" value="6"> Hidratação
                                        </label>
                                        <label class="btn {{ in_array(7 , $petshop_servicos_ids) ? 'btn-success' : 'btn-secondary' }} btn-block">
                                            <input name="servico" type="checkbox" data-petshopid="{{$petshop->id}}" autocomplete="off" value="7"> Loja
                                        </label>
                                        <label class="btn {{ in_array(9 , $petshop_servicos_ids) ? 'btn-success' : 'btn-secondary' }} btn-block">
                                            <input name="servico" type="checkbox" data-petshopid="{{$petshop->id}}" autocomplete="off" value="9"> Tintura de pelagem
                                        </label>
                                        <label class="btn {{ in_array(10 , $petshop_servicos_ids) ? 'btn-success' : 'btn-secondary' }} btn-block">
                                            <input name="servico" type="checkbox" data-petshopid="{{$petshop->id}}" autocomplete="off" value="10"> Escovação de dentes
                                        </label>
                                        <label class="btn {{ in_array(11 , $petshop_servicos_ids) ? 'btn-success' : 'btn-secondary' }} btn-block">
                                            <input name="servico" type="checkbox" data-petshopid="{{$petshop->id}}" autocomplete="off" value="11"> Corte de unhas
                                        </label>
                                        <label class="btn {{ in_array(12 , $petshop_servicos_ids) ? 'btn-success' : 'btn-secondary' }} btn-block">
                                            <input name="servico" type="checkbox" data-petshopid="{{$petshop->id}}" autocomplete="off" value="12"> Limpeza dos ouvidos
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Saúde</h4>
                                    <hr>
                                    <div class="form-group btn-group-toggle">
                                        <label class="btn {{ in_array(4 , $petshop_servicos_ids) ? 'btn-success' : 'btn-secondary' }} btn-block">
                                            <input name="servico" type="checkbox" data-petshopid="{{$petshop->id}}" autocomplete="off" value="4"> Veterinário
                                        </label>
                                        <label class="btn {{ in_array(5 , $petshop_servicos_ids) ? 'btn-success' : 'btn-secondary' }} btn-block">
                                            <input name="servico" type="checkbox" data-petshopid="{{$petshop->id}}" autocomplete="off" value="5"> Pronto Socorro
                                        </label>
                                        <label class="btn {{ in_array(8 , $petshop_servicos_ids) ? 'btn-success' : 'btn-secondary' }} btn-block">
                                            <input name="servico" type="checkbox" data-petshopid="{{$petshop->id}}" autocomplete="off" value="8"> Medicamentos
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                    </div> <!-- div.row -->
                </div> <!-- div.card-body -->
            </div>
        </section>
    </form>

</div>

@section('script')
    <script src="/js/servicos.js"></script>
@endsection

@stop