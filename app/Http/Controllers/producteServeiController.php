<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProducteServei;

class producteServeiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productes = ProducteServei::all();
        return view("productes", ["productes"=>$productes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("afegirProductes", ["estat"=>false]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $producte = ProducteServei::create($request->all());
        return view("afegirProductes", ["estat"=>true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ProducteServei $productesServei)
    {
        return view("detallEditarProducte", ["producte"=>$productesServei, "estat"=>false, "editar"=>false]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProducteServei $productesServei)
    {
        return view("detallEditarProducte", ["producte"=>$productesServei, "estat"=>false, "editar"=>true]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProducteServei $productesServei)
    {
        $producte->update($request->all());
        return view("detallEditarProducte", ["producte"=>$productesServei, "estat"=>true, "editar"=>true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProducteServei $productesServei)
    {
        $productesServei->delete();
        $productes = ProducteServei::all();
        return view("productes", ["productes"=>$productes]);
    }

    public function productesProveidor(Request $request) {
        $productes = ProducteServei::where("provider", $request->provider)->get();
        return view("productes", ["productes"=>$productes]);
    }
}
