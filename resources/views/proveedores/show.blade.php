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
					<div class="form-horizontal">
						<form>
							{{ csrf_field() }}
							<div class="form-group">
								<label class="col-sm-4 control-label">Dirección</label>
								<div class="col-sm-8">
									<p class="form-control-static">{{$proveedor->direccion}}</p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Teléfono</label>
								<div class="col-sm-8">
									<p class="form-control-static">{{$proveedor->telefono}}</p>
								</div>
							</div>
							

							
						</form>
						<div class="text-center">
							
							<form action="{{ action('ProveedorController@destroy', ['id' => $proveedor->id]) }}" method="post" accept-charset="utf-8">
								<a href="{{ route('proveedores.edit', ['id' => $proveedor->id]) }}" title="Editar" class="btn btn-primary">
									<span class="glyphicon glyphicon-edit"></span> Editar</a>
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<button type="submit" class="btn btn-danger">
									<span class="glyphicon glyphicon-trash"></span> Eliminar</button>
							</form>	
						</div>
						
					</div>
					
					
				</div>
				<div class="panel-footer"><a href="{{route('proveedores.index')}}" title="Atrás">Atrás</a></div>
			</div>
		</div>
	</div>
	
@endsection