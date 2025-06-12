<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Seguradora;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $seguradoras = Seguradora::all();
        return view('produtos.create', compact('seguradoras'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'prd_tipos_cobertos' => 'nullable',
            'prd_nome' => 'nullable',
            'id_seg' => 'nullable|integer',
            'prd_sacas_garantia' => 'nullable|numeric',
            'prd_valor_segurado_por_ha' => 'nullable|numeric',
            'prd_sacas_valor' => 'nullable|numeric',
            'prd_descricao' => 'nullable|string',
            'prd_risco_nomeado_geada' => 'nullable',
            'prd_risco_nomeado_granizo' => 'nullable',
        ]);
    
        Produto::create($data);
    
        return redirect()->route('produtos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produto = Produto::find($id);
        return view('produtos.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produto = Produto::find($id);
        return view('produtos.edit', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'prd_tipos_cobertos' => 'nullable',
            'prd_nome' => 'nullable',
            'id_seg' => 'nullable|integer',
            'prd_sacas_garantia' => 'nullable|numeric',
            'prd_valor_segurado_por_ha' => 'nullable|numeric',
            'prd_sacas_valor' => 'nullable|numeric',
            'prd_descricao' => 'nullable|string',
            'prd_risco_nomeado_geada' => 'nullable',
            'prd_risco_nomeado_granizo' => 'nullable',
        ]);
    
        $produto->update($data);
        return redirect()->route('produtos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()->route('produtos.index');
    }
}
