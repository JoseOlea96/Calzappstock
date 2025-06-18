<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = ['producto_id', 'cantidad'];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
