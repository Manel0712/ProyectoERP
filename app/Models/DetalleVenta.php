<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProducteServei;
use App\Models\Venta;

class DetalleVenta extends Model
{
    protected $table = "sale-details";

    protected $fillable = [
        "proposalID",
        "productID",
        "quantity-sold",
        "unitary-price",
    ];

    public function producto()
    {
        return $this->belongsTo(ProducteServei::class, "productID");
    }

    public function venta()
    {
        return $this->belongsTo(Venta::class, "proposalID");
    }

    public $timestamps = false;
}
