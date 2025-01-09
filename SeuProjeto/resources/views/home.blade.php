@extends('templates/main', ['titulo'=>"HOME"])

@section('conteudo')

<div>


    <h1>Seja bem-vindo(a) {{ Auth::user()->name }}</h1>

    <h2>Utilize o menu de Navegação a cima para gerenciar!</h2>
    <form method="post" action="{{ route('logout')}}">
        @csrf
        <div class="col">
            <x-button label="Logout" type="submit" route="" color="danger"/>
        </div>
    </form>
</div>


@endsection