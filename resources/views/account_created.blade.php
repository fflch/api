@extends('form')

@section('form-content')
@section('card-title', 'Conta Criada!')
<br>
<p class="text-center"><b>Aqui está o seu primeiro token:</b> {{ $info[0] }}</p>

<br>
<p class="text-center">
    Seu acesso à API já está ativo e
    permanecerá disponível até
    {{ $info[1] }};
    após essa data, ele será revogado.
</p>

<br>
<p class="text-center">
    Para obter um novo token, acesse
    <a href="https://api.fflch.usp.br/login">
        api.fflch.usp.br/login</a>.
</p>
@endsection