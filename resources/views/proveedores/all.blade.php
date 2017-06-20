@extends('layouts.app')
@section('title', 'Proveedores')


@section('content')
	<ol class="breadcrumb">
		<li><a href="{{route('home')}}">Home</a></li>
		<li class="active">Proveedores</a></li>		
	</ol>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2>Proveedores  <span class="label label-default">{{ App\Proveedor::count() }}</span>
				<a href="{{route('proveedores.create')}}" title="Crear proveedor" class="btn btn-default btn-sm">
					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Crear proveedor
				</a>
			</h2>
			<table class="table table-striped table-hover proveedores">
				<caption>A continuación encontrará todos los proveedores creados a {{Carbon\Carbon::now()->toDateTimeString()}}</caption>
				<thead>
					<tr>
						<th>Código</th>
						<th>Nombre</th>
						<th>Dirección</th>
						<th>Teléfono</th>
					</tr>
				</thead>
				<tbody>
					@forelse($proveedores as $proveedor)
						<tr class='clickable-row' data-href='{{ route('proveedores.show', ['id' => $proveedor->id]) }}'>
							<td>{{ $proveedor->codigo }}</td>
							<td>{{ ucfirst($proveedor->nombre) }}</td>
							<td>{{ ucfirst($proveedor->direccion) }}</td>
							<td>{{ $proveedor->telefono }}</td>
						</tr>
					@empty
						<tr><td colspan="4">No hay proveedores</td></tr>
					@endforelse
				</tbody>
			</table>
			<div class="text-center">
				{{ $proveedores->links() }}
			</div>
			
			@if (session('status'))
				<div class="alert alert-{{session('alert')?session('alert'):'success'}}" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>Bien hecho!</strong> {{ session('status') }}
				</div>
			@endif
		</div>
	</div>
	
@endsection