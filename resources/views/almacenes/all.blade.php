@extends('layouts.app')
@section('title', 'Almacenes')


@section('content')
	<ol class="breadcrumb">
		<li><a href="{{route('home')}}">Home</a></li>
		<li class="active">Almacenes</a></li>		
	</ol>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2>Almacenes</h2>
			<div class="row">
				@forelse($almacenes as $almacen)
					<div class="thumbnail col-md-4">
						<div class="caption">
							{{strtoupper($almacen->nombre)}}
							<h4>{{$almacen->codigo}}</h4>
						</div>
						
					</div>						
				@empty
					<div class="col-md-8 col-md-offset-2">
						<h3>No hay almacendes creados!</h3>	
					</div>
				@endforelse
			</div>

			<div class="text-center">
				<a href="{{route('almacenes.create')}}" title="Crear producto" class="btn btn-default">
					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Crear almacén
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