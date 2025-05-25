<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProducteServei extends Model
{

    protected $table = "products";

    protected $fillable = [
        "description",
        "price",
        "stock",
        "entry_date",
        "provider",
    ];

    public $timestamps = false;
}
