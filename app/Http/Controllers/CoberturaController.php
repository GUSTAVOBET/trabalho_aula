<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoberturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coberturas = Cobertura::all();
        return view('coberturas.index', compact('coberturas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // retorna view('coberturas.create');
        return view('coberturas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // cria instancia de Cobertura com os dados do request
        $cobertura = new Cobertura();
        $cobertura->fill($request->all());
        $cobertura->save();
        return redirect()->route('coberturas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
