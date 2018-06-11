@extends('principal')
@section('conteudo')

<div class="container">
    <section class="estatisticas">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title"><b>Geral</b></h5>
                <hr>
                <div class="row">
                    {{-- <div class="col-md-6">
                        <canvas id="grafStatus" width="300" height="300"></canvas>
                    </div> --}}
                    <div class="col">
                        {{-- <div class="card">
                            <div class="card-body"> --}}
                                <table class="table-sm table-hover">
                                    <tr>
                                        <td><strong>Valores movimentados:</strong></td>
                                        <td id="td_valoresMovim"> <i>Carregando...</i> </td>
                                        <td><strong>Proprietários cadastrados:</strong></td>
                                        <td id="td_proprietarios"> <i>Carregando...</i> </td>
                                    </tr>
                                    <tr>
                                        <td> <strong>Petshops cadastrados: </strong></td>
                                        <td id="td_petshopsCadast"> <i>Carregando...</i> </td>
                                        <td> <strong>Usuários cadastrados: </strong></td>
                                        <td id="td_usuarios"> <i>Carregando...</i> </td>
                                    </tr>
                                    <tr>
                                        <td> <strong>Número de atendimentos: </strong></td>
                                        <td id="td_numAtend"> <i>Carregando...</i> </td>
                                        <td> <strong>Total de usuários: </strong></td>
                                        <td id="td_usuariosTotal"> <i>Carregando...</i> </td>
                                    </tr>
                                </table>

                                {{--  ========================= ADICIONAR GRÁFICO DE REGIÕES ================================ --}}
                                {{-- <h5 class="card-title"></h5> --}}
                            {{-- </div>
                        </div> --}}
                        {{-- <div class="card bg-success text-white">
                            <div class="card-body">
                                <h5 class="card-title"><strong>Lucro</strong></h5>
                            </div>
                        </div> --}}
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    {{-- <h5 class="card-header"><strong>Serviços mais requisitados</strong></h5> --}}
                    <div class="card-body">
                        <h5 class="card-title"><strong>Serviços mais requisitados</strong></h5>
                        <hr>
                        <canvas id="grafServicos" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
    
            <div class="col-md-6">
                <div class="card mb-4">
                    {{-- <h5 class="card-header"><strong>Raças em destaque</strong></h5> --}}
                    <div class="card-body">
                        <h5 class="card-title"><strong>Raças em destaque</strong></h5>
                        <hr>
                        <canvas id="grafRacas" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
    
            <div class="col">
                <div class="card mb-4">
                    {{-- <h5 class="card-header"><strong>Raças em destaque</strong></h5> --}}
                    <div class="card-body">
                        <h5 class="card-title"><strong>Regiões em alta</strong></h5>
                        <hr>
                        <canvas id="grafRegioes" width="1000" height="400"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

@section('script')
    <script src="/js/estatisticas.js"></script>
@endsection
@stop