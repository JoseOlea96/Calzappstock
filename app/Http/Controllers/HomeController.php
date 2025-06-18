<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movimiento;
use App\Models\Proveedor;
use App\Models\Producto;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $totalVentas = Movimiento::where('tipo', 'venta')->sum('precio_venta');
        $ventasHoy = Movimiento::where('tipo', 'venta')
            ->whereDate('fecha', Carbon::today())
            ->count();

        $productosBajoStock = Producto::whereHas('stocks', function ($query) {
            $query->where('cantidad', '<=', 1);
        })->count();

        return view('welcome', compact('totalVentas', 'ventasHoy', 'productosBajoStock'));
    }

    public function createProveedor()
    {
        return view('proveedores.create');
    }

    public function storeProveedor(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'contacto' => 'nullable|string',
            'email' => 'nullable|email',
        ]);

        Proveedor::create([
            'nombre' => $request->nombre,
            'contacto' => $request->contacto,
            'email' => $request->email,
        ]);

        return redirect('/')->with('success', 'Proveedor creado correctamente.');
    }
}
