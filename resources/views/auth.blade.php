@extends('form')

@section('form-content')
@section('card-title', 'Resgatar Token')
<form method="post" action="/token">
    @csrf

    <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
        </div>
        <input name="username" class="form-control" placeholder="usuário" type="text" value="{{ old('username') }}">
    </div>
    @include('components.validationError', ['field' => 'username'])

    <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
        </div>
        <input name="password" class="form-control" placeholder="senha" type="password">
    </div>
    @include('components.validationError', ['field' => 'password'])

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Login</button>
    </div>
    @include('components.sessionError')

</form>
@endsection