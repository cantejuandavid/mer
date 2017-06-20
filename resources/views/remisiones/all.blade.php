@extends('layouts.app')
@section('title', 'Remisiones')


@section('content')
	<ol class="breadcrumb">
		<li><a href="{{route('home')}}">Home</a></li>
		<li class="active">Remisiones</a></li>		
	</ol>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2>Remisiones</h2>
			<table class="table proveedores">
				<caption>Las siguientes son las remisiones a fecha de {{Carbon\Carbon::now()->toDateTimeString()}}</caption>
				<thead>
					<tr>
						<th>Código</th>
						<th>FechaDocumento</th>
						<th>Proveedor</th>
						<th>Almacen</th>
						<th>Estado</th>						
						<th>Acción</th>
					</tr>
				</thead>
				<tbody>
					@forelse($remisiones as $remision)
						<tr class='clickable-row {{$remision->estado == 3  ? 'bg-danger':'' }} {{$remision->estado == 2  ? 'bg-success':'' }} ' data-href='{{ route('remisiones.show', ['id' => $remision->id]) }}'>
							<td>{{ $remision->codigo }}</td>
							<td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $remision->created_at)->format('Y-m-d') }}</td>
							<td>{{ ucfirst($remision->proveedor_id) }}</td>
							<td>{{ strtoupper($remision->almacen_id) }}</td>
							<td>
								@if($remision->estado === 1)
									Registrada
								@elseif($remision->estado === 2)
									Confirmada
								@else
									Anulada
								@endif

							</td>
							<td>
								@if($remision->estado === 1)

									<form action="{{ route('confirm', ['id'=>$remision->id]) }}" method="post">
										{{ csrf_field() }}
										<button type="submit" class="btn btn-primary btn-xs">Confirmar</button>
									</form>									
									<a href="" title="Anular" class="btn btn-danger btn-xs">Anular</a>
								@elseif($remision->estado === 2)
									
								@else
									<form action="{{ action('RemisionEntradaController@destroy', ['id' => $remision->id]) }}" method="post" accept-charset="utf-8">										
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
										<button type="submit" class="btn btn-danger btn-xs">
											<span class="glyphicon glyphicon-trash"></span> Eliminar</button>
									</form>
								@endif								

							</td>
						</tr>
					@empty
						<tr><td colspan="5" class="text-center"><h3>No hay remisiones creadas</h3></td></tr>
					@endforelse
				</tbody>
			</table>
			<div class="text-center">
				<a href="{{route('remisiones.create')}}" title="Crear remision" class="btn btn-default">
					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Crear remision
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