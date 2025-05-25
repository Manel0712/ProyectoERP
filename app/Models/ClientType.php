<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client;

class ClientType extends Model
{
    protected $table = "client-types";
    
    protected $fillable = [
        "description"
    ];

    public function clientes()
    {
        return $this->hasMany(Client::class, 'client-typeID');
    }
}
