<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Corretor;

class CorretorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $corretores = Corretor::all();
        return view('corretores.index', compact('corretores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('corretores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $corretor = new corretor([
            'cor_nome' => $request->cor_nome,
            'cor_tipo_pessoa' => $request->cor_tipo_pessoa,
            'cor_documento' => $request->cor_documento,
            'cor_email' => $request->cor_email, 
            'cor_telefone' => $request->cor_telefone,
            'cor_endereco_completo' => $request->cor_endereco_completo,
        ]);
        $corretor->save();
        return redirect()->route('corretores.index')->with('success', 'Corretor criado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $corretor = Corretor::find($id);
        return view('corretores.show', compact('corretor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $corretor = Corretor::find($id);
        return view('corretores.edit', compact('corretor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'cor_nome' => 'required',
            'cor_tipo_pessoa' => 'required',
            'cor_documento' => 'required',
            'cor_email' => 'required|email',
            'cor_telefone' => 'required',
            'cor_endereco_completo' => 'required',
        ]); 
        $corretor = corretor::find($id);
        $corretor->update($data);
        return redirect()->route('corretores.index')->with('success', 'Corretor atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $corretor = corretor::find($id);
        $corretor->delete();
        return redirect()->route('corretores.index')->with('success', 'Corretor deletado com sucesso');
    }
}
