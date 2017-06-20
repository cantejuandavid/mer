@extends('layouts.app')
@section('title', 'Crear Proveedores')


@section('content')
	<ol class="breadcrumb">
		<li><a href="{{route('home')}}">Home</a></li>
		<li><a href="{{route('proveedores.index')}}">Proveedores</a></li>
		<li class="active">Crear</li>
	</ol>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-body">
					<h2>Crear Proveedor</h2>
					<form class="form-horizontal" action="{{route('proveedores.store')}}" method="post">
						{{ csrf_field() }}
						<div class="form-group">
							<label for="codigo" class="col-sm-2 control-label">Código</label>
							<div class="col-sm-10">	
								<input type="number" class="form-control input-sm" id="codigo" placeholder="Código" name="codigo">
								<span class="help-block">El último código mayor registrado es {{$codigo_max}}, se recomienda seguir la secuencia.</span>
							</div>
						</div>
						<div class="form-group">
							<label for="nombre" class="col-sm-2 control-label">Nombre</label>
							<div class="col-sm-10">
								<input type="text" class="form-control input-sm" id="nombre" placeholder="Nombre" name="nombre">
							</div>
						</div>
						<div class="form-group">
							<label for="telefono" class="col-sm-2 control-label">Teléfono</label>
							<div class="col-sm-10">
								<input type="text" class="form-control input-sm" id="telefono" placeholder="telefono" name="telefono">
							</div>
						</div>
						<div class="form-group">
							<label for="direccion" class="col-sm-2 control-label">Dirección</label>
							<div class="col-sm-10">
								<input type="text" class="form-control input-sm" id="direccion" placeholder="direccion" name="direccion">
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
				<div class="panel-footer"><a href="{{route('proveedores.index')}}" title="Atrás">Atrás</a></div>
			</div>
		</div>
	</div>
	
@endsection