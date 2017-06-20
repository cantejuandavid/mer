@extends('layouts.app')
@section('title', 'Proveedores')


@section('content')
	<div class="tex-center">
		<h1>404: Página no encontrada</h1>
		<h2>{{ $exception->getMessage() }}</h2>
		<a href="{{ route('home') }}" title="Ir a la página principal">Ir a la página principal</a>
	</div>
@endsection