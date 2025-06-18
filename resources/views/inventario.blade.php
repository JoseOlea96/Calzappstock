<!DOCTYPE html>
<html lang="es">
<head>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/inventario.css') }}">
</head>
<body>
    <div class="container">
        <h1>Inventario de Productos</h1>
        <a href="/" class="btn btn-primary mb-3 inicio-btn">Inicio</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Proveedor</th>
                    <th>Precio de Compra</th>
                    <th>Precio de Venta</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inventarios as $inventario)
                <tr>
                    <td>{{ $inventario->id }}</td>
                    <td>{{ $inventario->nombre }}</td>
                    <td>{{ $inventario->descripcion }}</td>
                    <td>
    @if($inventario->proveedor)
        {{ $inventario->proveedor->nombre }}
    @else
        Sin proveedor
    @endif
</td>
                    <td>{{ $inventario->precio_compra }}</td>
                    <td>{{ $inventario->precio_venta }}</td>
                    <td>{{ $inventario->stocks->first()->cantidad ?? 0 }}</td>
                    <td>
                        <form action="{{ route('inventario.eliminar', $inventario->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger eliminar-btn" onclick="return confirm('¿Estás seguro de que quieres eliminar este producto?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="row">
            <div class="col-md-6">
                <h3>Agregar Producto al Inventario</h3>
                <form action="{{ route('inventario.agregar') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="producto_id">Producto:</label>
                        <select class="form-control" id="producto_id" name="producto_id" required>
                            @foreach($inventarios as $inventario)
                                <option value="{{ $inventario->id }}">{{ $inventario->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cantidad">Cantidad:</label>
                        <input type="number" class="form-control" id="cantidad" name="cantidad" required>
                    </div>
                    <button type="submit" class="btn btn-primary agregar-btn">Agregar</button>
                </form>
            </div>

            <div class="col-md-6">
                <h3>Agregar Nuevo Producto</h3>
                <form action="{{ route('inventario.crear') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock:</label>
                        <input type="number" class="form-control" id="stock" name="stock" required>
                    </div>
                    <div class="form-group">
                        <label for="precio_compra">Precio de Compra:</label>
                        <input type="number" class="form-control" id="precio_compra" name="precio_compra" required>
                    </div>
                    <div class="form-group">
                        <label for="precio_venta">Precio de Venta:</label>
                        <input type="number" class="form-control" id="precio_venta" name="precio_venta" required>
                    </div>
                    <div class="form-group">
                        <label for="proveedor">Proveedor:</label>
                        <select class="form-control" id="proveedor" name="proveedor" required>
                            @foreach($proveedores as $proveedor)
                                <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="imagen">Imagen:</label>
                        <input type="file" class="form-control" id="imagen" name="imagen">
                    </div>
                    <button type="submit" class="btn btn-primary agregar-btn">Crear Producto</button>
                </form>
            </div>
        </div>
    </div>
</body>
