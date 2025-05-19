<?php

namespace App\Http\Controllers;

use App\Models\Usuari;
use Illuminate\Http\Request;

class UsuariController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuaris = Usuari::all();
        return view("administracio", ["usuaris"=>$usuaris]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("afegirUsuari", ["estat"=>false]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usuari = Usuari::create($request->all());
        return view("afegirUsuari", ["estat"=>true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuari $usuari)
    {
        return view("detallEditarUsuari", ["usuari"=>$usuari, "estat"=>false, "editar"=>false]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuari $usuari)
    {
        return view("detallEditarUsuari", ["usuari"=>$usuari, "estat"=>false, "editar"=>true]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuari $usuari)
    {
        return view("detallEditarUsuari", ["usuari"=>$usuari, "estat"=>true, "editar"=>true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuari $usuari)
    {
        $usuari->delete();
        $usuaris = Usuari::all();
        return view("administracio", ["usuarios"=>$usuarios]);
    }
}
