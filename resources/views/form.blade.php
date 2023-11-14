@extends('layout')

@section('custom-styles')
<link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('content')
<!-- success -->
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<!-- error -->
@if (session('error'))
<div class="alert alert-danger text-center">
    {{ session('error') }}
</div>
@endif

<!-- validation errors -->
@if ($errors->any())
<div class="alert alert-danger text-center">
    <ul>
        @foreach ($errors->all() as $error)
        {{ $error }}
        <br>
        @endforeach
    </ul>
</div>
@endif

<div class="container d-flex align-items-center justify-content-center custom-container">
    <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 550px;">
            <h4 class="card-title mt-3 text-center">@yield('card-title')</h4>
            <p class="text-center">API FFLCH</p>
            @yield('form-content')
        </article>
    </div>
</div>
@endsection