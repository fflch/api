@extends('form')

@section('form-content')
@section('card-title', 'Logado!')
<br>
<p class="text-center"><b>Aqui está o seu novo token:</b> {{ $info[0] }}</p>

<br>
<p class="text-center">
    Esse token é agora o seu único token ativo, <br>
    invalidando os demais.
</p>

<br>
<p class="text-center"><b>Acesso até:</b> {{ $info[1] }}</p>
@endsection