@extends('templates.head')
@section('body')

<header class="d-flex flex-wrap align-items-center justify-content-start py-3 mb-4 border-bottom">
    <a href="{{route('site')}}" class="
    ml-4

    d-flex 
    align-items-center 
    col-md-1 mb-2 mb-md-0 
    text-dark 
    text-decoration-none
    ps-3">
        SEU PROJETO
    </a>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">Features</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">Pricing</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">FAQs</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">About</a></li>
    </ul>

    <div class="col-md-3 text-end">
        <button type="button" class="btn btn-outline-primary me-2">Login</button>
        <button type="button" class="btn btn-primary">Sign-up</button>
    </div> 
</header>

<a href="{{route('login')}}" type="button">login</a>

<a href="{{route('register')}}" type="button"></a>

@endsection