<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;

// Todas las rutas protegidas por login
Route::middleware(['auth'])->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/catalogo', [InventarioController::class, 'catalogo'])->name('catalogo');

    Route::get('/proveedores/create', [HomeController::class, 'createProveedor'])->name('proveedores.create');
    Route::post('/proveedores', [HomeController::class, 'storeProveedor'])->name('proveedores.store');
    Route::get('/proveedores', [HomeController::class, 'indexProveedor'])->name('proveedores.index');
    Route::get('/proveedores/{id}/edit', [HomeController::class, 'editProveedor'])->name('proveedores.edit');

    });

    Route::get('/inventario', [InventarioController::class, 'index'])->name('inventario');
    Route::post('/inventario/agregar', [InventarioController::class, 'agregar'])->name('inventario.agregar');
    Route::post('/inventario/crear', [InventarioController::class, 'crear'])->name('inventario.crear');
    Route::delete('/inventario/eliminar/{id}', [InventarioController::class, 'eliminar'])->name('inventario.eliminar');

    Route::get('/historial', [MovimientoController::class, 'index'])->name('historial');

    Route::get('/admin/agregar-producto', [AdminController::class, 'agregarProducto']);

    Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
    Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
    Route::post('/productos/store', [ProductoController::class, 'store'])->name('productos.store');

    Route::post('/vender', [VentaController::class, 'vender'])->name('vender');

// Estas rutas deben quedar para que funcione el login y registro
require __DIR__.'/auth.php';
