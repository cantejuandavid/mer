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
					<h2>Proveedor: {{$producto->nombre}}</h2>
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<form class="form-horizontal" action="{{route('productos.update', ['id' => $producto->id])}}" method="post">
						{{ csrf_field() }}
						{{ method_field('PUT') }}

						<div class="form-group">
								<label class="col-md-3 control-label">Nombre</label>
								<div class="col-sm-9">
									<input type="text" class="form-control input-sm" name="nombre" id="nombre" value="{{$producto->nombre}}">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Descripcion</label>
								<div class="col-sm-9">
									<textarea class="form-control input-sm" name="descripcion" id="descripcion">{{$producto->descripcion}}</textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="precio_venta" class="col-sm-2 control-label">Precio de venta</label>
								<div class="col-sm-4">
									<input type="text" id="precio_venta" name="precio_venta" class="form-control input-sm" value="{{$producto->precio_venta}}">
								</div>
								<label for="unidad" class="col-sm-2 control-label">Unidad de medida</label>
								<div class="col-sm-4">
									<select class="form-control input-sm" id="unidad" placeholder="unidad" name="unidad">
										<option value="unidad" @if($producto->unidad=='unidad') selected="selected" @endif>Unidad</option>
										<option value="libra" @if($producto->unidad=='libra') selected="selected" @endif>Libra</option>
										<option value="kilo" @if($producto->unidad=='kilo') selected="selected" @endif>Kilo</option>
										<option value="caja" @if($producto->unidad=='caja') selected="selected" @endif>Caja</option>
										<option value="arroba" @if($producto->unidad=='arroba') selected="selected" @endif>Arroba</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="StockMinimo" class="col-sm-3 control-label">Stock Mínimo</label>
								<div class="col-sm-3">
									<input type="number" class="form-control input-sm" id="StockMinimo" name="StockMinimo" value="{{$producto->StockMinimo}}">
								</div>
								<label for="StockMaximo" class="col-sm-3 control-label">Stock Máximo</label>
								<div class="col-sm-3">
									<input type="number" class="form-control input-sm" id="StockMaximo" name="StockMaximo" value="{{$producto->StockMaximo}}">
								</div>
							</div>



						<div class="form-group text-center">
							<button type="submit" title="Actualizar" class="btn btn-primary">
								<span class="glyphicon glyphicon-floppy-disk"></span> Actualizar</button>
						</div>
					</form>
				</div>
				<div class="panel-footer"><a href="{{route('productos.show', ['id'=>$producto->id])}}" title="Atrás">Atrás</a></div>
			</div>
		</div>
	</div>
	
@endsection