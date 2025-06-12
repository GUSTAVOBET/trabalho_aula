<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pessoas = Pessoa::all();
        return view('pessoas.index', compact('pessoas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pessoas.create');
    }

    /**
     * Store a newly created resource in storage.
     */

     
    public function store(Request $request)
    {
        $pessoa = new Pessoa([
            'pes_nome' => $request->pes_nome,
            'pes_email' => $request->pes_email, 
            'pes_telefone' => $request->pes_telefone,
            'pes_endereco_completo' => $request->pes_endereco_completo,
            'pes_cpf' => $request->pes_cpf,
        ]);
        $pessoa->save();
        return redirect()->route('pessoas.index')->with('success', 'Pessoa criada com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pessoa = Pessoa::find($id);
        return view('pessoas.show', compact('pessoa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pessoa = Pessoa::find($id);
        return view('pessoas.edit', compact('pessoa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'pes_nome' => 'required',
            'pes_email' => 'required|email',
            'pes_telefone' => 'required',
            'pes_endereco_completo' => 'required',
            'pes_cpf' => 'required',
        ]);
        $pessoa = Pessoa::find($id);
        $pessoa->update($data);
        return redirect()->route('pessoas.index')->with('success', 'Pessoa atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pessoa = Pessoa::find($id);
        $pessoa->delete();
        return redirect()->route('pessoas.index')->with('success', 'Pessoa deletada com sucesso');
    }
}
