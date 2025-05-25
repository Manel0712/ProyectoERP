<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use App\Models\Venta;
use App\Models\ProducteServei;
use Illuminate\Http\Request;

class DetalleVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Venta $venta)
    {
        $ventaDetalles = DetalleVenta::where("proposalID", $venta["id"])->with(['venta', 'producto'])->get();
        return view("detalleVenta", ["ventaDetalles" => $ventaDetalles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(DetalleVenta $detalleventa)
    {
        $productoIdsEnVenta = DetalleVenta::where('proposalID', $detalleventa["id"])->pluck('productID');
        $productos = ProducteServei::whereNotIn('id', $productoIdsEnVenta)->get();
        return view("afegirProducteVenta", ["DetalleVenta" => $detalleventa, "productos" => $productos, "estat" => false]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, DetalleVenta $detalleventa)
    {
        $producto = ProducteServei::where('id', $request->productID)->get();
        $unitaryPrice = $producto[0]["price"]*$request->{"quantity-sold"};
        $producto[0]->update([
            "stock" => $producto[0]["stock"]-$request->{"quantity-sold"},
        ]);
        $nuevoProducto = DetalleVenta::create([
            "proposalID" => $detalleventa["proposalID"],
            "productID" => $request->productID,
            "quantity-sold" => $request->{"quantity-sold"},
            "unitary-price" => $unitaryPrice,
        ]);
        $productoIdsEnVenta = DetalleVenta::where('proposalID', $detalleventa["id"])->pluck('productID');
        $productos = ProducteServei::whereNotIn('id', $productoIdsEnVenta)->get();
        return view("afegirProducteVenta", ["DetalleVenta" => $detalleventa, "productos" => $productos, "estat" => true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(DetalleVenta $DetalleVenta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetalleVenta $DetalleVenta)
    {
        return view("editarProducteVenta", ["DetalleVenta" => $DetalleVenta, "estat" => false]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetalleVenta $DetalleVenta)
    {
        $producto = ProducteServei::where('id', $DetalleVenta["productID"])->get();
        $unitaryPrice = $DetalleVenta["producto"]["price"]*$request->{"quantity-sold"};
        if ($DetalleVenta["quantity-sold"]>$request->{"quantity-sold"}) {
            $producto[0]->update([
                "stock" => $producto[0]["stock"]+abs($DetalleVenta["quantity-sold"]-$request->{"quantity-sold"}),
            ]);
        }
        else if ($DetalleVenta["quantity-sold"]<$request->{"quantity-sold"}) {
            $producto[0]->update([
                "stock" => $producto[0]["stock"]-abs($DetalleVenta["quantity-sold"]-$request->{"quantity-sold"}),
            ]);
        }
        $DetalleVenta->update([
            "quantity-sold" => $request->{"quantity-sold"},
            "unitary-price" => $unitaryPrice,
        ]);
        return view("editarProducteVenta", ["DetalleVenta" => $DetalleVenta, "estat" => true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetalleVenta $DetalleVenta)
    {
        $ventaID = $DetalleVenta["proposalID"];
        $producto = ProducteServei::where('id', $DetalleVenta["productID"])->get();
        $unitaryPrice = $DetalleVenta["producto"]["price"]*$DetalleVenta["quantity-sold"];
        $producto[0]->update([
            "stock" => $producto[0]["stock"]+$DetalleVenta["quantity-sold"],
        ]);
        $DetalleVenta->delete();
        $ventaDetalles = DetalleVenta::where("proposalID", $ventaID)->with(['venta', 'producto'])->get();
        return view("detalleVenta", ["ventaDetalles" => $ventaDetalles]);
    }
}
