@extends('layouts.app')
@section('title', 'Crear Remisiones')


@section('content')
	<ol class="breadcrumb">
		<li><a href="{{route('home')}}">Home</a></li>
		<li><a href="{{route('remisiones.index')}}">Remisiones</a></li>
		<li class="active">Crear</li>
	</ol>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-body">
					<h2>Crear Remisión</h2>
					<form class="form-horizontal" action="{{route('remisiones.store')}}" method="post">
						{{ csrf_field() }}
						<div class="form-group">
							<label for="codigo" class="col-sm-2 control-label">Código</label>
							<div class="col-sm-10">	
								<input type="number" class="form-control input-sm" id="codigo" placeholder="Código" name="codigo" autofocus>
								<span class="help-block">El último código mayor registrado es {{$codigo_max}}, se recomienda seguir la secuencia.</span>
							</div>
						</div>
						<div class="form-group">
							<label for="nombre" class="col-sm-2 control-label">Proveedor</label>
							<div class="col-sm-6">
								@if(!count($proveedores))
									<a href="{{route('proveedores.create')}}" title="Crear proveedor">Crear Proveedor</a>
								@else
									<select class="form-control" name="proveedor_id">
										<option value="">Seleccionar proveedor</option>
										@foreach($proveedores as $proveedor)
											<option value="{{$proveedor->id}}">[{{$proveedor->codigo}}] {{$proveedor->nombre}}</option>
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
									<select class="form-control" name="almacen_id">
										<option value="">Seleccionar almacén</option>									
										@foreach($almacenes as $almacen)
											<option value="{{$almacen->id}}">{{$almacen->nombre}}</option>
										@endforeach
									</select>
								@endif
							</div>
							<div class="col-sm-4">
								<a href="{{route('almacenes.create')}}" title="Crear proveedor">Crear almacén</a>
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
				<div class="panel-footer"><a href="{{route('remisiones.index')}}" title="Atrás">Atrás</a></div>
			</div>
		</div>
	</div>
	
@endsection