@extends('templates.head')
@section('header')

<header class="d-flex flex-wrap align-items-center justify-content-start py-3 mb-4 border-bottom">
    <a href="{{route('site')}}" class="
    ml-4
    d-flex 
    align-items-center 
    col-md-1 mb-2 mb-md-0 
    text-dark 
    text-decoration-none
    ps-3
    fs-3
    text-nowrap
    ">
        SEU PROJETO
    </a>

    <ul class="nav col-12 col-md-auto mb-2 mb-md-0 d-flex flex-grow-1 justify-content-around align-content-center">
        @can('hasFullPermission', App\Models\Project::class)
        <li><a href="{{route('projects.index')}}" class="nav-link px-2 link-dark">Projetos</a></li>
        @endcan

        @can('hasFullPermission', App\Models\User::class)
            <li><a href="#" class="nav-link px-2 link-dark">Usuários</a></li>
        @endcan

        @can('hasFullPermission', App\Models\Client::class)
            <li><a href="#" class="nav-link px-2 link-dark">Clientes</a></li>
        @endcan

    </ul>
</header>

@yield('conteudo')

@endsection