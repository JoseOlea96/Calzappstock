@extends('layouts.app')

@section('content')
    <h1>Editar Movimiento de Stock</h1>

    <form action="{{ route('movimientos.update', $movimiento->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="producto_id">Producto</label>
            <select name="producto_id" id="producto_id" class="form-control">
                @foreach ($productos as $producto)
                    <option value="{{ $producto->id }}" {{ $movimiento->producto_id == $producto->id ? 'selected' : '' }}>{{ $producto->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tipo">Tipo</label>
            <select name="tipo" id="tipo" class="form-control">
                <option value="entrada" {{ $movimiento->tipo == 'entrada' ? 'selected' : '' }}>Entrada</option>
                <option value="salida" {{ $movimiento->tipo == 'salida' ? 'selected' : '' }}>Salida</option>
            </select>
        </div>

        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control" value="{{ $movimiento->cantidad }}">
        </div>

        <div class="form-group">
            <label for="precio_compra">Precio Compra</label>
            <input type="number" name="precio_compra" id="precio_compra" class="form-control" value="{{ $movimiento->precio_compra }}">
        </div>

        <div class="form-group">
            <label for="precio_venta">Precio Venta</label>
            <input type="number" name="precio_venta" id="precio_venta" class="form-control" value="{{ $movimiento->precio_venta }}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('historial') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
