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
					<form id="createRemisionForm" class="form-horizontal" action="{{route('remisiones.store')}}" method="post">
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
									<p>No hay proveedores creados!</p>
								@else
									<select class="form-control" name="idProveedor">
										<option value="">Seleccionar proveedor</option>
										@foreach($proveedores as $proveedor)
											<option value="{{$proveedor->id}}">[{{$proveedor->codigo}}] {{$proveedor->nombre}}</option>
										@endforeach
									</select>
								@endif
							</div>
							<div class="col-sm-4">
								<button class="btn btn-default btn-sm popup_class" data-popupUrl="{{route('proveedores.create')}}">Crear proveedor</button>
							</div>
						</div>
						<div class="form-group">
							<label for="telefono" class="col-sm-2 control-label">Almacén</label>
							<div class="col-sm-6">
								@if(!count($almacenes))
									<p>No hay almacenes creados!</p>
								@else
									<select class="form-control" name="idAlmacen">
										<option value="">Seleccionar almacén</option>									
										@foreach($almacenes as $almacen)
											<option value="{{$almacen->id}}">{{$almacen->nombre}}</option>
										@endforeach
									</select>
								@endif
							</div>
							<div class="col-sm-4">							
								<button class="btn btn-default btn-sm popup_class" data-popupUrl="{{route('almacenes.create')}}">Crear Almacén</button>

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