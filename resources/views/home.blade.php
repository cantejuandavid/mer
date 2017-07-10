@extends('layouts.app')
@section('title', 'Home')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido</div>

                <div class="panel-body">
                    Estas logueado!
                    <p>Ahora puedes a acceder a los siguientes vinculos</p>
                    <ul>
                        <li>Remisiones</li>
                        <li>Proveedores</li>
                        <li>Productos</li>
                        <li>Almacenes</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
