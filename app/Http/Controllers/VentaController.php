<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Client;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventas = Venta::with('cliente')->get();
        return view("ventas", ["ventas"=>$ventas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Client::all();
        return view("afegirVenta", ["clientes"=>$clientes, "estat"=>false]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $venta = Venta::create($request->all());
        $clientes = Client::all();
        return view("afegirVenta", ["clientes"=>$clientes, "estat"=>true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Venta $venta)
    {
        return redirect('DetalleVenta/' . $venta["id"]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venta $venta)
    {
        $clientes = Client::all();
        return view("editarVenta", ["venta"=>$venta, "clientes"=>$clientes, "estat"=>false]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venta $venta)
    {
        $venta->update($request->all());
        $clientes = Client::all();
        return view("editarVenta", ["venta"=>$venta, "clientes"=>$clientes, "estat"=>true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venta $venta)
    {
        $venta->delete();
        $ventas = Venta::with('cliente')->get();
        return view("ventas", ["ventas"=>$ventas]);
    }
}
