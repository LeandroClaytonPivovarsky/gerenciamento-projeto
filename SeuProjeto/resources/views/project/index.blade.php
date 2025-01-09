@extends('templates/main', ['titulo' => "PROJECTS"])

@section('conteudo')

<x-tableview 
    title="Lista de todos Projetos"
    :header="['ID', 'Nome', 'Data de Início']"
    crud="project"
    :data="$data"
    :fields="['id', 'name', 'start_date']"
    :hide="[true, false, false]"
    remove="nome"
    create="projects.create"
    id=""
    modal=""
/>

@endsection
