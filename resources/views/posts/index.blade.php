@extends('adminlte::page')

@section('title', 'Listado de Categorías')

@section('content_header')
    <h1>Listado de posts</h1>
@stop

@section('content')

@livewire('admin.post-index')
@stop
