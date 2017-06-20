@extends('layouts.app')
@section('title', 'Crear Productos')


@section('content')
	<ol class="breadcrumb">
		<li><a href="{{route('home')}}">Home</a></li>
		<li><a href="{{route('productos.index')}}">Productos</a></li>
		<li class="active">Crear</li>
	</ol>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-body">
					<h2>Crear Producto</h2>
					<form class="form-horizontal" action="{{route('productos.store')}}" method="post">
						{{ csrf_field() }}
						<div class="form-group">
							<label for="codigo" class="col-sm-2 control-label">Código</label>
							<div class="col-sm-10">	
								<input type="number" class="form-control input-sm" id="codigo" placeholder="Código" name="codigo" value="{{ request()->old('codigo') }}">
								<span class="help-block">El último código mayor registrado es {{$codigo_max}}, se recomienda seguir la secuencia.</span>
							</div>
						</div>
						<div class="form-group">
							<label for="nombre" class="col-sm-2 control-label">Nombre</label>
							<div class="col-sm-10">
								<input type="text" class="form-control input-sm" id="nombre" placeholder="Nombre" name="nombre" value="{{ request()->old('nombre') }}">
							</div>
						</div>
						<div class="form-group">
							<label for="descripcion" class="col-sm-2 control-label">Descripción</label>
							<div class="col-sm-10">
								<textarea type="text" class="form-control input-sm" id="descripcion" placeholder="descripcion" name="descripcion">{{ request()->old('descripcion') }}</textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="precio_venta" class="col-sm-2 control-label">Precio de venta</label>
							<div class="col-sm-4">
								<input type="text" id="precio_venta" name="precio_venta" class="form-control input-sm" value="{{ request()->old('precio_venta')}}">
							</div>
							<label for="unidad" class="col-sm-2 control-label">Unidad de medida</label>
							<div class="col-sm-4">
								<select class="form-control input-sm" id="unidad" placeholder="unidad" name="unidad"  value="{{ request()->old('unidad') }}">
									<option value="unidad">Unidad</option>
									<option value="libra">Libra</option>
									<option value="kilo">Kilo</option>
									<option value="caja">Caja</option>
									<option value="arroba">Arroba</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							
						</div>
						<div class="form-group">
							<label for="StockMinimo" class="col-sm-3 control-label">Stock Mínimo</label>
							<div class="col-sm-3">
								<input type="number" class="form-control input-sm" id="StockMinimo" name="StockMinimo" value="{{ request()->old('StockMinimo', 1) }}">
							</div>
							<label for="StockMaximo" class="col-sm-3 control-label">Stock Máximo</label>
							<div class="col-sm-3">
								<input type="number" class="form-control input-sm" id="StockMaximo" name="StockMaximo" value="{{ request()->old('StockMaximo', 100) }}">
							</div>
						</div>
						<div class="form-group text-center">
							<button type="submit" class="btn btn-primary">
								<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> Crear
							</button>	
						</div>
					</form>
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
				</div>
				<div class="panel-footer"><a href="{{route('productos.index')}}" title="Atrás">Atrás</a></div>
			</div>
		</div>
	</div>
	
@endsection