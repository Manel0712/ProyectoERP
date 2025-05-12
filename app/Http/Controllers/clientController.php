<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientType;
use Illuminate\Http\Request;

class clientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        return view("clients", ["clients"=>$clients]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        /* $tipos = ClientType::all(); */
        return view("afegirClients", [/*"tipos" => $tipos,*/ "estat"=>false]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client = Client::create($request->all());
        /* $tipos = ClientType::all(); */
        return view("afegirClients", [/*"tipos" => $tipos,*/ "estat"=>true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        /* $tipos = ClientType::all(); */
        return view("detallEditarClient", ["client"=>$client, /*"tipos" => $tipos,*/ "estat"=>false, "editar"=>false]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        /* $tipos = ClientType::all(); */
        return view("detallEditarClient", ["client"=>$client, /*"tipos" => $tipos,*/ "estat"=>false, "editar"=>true]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $client->update($request->all());
        /* $tipos = ClientType::all(); */
        return view("detallEditarClient", ["client"=>$client, /*"tipos" => $tipos,*/ "estat"=>true, "editar"=>true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        $clients = Client::all();
        return view("clients", ["clients"=>$clients]);
    }
}
