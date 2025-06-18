<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Stock;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function agregarProducto()
    {
        $producto = new Producto();
        $producto->nombre = 'Producto de prueba';
        $producto->descripcion = 'Descripción de prueba';
        $producto->precio = 100;
        $producto->save();

        $stock = new Stock();
        $stock->producto_id = $producto->id;
        $stock->cantidad = 100;
        $stock->save();

        return "Producto agregado correctamente";
    }
}
