<?php

namespace App\Http\Controllers;

use App\Models\Usuari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $passwordHash = Hash::make($request->password);
        $usuari = Usuari::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $passwordHash,
        ]);
        return view("afegirUsuari", ["estat"=>true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuari $administracio)
    {
        return view("detallEditarUsuari", ["usuari"=>$administracio, "estat"=>false, "editar"=>false]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuari $administracio)
    {
        return view("detallEditarUsuari", ["usuari"=>$administracio, "estat"=>false, "editar"=>true]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuari $administracio)
    {
        if ($administracio->isDirty('password')) {
            $passwordHash = Hash::make($request->password);
            $administracio->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $passwordHash,
            ]);
        }
        else {
            $administracio->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        }
        return view("detallEditarUsuari", ["usuari"=>$administracio, "estat"=>true, "editar"=>true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuari $administracio)
    {
        $administracio->delete();
        $usuaris = Usuari::all();
        return view("administracio", ["usuaris"=>$usuaris]);
    }
}
