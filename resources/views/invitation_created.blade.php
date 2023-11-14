@extends('form')

@section('form-content')
@section('card-title', 'Convite criado!')
<br>
<p><b>E-mail do convidado:</b> {{ $info['email_to_invite'] }}</p>
<p><b>Código do convite:</b> {{ $info['invitation_token'] }}</p>
<p><b>Data de expiração do convite:</b> {{ $info['invitation_expiration_date'] }}</p>
<p><b>Dias de acesso à API após cadastro:</b> {{ $info['api_access_period_days'] }}</p>
<br>
<p class="text-center">
    Lembre-se: você precisará enviar manualmente o convite ao usuário;
    ele, por sua vez, deverá se cadastrar necessariamente utilizando o e-mail convidado.
</p>
@endsection