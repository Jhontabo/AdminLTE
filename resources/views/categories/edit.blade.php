@extends('adminlte::page')

{{-- Extend and customize the browser title --}}

@section('title')
{{ config('adminlte.title') }}
@hasSection('subtitle') | @yield('subtitle') @endif
@stop

{{-- Extend and customize the page content header --}}

@section('content_header')
@hasSection('content_header_title')
<h1>Esto es la vista de edit</h1>
@endif
@stop

{{-- Main content section --}}
@section('content') {{-- Eliminar el paréntesis innecesario aquí --}}
<p>Este es el contenido de la vista editar.</p>
@stop