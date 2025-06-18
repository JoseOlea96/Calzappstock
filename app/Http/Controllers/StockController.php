<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Producto;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::with('producto')->get();
        return view('stocks.index', compact('stocks'));
    }

    public function update(Request $request, Stock $stock)
    {
        $request->validate([
            'cantidad' => 'required|integer',
        ]);

        $stock->update($request->all());
        return redirect()->route('stocks.index')->with('success', 'Stock actualizado exitosamente.');
    }
}