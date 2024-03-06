@extends('form')

@section('form-content')
@section('card-title', 'Criar Convite')
<form method="post" action="/convidar">
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

    <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
        </div>
        <input name="invited_email" class="form-control" placeholder="email do convidado" type="email" value="{{ old('invited_email') }}">
    </div>
    @include('components.validationError', ['field' => 'invited_email'])

    <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-layer-group"></i> </span>
        </div>
        <select class="form-control" name="role">
            <option disabled value="">nível de acesso</option>
            @foreach($roles as $role)
            <option {{ old('role') == $role ? 'selected' : '' }}>{{ $role }}</option>
            @endforeach
        </select>
    </div>
    @include('components.validationError', ['field' => 'role'])

    <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-hourglass-half"></i> </span>
        </div>
        <input name="api_access_period_days" class="form-control" placeholder="dias de acesso" type="number" min="1"  value="{{ old('api_access_period_days') }}">
    </div>
    @include('components.validationError', ['field' => 'api_access_period_days'])

    <div class="form-group input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-comment-dots"></i> </span>
        </div>
        <textarea name="motive" class="form-control" placeholder="descreva o propósito do convite" type="text" minlength="10" maxlength="1000">{{ old('motive') }}</textarea>
    </div>
    @include('components.validationError', ['field' => 'motive'])

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Criar convite </button>
    </div>
    @include('components.sessionError')

</form>
@endsection