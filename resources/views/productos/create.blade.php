<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
    <link rel="stylesheet" href="{{ asset('css/inventario.css') }}">
</head>
<body>
    <h1>Crear Producto</h1>
    <a href="{{ route('inventario') }}" class="btn btn-primary mb-3">Inventario</a>

    <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="precio_compra" class="form-label">Precio Compra</label>
            <input type="number" name="precio_compra" id="precio_compra" class="form-control" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="precio_venta" class="form-label">Precio Venta</label>
            <input type="number" name="precio_venta" id="precio_venta" class="form-control" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="proveedor_id" class="form-label">Proveedor</label>
            <select name="proveedor_id" id="proveedor_id" class="form-control">
                <option value="">Seleccionar Proveedor</option>
                @foreach($proveedores as $proveedor)
                    <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="file" name="imagen" id="imagen" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Crear</button>
        <a href="{{ route('inventario') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>
