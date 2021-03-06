@extends('principal')
@section('conteudo')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Cadastrar petshop</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('petshop.store') }}" enctype="multipart/form-data">
                            @csrf

                            <fieldset>
                                <legend>Dados do petshop</legend>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nomeFantasia">Nome fantasia</label>
            
                                        <input id="nomeFantasia" type="text" class="form-control{{ $errors->has('nomeFantasia') ? ' is-invalid' : '' }}" name="nomeFantasia" value="{{ old('nomeFantasia') }}" required autofocus>
            
                                        @if ($errors->has('nomeFantasia'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('nomeFantasia') }}</strong>
                                            </span>
                                        @endif
                                    </div>
        
                                    <div class="form-group col-md-6">
                                        <label for="razaoSocial">Razão Social</label>
            
                                        <input id="razaoSocial" type="text" class="form-control{{ $errors->has('razaoSocial') ? ' is-invalid' : '' }}" name="razaoSocial" required>
        
                                        @if ($errors->has('razaoSocial'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('razaoSocial') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
    
                                <div class="form-row">
                                    <div class="form-group col-6 col-md-3">
                                        <label for="cpf">CPF </label>
            
                                        <input id="cpf" type="text" class="form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }}" name="cpf" value="{{ old('cpf') }}" required autofocus>
            
                                        @if ($errors->has('cpf'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('cpf') }}</strong>
                                            </span>
                                        @endif
                                    </div>
        
                                    <div class="form-group col-6 col-md-3">
                                        <label for="cnpj">CNPJ</label>
            
                                        <input id="cnpj" type="text" class="form-control{{ $errors->has('cnpj') ? ' is-invalid' : '' }}" name="cnpj" required>
        
                                        @if ($errors->has('cnpj'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('cnpj') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>


                                
                                <hr>
                            </fieldset>

                            <fieldset>
                                <legend>Localização</legend>
                                {{-- <hr class="mt-0"> --}}
                            
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="cep">CEP</label>
            
                                        <input id="cep" type="text" class="form-control{{ $errors->has('cep') ? ' is-invalid' : '' }}" name="cep" required>
        
                                        @if ($errors->has('cep'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('cep') }}</strong>
                                            </span>
                                        @endif
                                    </div>
    
                                    <div class="form-group col-md-7">
                                        <label for="endereco">Endereço</label>
            
                                        <input id="endereco" type="text" class="form-control{{ $errors->has('endereco') ? ' is-invalid' : '' }}" name="endereco" required>
        
                                        @if ($errors->has('endereco'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('endereco') }}</strong>
                                            </span>
                                        @endif
                                    </div>
    
                                    <div class="form-group col-md-2">
                                        <label for="numero">Nº</label>
            
                                        <input id="numero" type="number" class="form-control{{ $errors->has('numero') ? ' is-invalid' : '' }}" name="numero" required>
        
                                        @if ($errors->has('numero'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('numero') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <label for="uf">UF</label>
            
                                        <input id="uf" type="text" class="form-control{{ $errors->has('uf') ? ' is-invalid' : '' }}" name="uf" maxlength="2" required>
        
                                        @if ($errors->has('uf'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('uf') }}</strong>
                                            </span>
                                        @endif
                                    </div>
    
                                    <div class="form-group col-md-5">
                                        <label for="cidade">Cidade</label>
            
                                        <input id="cidade" type="text" class="form-control{{ $errors->has('cidade') ? ' is-invalid' : '' }}" name="cidade" required>
        
                                        @if ($errors->has('cidade'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('cidade') }}</strong>
                                            </span>
                                        @endif
                                    </div>
    
                                    <div class="form-group col-md-5">
                                        <label for="bairro">Bairro</label>
            
                                        <input id="bairro" type="text" class="form-control{{ $errors->has('bairro') ? ' is-invalid' : '' }}" name="bairro" required>
        
                                        @if ($errors->has('bairro'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('bairro') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <hr>

                            </fieldset>

                            <fieldset>
                                <legend>Dados de contato</legend>
                                {{-- <hr class="mt-0"> --}}
                            
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="telefone">Telefone</label>
            
                                        <input id="telefone" type="text" class="form-control{{ $errors->has('telefone') ? ' is-invalid' : '' }}" name="telefone" required>
        
                                        @if ($errors->has('telefone'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('telefone') }}</strong>
                                            </span>
                                        @endif
                                    </div>
    
                                    <div class="form-group col-md-8">
                                        <label for="email">E-Mail</label>
            
                                        <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" required>
        
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <hr>

                            </fieldset>

                            <fieldset>
                                <legend>Horário de funcionamento</legend>
                                {{-- <hr class="mt-0"> --}}
                            
                                <div class="form-row">
                                    <div class="form-group col-6 col-md-3">
                                        <label for="horarioAbertura">Abertura</label>
                                        <input id="horarioAbertura" type="time" class="form-control{{ $errors->has('horarioAbertura') ? ' is-invalid' : '' }}" name="horarioAbertura" required>
        
                                        @if ($errors->has('horarioAbertura'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('horarioAbertura') }}</strong>
                                            </span>
                                        @endif
                                    </div>
    
                                    <div class="form-group col-6 col-md-3">
                                        <label for="horarioFechamento">Fechamento</label>
            
                                        <input id="horarioFechamento" type="time" class="form-control{{ $errors->has('horarioFechamento') ? ' is-invalid' : '' }}" name="horarioFechamento" required>
        
                                        @if ($errors->has('horarioFechamento'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('horarioFechamento') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                            </fieldset>
                            
                            {{-- <fieldset>
                                <legend>Imagem/logo</legend>
                                <div class="form-row">            
                                    <div class="form-group col-md-4">
                                        <label for="customFile">Escolha um arquivo</label>
                                        <input type="file" class="form-control-file" name="imagem" id="customFile" accept="image/*">
                                    </div>
                                </div>
                                <hr>

                            </fieldset>

                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="informacao">Informações adicionais</label>
        
                                    <textarea name="informacao" class="form-control" id="informacao" rows="3"></textarea>
                                </div>
                            </div> --}}
    
                            {{-- <div class="form-group row mb-0"> --}}
                            <div class="form-row">
                                {{-- <div class="col-md-8 offset-md-4"> --}}
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Criar petshop!</button>
                                {{-- </div> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

 @section('script')
    <script src="/js/cadastrarPetshop.js"></script>
@endsection 

@stop