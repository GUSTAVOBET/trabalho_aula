<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seguradora;
class SeguradoraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seguradoras = Seguradora::all();
        return view('seguradoras.index', compact('seguradoras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $seguradoras = Seguradora::all();
        return view('seguradoras.create', compact('seguradoras'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $seguradora = new Seguradora();
        $seguradora->seg_nome = $request->seg_nome;
        $seguradora->seg_email = $request->seg_email;
        $seguradora->seg_cnpj = $request->seg_cnpj;
        $seguradora->seg_telefone = $request->seg_telefone;
        $seguradora->seg_endereco_completo = $request->seg_endereco_completo;
        $seguradora->save();
        return redirect()->route('seguradoras.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $seguradora = Seguradora::find($id);
        return view('seguradoras.show', compact('seguradora'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $seguradora = Seguradora::find($id);
        return view('seguradoras.edit', compact('seguradora'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $seguradora = Seguradora::find($id);
        $seguradora->seg_nome = $request->seg_nome;
        $seguradora->seg_cnpj = $request->seg_cnpj;
        $seguradora->seg_email = $request->seg_email;
        $seguradora->seg_telefone = $request->seg_telefone;
        $seguradora->seg_endereco_completo = $request->seg_endereco_completo;
        $seguradora->save();
        return redirect()->route('seguradoras.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $seguradora = Seguradora::find($id);
        $seguradora->delete();
        return redirect()->route('seguradoras.index');
    }
}
