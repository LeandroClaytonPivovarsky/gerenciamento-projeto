@extends('templates/site')

@section('conteudo')

    <div class="btn-group btn-group-toggle" data-toggle="buttons">
    <label class="btn btn-primary">
        <input type="radio" name="options" id="option1" autocomplete="off" checked> CPF
    </label>
    <label class="btn btn-success">
        <input type="radio" name="options" id="option2" autocomplete="off" > CNPJ
    </label>
    </div>

    <form action="{{ route('site.submit') }}" method="POST">
        @csrf
        <h2 class="text-success fw-bold">REGISTRO DE NOVO CLIENTE</h2>
        <x-textbox name="cpf" label="CPF" type="text" value="null" disabled="false" id="changedLabel"/>
        <x-textbox name="email" label="E-mail" type="email" value="null" disabled="false" id=""/>
        <x-textbox name="name" label="Nome" type="text" value="null" disabled="false" id=""/>
        <div class="d-flex justify-content-end">
            <x-button label="Registrar" type="submit" route="" color="success"/>
        </div>
    </form>

@endsection

@section('script')

    <script src="{{asset('js/labelLogic.js')}}" ></script>

@endsection