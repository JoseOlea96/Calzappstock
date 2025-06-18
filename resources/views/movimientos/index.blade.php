@extends('layouts.app')

@section('content')
    <h1>Movimientos de Stock</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('movimientos.create') }}" class="btn btn-primary">Crear Movimiento</a>

    <table class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Tipo</th>
                <th>Cantidad</th>
                <th>Precio Compra</th>
                <th>Precio Venta</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movimientos as $movimiento)
                <tr>
                    <td>{{ $movimiento->producto->nombre }}</td>
                    <td>{{ $movimiento->tipo }}</td>
                    <td>{{ $movimiento->cantidad }}</td>
                    <td>{{ $movimiento->precio_compra }}</td>
                    <td>{{ $movimiento->precio_venta }}</td>
                    <td>{{ $movimiento->fecha }}</td>
                    <td>
                        <a href="{{ route('movimientos.show', $movimiento->id) }}" class="btn btn-sm btn-info">Ver</a>
                        <a href="{{ route('movimientos.edit', $movimiento->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('movimientos.destroy', $movimiento->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este movimiento?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
