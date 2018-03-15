<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>E-Pet TCC</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/css/estilo.css">
        <link rel="stylesheet" href="/css/app.css">
        
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-primary">
            <!-- Navbar content -->
            <a class="navbar-brand" href="#">E-Pet</a>
            <button class="navbar-toggler" 
                    type="button" 
                    data-toggle="collapse" 
                    data-target="#navbarSupportedContent" 
                    aria-controls="navbarSupportedContent" 
                    aria-expanded="false" 
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a></li>
                {{--  <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
                <li class="nav-item"><a class="nav-link disabled" href="#">Disabled</a></li>  --}}
                {{--  <li><a href="{{ route('login') }}">Entrar</a></li>
                <li><a href="{{ route('register') }}">Registrar</a></li>  --}}
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Entrar</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Registrar</a></li>
                </ul>
            </div>
        </nav>
        <main>
            @yield('conteudo')
        </main>

        <footer id="footer">
            <div class="row row-correcao-gutter">
                <div class="col-xs-12 col-md-6">
                    <ul>
                        <li>Sobre nós</li>
                    </ul>
                </div> 
                <div class="col-xs-12 col-md-6">
                    <ul>
                        <li>Empresa</li>
                    </ul>
                </div>
            </div>
        </footer>

    </body>


    
    <script src="/js/app.js"></script> 
    @yield('script')
    {{--  <script src="/js/function.js"></script>   --}}
    {{--  <script src="/js/carrinho.js"></script>   --}}

</html>
