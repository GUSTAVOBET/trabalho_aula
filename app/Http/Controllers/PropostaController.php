<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposta;
use App\Models\Produto;
use App\Models\Corretor;
use App\Models\Seguradora;

class PropostaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $propostas = Proposta::all();
        $produtos = Produto::all();
        $corretores = Corretor::all();
        $seguradoras = Seguradora::all();
        return view('propostas.index', compact('propostas', 'produtos', 'corretores', 'seguradoras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produtos = Produto::all();
        $corretores = Corretor::all();
        $seguradoras = Seguradora::all();
        return view('propostas.create', compact('produtos', 'corretores', 'seguradoras'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'prp_numero_proposta' => 'required|string',
            'prp_numero_contrato' => 'required|string',
            'prp_numero_contrato_seguradora' => 'required|string',
            'id_cor' => 'required|integer',
            'id_seg' => 'required|integer',
            'id_prd' => 'required|integer',
            'prp_numero_proposta_hequitar' => 'required|integer'
        ]);

        // Buscar produto selecionado
        $produto = \App\Models\produto::find($data['id_prd']);
        $ha = (float) $data['prp_numero_proposta_hequitar'];
        $sacas = (float) ($produto->prd_sacas_garantia ?? 0);
        $valor_saco = (float) ($produto->prd_sacas_valor ?? 0);
        $valor_segurado = $ha * $sacas * $valor_saco;
        $data['prp_valor_proposta'] = $valor_segurado;
        // O prêmio pode ser calculado para exibição, mas não é salvo na tabela

        Proposta::create($data);

        return redirect()->route('propostas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $proposta = Proposta::find($id);
        $produtos = Produto::all();
        $corretores = Corretor::all();
        $seguradoras = Seguradora::all();
        return view('propostas.show', compact('proposta', 'produtos', 'corretores', 'seguradoras'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $proposta = Proposta::find($id);
        $produtos = Produto::all();
        $corretores = Corretor::all();
        $seguradoras = Seguradora::all();
        return view('propostas.edit', compact('proposta', 'produtos', 'corretores', 'seguradoras'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $proposta = Proposta::find($id);
        $proposta->update($request->all());
        return redirect()->route('propostas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proposta = Proposta::find($id);
        $proposta->delete();
        return redirect()->route('propostas.index');
    }
}
