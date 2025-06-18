@extends('layouts.app')

@section('content')
    <h1>Detalles del Movimiento</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Producto: {{ $movimiento->producto->nombre }}</h5>
            <p class="card-text">Tipo: {{ $movimiento->tipo }}</p>
            <p class="card-text">Cantidad: {{ $movimiento->cantidad }}</p>
            <p class="card-text">Precio Compra: {{ $movimiento->precio_compra }}</p>
            <p class="card-text">Precio Venta: {{ $movimiento->precio_venta }}</p>
            <p class="card-text">Fecha: {{ $movimiento->fecha }}</p>
        </div>
    </div>

    <a href="{{ route('historial') }}" class="btn btn-secondary">Volver</a>
@endsection
