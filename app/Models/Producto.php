<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio_compra',
        'precio_venta',
        'imagen',
        'proveedor_id'
    ];

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }
}
