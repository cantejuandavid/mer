@extends('layouts.app')
@section('title', 'Proveedores')


@section('content')
	<ol class="breadcrumb">
		<li><a href="{{route('home')}}">Home</a></li>
		<li><a href="{{route('proveedores.index')}}">Proveedores</a></li>
		<li class="active">{{$proveedor->nombre}}</li>
	</ol>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-body">
					<h2>Proveedor: {{$proveedor->nombre}}</h2>
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<form class="form-horizontal" action="{{route('proveedores.update', ['id' => $proveedor->id])}}" method="post">
						{{ csrf_field() }}
						{{ method_field('PUT') }}
						<div class="form-group">
							<label for="nombre" class="col-sm-2 control-label">Nombre</label>
							<div class="col-sm-10">
								<input type="text" class="form-control input-sm" name="nombre" id="nombre" value="{{$proveedor->nombre}}">
							</div>
						</div>
						<div class="form-group">
							<label for="direccion" class="col-sm-2 control-label">Dirección</label>
							<div class="col-sm-10">
								<input type="text" class="form-control input-sm" name="direccion" id="direccion" value="{{$proveedor->direccion}}">
							</div>
						</div>
						<div class="form-group">
							<label for="telefono" class="col-sm-2 control-label">Teléfono</label>
							<div class="col-sm-10">
								<input type="text" class="form-control input-sm" name="telefono" id="telefono" value="{{$proveedor->telefono}}">
							</div>
						</div>

						<div class="form-group text-center">
							<button type="submit" title="Actualizar" class="btn btn-primary">
								<span class="glyphicon glyphicon-floppy-disk"></span> Actualizar</button>
						</div>
					</form>
				</div>
				<div class="panel-footer"><a href="{{route('proveedores.show', ['id'=>$proveedor->id])}}" title="Atrás">Atrás</a></div>
			</div>
		</div>
	</div>
	
@endsection