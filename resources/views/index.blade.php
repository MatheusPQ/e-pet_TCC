@extends('principal')
@section('conteudo')

<div id="bg">
    <img id="img-fundo" src="/img/jumbotron.jpg" alt="">
</div>

<section class="topo">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">E-Pet</h1>
            <p class="lead">A maior 'rede social' de petshops do mundo!</p>
            <hr>
            <p class="lead">
                <a class="btn btn-outline-dark btn-lg" href="#" role="button">Cadastrar meu petshop!</a>
            </p>
        </div>
    </div>
</section>

<div class="container">
    <section class="conteudo">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card">
                    <img class="card-img-top" src="/img/Imagem18.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Petshop #1</h4>
                        <h6 class="card-subtitle mb-2 text-muted">São Bernardo - SP</h6>
                        <hr>
                        <p class="card-text avaliacao">Avaliação: 4.3/5</p>
                        <p class="card-text">Banho: <span class="preco"> R$15,00</span></p>
                        <p class="card-text">Tosa: <span class="preco"> R$15,00</span></p>
                        <a href="#" class="btn btn-primary btn-block">Marcar horário</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card">
                    <img class="card-img-top" src="/img/Imagem19.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Petshop #2</h4>
                        <h6 class="card-subtitle mb-2 text-muted">São Caetano - SP</h6>
                        <hr>
                        <p class="card-text avaliacao">Avaliação: 5/5</p>
                        <p class="card-text">Banho: <span class="preco"> R$15,00</span></p>
                        <p class="card-text">Tosa: <span class="indisponivel"> Indisponível</span></p>
                        <a href="#" class="btn btn-primary btn-block">Marcar horário</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card">
                    <img class="card-img-top" src="/img/Imagem15.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Petshop #3</h4>
                        <h6 class="card-subtitle mb-2 text-muted">São Bernardo - SP</h6>
                        <hr>
                        <p class="card-text avaliacao">Avaliação: 3.2/5</p>
                        <p class="card-text">Banho: <span class="preco"> R$20,00</span></p>
                        <p class="card-text">Tosa: <span class="preco"> R$15,00</span></p>
                        <a href="#" class="btn btn-primary btn-block">Marcar horário</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card">
                    <img class="card-img-top" src="/img/main.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Petshop #4</h4>
                        <h6 class="card-subtitle mb-2 text-muted">Mauá - SP</h6>
                        <hr>
                        <p class="card-text avaliacao">Avaliação: 4.2/5</p>
                        <p class="card-text">Banho: <span class="preco"> R$30,00</span></p>
                        <p class="card-text">Tosa: <span class="preco"> R$30,00</span></p>
                        <a href="#" class="btn btn-primary btn-block">Marcar horário</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card">
                    <img class="card-img-top" src="/img/Imagem22.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Petshop #5</h4>
                        <h6 class="card-subtitle mb-2 text-muted">Santo André - SP</h6>
                        <hr>
                        <p class="card-text avaliacao">Avaliação: 4/5</p>
                        <p class="card-text">Banho: <span class="preco"> R$20,00</span></p>
                        <p class="card-text">Tosa: <span class="preco"> R$15,00</span></p>
                        <a href="#" class="btn btn-primary btn-block">Marcar horário</a>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

</div>
            



@stop
