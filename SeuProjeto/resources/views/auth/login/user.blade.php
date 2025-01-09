@extends('templates/site')

@section('conteudo')

<div class="text-center">
    <span class="fw-bold fs-2 mb-5">
        Login como Usuário
    </span>
    
    <x-auth-session-status class="mt-4" :status="session('status')" />
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <!-- Email Address -->
        <div class="w-75 mx-auto mt-4">
            <x-textbox name="email" label="Email" type="email" :value="old('email')" disabled="false"/>
        </div>

        <!-- Password -->
        <div class="w-75 mx-auto">
            <x-textbox name="password" label="Senha" type="password" value="null" disabled="false" id=""/>
        </div>

        <div class="row w-75 mx-auto">
            @if (Route::has('password.request'))
                <div class="col">
                    <x-button label="Recuperar Senha" type="link" route="password.request" color="secondary" id=""/>
                </div>
            @endif

            <div class="col">
                <x-button label="Entrar" type="submit" route="" color="success"/>
            </div>
        </div>
    </form>
</div>

@endsection
