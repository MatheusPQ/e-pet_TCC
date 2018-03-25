@extends('principal')
@section('conteudo')

<div class="container">
    <nav id="navbar-admin" class="navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Área administrativa</a>
        {{--  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>  --}}
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="#">Serviços</a>
                <a class="nav-item nav-link" href="#">Preços</a>
            </div>
        </div>
    </nav>
    <nav>
        <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Serviços</a>
            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Preços</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">1</div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            {{--  <div class="card text-center">  --}}
                {{--  <h4 class="card-header">  --}}
                    {{--  <b>SERVIÇOS</b>  --}}
                {{--  </h4>  --}}
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
                                    <label class="btn btn-secondary btn-block">
                                        <input name="servicos[]" type="checkbox" autocomplete="off" value="1"> Banho
                                    </label>
                                    <label class="btn btn-secondary btn-block">
                                        <input name="servicos[]" type="checkbox" autocomplete="off" value="2"> Tosa
                                    </label>
                                    {{--  <label class="btn btn-secondary btn-block">
                                        <input name="servicos[]" type="checkbox" autocomplete="off" value="3"> Tosa Higiênica
                                    </label>
                                    <label class="btn btn-secondary btn-block">
                                        <input name="servicos[]" type="checkbox" autocomplete="off" value="6"> Hidratação
                                    </label>
                                    <label class="btn btn-secondary btn-block">
                                        <input name="servicos[]" type="checkbox" autocomplete="off" value="7"> Loja
                                    </label>
                                    <label class="btn btn-secondary btn-block">
                                        <input name="servicos[]" type="checkbox" autocomplete="off" value="9"> Tintura de pelagem
                                    </label>
                                    <label class="btn btn-secondary btn-block">
                                        <input name="servicos[]" type="checkbox" autocomplete="off" value="10"> Escovação de dentes
                                    </label>
                                    <label class="btn btn-secondary btn-block">
                                        <input name="servicos[]" type="checkbox" autocomplete="off" value="11"> Corte de unhas
                                    </label>
                                    <label class="btn btn-secondary btn-block">
                                        <input name="servicos[]" type="checkbox" autocomplete="off" value="12"> Limpeza dos ouvidos
                                    </label>  --}}
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
                                    <label class="btn btn-secondary btn-block">
                                        <input name="servicos[]" type="checkbox" autocomplete="off" value="4"> Veterinário
                                    </label>
                                    <label class="btn btn-secondary btn-block">
                                        <input name="servicos[]" type="checkbox" autocomplete="off" value="5"> Pronto Socorro
                                    </label>
                                    <label class="btn btn-secondary btn-block">
                                        <input name="servicos[]" type="checkbox" autocomplete="off" value="8"> Medicamentos
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> <!-- div.row -->
            </div> <!-- div.card-body -->
                {{--  <div class="card-footer">  --}}
            <button type="submit" class="btn btn-primary btn-block">Salvar!</button>
                {{--  </div>  --}}
            {{--  </div>  --}}
        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">3</div>
        </div>
</div>


{{--  @section('script')
    <script src="/js/fileinput2.js"></script>
@endsection  --}}

@stop