@extends('principal')
@section('conteudo')

<div class="container">
    <form method="POST" action="{{ route('petshopServico.store') }}">
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
                                        <label class="btn btn-secondary btn-block">
                                            <input name="servicos[]" type="checkbox" autocomplete="off" value="1"> Banho
                                        </label>
                                        <label class="btn btn-secondary btn-block">
                                            <input name="servicos[]" type="checkbox" autocomplete="off" value="2"> Tosa
                                        </label>
                                        <label class="btn btn-secondary btn-block">
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
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-block">Salvar!</button>
                </div>
            </div>
        </section>
    </form>
</div>

@section('script')
    <script src="/js/servicos.js"></script>
@endsection

@stop