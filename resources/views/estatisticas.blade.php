@extends('principal')
@section('conteudo')

{{-- <input type="hidden" id="petshop_id" name="petshop_id" value="{{ $petshop->id }}">
<input type="hidden" id="user_id" name="user_id" value="{{ Auth::id() }}">
<input type="hidden" id="preco_servico" name="user_id" value="{{ Auth::id() }}"> --}}

<div class="container">
    <div class="col-md-6">
            <canvas id="myChart" width="400" height="400"></canvas>

    </div>
</div>

@section('script')
    <script src="/js/estatisticas.js"></script>
@endsection
@stop