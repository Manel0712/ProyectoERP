<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ClientType;

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
        return $this->belongsTo(ClientType::class, 'tipo_cliente_id');
    }
}
