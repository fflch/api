@extends('layout')

@section('custom-styles')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/form.css') }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
@endsection

@section('content')
<!-- success -->
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8 col-lg-6">
            <div class="card border-primary" style="max-width: 440px; margin: 0 auto;">
                <div class="card-body">
                    <h4 class="card-title text-center mt-2">
                        @yield('card-title')
                    </h4>
                    <p class="card-subtitle text-muted text-center mb-4">API FFLCH</p>
                    <div class="content-wrapper">
                        @yield('form-content')
                    </div>
                </div>
            </div>
            <div class="mt-4"></div>
        </div>
    </div>
</div>
@endsection