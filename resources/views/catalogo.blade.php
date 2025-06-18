<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catálogo</title>
    <link rel="stylesheet" href="{{ asset('css/catalogo.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
</head>
<body>
    <div class="container">
        <main>
            <h1>Catálogo de Ventas</h1>
            <a href="/" class="btn btn-primary mb-3">Inicio</a>
            <div class="product-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                @foreach($productos as $producto)
                <div class="product-item" style="text-align: center; display: flex; flex-direction: column; align-items: center; padding: 10px;">
                    <div style="width: 200px; height: 200px; overflow: hidden; margin-bottom: 10px;">
                        <img src="{{ asset('uploads/' . $producto->imagen) }}" alt="Product Image" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <h3>{{ $producto->nombre }}</h3>
                    <p class="price">${{ number_format($producto->precio_venta, 0, ',', '.') }}</p>
                    <p>Stock: {{ $producto->stocks()->first()->cantidad ?? 0 }}</p>
                    <form action="{{ route('vender') }}" method="POST" onsubmit="return confirm('¿Está seguro de que desea vender este producto?');" style="text-align: center;">
                        @csrf
                        <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                        <div class="form-group">
                            <label for="cantidad">Cantidad :</label>
                            <input type="number" class="form-control" id="cantidad" name="cantidad" value="1" min="1" max="{{ $producto->stocks()->first()->cantidad ?? 0 }}" required>
                        </div>
                        <div style="margin-top: 10px; display: flex; justify-content: center;">
                            <button type="submit" class="btn btn-primary product-button">Vender</button>
                        </div>
                    </form>
                </div>
                @endforeach
            </div>
        </main>
    </div>

    <script>
        @if(session('success'))
            Swal.fire({
                title: 'Éxito!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'Ok'
            })
        @endif

        @if(session('error'))
            Swal.fire({
                title: 'Error!',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonText: 'Ok'
            })
        @endif
    </script>
</body>
</html>
