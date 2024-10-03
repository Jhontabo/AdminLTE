@extends('adminlte::page')

@section('title', 'Listado de Categorías')

@section('content_header')
    <h1>Listado de posts</h1>
@stop

@section('content')
@if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
@endif

@livewire('admin.post-index')
@stop
