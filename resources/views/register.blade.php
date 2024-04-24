@extends('form')

@section('form-content')
@section('card-title', 'Criar Conta')
<form method="post" action="/cadastrar">
    @csrf
    <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-id-card"></i> </span>
        </div>
        <input name="name" class="form-control" placeholder="nome completo" type="text" value="{{ old('name') }}">
    </div>
    @include('components.validationError', ['field' => 'name'])

    <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
        </div>
        <input name="email" class="form-control" placeholder="email" type="email" value="{{ old('email') }}">
    </div>
    @include('components.validationError', ['field' => 'email'])

    <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-hashtag"></i> </span>
        </div>
        <input name="invitation" class="form-control" placeholder="código do convite" type="text" value="{{ old('invitation') }}">
    </div>
    @include('components.validationError', ['field' => 'invitation'])

    <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
        </div>
        <input name="username" class="form-control" placeholder="crie seu usuário" type="text" value="{{ old('username') }}">
    </div>
    @include('components.validationError', ['field' => 'username'])

    <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
        </div>
        <input name="password" class="form-control" placeholder="crie sua senha" type="password">
    </div>
    @include('components.validationError', ['field' => 'password'])

    <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
        </div>
        <input name="password_confirmation" class="form-control" placeholder="confirme sua senha" type="password">
    </div>
    @include('components.validationError', ['field' => 'password_confirmation'])

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Criar conta! </button>
    </div>

    @include('components.sessionError')

    <p class="text-center">Já possui uma conta? <a href="/token">Resgate um novo token</a>!</p> 
</form>
@endsection