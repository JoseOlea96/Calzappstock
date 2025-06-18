<?php

namespace App\Http\Controllers;

use App\Models\Movimiento;
use Illuminate\Http\Request;

class MovimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movimientos = Movimiento::with('producto')->get();
        return view('historial', compact('movimientos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productos = \App\Models\Producto::all();
        return view('movimientos.create', compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'tipo' => 'required|string',
            'cantidad' => 'required|integer',
            'precio_compra' => 'nullable|numeric',
            'precio_venta' => 'nullable|numeric',
        ]);

        Movimiento::create($request->all());

        return redirect()->route('movimientos.index')->with('success', 'Movimiento creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movimiento $movimiento)
    {
        return view('movimientos.show', compact('movimiento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movimiento $movimiento)
    {
        $productos = \App\Models\Producto::all();
        return view('movimientos.edit', compact('movimiento', 'productos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movimiento $movimiento)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'tipo' => 'required|string',
            'cantidad' => 'required|integer',
            'precio_compra' => 'nullable|numeric',
            'precio_venta' => 'nullable|numeric',
        ]);

        $movimiento->update($request->all());

        return redirect()->route('movimientos.index')->with('success', 'Movimiento actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movimiento $movimiento)
    {
        $movimiento->delete();

        return redirect()->route('movimientos.index')->with('success', 'Movimiento eliminado correctamente.');
    }
}
