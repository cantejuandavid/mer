@extends('layouts.app')
@section('title', 'Productos')


@section('content')
	<ol class="breadcrumb">
		<li><a href="{{route('home')}}">Home</a></li>
		<li><a href="{{route('productos.index')}}">Productos</a></li>
		<li class="active">{{$producto->nombre}}</li>
	</ol>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-body">
					<h2>Producto: {{$producto->nombre}}</h2>
					<div class="form-horizontal">
						<form>
							{{ csrf_field() }}
							<div class="form-group">
								<label class="col-sm-4 control-label">Nombre</label>
								<div class="col-sm-8">
									<p class="form-control-static">{{$producto->nombre}}</p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Descripcion</label>
								<div class="col-sm-8">
									<p class="form-control-static">{{$producto->descripcion}}</p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Precio de Venta</label>
								<div class="col-sm-8">
									<p class="form-control-static">{{$producto->precio_venta}}</p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Unidad de medida</label>
								<div class="col-sm-8">
									<p class="form-control-static">{{$producto->unidad}}</p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">StockMinimo</label>
								<div class="col-sm-8">
									<p class="form-control-static">{{$producto->StockMinimo}}</p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">StockMaximo</label>
								<div class="col-sm-8">
									<p class="form-control-static">{{$producto->StockMaximo}}</p>
								</div>
							</div>							
						</form>
						<div class="text-center">
							
							<form action="{{ action('ProductoController@destroy', ['id' => $producto->id]) }}" method="post" accept-charset="utf-8">
								<a href="{{ route('productos.edit', ['id' => $producto->id]) }}" title="Editar" class="btn btn-primary">
									<span class="glyphicon glyphicon-edit"></span> Editar</a>
									
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<button type="submit" class="btn btn-danger">
									<span class="glyphicon glyphicon-trash"></span> Eliminar</button>
							</form>	
						</div>
						
					</div>
					
					
				</div>
				<div class="panel-footer"><a href="{{route('productos.index')}}" title="Atrás">Atrás</a></div>
			</div>
		</div>
	</div>
	
@endsection