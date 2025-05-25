<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client;

class Venta extends Model
{
    protected $table = "sale-proposals";

    protected $fillable = [
        "clientID",
        "state",
        "details",
    ];

    public function cliente()
    {
        return $this->belongsTo(Client::class, 'clientID');
    }

    public $timestamps = false;
}
