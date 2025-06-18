<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Proveedor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Crear Nuevo Proveedor</h1>
        <form action="{{ route('proveedores.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="contacto">Contacto:</label>
                <input type="text" class="form-control" id="contacto" name="contacto">
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
<button type="submit" class="btn btn-success">Crear Proveedor</button>
        </form>
        <a href="/" class="btn btn-secondary mt-3">Volver al Inicio</a>
    </div>
</body>
</html>
