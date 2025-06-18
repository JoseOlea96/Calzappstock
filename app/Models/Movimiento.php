<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    use HasFactory;

    protected $table = 'movimientos';

    public $timestamps = false;

    protected $fillable = [
        'producto_id',
        'stock_id',
        'tipo',
        'cantidad',
        'precio_compra',
        'precio_venta',
        'fecha',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
