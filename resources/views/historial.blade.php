<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movimientos</title>
    <link rel="stylesheet" href="{{ asset('css/movimientos.css') }}">
</head>
<body>
    <h1>Historial de Movimientos</h1>
    <a href="/" class="btn btn-primary mb-3 inicio-btn">Inicio</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Tipo</th>
                <th>Cantidad</th>
                <th>Precio de Compra</th>
                <th>Precio de Venta</th>
                <th>Ganancia</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movimientos as $movimiento)
            <tr>
                <td>{{ $movimiento->id }}</td>
                <td>{{ $movimiento->producto_id }}</td>
                <td>{{ $movimiento->tipo }}</td>
                <td>{{ $movimiento->cantidad }}</td>
                <td>{{ $movimiento->producto->precio_compra }}</td>
                <td>{{ $movimiento->precio_venta }}</td>
                <td>{{ number_format(floatval($movimiento->precio_venta) - floatval($movimiento->producto->precio_compra), 2) }}</td>
                <td>{{ $movimiento->fecha }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
