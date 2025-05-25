<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ClientType;
use App\Models\Venta;

class Client extends Model
{
    protected $fillable = [
        "first-name",
        "last-name",
        "email",
        "phone",
        "address",
        "client-typeID",
    ];

    public function tipoCliente()
    {
        return $this->belongsTo(ClientType::class, 'client-typeID');
    }

    public function ventas()
    {
        return $this->hasMany(Venta::class, 'clientID');
    }

    public $timestamps = false;
}
