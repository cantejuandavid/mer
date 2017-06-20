@extends('layouts.app')
@section('title', 'Productos')


@section('content')
	<ol class="breadcrumb">
		<li><a href="{{route('home')}}">Home</a></li>
		<li class="active">Productos</a></li>		
	</ol>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2>Productos</h2>
			<table class="table table-striped table-hover proveedores">
				<caption>A continuación encontrará todos los productos creados a {{Carbon\Carbon::now()->toDateTimeString()}}</caption>
				<thead>
					<tr>
						<th>Código</th>
						<th>Nombre</th>
						<th>Descripción</th>
						<th>Precio Venta</th>
						<th>StockMinimo</th>
						<th>StockMáximo</th>
					</tr>
				</thead>
				<tbody>
					@forelse($productos as $producto)
						<tr class='clickable-row' data-href='{{ route('productos.show', ['id' => $producto->id]) }}'>
							<td>{{ $producto->codigo }}</td>
							<td>{{ strtoupper($producto->nombre) }}</td>
							<td>{{ ucfirst($producto->descripcion) }}</td>
							<td>{{ $producto->precio_venta }}</td>
							<td>{{ $producto->StockMinimo }}</td>
							<td>{{ $producto->StockMaximo }}</td>
						</tr>
					@empty
						<tr><td colspan="6" class="text-center"><h3>No hay productos</h3></td></tr>
					@endforelse
				</tbody>
			</table>
			<div class="text-center">
				<a href="{{route('productos.create')}}" title="Crear producto" class="btn btn-default">
					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Crear producto
				</a>	
			</div>
			
			@if (session('status'))
				<div class="alert alert-success" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>Bien hecho!</strong> {{ session('status') }}
				</div>
			@endif
		</div>
	</div>
	
@endsection