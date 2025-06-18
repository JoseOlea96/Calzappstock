<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with('categoria', 'proveedor')->get();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $proveedores = Proveedor::all();
        return view('productos.create', compact('proveedores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio_compra' => 'required|numeric',
            'precio_venta' => 'required|numeric',
            'proveedor_id' => 'nullable|exists:proveedores,id',
        ]);

        $producto = new Producto();
        $producto->nombre = $request->input('nombre');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio_compra = $request->input('precio_compra');
        $producto->precio_venta = $request->input('precio_venta');

        // Assign proveedor_id only if it is provided
        if ($request->filled('proveedor_id')) {
            $producto->proveedor_id = $request->input('proveedor_id');
        }

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '.' . $imagen->getClientOriginalExtension();
            $imagen->move(public_path('uploads'), $nombreImagen);
            $producto->imagen = $nombreImagen;
        }

        $producto->save();

        return redirect()->route('inventario')->with('success', 'Producto creado exitosamente.');
    }

    public function edit(Producto $producto)
    {
        $proveedores = Proveedor::all();
        return view('productos.edit', compact('producto', 'proveedores'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio_compra' => 'required|numeric',
            'precio_venta' => 'required|numeric',
            'proveedor_id' => 'nullable|exists:proveedores,id',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $producto->update($request->all());
        return redirect()->route('inventario')->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('inventario')->with('success', 'Producto eliminado exitosamente.');
    }
}
