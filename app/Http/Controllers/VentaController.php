<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Stock;
use App\Models\Movimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VentaController extends Controller
{
    public function vender(Request $request)
    {
        $producto_id = $request->input('producto_id');
        $cantidad = $request->input('cantidad');

        $producto = Producto::find($producto_id);

        if (!$producto) {
            return redirect('/catalogo')->with('error', 'Producto no encontrado.');
        }

        $stock = Stock::where('producto_id', $producto_id)->first();

        if (!$stock || $stock->cantidad < $cantidad) {
            return redirect('/catalogo')->with('error', 'No hay suficiente stock disponible para el producto: ' . $producto->nombre . '.');
        }

        // Decrement the quantity
        $stock->cantidad -= $cantidad;
        $stock->save();

        // Add a record to the "movimientos" table
        $movimiento = new Movimiento();
        $movimiento->producto_id = $producto_id;
        $movimiento->stock_id = $stock->id;
        $movimiento->tipo = 'venta';
        $movimiento->cantidad = $cantidad;
        $movimiento->precio_venta = $producto->precio_venta;
        $movimiento->fecha = now();
        $movimiento->save();

        return redirect('/catalogo')->with('success', 'Venta realizada correctamente.');
}
}
