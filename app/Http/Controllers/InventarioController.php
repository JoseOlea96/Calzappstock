<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Stock;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function index()
    {
        $inventarios = Producto::with('stocks', 'proveedor')->get();
        $proveedores = Proveedor::all();
        return view('inventario', compact('inventarios', 'proveedores'));
    }

    public function agregar(Request $request)
    {
        $request->validate([
            'cantidad' => 'required|numeric|min:1',
            'producto_id' => 'required|exists:productos,id',
        ]);

        $cantidad = $request->input('cantidad');
        $producto_id = $request->input('producto_id');

        $producto = Producto::find($producto_id);

        if (!$producto) {
            return redirect('/inventario')->with('error', 'Producto no encontrado.');
        }

        $stock = Stock::where('producto_id', $producto_id)->first();

        if (!$stock) {
            $stock = new Stock();
            $stock->producto_id = $producto_id;
            $stock->cantidad = 0;
        }

        $stock->cantidad += $cantidad;
        $stock->save();

        return redirect('/inventario')->with('success', 'Cantidad agregada al inventario.');
    }

    public function crear(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string',
            'stock' => 'required|numeric|min:0',
            'precio_compra' => 'required|numeric|min:0',
            'precio_venta' => 'required|numeric|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'proveedor' => 'required|exists:proveedores,id',
        ]);

        $producto = new Producto();
        $producto->nombre = $request->input('nombre');
        $producto->descripcion = $request->input('descripcion');
        $producto->proveedor_id = $request->input('proveedor');
        $producto->precio_compra = $request->input('precio_compra');
        $producto->precio_venta = $request->input('precio_venta');

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '.' . $imagen->getClientOriginalExtension();
            $imagen->move(public_path('uploads'), $nombreImagen);
            $producto->imagen = $nombreImagen;
        }

        $producto->save();

        $stock = new Stock();
        $stock->producto_id = $producto->id;
        $stock->cantidad = $request->input('stock');
        $stock->save();

        return redirect('/inventario')->with('success', 'Producto creado correctamente.');
    }

    public function catalogo()
    {
        $productos = Producto::all();
        return view('catalogo', compact('productos'));
    }

    public function eliminar($id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return redirect('/inventario')->with('error', 'Producto no encontrado.');
        }

        $producto->delete();

        return redirect('/inventario')->with('success', 'Producto eliminado correctamente.');
    }
}
