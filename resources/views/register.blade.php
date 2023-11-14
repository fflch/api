@extends('form')

@section('form-content')
@section('card-title', 'Criar Conta')
<form method="post" action="/register">
    @csrf
    <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-id-card"></i> </span>
        </div>
        <input name="name" class="form-control" placeholder="nome" type="text">
    </div>

    <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
        </div>
        <input name="email" class="form-control" placeholder="email" type="email">
    </div>

    <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-hashtag"></i> </span>
        </div>
        <input name="invitation" class="form-control" placeholder="código do convite" type="text">
    </div>

    <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
        </div>
        <input name="username" class="form-control" placeholder="crie seu usuário" type="text">
    </div>

    <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
        </div>
        <input name="password" class="form-control" placeholder="crie sua senha" type="password">
    </div>

    <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
        </div>
        <input name="password_confirmation" class="form-control" placeholder="confirme sua senha" type="password">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Criar conta! </button>
    </div>

    <p class="text-center">Já tem uma conta? <a href="https://api.fflch.usp.br/login">Log In</a> </p> 
</form>
@endsection