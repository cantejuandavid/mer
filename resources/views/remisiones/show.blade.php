@extends('layouts.app')
@section('title', 'Detalle Remisiones')


@section('content')
	<ol class="breadcrumb">
		<li><a href="{{route('home')}}">Home</a></li>
		<li><a href="{{route('remisiones.index')}}">Remisiones</a></li>
		<li class="active">Detalle</li>
	</ol>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-body">
					<h2>Remisión</h2>
					<form class="form-horizontal" action="{{route('remisiones.update', ['id' => $remision->id])}}" method="post">
						{{ csrf_field() }}
						{{ method_field('PUT') }}
						<div class="form-group">
							<label for="nombre" class="col-sm-2 control-label">Proveedor</label>
							<div class="col-sm-6">
								@if(!count($proveedores))
									<a href="{{route('proveedores.create')}}" title="Crear proveedor">Crear Proveedor</a>
								@else
									<select class="form-control" name="idProveedor">
										<option value="">Seleccionar proveedor</option>
										@foreach($proveedores as $proveedor)
											<option value="{{$proveedor->id}}" {{$remision->idProveedor == $proveedor->id?'selected':''}}>[{{$proveedor->codigo}}] {{$proveedor->nombre}}</option>
										@endforeach
									</select>
								@endif
							</div>
							<div class="col-sm-4">
								<a href="{{route('proveedores.create')}}" title="Crear proveedor">Crear proveedor</a>
							</div>
						</div>
						<div class="form-group">
							<label for="telefono" class="col-sm-2 control-label">Almacén</label>
							<div class="col-sm-6">
								@if(!count($almacenes))
									<a href="{{route('almacenes.create')}}" title="Crear proveedor">Crear Almacén</a>
								@else
									<select class="form-control" name="idAlmacen">
										<option value="">Seleccionar almacén</option>									
										@foreach($almacenes as $almacen)
											<option value="{{$almacen->id}}" {{$remision->idAlmacen == $almacen->id?'selected':''}}>{{$almacen->nombre}}</option>
										@endforeach
									</select>
								@endif
							</div>
							<div class="col-sm-4">
								<a href="{{route('almacenes.create')}}" title="Crear">Crear almacen</a>
							</div>
						</div>	
						<div class="form-group text-center">
							<button type="submit" class="btn btn-primary">
								<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> Actualizar
							</button>	
						</div>					
					</form>
					<h3>Agregar Productos</h3>
					<form action="{{route('add_producto_to_remision')}}" method="post" class="form-horizontal">
						{{ csrf_field() }}
						<input type="hidden" name="idRemisionEntrada" value="{{$remision->id}}">
						<div class="form-group">
							@if(!count($proveedores))
								<a href="{{route('productos.create')}}" title="Crear producto">Crear producto</a>
							@else
								<div class="col-md-8">
									<select class="form-control" name="idProducto">
										<option value="">Seleccionar producto</option>
										@foreach($productos as $producto)
											<option value="{{$producto->id}}">[{{$producto->codigo}}] {{$producto->nombre}}</option>
										@endforeach
									</select>
								</div>
								<div class="col-md-4">
									<input type="number" name="cantidad" class="form-control" placeholder="Cantidad">
								</div>
							@endif	
						</div>
						
						<div class="form-group text-center">
							<button type="submit" class="btn btn-default">Agregar producto</button>	
						</div>
					@if (session('status'))
						<div class="alert alert-{{session('alert')?session('alert'):'success'}}" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							{{ session('status') }}
						</div>
					@endif	
					</form>
					<h3>Productos Actuales</h3>

					<ul>
						@forelse ($productos_actuales as $producto)
							<li>[{{ $producto->cantidad }}] {{ $producto->nombre }}</li>
						@empty
							<li>No hay productos actualmente</li>
						@endforelse
					</ul>

					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<p class="bg-info">Para confirmar la Remisión debe ir a la hora princial <a href="{{route('remisiones.index')}}" title="">Remisiones</a></p>
				</div>
				<div class="panel-footer"><a href="{{route('remisiones.index')}}" title="Atrás">Atrás</a></div>
			</div>
		</div>
	</div>
	
@endsection