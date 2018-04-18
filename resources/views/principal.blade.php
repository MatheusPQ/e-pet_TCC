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
        <link rel="stylesheet" href="/css/timepicker.css">
        <link rel="stylesheet" href="/css/app.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.js"></script> --}}

        @stack('styles')        

        {{--  File Input  --}}
        {{--  <link href="/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
        <script src="/js/jquery-3.3.1.min.js"></script>
        <script src="/js/fileinput.js" type="text/javascript"></script>
        <script src="/js/locales/pt-BR.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>  --}}
        {{--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">  --}}
    </head>
    <body>
        {{--  <div id="app">  --}}
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
                        <li class="nav-item"><a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a></li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Entrar</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('register')}}">Registrar</a></li>
                    @else
                        {{--  <li class="nav-item"><a class="nav-link">{{ Auth::user()->name }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('logout')}}" 
                                                onclick="event.preventDefault(); 
                                                        document.getElementById('logout-form').submit();">Logout</a></li> --}}
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
    
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if(isPetshop())
                                    <a class="dropdown-item" href="/petshop/create">Cadastrar um petshop</a>  
                                    <a class="dropdown-item" href="#">Meus petshops</a>  
                                    <div class="dropdown-divider"></div>
    
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
    
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                    </ul>
                </div>
        
                {{--  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a></li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Entrar</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('register')}}">Registrar</a></li>
                    </ul>
                </div>  --}}
            </nav>
            <main class="py-4">
                @yield('conteudo')
            </main>
            
        {{--  </div>  --}}
        

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
    <script src="{{ asset('libs/fullcalendar/lib/moment.min.js') }}"></script>
    <script src="{{ asset('libs/fullcalendar/fullcalendar.js') }}"></script>
    <script src="{{ asset('libs/fullcalendar/locale/pt-br.js') }}"></script>
    @yield('script')

</html>
